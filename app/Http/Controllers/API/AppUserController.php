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

        $users = $users->whereNotIn('id', $blocked)->values();

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

    public function befriend($idUser, $idFriendUser) {
        $relation = new Relation;
        $relation->user1_id = $idUser;
        $relation->user2_id = $idFriendUser;
        $relation->relation = 'friend';
        $relation->save();
    }

    public function unfriend($idUser, $idFriendUser) {
        $relation = Relation::where([
            ['user1_id', '=', $idUser],
            ['user2_id', '=', $idFriendUser],
            ['relation', '=', 'friend']
        ])->get();

        $relation->destroy();
    }

    public function block($idUser, $idBlockedUser) {
        $relation = new Relation;
        $relation->user1_id = $idUser;
        $relation->user2_id = $idBlockedUser;
        $relation->relation = 'blocked';
        $relation->save();
    }

    public function unblock($idUser, $idBlockedUser) {
        $relation = Relation::where([
            ['user1_id', '=', $idUser],
            ['user2_id', '=', $idBlockedUser],
            ['relation', '=', 'blocked']
        ])->get();

        $relation->destroy();
    }

    public function showAllCharacters() {
        $characters = Character::all()->map(function ($character) {
            $character->img_url = asset('img/' . $character->img);
            return $character;
        });

        return $this->sendResponse($characters, 'Les personnages ont été trouvés avec succès.');
    }

    public function showCharacter($id) {
        $character = Character::findOrFail($id)->get();
        return $this->sendResponse($character, 'Le personnage a été trouvé avec succès.');
    }

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
    
            $users = $users->whereNotIn('id', $blocked)->values();
    
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
    
        public function befriend($idUser, $idFriendUser) {
            $relation = new Relation;
            $relation->user1_id = $idUser;
            $relation->user2_id = $idFriendUser;
            $relation->relation = 'friend';
            $relation->save();
        }
    
        public function unfriend($idUser, $idFriendUser) {
            $relation = Relation::where([
                ['user1_id', '=', $idUser],
                ['user2_id', '=', $idFriendUser],
                ['relation', '=', 'friend']
            ])->get();
    
            $relation->destroy();
        }
    
        public function block($idUser, $idBlockedUser) {
            $relation = new Relation;
            $relation->user1_id = $idUser;
            $relation->user2_id = $idBlockedUser;
            $relation->relation = 'blocked';
            $relation->save();
        }
    
        public function unblock($idUser, $idBlockedUser) {
            $relation = Relation::where([
                ['user1_id', '=', $idUser],
                ['user2_id', '=', $idBlockedUser],
                ['relation', '=', 'blocked']
            ])->get();
    
            $relation->destroy();
        }
    
        public function showAllCharacters() {
            $characters = Character::all()->map(function ($character) {
                $character->img_url = asset('img/' . $character->img);
                return $character;
            });
    
            return $this->sendResponse($characters, 'Les personnages ont été trouvés avec succès.');
        }
    
        public function showCharacter($id) {
            $character = Character::findOrFail($id)->get();
            return $this->sendResponse($character, 'Le personnage a été trouvé avec succès.');
        }
    
        public function updateprenom(Request $request, $id) {
            try {
                $user = User::findOrFail($id);
    
                $user->prenom = empty($request->prenom) ? $user->prenom : $request->prenom;
    
                $user->save();
            }
            catch(\Throwable $e) {
                Log::debug($e);
            }
    
            return $this->sendResponse('Modification réussi.');
        }
    
        public function updatepseudo(Request $request, $id) {
            try {
                $user = User::findOrFail($id);
    
                $user->nom = empty($request->nom) ? $user->nom : $request->nom;
    
                $user->save();
            }
            catch(\Throwable $e) {
                Log::debug($e);
            }
    
            return $this->sendResponse('Modification réussi.');
        }
    
        public function updatepseudo(Request $request, $id) {
            try {
                $user = User::findOrFail($id);
    
                $user->pseudo = empty($request->pseudo) ? $user->pseudo : $request->pseudo;
    
                $user->save();
            }
            catch(\Throwable $e) {
                Log::debug($e);
            }
    
            return $this->sendResponse('Modification réussi.');
        }
    
        public function updateemail(Request $request, $id) {
            try {
                $user = User::findOrFail($id);
    
                $user->email = empty($request->email) ? $user->email : $request->email;
    
                $user->save();
            }
            catch(\Throwable $e) {
                Log::debug($e);
            }
    
            return $this->sendResponse('Modification réussi.');
        }
    
        public function updatemerite(Request $request, $id) {
            try {
                $user = User::findOrFail($id);
    
                $user->merite = empty($request->merite) ? $user->merite : $request->merite;
    
                $user->save();
            }
            catch(\Throwable $e) {
                Log::debug($e);
            }
    
            return $this->sendResponse('Modification réussi.');
        }
    
        public function updatejours(Request $request, $id) {
            try {
                $user = User::findOrFail($id);
    
                $user->jours = empty($request->jours) ? $user->jours : $request->jours;
    
                $user->save();
            }
            catch(\Throwable $e) {
                Log::debug($e);
            }
    
            return $this->sendResponse('Modification réussi.');
        }
    
        public function destroy($id) {
            try{
                $user = User::findOrFail($id);
    
                $user->delete();
            }
            catch(\Throwable $e) {
                Log::debug($e);
            }
    
            return $this->sendResponse('Suppression réussi.');
        }
    
    }
    

    public function destroy($id) {
        try{
            $user = User::findOrFail($id);

            $user->delete();
        }
        catch(\Throwable $e) {
            Log::debug($e);
        }

        return $this->sendResponse('Suppression réussi.');
    }

}
