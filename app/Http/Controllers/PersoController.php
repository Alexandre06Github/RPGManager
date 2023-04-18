<?php

namespace App\Http\Controllers;

use App\Models\Perso;
use Illuminate\Http\Request;

class PersoController extends Controller
{
    public function index()
    {
        return view('createPerso');
    }

    public function show(Request $request)
    {
        $validatedData = $request->validate([
            'name_perso' => 'required',
            'content_perso' => 'required',
            'type' => 'required',
            'mage_perso' => 'required',
            'int_perso' => 'required',
            'for_perso' => 'required',
            'agi_perso' => 'required',
            'pv_perso' => 'required',
        ]);

        $perso = new Perso;
        $perso->name_perso = $validatedData['name_perso'];
        $perso->content_perso = $validatedData['content_perso'];
        $perso->type = $validatedData['type'];
        $perso->mage_perso = ($validatedData['mage_perso']);
        $perso->int_perso = $validatedData['int_perso'];
        $perso->for_perso = $validatedData['for_perso'];
        $perso->agi_perso = $validatedData['agi_perso'];
        $perso->pv_perso = $validatedData['pv_perso'];
        $perso->invite_groupe = null;

        $perso->id_user = auth()->user()->id;
        $perso->save();
        return redirect('/perso')->with('success', 'Personnage créé avec succès !');
    }
}
