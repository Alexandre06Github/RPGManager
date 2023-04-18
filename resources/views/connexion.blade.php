@extends('layout')

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Connexion</title>
    <link rel="shortcut icon" href="logo-wow-violet.png" type="image/png">

</head>

<body>
    @section('content')
        <div class="formulaireConnexion">
            <h1>Connexion</h1>
            <form action="/inscriptionValide" method="POST">
                @csrf
                <label for="email">Email:</label>
                <div class="input">
                    <input class="border" type="email" id="email" name="email" required>
                    <br>
                </div>

                <label for="password">Mot de passe:</label>
                <div class="input">
                    <input class="border" type="password" id="password" name="password" required>
                </div>
                <input class="buttonValide" type="submit" value="Se connecter">
        </div>
        </form>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    @endsection

</body>

</html>
