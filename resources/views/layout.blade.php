<!DOCTYPE html>
<html>

<head>
    <title>Mon application</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('style.css') }}" />
</head>

<body>
    <img src={{ asset('rpg.jpg') }} alt="banniere" width="100%" height="500px">
    <header>
        <nav class="navbar @if (!Auth::check()) no-connect @endif">
            @if (!Auth::check())  <!-- si je suis connecté, cacher les boutons connexion et inscription -->
                <a id="inscriptionNavbar" href="{{ url('/inscription') }}">S'inscrire</a>
                <a href="{{ url('/connexion') }}">Se connecter</a>
            @endif

            @if (Auth::check())  <!-- si je suis connecté, afficher ces boutons -->
                <a href="{{ url('/perso') }}">Créer un personnage</a>
                <a href="{{ url('/listePerso') }}">Mes Personnages</a>
                <a href="{{ url('/catalogue') }}">Catalogue des Personnages </a>
                <a href="{{ url('/groupe') }}">Créer une guilde</a>
                <a href="{{ url('/groupe/perso') }}">Mes guildes personnages</a>

                <form action="/deconnexionValide" method="POST">
                    @csrf
                    <button class="buttonDeconnexion" type="submit">Déconnexion</button>
                </form>
            @endif
        </nav>
    </header>

    @yield('content')

    <footer>
        <p>&copy; RPG 2023. Tous droits réservés.</p>
    </footer>
</body>

</html>
