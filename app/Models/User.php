<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Carbon\Carbon;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'prenom',
        'nom',
        'pseudo',
        'email',
        'password',
        'character_id',
        'merite',
        'jours',
        'limite'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function amis() {
        return $this->belongsTo(User::class, 'id');
    }

    /* Note Fannie - 
    Ceci est un mutateur.
    Cela nous permet de calculer la colonne jour de la table user en fonction de la date de début de la série (chaine) en cours et la date de la journée d'aujourd'hui.
    Pour que cela fonctionne, il faut respecter la syntaxe prévue par Laravel, soit get[nomdelacolonne]Attribute(). Dans ce cas-ci: getJoursAttribute().
    */
    public function getJoursAttribute()
    {

        //Nous allons chercher la série en cours de l'utilisateur. Pour ce faire, nous regardons laquelle a une valeur null.
        $chaineEnCours = $this->chaines()->whereNull('end_date')->first();
    
        if ($chaineEnCours) {        
            $startDate = $chaineEnCours->start_date;
            //Nous utilisons la librairie Carbon inclut dans Laravel pour parser notre date de début et la comparer à la date d'aujourd'hui.
            return Carbon::parse($startDate)->diffInDays(Carbon::now()); 
        }
        
        return 0;
    }

    // Un utilisateur a plusieurs chaines
    public function chaines()
    {

        return $this->hasMany(Chaine::class, 'user_id');
        
    }

    // Un utilisateur a une chaine en cours
    public function derniereChaine()
    {

        return $this->hasMany(Chaine::class)->whereNull('end_date')->latest()->limit(1);
                    
    }

}
