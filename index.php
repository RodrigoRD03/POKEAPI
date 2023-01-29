<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Style.css">
    <link rel="icon" href="./images/logo.ico">
    <script src="https://kit.fontawesome.com/4b5992b75f.js" crossorigin="anonymous"></script>
    <title>Home</title>
</head>
    <?php
use function PHPSTORM_META\type;
        function backgrounds($types){
            $type = $types[0]->type->name;
            $TypeC = ["normal", "fighting", "flying", "poison", "ground", "rock", "bug", "ghost", "steel", "fire", "water", "grass", "electric", "psychic", "ice", "dragon","dark", "fairy"];
            $TypeC1 = ["hsla(228, 21%, 72%, 1)", "hsla(347, 93%, 56%, 1)", "hsla(178, 40%, 84%, 1)", "hsla(293, 63%, 77%, 1)", "hsla(26, 84%, 75%, 1)", "hsla(45, 38%, 74%, 1)", "hsla(76, 79%, 63%, 1)", "hsla(245, 71%, 63%, 1)", "hsla(0, 0%, 100%, 1)", "hsla(44, 74%, 55%, 1)", "hsla(185, 51%, 55%, 1)", "hsla(59, 86%, 68%, 1)", "hsla(0, 0%, 99%, 1)", "hsla(16, 80%, 71%, 1)", "hsla(169, 32%, 70%, 1) ", "hsla(216, 49%, 62%, 1)", "hsla(214, 4%, 64%, 1)", "hsla(306, 100%, 90%, 1)", "hsla(19, 100%, 58%, 1)"];
            $TypeC2 = ["hsla(229, 21%, 37%, 1)", "hsla(317, 20%, 37%, 1)", "hsla(192, 50%, 71%, 1)", "hsla(290, 47%, 50%, 1)", "hsla(23, 74%, 52%, 1)", "hsla(22, 16%, 57%, 1)", "hsla(91, 60%, 41%, 1)", "hsla(266, 64%, 39%, 1)", "hsla(0, 0%, 41%, 1)", "hsla(0, 100%, 58%, 1) ", "hsla(174, 38%, 31%, 1)", "hsla(134, 36%, 53%, 1)", "hsla(44, 100%, 50%, 1)", "hsla(3, 79%, 56%, 1)", "hsla(165, 51%, 48%, 1)", "hsla(222, 70%, 38%, 1)", "hsla(220, 3%, 21%, 1)", "hsla(295, 85%, 63%, 1)", "hsla(0, 0%, 25%, 1)"];
            for($i = 0; $i < 18; $i++){
                if($type == $TypeC[$i]){
                    $space = $i;
                }
            }
            $colorOne = $TypeC1[$space];
            $colorTwo = $TypeC2[$space];
            echo "<div class='image-Container' style='background: linear-gradient(45deg, $colorOne 0%, $colorTwo 100%)'>";
        }
        function prints($types){
            $TypeC = ["normal", "fighting", "flying", "poison", "ground", "rock", "bug", "ghost", "steel", "fire", "water", "grass", "electric", "psychic", "ice", "dragon","dark", "fairy"];
            $TypeC1 = ["hsla(228, 21%, 72%, 1)", "hsla(347, 93%, 56%, 1)", "hsla(178, 40%, 84%, 1)", "hsla(293, 63%, 77%, 1)", "hsla(26, 84%, 75%, 1)", "hsla(45, 38%, 74%, 1)", "hsla(76, 79%, 63%, 1)", "hsla(245, 71%, 63%, 1)", "hsla(0, 0%, 100%, 1)", "hsla(44, 74%, 55%, 1)", "hsla(185, 51%, 55%, 1)", "hsla(59, 86%, 68%, 1)", "hsla(0, 0%, 99%, 1)", "hsla(16, 80%, 71%, 1)", "hsla(169, 32%, 70%, 1) ", "hsla(216, 49%, 62%, 1)", "hsla(214, 4%, 64%, 1)", "hsla(306, 100%, 90%, 1)", "hsla(19, 100%, 58%, 1)"];
            $TypeC2 = ["hsla(229, 21%, 37%, 1)", "hsla(317, 20%, 37%, 1)", "hsla(192, 50%, 71%, 1)", "hsla(290, 47%, 50%, 1)", "hsla(23, 74%, 52%, 1)", "hsla(22, 16%, 57%, 1)", "hsla(91, 60%, 41%, 1)", "hsla(266, 64%, 39%, 1)", "hsla(0, 0%, 41%, 1)", "hsla(0, 100%, 58%, 1) ", "hsla(174, 38%, 31%, 1)", "hsla(134, 36%, 53%, 1)", "hsla(44, 100%, 50%, 1)", "hsla(3, 79%, 56%, 1)", "hsla(165, 51%, 48%, 1)", "hsla(222, 70%, 38%, 1)", "hsla(220, 3%, 21%, 1)", "hsla(295, 85%, 63%, 1)", "hsla(0, 0%, 25%, 1)"];
            $colorOne = "";
            $colorTwo = "";
            $space = 0;
            foreach($types as $type){
                for($i = 0; $i < 18; $i++){
                    if($type->type->name == $TypeC[$i]){
                        $space = $i;
                        $colorOne = $TypeC1[$space];
                        $colorTwo = $TypeC2[$space];
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
    <?php
        require('./interfaces/navbar.php');
    ?>
    <section class="Cards-PokeInitials">
        <div class="background">
            <h3 class="tittle-Background">Starter Pokemon</h3>
        </div>
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
                                <input type='text' name='findPokemon' style='display: none' value='{$name}'>
                                <button class='moreInfo-Button' type='submit'><i class='fa-solid fa-chevron-right'></i></button>
                            </form>
                        </div>
                    </div>
                </div>";
            }
        ?>
    </section>
    <aside class="aside-Content">
        <h2>Types</h2>
        <?php
            $TypeC = ["normal", "fighting", "flying", "poison", "ground", "rock", "bug", "ghost", "steel", "fire", "water", "grass", "electric", "psychic", "ice", "dragon","dark", "fairy"];
            $TypeC1 = ["hsla(228, 21%, 72%, 1)", "hsla(347, 93%, 56%, 1)", "hsla(178, 40%, 84%, 1)", "hsla(293, 63%, 77%, 1)", "hsla(26, 84%, 75%, 1)", "hsla(45, 38%, 74%, 1)", "hsla(76, 79%, 63%, 1)", "hsla(245, 71%, 63%, 1)", "hsla(0, 0%, 100%, 1)", "hsla(44, 74%, 55%, 1)", "hsla(185, 51%, 55%, 1)", "hsla(59, 86%, 68%, 1)", "hsla(0, 0%, 99%, 1)", "hsla(16, 80%, 71%, 1)", "hsla(169, 32%, 70%, 1) ", "hsla(216, 49%, 62%, 1)", "hsla(214, 4%, 64%, 1)", "hsla(306, 100%, 90%, 1)", "hsla(19, 100%, 58%, 1)"];
            $TypeC2 = ["hsla(229, 21%, 37%, 1)", "hsla(317, 20%, 37%, 1)", "hsla(192, 50%, 71%, 1)", "hsla(290, 47%, 50%, 1)", "hsla(23, 74%, 52%, 1)", "hsla(22, 16%, 57%, 1)", "hsla(91, 60%, 41%, 1)", "hsla(266, 64%, 39%, 1)", "hsla(0, 0%, 41%, 1)", "hsla(0, 100%, 58%, 1) ", "hsla(174, 38%, 31%, 1)", "hsla(134, 36%, 53%, 1)", "hsla(44, 100%, 50%, 1)", "hsla(3, 79%, 56%, 1)", "hsla(165, 51%, 48%, 1)", "hsla(222, 70%, 38%, 1)", "hsla(220, 3%, 21%, 1)", "hsla(295, 85%, 63%, 1)", "hsla(0, 0%, 25%, 1)"];
            for($i = 0; $i < 18; $i++){ 
                echo "<hr>
                <form action='./Types.php' mothod='post'>";
                    echo "<input type='text' class='hidenInput' name='types' value={$TypeC[$i]}'>
                        <button class='aside-Content-button' type='submit' id='bac-{$i}'><h4>{$TypeC[$i]}</h4></button>
                        <style>
                            #bac-{$i}{
                                transition: .3s;
                                transition-timing-function: ease-out;
                            }    
                            #bac-{$i}:hover{
                                background: linear-gradient(45deg, {$TypeC1[$i]} 0%, {$TypeC2[$i]} 100%);
                                color: hsl(0, 0%, 0%);
                                transition: .5s;
                                transition-timing-function: ease-out;
                            }
                        </style>";
                echo "</form>";
            }
        ?>
    </aside>
    <script src="./main.js"></script>
</body>
</html>