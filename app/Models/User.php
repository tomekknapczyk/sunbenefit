<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;
use App\Traits\HasGroup;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use SoftDeletes;
    use HasRoles;
    use HasGroup;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'lastname',
        'phone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the calculator configuration
     */
    public function calculator()
    {
        return $this->hasOne('App\Models\Calculator');
    }

    /**
     * Get the user surcharges
     */
    public function surcharges()
    {
        return $this->hasMany('App\Models\UserSurcharge');
    }

    /**
     * Get the user surcharge
     */
    public function getSurcharge($id)
    {
        return $this->surcharges->where('surcharge_id', $id)->first();
    }

    /**
     * Get the user factors
     */
    public function factors()
    {
        return $this->hasMany('App\Models\UserFactor');
    }

    /**
     * Get the user factor
     */
    public function getFactor($id)
    {
        return $this->factors->where('factor_id', $id)->first();
    }

    /**
     * Get the user factor by name
     */
    public function getFactorByName($name)
    {
        $factor =\App\Models\Factor::where('name', $name)->first();

        $userFactor = $this->getFactor($factor->id);
        
        if ($userFactor) {
            $userFactor['label'] = $factor['label'];
            return $userFactor;
        }

        return $factor;
    }

    /**
     * Get the user calculations
     */
    public function calculations()
    {
        return $this->hasMany('App\Models\Calculation');
    }
}
