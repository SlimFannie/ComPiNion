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

    public function getJoursAttribute()
    {
        $chaineEnCours = $this->chaines()->whereNull('end_date')->first();
    
        // Vérifier si une chaine en cours a été trouvée
        if ($chaineEnCours) {
            // Récupérer la date de début de la chaine en cours
            $startDate = $chaineEnCours->start_date;
            
            // Calculer la différence en jours entre la date de début et la date actuelle
            return Carbon::parse($startDate)->diffInDays(Carbon::now()); 
        }
        
        // Retourner 0 si aucune chaine en cours n'est trouvée
        return 0;
    }
    public function chaines()
    {
        return $this->hasMany(Chaine::class, 'user_id');
    }

    public function derniereChaine()
    {

        return $this->hasMany(Chaine::class)
                    ->whereNull('end_date')
                    ->latest()
                    ->limit(1);
                    
    }

}
