<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surcharge extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'price', 'type', 'editable'
    ];

    public function getType()
    {
        switch ($this->type) {
            case 'module':
                return 'Cena z każdy moduł';
                break;
            case 'kwp':
                return 'Cena z każdy kWp';
                break;
            case 'once':
                return 'Cena jednorazowa';
                break;
            case 'unit':
                return 'Cena za jednostkę';
                break;
        }
    }
}
