<?php

namespace App\Http\Livewire\Modules;

use Livewire\Component;
use Livewire\WithFileUploads;

class PriceLists extends Component
{
    use WithFileUploads;

    /**
     * The component's listeners.
     *
     * @var array
     */
    protected $listeners = [
        'priceListChanged' => '$refresh',
    ];

    public $cennik;

    /**
     * The component's groups.
     *
     * @var App\Models\Group
     */
    public $groups;

    /**
     * The component's module.
     *
     * @var App\Models\Module
     */
    public $module;

    /**
     * The component's module price list.
     *
     * @var App\Models\PriceList
     */
    public $priceList;

    /**
     * The component's price table.
     *
     * @var array
     */
    public $priceTable = false;

    /**
     * Indicate if price lists are with opt prices
     *
     * @var boolean
     */
    public $opt;

    /**
     * Indicates if admin would like to upload price list.
     *
     * @var bool
     */
    public $uploadList = false;

    /**
     * Indicates if admin would like to see price list.
     *
     * @var bool
     */
    public $showList = false;

    /**
     * Confirm that the admin would like to change user status.
     *
     * @param  integer  $id
     * @return void
     */
    public function confirmUploadList()
    {
        $this->uploadList = true;
    }

    /**
     * Confirm that the admin would like to see price list.
     *
     * @param  integer  $id
     * @return void
     */
    public function showList()
    {
        $this->showList = true;
    }

    /**
     * Create a new component instance.
     *
     * @param boolean $opt
     * @param \App\Models\Module $module
     *
     * @return void
     */
    public function mount(bool $opt, \App\Models\Module $module)
    {
        $this->module = $module;
        $this->opt = $opt;
        $this->priceList = $this->module->priceListOpt($this->opt);
        $this->groups = \App\Models\Group::get();
        $this->priceTable = $this->prepareTable();
    }

    /**
     * Delete old and store new prices.
     *
     * @return void
     */
    public function savePriceList()
    {
        $this->validate([
            'cennik' => 'required|mimes:csv,txt|max:10240',
        ]);

        if (!$this->priceList) {
            $new_priceList = new \App\Models\PriceList();
            $new_priceList->opt = $this->opt;
            $new_priceList->module_id = $this->module->id;
            $new_priceList->save();
            $this->priceList = $new_priceList;
        }

        $this->deleteOldPrices();
        $this->savePrices($this->cennik->getRealPath());
        $this->priceTable = $this->prepareTable();
        $this->priceList->touch();

        $this->cennik = null;
        $this->uploadList = false;

        $this->emit('priceListChanged');
    }

    public function render()
    {
        return view('livewire.modules.price-lists');
    }

    /**
     * Delete old prices from price list
     *
     * @return void
     */
    private function deleteOldPrices()
    {
        foreach ($this->priceList->prices as $price) {
            $price->removeGroup();
            $price->delete();
        }
    }

    /**
     * Save new prices to price list
     *
     * @param  file  $csv
     * @return void
     */
    private function savePrices($csv)
    {
        $file_handle = fopen($csv, 'r');
        while (!feof($file_handle)) {
            $lines[] = fgetcsv($file_handle, 0, ';');
        }
        fclose($file_handle);

        foreach ($lines as $line) {
            if ($line) {
                $field = count($line);
                $i = 0;
                
                if ($field > 2) {
                    foreach ($this->groups as $group) {
                        $this->newPrice($line[$i++], $line[$field - 2], $line[$field - 1], $group->name);
                    }
                }
            }
        }
    }

    /**
     * Store new price and assign group
     *
     * @param  decimal $price
     * @param  string $power
     * @param  integer $qty
     * @param  string $group
     * @return void
     */
    private function newPrice($price, $power, $qty, $group)
    {
        $new_price = new \App\Models\ModulePrice();
        $new_price->price_list_id = $this->priceList->id;
        $new_price->price =  str_replace(",", ".", str_replace(" ", "", $price));
        $new_price->power =str_replace(",", ".", str_replace(" ", "", $power));
        $new_price->qty =str_replace(",", ".", str_replace(" ", "", $qty));
        $new_price->save();

        $new_price->assignGroup($group);
    }

    /**
     * Prepare table of prices
     *
     * @return array|null
     */
    private function prepareTable()
    {
        $price_all = [];
        if ($this->priceList) {
            $this->priceList->refresh();
            $prices = $this->priceList->prices->load('group');
            foreach ($prices as $list_price) {
                $group = $list_price->group->first()->name;

                $price = [
                    'price_'.$group => $list_price->price,
                    'qty' => $list_price->qty,
                    'power' => $list_price->power
                ];
                
                if (isset($price_all[$list_price->qty])) {
                    $price_all[$list_price->qty] += $price;
                } else {
                    $price_all[$list_price->qty] = $price;
                }
            }

            return $price_all;
        }
        
        return null;
    }
}
