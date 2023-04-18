@extends('layout')

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mes guildes</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="shortcut icon" href="logo-wow-violet.png" type="image/png">

</head>

<body>
    @section('content')
        <h1>Mes guildes avec mes personnages</h1>

        @if (session('success'))
            <!-- message de succès -->
            <div class="alert alert-danger">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif <!-- message de succès -->


        @foreach ($groupe as $groupeData)
            <div class="containerGuilde">

                <div class="containerr1">

                    <div class="blokk-1">

                        <h3 class="h3Style">{{ $groupeData->name_groupe }}</h3> <!-- nom de la guilde -->

                        <form method="POST" action="{{ url('/groupe/perso/' . $groupeData->id) }}">
                            <!-- bouton supprimer -->
                            @csrf
                            @method('DELETE')
                            <button data-title="supprimer la guilde" type="submit" class="btn btn-danger">❌</button>
                            <!-- supprimer guilde -->
                        </form>
                    </div>



                    <div class="blokk2Et3Et4">

                        <div class="blokk-2">
                            <div class="petitBlok">
                                <p>Places disponibles : {{ $groupeData->place_dispo }}</p>

                                <form method="POST" action="{{ url('/groupe/perso/add/' . $groupeData->id) }}">
                                    <!-- ajouter perso selection -->

                                    @csrf
                                    @method('PUT')
                                    <select name="invite_groupe">
                                        <option value="">Choisissez un personnage</option>
                                        @foreach ($persos as $perso)
                                            @if ($perso->invite_groupe == null)
                                                <option value="{{ $perso->id }}">{{ $perso->name_perso }}</option>
                                            @endif
                                        @endforeach
                                    </select>

                                    <button type="submit">Ajouter</button> <!-- fin ajout perso selection -->
                                </form>
                            </div>

                            <div class="petitBlok">

                                <p>Membres de ma guilde :</p> <!-- perso ajouté à ma guilde -->
                                <br>

                                @foreach ($persos as $perso)
                                    <!-- afficher nom du perso ajouté -->

                                    @if ($perso->invite_groupe == $groupeData->id)
                                        <form method="POST" action="{{ url('/groupe/perso/remove/' . $perso->id) }}">
                                            <!-- supprimer un perso de la guilde -->
                                            @csrf
                                            @method('DELETE')
                                            {{ $perso->name_perso }}
                                            <button type="submit" data-title="supprimer {{ $perso->name_perso }} de la guilde" class="btn btn-danger">❌</button>
                                        </form>
                                    @endif
                                @endforeach
                            </div>

                        </div>


                        <!-- PARTIE MODIF -->

                        <div class="blokk-3">
                            <form method="POST" action="{{ url('/groupe/perso/' . $groupeData->id) }}">
                                @csrf
                                @method('PUT')

                                <label for="name_groupe">Nom de la guilde :</label> <!-- nom de la guilde modifiable -->
                                <input type="text" name="name_groupe" value="{{ $groupeData->name_groupe }}">
                                <br>

                                <label for="place_dispo">Places disponibles :</label> <!-- place dispo modifiable -->
                                <input type="number" name="place_dispo" value="{{ $groupeData->place_dispo }}">
                                <br>

                                <label for="content_groupe">Description :</label> <!-- description modifiable -->
                                <textarea name="content_groupe">{{ $groupeData->content_groupe }}</textarea>
                                <br>

                                <button type="submit">Valider modification</button> <!-- bouton valider modification -->
                            </form>
                        </div>

                        <!-- DESCRIPTION DE LA GUILDE -->

                        <div class="blokk-4">
                            <p>{{ $groupeData->content_groupe }}</p>

                        </div>


                    </div> <!-- fin blok2Et3 -->

                </div>
            </div>
            <br>
        @endforeach
    @endsection

</body>

</html>
