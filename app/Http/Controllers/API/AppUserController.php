<?php

    namespace App\Http\Controllers\API;
    
    use Illuminate\Http\Request;
    use App\Http\Controllers\API\DataController;
    use App\Models\User;
    use App\Models\Character;
    use App\Models\Relation;
    use App\Models\Chaine;
    use DB;
    use Illuminate\Support\Facades\Log;
    use Hash;

    use Validator;
    use App\Http\Resources\User as UserResource;
    
    class AppUserController extends DataController
    {
    
        // Ce controlleur gère les méthodes relativent aux utilisateurs dans l'application Android.

        //Relations - Get
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
    
            $users = $users->whereNotIn('id', array_merge([$id], $blocked))->values();
    
            return $this->sendResponse($users, 'Les utilisateurs ont été trouvés avec succès.');
    
        }
        
        public function amis($id) {
    
            $amis = Relation::where([
                ['user1_id', '=', $id],
                ['relation', '=', 'friend']
            ])->pluck('user2_id');

            $users = User::whereIn('id', $amis)->get();

            return $this->sendResponse($users, 'Les amis ont été trouvés avec succès.');
    
        }

        public function blocked($id) {
    
            $amis = Relation::where([
                ['user1_id', '=', $id],
                ['relation', '=', 'blocked']
            ])->pluck('user2_id');

            $users = User::whereIn('id', $amis)->get();
    
            return $this->sendResponse($users, 'Les amis ont été trouvés avec succès.');
    
        }

        public function relation($id1, $id2) {

            $relation = Relation::where([
                ['user1_id', '=', $id1],
                ['user2_id', '=', $id2]
            ])->value('relation');

            return $this->sendResponse($relation, 'Les amis ont été trouvés avec succès.');

        }
    
        //Relations - POST/Destroy
        public function befriend($idUser, $idFriendUser) {
            $relation = new Relation;
            $relation->user1_id = $idUser;
            $relation->user2_id = $idFriendUser;
            $relation->relation = 'friend';
            $relation->save();
        }
    
        public function unfriend($idUser, $idFriendUser) {

            $relations = Relation::where([
                ['user1_id', '=', $idUser],
                ['user2_id', '=', $idFriendUser],
                ['relation', '=', 'friend']
            ])->get();
    
            foreach ($relations as $relation) {
                $relation->delete();
            }

            return $this->sendResponse(null, 'Relations supprimées avec succès.');
        }
    
        public function block($idUser, $idBlockedUser) {
            $relation = new Relation;
            $relation->user1_id = $idUser;
            $relation->user2_id = $idBlockedUser;
            $relation->relation = 'blocked';
            $relation->save();
        }
    
        public function unblock($idUser, $idBlockedUser) {

            $relations = Relation::where([
                ['user1_id', '=', $idUser],
                ['user2_id', '=', $idBlockedUser],
                ['relation', '=', 'blocked']
            ])->get();

            foreach ($relations as $relation) {
                $relation->delete();
            }
            
        }

        // Routes de modifications des informations de l'utilisateur
        
        public function updateprenom(Request $request, $id) {
            try {
                $user = User::findOrFail($id);
        
                $user->prenom = empty($request->prenom) ? $user->prenom : $request->prenom;
        
                $user->save();
        
                return $this->sendResponse('Modification réussie.', 200); 
            }
            catch(\Throwable $e) {
                Log::debug($e);
                return $this->sendResponse('Une erreur est survenue.', 500); 
            }
        }
        
        public function updatenom(Request $request, $id) {
            try {
                $user = User::findOrFail($id);
        
                $user->nom = empty($request->nom) ? $user->nom : $request->nom;
        
                $user->save();
        
                return $this->sendResponse('Modification réussie.', 200); 
            }
            catch(\Throwable $e) {
                Log::debug($e);
                return $this->sendResponse('Une erreur est survenue.', 500); 
            }
        }      
    
        public function updatepseudo(Request $request, $id) {
            try {
                $user = User::findOrFail($id);
        
                $user->pseudo = empty($request->pseudo) ? $user->pseudo : $request->pseudo;
        
                $user->save();
        
                return $this->sendResponse('Modification réussie.', 200); 
            }
            catch(\Throwable $e) {
                Log::debug($e);
                return $this->sendResponse('Une erreur est survenue.', 500); 
            }
        }
        public function updateCompanion(Request $request, $id) {
            try {
                $user = User::findOrFail($id);
                $companion = Character::where('id',$user->character_id)->first();
                $user->character_id = empty($request->character_id) ? $user->character_id : $request->character_id;
        
                $user->save();
        
                return $this->sendResponse('Modification réussie.', 200); 
            }
            catch(\Throwable $e) {
                Log::debug($e);
                return $this->sendResponse('Une erreur est survenue.', 500); 
            }
        }
    
        public function updateemail(Request $request, $id) {
            try {
                $user = User::findOrFail($id);
        
                $user->email = empty($request->email) ? $user->email : $request->email;
        
                $user->save();
        
                return $this->sendResponse('Modification réussie.', 200); 
            }
            catch(\Throwable $e) {
                Log::debug($e);
                return $this->sendResponse('Une erreur est survenue.', 500); 
            }
        }
        
        public function updatemerite(Request $request, $id) {
            try {
                $user = User::findOrFail($id);
        
                $user->merite = empty($request->merite) ? $user->merite : $request->merite;
        
                $user->save();
        
                return $this->sendResponse('Modification réussie.', 200); 
            }
            catch(\Throwable $e) {
                Log::debug($e);
                return $this->sendResponse('Une erreur est survenue.', 500); 
            }
        }

        public function updatelimite(Request $request, $id) {
            try {
                $user = User::findOrFail($id);
        
                $user->limite = empty($request->limite) ? $user->limite : $request->limite;
        
                $user->save();
        
                return $this->sendResponse('Modification réussie.', 200); 
            }
            catch(\Throwable $e) {
                Log::debug($e);
                return $this->sendResponse('Une erreur est survenue.', 500); 
            }
        }

        public function updatePassword(Request $request, $id) {
            try {
                $user = User::findOrFail($id);
                $currentPassword = $request->input('current_password');
                $newPassword = $request->input('new_password');
                if (!Hash::check($currentPassword, $user->password)) {
                    Log::debug("CURRENT PWD DOESN'T MATCH");
                    return $this->sendResponse('Mot de passe actuel incorrect.', 400); 
                }
        
                $user->password = Hash::make($newPassword);
        
                $user->save();
        
                Log::debug("PASSWORD UPDATED SUCCESSFULLY");
                return $this->sendResponse('Mot de passe mis à jour avec succès.', 200); 
            }
            catch(\Throwable $e) {
                Log::debug($e);
                return $this->sendResponse('Une erreur est survenue.', 500); 
            }
        }  

        public function getJours($id) {
            try {

                $jours = User::find($id)->getJoursAttribute();
                return response()->json($jours, 200);
                //return $this->sendResponse($jours, 'Modification réussie.', 200);
            }
            catch(\Throwable $e) {
                Log::debug($e);
                return $this->sendResponse('Une erreur est survenue.', 500); 
            }
        }

        public function endstreak($id) {
            try {

                $user = User::find($id);

                $chaineEnCours = $user->derniereChaine()->first();
                $chaineEnCours->end_date = now();
                $chaineEnCours->save();

                return $this->sendResponse('Modification réussie.', 200);
            }
            catch(\Throwable $e) {
                Log::debug($e);
                return $this->sendResponse('Une erreur est survenue.', 500); 
            }
        }

        public function resetstreak($id) {
            try {

                $user = User::find($id);

                $nouvelleChaine = new Chaine();
                $nouvelleChaine->user_id = $user->id;
                $nouvelleChaine->start_date = now(); 
                $nouvelleChaine->end_date = null;
                Chaine::create($nouvelleChaine);

                return $this->sendResponse('Modification réussie.', 200);

            }
            catch(\Throwable $e) {

                Log::debug($e);
                return $this->sendResponse('Une erreur est survenue.', 500); 

            }
        }

        public function getStreaks($id) {
            try {

                $user = User::find($id);

                $chaines = $user->chaines()->whereNotNull('end_date')->get();

                return $this->sendResponse($chaines, 'Le personnage a été trouvé avec succès.');

            }
            catch(\Throwable $e) {
                Log::debug($e);
                return $this->sendResponse('Une erreur est survenue.', 500); 
            }
        }

        public function getStreak($id) {
            try {
                $user = User::find($id);
        
                $chaineEnCours = $user->derniereChaine;
        
                return $this->sendResponse($chaineEnCours, 'Le personnage a été trouvé avec succès.');
        
            } catch(\Throwable $e) {
                Log::debug($e);
                return $this->sendResponse('Une erreur est survenue.', 500);
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

