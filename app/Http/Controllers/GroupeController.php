<?php

namespace App\Http\Controllers;

use App\Models\Groupe;
use App\Models\Perso;

use Illuminate\Http\Request;

class GroupeController extends Controller
{
    public function index()
    {

        return view('createGroupe');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name_groupe' => 'required',
            'content_groupe' => 'required',
            'place_dispo' => 'required',
        ]);

        $groupe = new Groupe();
        $groupe->name_groupe = $validatedData['name_groupe'];
        $groupe->content_groupe = $validatedData['content_groupe'];
        $groupe->place_dispo = $validatedData['place_dispo'];
        $groupe->id_createur = auth()->user()->id;
        $groupe->save();

        return redirect()->back()->with('success', 'Groupe crée avec succès');
    }


    public function show()
    {
        $groupe = Groupe::where('id_createur', auth()->user()->id)->get();
        $perso = Perso::where('id_user', '!=', auth()->user()->id)->get();

        return view('groupe', ['perso' => $perso, 'groupe' => $groupe]);
    }


    public function create()
    {
        $perso = Perso::where('id_user', auth()->user()->id)->get();
        $groupe = Groupe::where('id_createur', auth()->user()->id)->get();
        return view('persoGroupe', ['groupe' => $groupe, 'persos' => $perso]);
    }


    public function destroy(Request $request, $id)
    {
        $groupe = Groupe::find($id);

        if ($groupe->id_createur != auth()->user()->id) {
            return redirect()->back()->with('error', 'Vous n\'êtes pas autorisé à supprimer ce groupe');
        } else if ($groupe->id_createur == auth()->user()->id) {
            $groupe->delete();
            return redirect()->back()->with('success', 'Groupe supprimé avec succès');
        }
    }

    public function update(Request $request, $id)
    {


        $validatedData = $request->validate([
            'name_groupe' => 'required',
            'content_groupe' => 'required',
            'place_dispo' => 'required',
        ]);

        $groupe = Groupe::find($id);


        if ($groupe->id_createur != auth()->user()->id) {
            return redirect()->back()->with('error', 'Vous n\'êtes pas autorisé à supprimer ce groupe');
        } else if ($groupe->id_createur == auth()->user()->id) {
            $groupe->name_groupe = $validatedData['name_groupe'];
            $groupe->content_groupe = $validatedData['content_groupe'];
            $groupe->place_dispo = $validatedData['place_dispo'];
            $groupe->save();
            return redirect()->back()->with('success', 'Groupe modifié avec succès');
        }

    }



    public function addPerso(Request $request, $id)
    {
        $validatedData = $request->validate([
            'invite_groupe' => 'required',
        ]);

        $groupe = Groupe::find($id);
        $perso = Perso::find($validatedData['invite_groupe']);


        if ($groupe->id_createur != auth()->user()->id) {
            return redirect()->back()->with('error', 'Vous n\'êtes pas autorisé à ajouter un personnage à ce groupe');
        } else if ($groupe->id_createur == auth()->user()->id && $groupe->place_dispo > 0) {
            $perso->invite_groupe = $groupe->id;
            $groupe->place_dispo = $groupe->place_dispo - 1;
            $perso->save();
            $groupe->save();
            return redirect()->back()->with('success', 'Personnage ajouté avec succès');
        } else {
            return redirect()->back()->with('error', 'erreur dans l attribution du personnage au groupe');
        }



    }

    public function removePerso($id)
    {
        $perso = Perso::find($id);
        $groupe = Groupe::find($perso->invite_groupe);

        if ($perso) {
            $perso->invite_groupe = null;
            $groupe->place_dispo = $groupe->place_dispo + 1;
            $perso->save();
            $groupe->save();
            return redirect()->back()->with('success', 'Le personnage a été retiré du groupe avec succès');
        } else {
            return redirect()->back()->with('error', 'Impossible de trouver le personnage');
        }
    }


    public function filtre(Request $request)
    {
        $validatedData = $request->validate([
            'type' => 'nullable',
        ]);

        $perso = Perso::query();

        if (array_key_exists('type', $validatedData)) {
            $perso->where('type', $validatedData['type']);
        }

        $perso = $perso->get();

        return view('groupe', ['perso' => $perso]);
    }


    public function filtreName(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'nullable',
        ]);

        $perso = Perso::where('name_perso', $validatedData['name'])->get();

        return view('groupe', ['perso' => $perso]);
    }

}