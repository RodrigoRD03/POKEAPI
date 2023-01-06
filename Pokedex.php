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
            echo "<section class='pokedex-section'>
                    <h1><span><i class='fa-solid fa-magnifying-glass'></i></span>&nbspSearch Not Found</h1>
                </section>";
        } else {
            $dato = "official-artwork";
            $imagen = $pokemon->sprites->other->dream_world->front_default;
            if($imagen == null){
                $imagen = $pokemon->sprites->other->$dato->front_default;
            }
            $type = $pokemon->types;
            $names = $pokemon->forms;
            
            foreach($type as $types){
                echo "<p>".$types->type->name."</p>";
            }
             echo "<section class='container-Card' styles='margin-top: 100px; color=white;'>
            <div class='random-color'>";
                echo "<img class='card-image' src='$imagen' alt=''>
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