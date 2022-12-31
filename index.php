<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Styles.css">
    <link rel="icon" href="./images/logo.ico">
    <title>Document</title>
</head>
    <?php
        function backgrounds($types){
            $type = $types[0]->type->name;
            $space;
            $colorOne;
            $colorTwo;
            $TypeC = ["normal", "fighting", "flying", "poison", "ground", "rock", "bug", "ghost", "steel", "fire", "water", "grass", "electric", "psychic", "ice", "dragon","dark", "fairy"];
            $TypeC1 = ["hsla(187, 100%, 89%, 1)", "hsla(191, 100%, 96%, 1)", "hsla(133, 94%, 49%, 1)", "hsla(31, 12%, 59%, 1)", "hsla(31, 24%, 39%, 1)", "hsla(114, 63%, 61%, 1)", "hsla(0, 0%, 89%, 1)", "hsla(0, 0%, 100%, 1)", "hsla(44, 74%, 55%, 1)", "hsla(164, 67%, 68%, 1)", "hsla(59, 86%, 68%, 1)", "hsla(0, 0%, 99%, 1)", "hsla(0, 0%, 100%, 1)", "hsla(209, 88%, 76%, 1)", "hsla(19, 87%, 59%, 1)", "hsla(216, 84%, 47%, 1)", "hsla(303, 73%, 85%, 1)", "hsla(19, 100%, 58%, 1)"];
            $TypeC2 = ["hsla(239, 100%, 67%, 1)", "hsla(191, 89%, 75%, 1)", "hsla(164, 97%, 15%, 1)", "hsla(32, 44%, 24%, 1)", "hsla(31, 75%, 11%, 1)", "hsla(30, 15%, 33%, 1)", "hsla(0, 0%, 16%, 1)", "hsla(0, 0%, 41%, 1)", "hsla(0, 100%, 58%, 1)", "hsla(182, 32%, 36%, 1)", "hsla(134, 36%, 53%, 1)", "hsla(44, 100%, 50%, 1)", "hsla(269, 65%, 55%, 1)", "hsla(196, 66%, 32%, 1)", "hsla(28, 59%, 26%, 1)", "hsla(0, 0%, 0%, 1)", "hsla(303, 68%, 43%, 1)", "hsla(0, 0%, 25%, 1)"];
            for($i = 0; $i < 18; $i++){
                if($type == $TypeC[$i]){
                    $space = $i;
                }
            }
            $colorOne = $TypeC1[$space - 1];
            $colorTwo = $TypeC2[$space - 1];
            echo "<div class='image-Container' style='background: linear-gradient(45deg, $colorOne 0%, $colorTwo 100%)'>";
        }
        function prints($types){
            $TypeC = ["normal", "fighting", "flying", "poison", "ground", "rock", "bug", "ghost", "steel", "fire", "water", "grass", "electric", "psychic", "ice", "dragon","dark", "fairy"];
            $TypeC1 = ["hsla(187, 100%, 89%, 1)", "hsla(191, 100%, 96%, 1)", "hsla(133, 94%, 49%, 1)", "hsla(31, 12%, 59%, 1)", "hsla(31, 24%, 39%, 1)", "hsla(114, 63%, 61%, 1)", "hsla(0, 0%, 89%, 1)", "hsla(0, 0%, 100%, 1)", "hsla(44, 74%, 55%, 1)", "hsla(164, 67%, 68%, 1)", "hsla(59, 86%, 68%, 1)", "hsla(0, 0%, 99%, 1)", "hsla(0, 0%, 100%, 1)", "hsla(209, 88%, 76%, 1)", "hsla(19, 87%, 59%, 1)", "hsla(216, 84%, 47%, 1)", "hsla(303, 73%, 85%, 1)", "hsla(19, 100%, 58%, 1)"];
            $TypeC2 = ["hsla(239, 100%, 67%, 1)", "hsla(191, 89%, 75%, 1)", "hsla(164, 97%, 15%, 1)", "hsla(32, 44%, 24%, 1)", "hsla(31, 75%, 11%, 1)", "hsla(30, 15%, 33%, 1)", "hsla(0, 0%, 16%, 1)", "hsla(0, 0%, 41%, 1)", "hsla(0, 100%, 58%, 1)", "hsla(182, 32%, 36%, 1)", "hsla(134, 36%, 53%, 1)", "hsla(44, 100%, 50%, 1)", "hsla(269, 65%, 55%, 1)", "hsla(196, 66%, 32%, 1)", "hsla(28, 59%, 26%, 1)", "hsla(0, 0%, 0%, 1)", "hsla(303, 68%, 43%, 1)", "hsla(0, 0%, 25%, 1)"];
            $colorOne = "";
            $colorTwo = "";
            $space = 0;
            foreach($types as $type){
                for($i = 0; $i < 18; $i++){
                    if($type->type->name == $TypeC[$i]){
                        $space = $i;
                        $colorOne = $TypeC1[$space - 1];
                        $colorTwo = $TypeC2[$space - 1];
                    }
                }
                echo "<div class='background-type' style='background: linear-gradient(45deg, $colorOne 0%, $colorTwo 100%)'>";
                echo "<p class='type'>".$type->type->name."</p>";
                echo "</div>";
            }
        }
        function abilities($ability){
            foreach($ability as $abilities){
                echo "<p class='ability'>".$abilities->ability->name."</p>";
            }
        }
        function stats($stats){
            $cont = 0;
            echo "<div class='poke-States'>";
            echo "<h3 class='states'>Stats</h3>";
            foreach ($stats as $stat) {
                $cont ++;
                echo "<div class='accommodate-stats'>";
                echo "<p class='poke-state'>".$stat->stat->name."</p>";
                if($stat->stat->name == "hp"){
                    echo "<progress class='progress progress-hp' max='100' value='$stat->base_stat'></progress>";
                    echo "</div>";
                } else {
                    echo "<progress class='progress' max='200' value='$stat->base_stat'></progress>";
                    echo "</div>";
                }
            }
            echo "</div>";
        }
    ?>
<body class="grid-Container">
    <nav class="navbar-Conteiner">
        <div class="background">
            <a href="./index.php"><h3 class="tittle-Background">Pokemon</h3></a>
        </div>
    </nav>
    <section class="Cards-PokeInitials">
        <?php
            $pokemon = ["bulbasaur", "charmander", "squirtle"];
            foreach($pokemon as $pokemones){
                $ch = curl_init();
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, "https://pokeapi.co/api/v2/pokemon/".$pokemones);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                $data = curl_exec($ch);
                curl_close($ch);
                $character = json_decode($data);
                $imagen = $character->sprites->other->dream_world->front_default;
                if($imagen == null){
                    $imagen = $character->sprites->other->$dato->front_default;
                }
                $types = $character->types;
                $abilities = $character->abilities;
                $stats = $character->stats;
                echo "<div class='poke-card'>";
                    backgrounds($types);
                        echo "<img class='poke-image' src='$imagen' alt=''>";
                    echo "</div>";
                    echo "<div class='poke-info'>";
                        $name = $character->name;
                        echo "<div class='poke-name'>
                            <h1 class='poke-Name'>".$name."</h1>
                            </div>
                            <div class='poke-Type'>
                                <h3 class='types-tittle'>Types</h3>";
                                prints($types);
                            echo "</div>
                            <div class='poke-Abilities'>
                                <h3 class='abilities'>Abilities</h3>";
                                abilities($abilities);
                            echo "</div>";
                            stats($stats);
                            echo "<div class='form-conteiner'>
                                <form action='./Pokedex.php' method='post'>
                                    <input type='text' name='opciones' style='display: none' value='{$name}'>
                                <button class='moreInfo-Button' type='submit'><h3>more</h3></button>
                                </form>
                            </div>";
                    echo "</div>";
                echo "</div>";
            }
        ?>
    </section>
    <script src="./main.js"></script>
</body>
</html>