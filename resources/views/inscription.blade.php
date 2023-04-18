@extends('layout')

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inscription</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="shortcut icon" href="logo-wow-violet.png" type="image/png">

</head>

<body>
    @section('content')

        <form action="/inscription" method="POST">
            @csrf
            <div class="formulaire">
                <h1>Inscription</h1>
                <label for="name">Nom</label>
                <div class="input">
                    <input class="border" type="text" id="name" name="name" required>
                </div>

                <label for="surname">Prénom</label>
                <div class="input">
                    <input class="border" type="text" id="surname" name="surname" required>
                </div>

                <label for="pseudo">Pseudo</label>
                <div class="input">
                    <input class="border" type="text" id="pseudo" name="pseudo" required>
                </div>

                <label for="email">Email</label>
                <div class="input">
                    <input class="border" type="email" id="email" name="email" required>
                </div>

                <label for="password">Mot de passe</label>
                <div class="input">
                    <input class="border" type="password" id="password" name="password" required>
                </div>

                <input class="buttonValide" type="submit" value="S'inscrire">
            </div>
        </form>
        
        @if ($errors->any())
            @foreach ($errors as $error)
                {{ $error }}
            @endforeach
        @endif

    @endsection

</body>

</html>
