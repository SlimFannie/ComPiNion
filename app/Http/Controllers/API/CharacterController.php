<?php

namespace App\Http\Controllers;

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
        $character = Character::find($id)->get();
        return $this->sendResponse($character, 'Le personnage a été trouvé avec succès.');
    }

}
