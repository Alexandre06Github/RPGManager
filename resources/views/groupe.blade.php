@extends('layout')

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Catalogue personnages</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="shortcut icon" href="logo-wow-violet.png" type="image/png">

</head>

<body>
    @section('content')
        <h1>Tous les personnages des joueurs</h1>

        <form action=" {{ url('/catalogue') }} " method="POST">     <!-- Filtrer les perso -->
            @csrf

            <label for="type">Filtrer par type:</label>
            <select name="type">
                <option value="assassin">Assassin</option>
                <option value="archer">Archer</option>
                <option value="berserker">Berserker</option>
                <option value="guerrier">Guerrier</option>
                <option value="mage">Mage</option>
                <option value="druide">Druide</option>
            </select>
            <button type="submit">Filtrer</button>
        </form>


        <form action=" {{ url('/catalogue/name') }} " method="POST">
            @csrf
            
            <label for="name">Filtrer par nom:</label>
            <input type="text" name="name">
            <button type="submit">Filtrer</button>
        </form>
        <br>

        <div class="perso-row">
            @foreach ($perso->unique('name_perso') as $key => $personnage)
                @if ($key > 4 && $key % 5 == 0)
        </div>
        <div class="perso-row">
            @endif
            <div class="enormeContainer perso-container">

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

                </div>
            </div>
            @endforeach
            <br>
        </div>
    @endsection

</body>

</html>
