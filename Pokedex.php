<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styles.css">
    <link rel="icon" href="./images/logo.ico">
    <title>Pokedex</title>
</head>
<body>
    <?php
        $nombre = $_POST['opciones'];
        echo $nombre."<br>";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://pokeapi.co/api/v2/pokemon/ditt");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $data = curl_exec($ch);
        curl_close($ch);
        $pokemon = json_decode($data);
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
    ?>
    <section class="container-Card">
        <div class="random-color">
            <?php
                echo "<img class='card-image' src='$imagen' alt=''>";
            ?>
            
        </div>
        <div class="random-color-2">
            <?php
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
            ?>
        </div>
    </section>
</body>
</html>