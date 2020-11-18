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
     * Get the module price lists.
     */
    public function priceLists()
    {
        return $this->hasMany('App\Models\PriceList');
    }

    /**
     * Get the module price lists.
     */
    public function priceListOpt($opt)
    {
       return $this->hasMany('App\Models\PriceList')->where('opt', $opt)->first();
    }
}
