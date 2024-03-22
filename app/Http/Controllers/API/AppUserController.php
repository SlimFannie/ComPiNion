<?php

    namespace App\Http\Controllers\API;
    
    use Illuminate\Http\Request;
    use App\Http\Controllers\API\DataController;
    use App\Models\User;
    use App\Models\Character;
    use App\Models\Relation;
    use Illuminate\Support\Facades\Log;
    use Hash;

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
    
        /*===================== Routes de modifications des informations de l'utilisateur ======================= */
        
        public function updateprenom(Request $request, $id) {
            try {
                $user = User::findOrFail($id);
        
                $user->prenom = empty($request->prenom) ? $user->prenom : $request->prenom;
        
                $user->save();
        
                return $this->sendResponse('Modification réussie.', 200); // Pass both message and status code
            }
            catch(\Throwable $e) {
                Log::debug($e);
                return $this->sendResponse('Une erreur est survenue.', 500); // You can handle error cases similarly
            }
        }
        
        public function updatenom(Request $request, $id) {
            try {
                $user = User::findOrFail($id);
        
                $user->nom = empty($request->nom) ? $user->nom : $request->nom;
        
                $user->save();
        
                return $this->sendResponse('Modification réussie.', 200); // Pass both message and status code
            }
            catch(\Throwable $e) {
                Log::debug($e);
                return $this->sendResponse('Une erreur est survenue.', 500); // You can handle error cases similarly
            }
        }      
    
        public function updatepseudo(Request $request, $id) {
            try {
                $user = User::findOrFail($id);
        
                $user->pseudo = empty($request->pseudo) ? $user->pseudo : $request->pseudo;
        
                $user->save();
        
                return $this->sendResponse('Modification réussie.', 200); // Pass both message and status code
            }
            catch(\Throwable $e) {
                Log::debug($e);
                return $this->sendResponse('Une erreur est survenue.', 500); // You can handle error cases similarly
            }
        }
        
    
        public function updateemail(Request $request, $id) {
            try {
                $user = User::findOrFail($id);
        
                $user->email = empty($request->email) ? $user->email : $request->email;
        
                $user->save();
        
                return $this->sendResponse('Modification réussie.', 200); // Pass both message and status code
            }
            catch(\Throwable $e) {
                Log::debug($e);
                return $this->sendResponse('Une erreur est survenue.', 500); // You can handle error cases similarly
            }
        }
        
        public function updatemerite(Request $request, $id) {
            try {
                $user = User::findOrFail($id);
        
                $user->merite = empty($request->merite) ? $user->merite : $request->merite;
        
                $user->save();
        
                return $this->sendResponse('Modification réussie.', 200); // Pass both message and status code
            }
            catch(\Throwable $e) {
                Log::debug($e);
                return $this->sendResponse('Une erreur est survenue.', 500); // You can handle error cases similarly
            }
        }

        public function updatelimite(Request $request, $id) {
            try {
                $user = User::findOrFail($id);
        
                $user->limite = empty($request->limite) ? $user->limite : $request->limite;
        
                $user->save();
        
                return $this->sendResponse('Modification réussie.', 200); // Pass both message and status code
            }
            catch(\Throwable $e) {
                Log::debug($e);
                return $this->sendResponse('Une erreur est survenue.', 500); // You can handle error cases similarly
            }
        }

        public function updatePassword(Request $request, $id) {
            try {
                $user = User::findOrFail($id);
        
                // Check if the provided current password matches the user's current password
                if (!Hash::check($request->current_password, $user->password)) {
                    return $this->sendResponse('Mot de passe actuel incorrect.', 400); // Incorrect current password
                    Log::debug("CURRENT PWD DOESNT MATCH" );

                }
        
                // Update the user's password with the new hashed password
                $user->password = Hash::make($request->new_password);
        
                Log::debug("WORKED" );
                $user->save();
        
                return $this->sendResponse('Mot de passe mis à jour avec succès.', 200); // Password updated successfully
            }
            catch(\Throwable $e) {
                Log::debug($e);
                return $this->sendResponse('Une erreur est survenue.', 500); // You can handle error cases similarly
            }
        }
        
        /* Méthodes relatives aux streaks */
        public function updatejours(Request $request, $id) {
            try {
                $user = User::findOrFail($id);
        
                $user->jours = empty($request->jours) ? $user->jours : $request->jours;
        
                $user->save();
        
                return $this->sendResponse('Modification réussie.', 200); // Pass both message and status code
            }
            catch(\Throwable $e) {
                Log::debug($e);
                return $this->sendResponse('Une erreur est survenue.', 500); // You can handle error cases similarly
            }
        }

        public function endstreak($id) {
            try {

                $user = User::find($id);

                $chaineEnCours = $user->derniereChaine();
                $chaineEnCours->end_date = now();
                $chaineEnCours->save();

                $nouvelleChaine = new Chaine();
                $nouvelleChaine->user_id = $user->id;
                $nouvelleChaine->start_date = now(); 
                $nouvelleChaine->save();

                return $this->sendResponse('Modification réussie.', 200); // Pass both message and status code
            }
            catch(\Throwable $e) {
                Log::debug($e);
                return $this->sendResponse('Une erreur est survenue.', 500); // You can handle error cases similarly
            }
        }

        public function getStreaks($id) {
            try {

                $user = User::find($id);

                $chaines = $user->chaines()->get();

                return $this->sendResponse($chaines, 'Le personnage a été trouvé avec succès.');

            }
            catch(\Throwable $e) {
                Log::debug($e);
                return $this->sendResponse('Une erreur est survenue.', 500); // You can handle error cases similarly
            }
        }

        public function getStreak($id) {
            try {

                $user = User::find($id);

                $chaineEnCours = $user->derniereChaine()->first();

                return $this->sendResponse($chaineEnCours, 'Le personnage a été trouvé avec succès.');;

            }
            catch(\Throwable $e) {
                Log::debug($e);
                return $this->sendResponse('Une erreur est survenue.', 500); // You can handle error cases similarly
            }
        }
        
        // Supprimer l'utilisateur
    
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

