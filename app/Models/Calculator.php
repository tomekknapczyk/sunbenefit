<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calculator extends Model
{
    use HasFactory;

    /**
     * Get the module 1
     */
    public function module1()
    {
        return $this->hasOne('App\Models\Module', 'id', 'module_id_1');
    }
    
    /**
     * Get the module 2
     */
    public function module2()
    {
        return $this->hasOne('App\Models\Module', 'id', 'module_id_2');
    }

    /**
     * Get the module 3
     */
    public function module3()
    {
        return $this->hasOne('App\Models\Module', 'id', 'module_id_3');
    }
    
}
