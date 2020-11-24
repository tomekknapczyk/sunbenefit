<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class Module extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'power', 'description', 'file_name'
    ];

    /**
     * Get the module price list.
     */
    public function priceLists()
    {
        return $this->hasOne('App\Models\PriceList');
    }

    /**
     * Get the module price list with optymalization.
     */
    public function priceListOpt($opt)
    {
        return $this->hasOne('App\Models\PriceList')->where('opt', $opt)->first();
    }

    public function getPrice($group, $power)
    {
        $groups = \App\Models\Group::count();
        $price_base = 0;
        $price_opt = 0;
        $qty = 0;
        $actual_power = 0;

        if ($this->priceListOpt(0)) {
            $prices_base = $this->priceListOpt(0)->prices()->where('power', '>=', $power)->orderBy('power', 'asc')->take($groups)->get();
            foreach($prices_base as $price){
                if($price->group()->first()->name == $group){
                    $price_base = $price->price;
                    $actual_power = $price->power;
                    $qty = $price->qty;
                    break;
                }
            }
        }

        if ($this->priceListOpt(1)) {
            $prices_opt = $this->priceListOpt(1)->prices()->where('power', '>=', $power)->orderBy('power', 'asc')->take($groups)->get();
            foreach($prices_opt as $price){
                if($price->group()->first()->name == $group){
                    $price_opt = $price->price;
                    $actual_power = $price->power;
                    $qty = $price->qty;
                    break;
                }
            }
        }
        
        return [$price_base, $price_opt, $actual_power, $qty];
    }
}
