<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calculation extends Model
{
    use HasFactory;

    protected $slowa = array(
        'minus',
      
        array(
          'zero',
          'jeden',
          'dwa',
          'trzy',
          'cztery',
          'pięć',
          'sześć',
          'siedem',
          'osiem',
          'dziewięć'),
      
        array(
          'dziesięć',
          'jedenaście',
          'dwanaście',
          'trzynaście',
          'czternaście',
          'piętnaście',
          'szesnaście',
          'siedemnaście',
          'osiemnaście',
          'dziewiętnaście'),
      
        array(
          'dziesięć',
          'dwadzieścia',
          'trzydzieści',
          'czterdzieści',
          'pięćdziesiąt',
          'sześćdziesiąt',
          'siedemdziesiąt',
          'osiemdziesiąt',
          'dziewięćdziesiąt'),
      
        array(
          'sto',
          'dwieście',
          'trzysta',
          'czterysta',
          'pięćset',
          'sześćset',
          'siedemset',
          'osiemset',
          'dziewięćset'),
      
        array(
          'tysiąc',
          'tysiące',
          'tysięcy'),
      
        array(
          'milion',
          'miliony',
          'milionów'),
      
        array(
          'miliard',
          'miliardy',
          'miliardów'),
    );

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
     * Get the calculation module
     */
    public function module()
    {
        return $this->belongsTo('App\Models\Module');
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

    /**
     * Get the calculation final price in polish words
     */
    public function inWords($column)
    {
        $kwota = explode('.', $this->$column);
            
        $zl = preg_replace('/[^-\d]+/', '', $kwota[0]);
            
        $slownie = $this->slownie($zl) . ' ' . $this->odmiana(array('złoty', 'złote', 'złotych'), $zl);

        return $slownie;
    }

    public function odmiana($odmiany, $int)
    {
        $txt = $odmiany[2];
        if ($int == 1) {
            $txt = $odmiany[0];
        }
        $jednosci = (int) substr($int, -1);
        $reszta = $int % 100;
        if (($jednosci > 1 && $jednosci < 5) &! ($reszta > 10 && $reszta < 20)) {
            $txt = $odmiany[1];
        }
        return $txt;
    }

    public function liczba($int)
    {
        $wynik = '';
        $j = abs((int) $int);
        
        if ($j == 0) {
            return $this->slowa[1][0];
        }
        $jednosci = $j % 10;
        $dziesiatki = ($j % 100 - $jednosci) / 10;
        $setki = ($j - $dziesiatki*10 - $jednosci) / 100;
        
        if ($setki > 0) {
            $wynik .= $this->slowa[4][$setki-1].' ';
        }
        
        if ($dziesiatki > 0) {
            if ($dziesiatki == 1) {
                $wynik .= $this->slowa[2][$jednosci].' ';
            } else {
                $wynik .= $this->slowa[3][$dziesiatki-1].' ';
            }
        }
        
        if ($jednosci > 0 && $dziesiatki != 1) {
            $wynik .= $this->slowa[1][$jednosci].' ';
        }
        return $wynik;
    }

    public function slownie($int)
    {        
        $in = preg_replace('/[^-\d]+/', '', $int);
        $out = '';
        
        if ($in[0] == '-') {
            $in = substr($in, 1);
            $out = $this->slowa[0].' ';
        }
        
        $txt = str_split(strrev($in), 3);
        
        if ($in == 0) {
            $out = $this->slowa[1][0].' ';
        }
        
        for ($i = count($txt) - 1; $i >= 0; $i--) {
            $liczba = (int) strrev($txt[$i]);
            if ($liczba > 0) {
                if ($i == 0) {
                    $out .= $this->liczba($liczba).' ';
                } else {
                    $out .= ($liczba > 1 ? $this->liczba($liczba).' ' : '')
                .$this->odmiana($this->slowa[4 + $i], $liczba).' ';
                }
            }
        }
        return trim($out);
    }
}
