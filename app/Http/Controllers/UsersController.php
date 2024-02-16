<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $users = User::all();

            return view ('users.accueil', compact('users') );
        } catch (\Throwable $th) {
            Log::debug($th);
            return redirect()->back()->withErrors(['Une erreur est survenue']);
        }


    }
    public function formConnexion()
    {
        return view ('users.formConnexion' );
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
    public function store(Request $request)
    {
       
        try {
            
            // Créer une nouvelle instance du modèle RapportAccident et attribuer les valeurs
            $user = new User;

            // Enregistrer les autres champs du rapport d'accident
            $user->pseudo = $request->pseudo;
            $user->nom = $request->nom;
            $user->prenom = $request->prenom;
            $user->email = $request->email;
            $user->password = $request->password;
                    
            $user->save();
        
            // Redirigez l'utilisateur vers une page de confirmation ou de succès
            } catch (\Throwable $e) {
                Log::debug($e);
                return redirect()->back()->withErrors(["La création a échoué"]);
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
}
