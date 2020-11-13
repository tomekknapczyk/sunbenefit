<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasGroup;

class PriceList extends Model
{
    use HasFactory;
    use HasGroup;

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
}
