<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;


use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('connexion');
    }

    public function show(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = User::where('email', $validatedData['email'])->first();
            Auth::login($user);
            return view('validation.connexionValide');
        } else {
            return redirect('/connexion')->with('error', 'Adresse email ou mot de passe incorrect');
        }
    }
}
