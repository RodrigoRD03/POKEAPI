<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style.css">
    <link rel="icon" href="./images/logo.ico">
    <script src="https://kit.fontawesome.com/4b5992b75f.js" crossorigin="anonymous"></script>
    <title>Pokedex</title>
</head>
    <?php
        function backgrounds($types){
            $type = $types[0]->type->name;$TypeC = ["normal", "fighting", "flying", "poison", "ground", "rock", "bug", "ghost", "steel", "fire", "water", "grass", "electric", "psychic", "ice", "dragon","dark", "fairy"];
            $TypeC1 = ["hsla(228, 21%, 72%, 1)", "hsla(347, 93%, 56%, 1)", "hsla(178, 40%, 84%, 1)", "hsla(293, 63%, 77%, 1)", "hsla(26, 84%, 75%, 1)", "hsla(45, 38%, 74%, 1)", "hsla(76, 79%, 63%, 1)", "hsla(245, 71%, 63%, 1)", "hsla(0, 0%, 100%, 1)", "hsla(44, 74%, 55%, 1)", "hsla(185, 51%, 55%, 1)", "hsla(59, 86%, 68%, 1)", "hsla(0, 0%, 99%, 1)", "hsla(16, 80%, 71%, 1)", "hsla(169, 32%, 70%, 1) ", "hsla(216, 49%, 62%, 1)", "hsla(214, 4%, 64%, 1)", "hsla(306, 100%, 90%, 1)", "hsla(19, 100%, 58%, 1)"];
            $TypeC2 = ["hsla(229, 21%, 37%, 1)", "hsla(317, 20%, 37%, 1)", "hsla(192, 50%, 71%, 1)", "hsla(290, 47%, 50%, 1)", "hsla(23, 74%, 52%, 1)", "hsla(22, 16%, 57%, 1)", "hsla(91, 60%, 41%, 1)", "hsla(266, 64%, 39%, 1)", "hsla(0, 0%, 41%, 1)", "hsla(0, 100%, 58%, 1) ", "hsla(174, 38%, 31%, 1)", "hsla(134, 36%, 53%, 1)", "hsla(44, 100%, 50%, 1)", "hsla(3, 79%, 56%, 1)", "hsla(165, 51%, 48%, 1)", "hsla(222, 70%, 38%, 1)", "hsla(220, 3%, 21%, 1)", "hsla(295, 85%, 63%, 1)", "hsla(0, 0%, 25%, 1)"];
            for($i = 0; $i < 18; $i++){
                if($type == $TypeC[$i]){
                    $space = $i;
                }
            }
            $colorOne = $TypeC1[$space];
            $colorTwo = $TypeC2[$space];
            echo "<div class='pokedex-backgroundType' style='background: linear-gradient(45deg, $colorOne 0%, $colorTwo 100%)'>";
        }
        ?>
<body class="pokedex-GridContainer">
    <nav class="navbar-Container">
        <div class="logo-Container">
            <a href="./index.php">
                <img  class="logo-Image" src="./images/Pokemon.png" alt="">
            </a>
        </div>
        <div class="form-SendPokemon">
            <form action="./Pokedex.php" method="post">
                <input class="input-Pokemon" required type="text" name="findPokemon" placeholder="Search A Pokemon">
                <button class="button-FindPokemon" type="submit"><i class="fa-sharp fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
        <div class="list-Options">
            <div class="screenPhone">
                <div class="image-FloatContainer">
                    <img class="navbar-FloatImage" src="./images/Pokeball.png" alt="">
                </div>
                <div class="navbar-FloatMenu">
                    <ul>
                        <p>Pages</p> 
                        <hr>
                        <li class="pink"><a class="option-Home pink" href="./index.php">Home</a></li>
                        <hr>
                        <li class="yellow"><a class="option-Home yellow" href="./Pokedex.php">Pokedex</a></li>
                    </ul>
                </div>
            </div>
            <div class="screenComputer">
                <div class="links-Content">
                    <div class="linkHome">
                        <a href="./index.php">Home</a>
                    </div>
                    <div class="linkPokedex">
                        <a href="./Pokedex.php">Pokedex</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <?php
        if(isset($_POST['findPokemon']) == false){
            $numeber_Random = random_int(1, 100);
            $name = "$numeber_Random";
        } else {
            $name = $_POST['findPokemon'];
            $name = strtolower($name);
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://pokeapi.co/api/v2/pokemon/".$name);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $data = curl_exec($ch);
            curl_close($ch);
            $pokemon = json_decode($data);
        if($data == "Not Found"){
            echo "<section class='pokedex-Section-NoSearch'>
                    <div class='pokedex-Carpet'>
                        <img class='pokedex-Carpet-Image' src='./images/Curva.png' alt=''>
                        <div class='pokedex-Carpet-Background'></div>
                        <img class='Pokedex-Carpet-Corner' src='./images/Esquina.png' alt=''>
                    </div>
                    <div class='pokedex-Text-NoSearch'>
                        <h1 class='pokedex-NoSearch'><span><i class='fa-solid fa-magnifying-glass'></i></span>&nbspSearch Not Found</h1>
                    </div>
                </section>";
        } else {
            echo "<section class='pokedex-SearchInfo'>";
            $fact = "official-artwork";
            $imagen = $pokemon->sprites->other->dream_world->front_default;
            if($imagen == null){
                $image = $pokemon->sprites->other->$fact->front_default;
            }
            $type = $pokemon->types;
            $names = $pokemon->forms;
            
            foreach($type as $types){
                echo "<p>".$types->type->name."</p>";
            }
            echo "<section class='container-Card' styles='margin-top: 100px; color=white;'>";
                    backgrounds($type);
                        echo "<img class='pokedex-PokeImage' src='$imagen' alt=''>
                    </div>
                    <div class='random-color-2'>";
                        echo "<h1 class='pokemon-name'>$pokemon->name</h1>";
                        echo "<h3>Tipo</h3>";
                        $type = $pokemon->types;
                        foreach($type as $types){
                            echo "<p>".$types->type->name."</p>";
                        }
                        $ability = $pokemon->abilities;
                        foreach($ability as $abilities){
                            echo "<p>".$abilities->ability->name."</p>";
                        }   
                    echo "</div>
            </section>";
        }
    ?>
</body>
</html>