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
    }

    /**
     * Confirm that the admin would like to change user status.
     *
     * @return void
     */
    public function savePriceList()
    {
        $this->validate([
            'cennik' => 'required|mimes:csv,txt|max:10240',
        ]);

        // dd($this->listFile->get());
        if (!$this->priceList) {
            $new_priceList = new \App\Models\PriceList();
            $new_priceList->opt = $this->opt;
            $new_priceList->module_id = $this->module->id;
            $new_priceList->save();
            $this->priceList = $new_priceList;
        }

        $this->priceList->touch();
        
        $this->cennik = null;
        $this->uploadList = false;

        $this->emit('priceListChanged');
    }

    public function render()
    {
        return view('livewire.modules.price-lists');
    }
}
