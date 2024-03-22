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

    /**
     * Mutateur pour la colonne 'jours'.
     */
    public function getJoursAttribute()
    {
        $chaineEnCours = $this->derniereChaine();

        $differenceJours = Carbon::parse($chaineEnCours->start_date)->diffInDays(Carbon::now());

        return $differenceJours;
    }


    public function chaines(): HasMany
    {
        return $this->hasMany(Chaine::class);
    }

    public function derniereChaine() {
        return $this->chaines()->where('end_date', null)->first();
    }

}
