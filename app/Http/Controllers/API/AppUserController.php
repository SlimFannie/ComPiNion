<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\DataController;
use App\Models\User;
use App\Models\Character;
use App\Models\Relation;
use Validator;
use App\Http\Resources\User as UserResource;

class AppUserController extends DataController
{

    public function users($id) {

        $users = User::all();

        $blocked = Relation::where('user1_id', $id)
        ->where('relation', 'blocked')
        ->pluck('user2_id')
        ->toArray();

        $blockedByUser2 = Relation::where('user2_id', $id)
        ->where('relation', 'blocked')
        ->pluck('user1_id')
        ->toArray();

        $blocked = array_merge($blocked, $blockedByUser2);

        $users = $users->whereNotIn('id', $blocked);

        return $this->sendResponse($users, 'Les utilisateurs ont été trouvés avec succès.');

    }
    
    public function amis($id) {

        $relation = Relation::where([
                ['user1_id', '=', $id],
                ['relation', '=', 'friend']
        ])
        ->orWhere([
            ['user2_id', '=', $id],
            ['relation', '=', 'friend']
        ])
        ->get();

        return $this->sendResponse($relation, 'Les amis ont été trouvés avec succès.');

    }

    public function showAllCharacters() {
        $characters = Character::all()->map(function ($character) {
            $character->img_url = asset('img/' . $character->img);
            return $character;
        });

        return $this->sendResponse($characters, 'Les personnages ont été trouvés avec succès.');
    }

}
