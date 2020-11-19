<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSurcharge extends Model
{
    use HasFactory;

    /**
     * Get thesurcharge user
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
