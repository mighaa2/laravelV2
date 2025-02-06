<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Affiche la page de connexion.
     */
    public function showLogin()
    {
        return view('login');
    }

    /**
     * Gère la connexion des utilisateurs.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'Les informations de connexion sont incorrectes.',
        ]);
    }

    /**
     * Affiche la page d'inscription.
     */
    public function showRegister()
    {
        return view('register');
    }

    /**
     * Gère l'inscription des utilisateurs.
     */
    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'birth_date' => 'required|date',
            'password' => 'required|min:6|regex:/^(?=.*[A-Z])(?=.*\d).+$/|confirmed',
        ]);

        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'birth_date' => $request->birth_date,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Compte créé avec succès.');
    }

    /**
     * Gère la déconnexion.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
