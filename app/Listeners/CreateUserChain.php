<?php

namespace App\Listeners;

use App\Models\User;
use App\Models\Chaine;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;


class CreateUserChain
{
     /**
     * Handle the event.
     *
     * @param  User  $user
     * @return void
     */
    public function handle(User $user)
    {
        // Créez une nouvelle chaîne pour l'utilisateur
        $chaine = new Chaine();
        $chaine->user_id = $user->id;
        $chaine->start_date = now();
        $chaine->save();
    }
}
