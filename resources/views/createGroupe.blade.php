@extends('layout')

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Création d'une guilde</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="shortcut icon" href="logo-wow-violet.png" type="image/png">

</head>

<body>
    @section('content')
        <h1>Créer ta propre guilde</h1>

        @if (session('success'))                            <!-- message de succès -->
                        <div class="alert alert-danger">
                            {{ session('success') }}
                        </div>
                    @endif

        <div class="blocGuilde" style="display: flex">

            <div class="blocImage">
                <img src="https://cytech.cyu.fr/medias/photo/la-guilde-detoure-_1625665744168-png?ID_FICHE=32145"
                    alt="blasonGuilde" width="60%">
            </div>

            <div class="blocForm">
                <div class="formulaireGuilde">

                    <form action='/groupe' method="POST">
                        @csrf

                        <label for="name_groupe">Nom de la guilde</label>
                        <div class="input">
                            <input class="border" type="text" name="name_groupe" required>
                        </div>

                        <label for="place_dispo">Places disponibles</label>
                        <div class="input">
                            <input class="border" type="number" name="place_dispo" min="1" required>
                        </div>

                        <label for="content_groupe">Description</label>
                        <div class="input">
                            <textarea class="borderPlus" name="content_groupe" required></textarea>
                        </div>

                        <button class="buttonValideGuilde" type="submit">Créer</button>
                    </form>

                </div>
            </div>

        </div>
    @endsection

</body>

</html>
