<?php

namespace App\Http\Controllers;

use App\Models\Perso;

use Illuminate\Http\Request;
use App\Models\Groupe;

class InviteController extends Controller
{
    public function groupe(Request $request, $id)
    {
        $validatedData = $request->validate([
            'invite_groupe' => 'nullable',
        ]);

        $perso = Perso::find($id);
        $groupe = Groupe::find($validatedData['invite_groupe']);

        $perso->invite_message = $groupe->id;

        $perso->save();
        return redirect()->back();
    }

}