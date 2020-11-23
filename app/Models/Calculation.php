<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calculation extends Model
{
    use HasFactory;

    /**
     * Get the calculation user
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Get the calculation surcharges
     */
    public function surcharges()
    {
        return $this->hasMany('App\Models\CalculationSurcharge');
    }
}
