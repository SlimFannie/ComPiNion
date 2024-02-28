<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Http\Controllers\API\DataController;
use App\Http\Controllers\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\Http\Resources\User as UserResource;

class AuthController extends DataController
{
    // Register a new user
    public function register(Request $request) { 

        $validator = Validator::make($request->all(), [
            'prenom' => 'required',
            'nom' => 'required',
            'pseudo' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password'
        ]);

        if($validator->fails()) {
            return $this->sendError('L\'enregistrement a échoué.', $validator->errors());
        }

        $input = $request->all();
        $user = User::create($input);
        $success['token'] =  $user->createToken('ComPiNion')->accessToken;
        $success['name'] =  $user->name;

        return $this->sendResponse(new UserResource($user), 'L\'enregistrement s\'est déroulé avec succès.');

    }

    // Login a user
    public function login(Request $request) { 

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $success['token'] =  $user->createToken('ComPiNion')-> accessToken; 
            $success['name'] =  $user->name;
   
            return $this->sendResponse($success, 'Vous vous êtes connecté avec succès.');
        } 
        else{ 
            return $this->sendError('Accès non-authorisé.', ['error'=>'Unauthorised']);
        } 

    }

    // Get the authenticated user
    public function user($id) { 
        $user = User::find($id);

        if(is_null($user)) {
            return $this->sendError('Cet utilisateur n\'existe pas.');
        }

        return $this->sendResponse(new UserResource($user), 'L\'utilisateur trouvé avec succès.');
    }

    // Logout the user
    public function logout(Request $request) { 

    }
}
