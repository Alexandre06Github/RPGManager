@extends('layout')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="shortcut icon" href="logo-wow-violet.png" type="image/png">

</head>
<body>

    @section('content')

VOUS AVEZ BIEN VALIDER VOTRE CONNEXION
<a href="{{ url('/perso') }}">Personnage</a>

@if(Auth::check())
    Vous êtes connecté.
@else
    Vous n'êtes pas connecté.
@endif

@endsection


</body>
</html>