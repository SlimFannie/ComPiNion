<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Http\Controllers\API\DataController;
use App\Models\User;
use App\Models\Character;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\Http\Resources\User as UserResource;

class AuthController extends DataController
{

    // Méthodes relatives à l'authentification des utilisateurs

    // Création d'un nouvel utilisateur
    public function register(Request $request) { 

        $validator = Validator::make($request->all(), [
            'prenom' => 'required',
            'nom' => 'required',
            'pseudo' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'character_id' => 'required',
            'limite' => 'required',
        ]);

        if($validator->fails()) {
            return $this->sendError('L\'enregistrement a échoué.', $validator->errors());
        }

        $input = $request->all();
        $user = User::create($input);
        
        $chaine = new Chaine();
        $chaine->user_id = $user->id;
        $chaine->start_date = now(); 
        $chaine->end_date = null;
        $chaine->save();

        $success['token'] =  $user->createToken('ComPiNion')->accessToken;
        $success['name'] =  $user->name;

        return $this->sendResponse(new UserResource($user), 'L\'enregistrement s\'est déroulé avec succès.');

    }

    // Login
    public function login(Request $request) {

        $user = User::where('email', $request->email)->first();
        $companion = Character::where('id',$user->character_id)->first();
    
        if ($user && Hash::check($request->password, $user->password)) {
            $response = [
                'user' => $user,
                'companion' => $companion,
                'token' => $user->createToken('ComPiNion')->accessToken,
                'message' => 'Vous vous êtes connecté avec succès.',
            ];
            return response()->json($response, Response::HTTP_OK);
        } else {
            return $this->sendError('Accès non-authorisé.', ['error' => 'Unauthorised'], Response::HTTP_UNAUTHORIZED);
        }
    }

    // Get l'utilisateur authentifié
    public function user($id) { 
        $user = User::findOrFail($id);

        if(is_null($user)) {
            return $this->sendError('Cet utilisateur n\'existe pas.');
        }

        return $this->sendResponse($user, 'L\'utilisateur trouvé avec succès.');
    }

    // Logout the user
    public function logout(Request $request) { 

    }
}
