<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalculationSurcharge extends Model
{
    use HasFactory;

    /**
     * Get the surcharge calculation
     */
    public function calculation()
    {
        return $this->belongsTo('App\Models\Calculation');
    }
}
