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
        'name', 'power', 'description'
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
    public function priceListByName($groupName, $opt)
    {
        foreach ($this->priceLists->where('opt', $opt) as $list) {
            if ($list->group->first()->name == $groupName) {
                return $list;
            }
        }
    }
}
