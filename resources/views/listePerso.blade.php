@extends('layout')

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mes personnages</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="shortcut icon" href="logo-wow-violet.png" type="image/png">
    
</head>

<body>
    @section('content')
        <h1>Mes personnages</h1>

        <div class="perso-row">
            @foreach ($perso as $key => $personnage)
                @if ($key > 2 && $key % 3 == 0)
        </div>
        <div class="perso-row">
            @endif
            <div class="enormeContainerMesPersos perso-container">

                <div class="containerFull">
                    <div class="container">

                        <div class="block-1">
                            <img src="mage-wow.png" height="80%" width="100%">
                        </div>

                        <div class="block-2">
                            <h3>{{ $personnage->name_perso }}</h3>
                            <b><p>Type : {{ $personnage->type }}</p></b>
                            <br>
                            <p>Magie : {{ $personnage->mage_perso }}</p>
                            <p>Force : {{ $personnage->for_perso }}</p>
                            <p>Intelligence : {{ $personnage->int_perso }}</p>
                            <p>Agilité : {{ $personnage->agi_perso }}</p>
                            <p>PV : {{ $personnage->pv_perso }}</p>
                        </div>
                    </div>

                    <div class="container">

                        <div class="block-3">
                            <p>Description : {{ $personnage->content_perso }}</p>
                        </div>
                    </div>

                    <div class="block-4">
                        <h4>Modifier</h4>

                        <form action="{{ url('listePerso', $personnage->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <label for="name_perso">Nom du personnage:</label>
                            <input type="text" name="name_perso" value="{{ $personnage->name_perso }}">
                            <label for="type">Type:</label>
                            <input type="text" name="type" value="{{ $personnage->type }}">
                            <br>
                            <label for="content_perso">Description:</label>
                            <input type="text" name="content_perso" value="{{ $personnage->content_perso }}">
                            <button type="submit">Modifier</button>
                        </form>

                    </div>

                    <div class="block-5">

                        <form method="POST" action="{{ url('listePerso/' . $personnage->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">❌ Supprimer mon perso</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endsection

</body>

</html>
