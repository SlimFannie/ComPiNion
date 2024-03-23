<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chaine extends Model
{

    use HasFactory;

    protected $fillable = [
        'end_date',
    ];

    /* Mutateur pour les champs de date (voir explication plus détaillée au sujet des mutateurs dans le model User) 
    Cela me permet de formatter les dates correctement. */

    public function setStartDateAttribute($value)
    {

        $date = new \DateTime($value);

        $this->attributes['start_date'] = [
            'year' => $date->format('Y'),
            'month' => $date->format('m'),
            'day' => $date->format('d')
        ];
    }

    public function setEndDateAttribute($value)
    {

        $date = new \DateTime($value);

        $this->attributes['end_date'] = [
            'year' => $date->format('Y'),
            'month' => $date->format('m'),
            'day' => $date->format('d')
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
