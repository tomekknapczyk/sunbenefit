<?php

namespace App\Http\Livewire\Modules;

use Livewire\Component;

class PriceLista extends Component
{
    /**
     * The component's listeners.
     *
     * @var array
     */
    protected $listeners = ['priceListChanged' => 'updatePriceList'];

    public function updatePriceList()
    {
        $this->priceList = $this->module->priceListByName($this->group->name, $this->opt);
    }

    /**
     * The component's group.
     *
     * @var \App\Models\Group
     */
    public $group;

    /**
     * The component's group.
     *
     * @var \App\Models\Module
     */
    public $module;

    /**
     * The component's list.
     *
     * @var \App\Models\PriceList
     */
    public $priceList;

    /**
     * Indicate if price lists are with opt prices
     *
     * @var boolean
     */
    public $opt;

    /**
     * Create a new component instance.
     *
     * @param \App\Models\Group $group
     * @param \App\Models\Module $module
     *
     * @return void
     */
    public function mount(bool $opt)
    {
        $this->priceList = $this->module->priceListByName($this->group->name, $opt);
    }

    public function render()
    {
        return view('livewire.modules.price-lista');
    }
}
