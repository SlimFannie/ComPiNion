<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\DataController;
use App\Models\User;
use App\Models\Character;
use Validator;
use App\Http\Resources\User as UserResource;

class AppUserController extends DataController
{

    public function users() {
        $users = User::all();

        return $this->sendResponse($users, 'Les utilisateurs ont été trouvés avec succès.');
    }

    public function showAllCharacters() {
        $characters = Character::all();

        return $this->sendResponse($characters, 'Les personnages ont été trouvés avec succès.');
    }
}
