<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceList extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'module_id',
    ];

    /**
     * Get the price list module.
     */
    public function module()
    {
        return $this->belongsTo('App\Models\Module');
    }

    /**
     * Get the price list prices.
     */
    public function prices()
    {
        return $this->hasMany('App\Models\ModulePrice');
    }
}
