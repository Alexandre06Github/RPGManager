<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Perso;

class ListePersoController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $perso = Perso::where('id_user', auth()->user()->id)->get();
            return view('listePerso', ['perso' => $perso]);
        } else {
            return redirect('/connexion');
        }

    }

    public function destroy($id)
    {
        $perso = Perso::find($id);
        $perso->delete();
        return redirect()->back()->with('success', 'Personnage supprimé avec succès');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name_perso' => 'required',
            'content_perso' => 'required',
            'type' => 'required',
        ]);

        $perso = Perso::find($id);
        $perso->name_perso = $validatedData['name_perso'];
        $perso->content_perso = $validatedData['content_perso'];
        $perso->type = $validatedData['type'];
        $perso->save();

        return redirect()->back()->with('success', 'Personnage modifié avec succès');
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'type' => 'required',
        ]);

        $perso = Perso::where('type', $validatedData['type'])->get();

        return view('listePerso', ['perso' => $perso]);
    }



} /*  return view('filtrePerso', ['perso' => $perso]); */