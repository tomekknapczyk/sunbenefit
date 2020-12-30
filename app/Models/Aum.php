<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aum extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'location' => 'array',
        'status' => 'array',
        'roof' => 'array',
        'roofType' => 'array',
        'construction' => 'array',
        'constructionMaterial' => 'array',
        'constructionGround' => 'array',
        'constructionRoofType' => 'array',
        'connection' => 'array',
        'connectionType' => 'array',
        'pvType' => 'array',
        'protection' => 'array',
        'lightning' => 'array',
        'insulation' => 'array',
        'inverter' => 'array',
    ];
}
