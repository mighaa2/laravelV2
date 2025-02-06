<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthenticatedController extends Controller
{
    // Affiche le formulaire d'inscription
    public function formRegister() {
        return view('register');
    }

    // Inscription de l'utilisateur
    public function register(Request $request) {
        // Validation des données
        $validated = $request->validate([
            'prenom' => 'required|string|max:50',   // Prénom obligatoire
            'nom' => 'required|string|max:50',      // Nom obligatoire
            'date_naissance' => 'required|date',    // Date de naissance obligatoire
            'email' => 'required|string|email|max:100|unique:users',  // Email unique
            'password' => 'required|string|min:8|regex:/^(?=.*[A-Z])(?=.*\d).+$/',  // Mot de passe sécurisé
            'password_confirmation' => 'required_with:password|same:password|min:8',  // Vérification du mot de passe
        ]);

        // Création du nouvel utilisateur
        $user = new User();
        $user->prenom = $validated['prenom'];  // Stockage du prénom
        $user->nom = $validated['nom'];        // Stockage du nom
        $user->date_naissance = $validated['date_naissance'];  // Stockage de la date de naissance
        $user->email = $validated['email'];    // Stockage de l'email
        $user->password = Hash::make($validated['password']);  // Mot de passe sécurisé
        $user->save();

        // Connexion immédiate après l'inscription
        Auth::login($user);

        // Redirection vers la page de félicitations
        return redirect()->route('page')->with('etat', 'Votre inscription a été réussie ! Bienvenue dans la communauté !');
    }

    // Affiche le formulaire de connexion
    public function formLogin() {
        return view('login');
    }

    // Connexion de l'utilisateur
    public function login(Request $request){
        // Validation des données de connexion
        $request->validate([
            'email' => 'required|string|email',   // Validation de l'email
            'password' => 'required|string'       // Validation du mot de passe
        ]);

        // Tentative de connexion
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        // Vérification des informations d'identification
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();  // Régénération de la session
            return redirect()->route('page');  // Redirection vers la page de félicitations
        }

        // Si les informations sont incorrectes
        return back()->withErrors(['account' => 'Le compte n\'existe pas ou le mot de passe est incorrect.']);
    }

    // Affiche la page de félicitations après inscription ou connexion
    public function page() {
        return view('page');  // La page où vous affichez le message de bienvenue ou de félicitations
    }

    // Déconnexion de l'utilisateur
    public function logout(Request $request){
        Auth::logout();  // Déconnexion de l'utilisateur
        $request->session()->invalidate();  // Invalidation de la session
        $request->session()->regenerateToken();  // Regénération du token de session

        // Redirection vers la page d'accueil avec un message de déconnexion
        return redirect('/')->with('etat', 'Vous vous êtes déconnecté avec succès !');
    }
}
