<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

use App\Models\User;
use App\Models\Chaine;
use App\Models\Character;
use App\Models\Relation;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $users = User::all();
            $relations = Relation::all();
            $chaines = Chaine::all();
            $compinions = Character::all();

            return view ('users.accueil', compact('users', 'relations', 'chaines', 'compinions') );
        } catch (\Throwable $th) {
            Log::debug($th);
            return redirect()->back()->withErrors(['Une erreur est survenue']);
        }
    }

    public function formConnexion()
    {
        return view ('users.formConnexion');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
       $donneValider = $request->validate($request->rules(), $request->messages());
        try {
            
            $user = new User;

            $user->pseudo = $donneValider['pseudo'];
            $user->nom = $donneValider['nom'];
            $user->prenom = $donneValider['prenom'];
            $user->email = $donneValider['email'];
            $user->password = $donneValider['password'];
            $user->limite = 0;
            $user->character_id = $request->input('character_id');

            $user->save();
        
            // Redirigez l'utilisateur vers une page de confirmation ou de succès
            } catch (\Throwable $e) {
                Log::debug($e);
                return redirect()->back();
            }
        
        return redirect()->route('users.accueil');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();

            return redirect()->route('users.accueil')->with('success', 'User supprimé');
        } catch (\Throwable $e) {
            Log::debug($e);
            return redirect()->route('users.accueil')->with('error', 'La suppression a échoué.');
        }
    }

    /**
     * Connexion/login sur le site
     */
    public function connexion(Request $request)
    {
        try {
            $password =  $request->password;
            $email =  $request->email;
            $reussi = Auth::attempt(['email'=> $request->email, 'password' => $request->password]);
            if ($reussi) {
                $loggeduser = Auth::user();
                if ($loggeduser->admin == true) {
                    Log::debug("Connexion réussi");
                    return redirect()->route('users.accueil', "loggedUser");
                } 
            } else {
            //  Log::debug(Auth::attempt(['email'=> $request->email, 'password' => $request->password]));
                Log::debug("Connexion echoué");
            // Log::debug($request->all());
                return redirect()->back()->withErrors('Les informations d\'identification sont incorrectes. Veuillez réessayer.');

            }
        } catch (\Throwable $e) {
            Log::error($e);
            return redirect()->back()->withErrors(['error' => 'Les informations d\'identifications sont incorrects.']);
    }

    }
    
    // Déconnexion
        public function logout()
        {
            Auth::logout();
            return redirect()->route('login');
        }

}
