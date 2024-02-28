<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\DataController;
use App\Models\User;
use Validator;
use App\Http\Resources\User as UserResource;

class AppUserController extends DataController
{

    public function users() {
        $users = User::all();

        return $this->sendResponse($users, 'Les utilisateurs ont été trouvés avec succès.');
    }

}
