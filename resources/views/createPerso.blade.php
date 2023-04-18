@extends('layout')

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Création de personnage</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="shortcut icon" href="logo-wow-violet.png" type="image/png">

</head>

<body>
    @section('content')
        <h1>Créer ton personnage</h1>

        @if (Auth::check())

        @endif
        @if (!Auth::check())
            <p>Vous devez être connecté pour créer un personnage.</p>
        @endif

        @if (session('success'))
            <div class="alert alert-danger">
                {{ session('success') }}
            </div>
        @endif
            <form id="create-character-form" action="/perso" method="POST">
                @csrf

                <div class="tableau">

                    <label for="name">Pseudo</label>
                    <div class="input">
                        <input class="borderForm" type="text" name="name_perso" />
                    </div>

                    <label for="name">Choisi ta classe</label>
                    <div class="input">
                        <select class="borderForm" name="type">
                            <option value="" disabled selected></option>
                            <option value="mage">Mage</option>
                            <option value="guerrier">Guerrier</option>
                            <option value="druide">Druide</option>
                            <option value="assassin">Assassin</option>
                            <option value="archer">Archer</option>
                            <option value="berserker">Berserker</option>
                        </select>
                    </div>


                    <label for="name">Description</label>
                    <div class="input">
                        <input class="borderForm" type="textarea" name="content_perso" />
                    </div>

                    <label for="mage_perso">Magie</label>
                    <div class="input">
                        <input class="borderForm" type="number" id="mage_perso" name="mage_perso" min="0"
                            max="14" value="{{ rand(0, 14) }}" readonly><br>
                    </div>

                    <label for="int_perso">Intelligence :</label>
                    <div class="input">
                        <input class="borderForm" type="number" id="int_perso" name="int_perso" min="0"
                            max="14" value="{{ rand(0, 14) }}" readonly><br>
                    </div>

                    <label for="for_perso">Force :</label>
                    <div class="input">
                        <input class="borderForm" type="number" id="for_perso" name="for_perso" min="0"
                            max="14" value="{{ rand(0, 14) }}" readonly><br>
                    </div>

                    <label for="agi_perso">Agilité :</label>
                    <div class="input">
                        <input class="borderForm" type="number" id="agi_perso" name="agi_perso" min="0"
                            max="14" value="{{ rand(0, 14) }}" readonly><br>
                    </div>

                    <label for="pv_perso">Points de vie :</label>
                    <div class="input">
                        <input class="borderForm" type="number" id="pv_perso" name="pv_perso" min="20"
                            max="50" value="{{ rand(20, 50) }}" readonly><br>
                    </div>


                    <input class="buttonValideCrea" type="button" value="Regénérer" onclick="regenerateStats()">
                    <input class="buttonValideCrea" type="submit" value="Créer mon perso">
            </form>

            </div>

            <script>
                function regenerateStats() {
                    document.getElementById('mage_perso').value = Math.floor(Math.random() * 15);
                    document.getElementById('int_perso').value = Math.floor(Math.random() * 15);
                    document.getElementById('for_perso').value = Math.floor(Math.random() * 15);
                    document.getElementById('agi_perso').value = Math.floor(Math.random() * 15);
                    document.getElementById('pv_perso').value = Math.floor(Math.random() * 31) + 20;
                }
            </script>
        
    @endsection


</body>

</html>
