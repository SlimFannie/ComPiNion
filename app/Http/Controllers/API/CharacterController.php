<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

class CharacterController extends Controller
{

    //Ce controlleur gère les méthodes relativent aux Compinions.

    //GET - Imgs
    public function showAllCharacters() {
        $characters = Character::all()->map(function ($character) {
            $character->img_url = asset('img/' . $character->img);
            return $character;
        });

        return $this->sendResponse($characters, 'Les personnages ont été trouvés avec succès.');
    }

    //GET - Compinion de l'usager
    public function showCharacter($id) {
        $user = User::find($id);
        $character = $user->character;

        return $this->sendResponse($character, 'Le personnage a été trouvé avec succès.');
    }

}