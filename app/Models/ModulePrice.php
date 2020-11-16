<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasGroup;

class ModulePrice extends Model
{
    use HasFactory;
    use HasGroup;

    /**
     * Get the price list of the price.
     */
    public function priceList()
    {
        return $this->belongsTo('App\Models\PriceList');
    }
}
