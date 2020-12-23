<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calculation extends Model
{
    use HasFactory;

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'calc_surcharges' => 'array',
        'calc_surcharges_qty' => 'array',
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the calculation user
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Get the user's first name.
     *
     * @param  string  $value
     * @return string
     */
    public function getStatusAttribute($value)
    {
        switch ($value) {
            case '1':
                return 'Umowa podpisana przez handlowca';
                break;
            case '2':
                return 'Umowa dostarczona do BOK';
                break;
            case '3':
                return 'Umowa zaakceptowana przez BOK';
                break;
            case '4':
                return 'Umowa „przekazana do Zamówienia”';
                break;
            case '5':
                return 'Potwierdzenie wysyłki towarów';
                break;
            case '6':
                return 'Towar dostarczono';
                break;
            case '7':
                return 'Montaż wykonany';
                break;
            case '8':
                return 'Zakończenie umowy';
                break;
            case '9':
                return 'Umowa do archiwum';
                break;
        }
    }
}
