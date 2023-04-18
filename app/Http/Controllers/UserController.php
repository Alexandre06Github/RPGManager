<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function create()
    {
        return view('inscription');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:40',
            'surname' => 'required|string|max:40',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|min:8|regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/',
            'pseudo' => 'required|string|max:20|unique:users',
        ]);

        $user = new User;
        $user->name = $validatedData['name'];
        $user->surname = $validatedData['surname'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['password']);
        $user->pseudo = $validatedData['pseudo'];
        $user->save();

        return view('validation.inscriptionValide');
    }
}
