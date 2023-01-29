<!DOCTYPE html>
<html lang="en">
<head>
    <?php

    if(isset($_POST['findPokemon']) == false){
        $number_Random = random_int(1, 800);
        $name = "$number_Random";
        $tittle = "$number_Random";
    } else {
        $tittle = $_POST['findPokemon'];
        $tittle  = ucwords($tittle);
        $name = $_POST['findPokemon'];
        $name = strtolower($name);
        $name = trim($name);
    }
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Style.css">
    <link rel="icon" href="./images/logo.ico">
    <script src="https://kit.fontawesome.com/4b5992b75f.js" crossorigin="anonymous"></script>
    <title><?php echo  "{$tittle} | Pokedex" ?></title>
</head>
    <?php
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
            echo "<div class='pokedex-backgroundType' style='background: linear-gradient(45deg, $colorOne 0%, $colorTwo 100%); background-size: 400% 400%;
            animation: anim 2.5s infinite ease-in-out;'>";
        }
        function stats($stats){
            echo "<div class='pokedex-States'>";
            echo "<h3 class='pokedex-states_tittle'>Stats</h3>";
            echo "<div class='pokedex_Stats'>";
            foreach ($stats as $stat) {
                echo "<div class='stats_Info'>
                    <h4 class='stateName'>".$stat->stat->name."</h4>
                    <div class='progressAndNumbers'>
                        <progress class='stateProgress' max='200' value='$stat->base_stat'></progress>
                        <p>$stat->base_stat</p>
                    </div>
                </div>";
            }
            echo "</div>
            </div>";
        }
        function PrintImagesEvolutions($url){
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://pokeapi.co/api/v2/pokemon/".$url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            $data = curl_exec($ch);
            curl_close($ch);
            $pokemonImage = json_decode($data);
            $fact = "official-artwork";
            $imageEvolution = $pokemonImage->sprites->other->$fact->front_default;
            if($imageEvolution == null){
                $imageEvolution = $pokemonImage->sprites->other->$fact->front_default;
            } 
            if($imageEvolution == null){
                $imageEvolution = $pokemonImage->sprites->other->home->front_default;
            } 
            echo "<input type='text' name='findPokemon' style='display: none' value='{$pokemonImage->name}'>";
            echo "<img class='pokedex-EvolutionImage' src='$imageEvolution' alt=''>";
        }
        ?>
<body class="pokedex-GridContainer">
    <?php
        require('./interfaces/navbar.php');
    ?>
    <?php
        
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
            $imagen = $pokemon->sprites->other->$fact->front_default;
            if($imagen == null){
                $imagen = $pokemon->sprites->other->$fact->front_default;
            } 
            if($imagen == null){
                $imagen = $pokemon->sprites->other->home->front_default;
            } 
            $type = $pokemon->types;
            $names = $pokemon->forms;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $pokemon->species->url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            $data = curl_exec($ch);
            curl_close($ch);
            $pokeCategory = json_decode($data);
            echo "<section class='pokedex-container-Card' styles='margin-top: 100px; color=white;'>";
                    backgrounds($type);
                        echo "<img class='pokedex-PokeImage' src='$imagen' alt=''>
                    </div>
                    <div class='pokedex-TittleName'>
                        <h1 class='pokedex-pokemon-name'>{$pokemon->name}</h1>
                    </div>
                    <div class='pokedex-Info'>";
                        echo "<h3 class='pokedex_Tittleinfo'>Information</h3>";
                        echo "<div class='pokedex_IdInfo'> <h4>N.° 0{$pokemon->id} </h4></div>";
                        echo "<div class='pokedex_HeigtInfo'>
                                <h4> <span><i class='fa-solid fa-up-down'></i></span> Height </h4> 
                                <h5>".floatval(($pokemon->height)/10) ." m</h5>
                        </div>";
                        echo "<div class='pokedex_WeightInfo'>
                                <h4> <span><i class='fa-solid fa-dumbbell'></i></span> Weight </h4> 
                                <h5>". floatval(($pokemon->weight)/10) . " Kg</h5>
                        </div>";
                        echo "<div class='pokedex_CategoryInfo'>
                                <h4> <span><i class='fa-solid fa-paperclip'></i></span> Category </h4> 
                                <h5>";
                                $category = $pokeCategory->genera;
                                foreach($category as $categorys){
                                    if($categorys->language->name == "en"){
                                        $category = $categorys->genus;
                                    }
                                }
                                $category = str_replace("Pokémon", "", $category);
                                echo $category;
                                echo "</h5>
                        </div>";
                        echo "<div class='pokedex_AbilitiesInfo'>
                                <h4> <span><i class='fa-solid fa-star'></i></span> Abilities </h4> ";
                                $ability = $pokemon->abilities;
                                foreach($ability as $abilities){
                                    echo "<div class='Info_AbilityBox'>
                                        <h5>{$abilities->ability->name}</h5>";
                                        $ch = curl_init();
                                        curl_setopt($ch, CURLOPT_URL, $abilities->ability->url);
                                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                        curl_setopt($ch, CURLOPT_HEADER, 0);
                                        $data = curl_exec($ch);
                                        curl_close($ch);
                                        $infoAbility = json_decode($data);
                                        $entries = $infoAbility->flavor_text_entries;
                                        foreach($entries as $entrie){
                                            if($entrie->language->name == "en"){
                                                $infoAbility = $entrie->flavor_text;
                                                
                                            }
                                        }
                                        echo "<div data-count='{$infoAbility}' class='Info-Ability'>
                                            <span><i class='fa-solid fa-question interrogation'></i></span>
                                        </div>
                                    </div>";
                                }
                        echo "</div>";
                        echo "<di class='pokedex_HabitatInfo'>
                                <h4> <span> <i class='fa-solid fa-globe'></i> </span> Habitat</h4>
                                <h5>"; 
                                if($pokeCategory->habitat == null){
                                    echo "Unknown";
                                } else {
                                    echo $pokeCategory->habitat->name;
                                }
                                echo "</h5>
                        </div>";
                    echo "</div>";
                    echo "<div class='pokedex-Types'>";
                    $weak = [];
                    $types = $pokemon->types;
                    $TypeC = ["normal", "fighting", "flying", "poison", "ground", "rock", "bug", "ghost", "steel", "fire", "water", "grass", "electric", "psychic", "ice", "dragon","dark", "fairy"];
                    $TypeC1 = ["hsla(228, 21%, 72%, 1)", "hsla(347, 93%, 56%, 1)", "hsla(178, 40%, 84%, 1)", "hsla(293, 63%, 77%, 1)", "hsla(26, 84%, 75%, 1)", "hsla(45, 38%, 74%, 1)", "hsla(76, 79%, 63%, 1)", "hsla(245, 71%, 63%, 1)", "hsla(0, 0%, 100%, 1)", "hsla(44, 74%, 55%, 1)", "hsla(185, 51%, 55%, 1)", "hsla(59, 86%, 68%, 1)", "hsla(0, 0%, 99%, 1)", "hsla(16, 80%, 71%, 1)", "hsla(169, 32%, 70%, 1) ", "hsla(216, 49%, 62%, 1)", "hsla(214, 4%, 64%, 1)", "hsla(306, 100%, 90%, 1)", "hsla(19, 100%, 58%, 1)"];
                    $TypeC2 = ["hsla(229, 21%, 37%, 1)", "hsla(317, 20%, 37%, 1)", "hsla(192, 50%, 71%, 1)", "hsla(290, 47%, 50%, 1)", "hsla(23, 74%, 52%, 1)", "hsla(22, 16%, 57%, 1)", "hsla(91, 60%, 41%, 1)", "hsla(266, 64%, 39%, 1)", "hsla(0, 0%, 41%, 1)", "hsla(0, 100%, 58%, 1) ", "hsla(174, 38%, 31%, 1)", "hsla(134, 36%, 53%, 1)", "hsla(44, 100%, 50%, 1)", "hsla(3, 79%, 56%, 1)", "hsla(165, 51%, 48%, 1)", "hsla(222, 70%, 38%, 1)", "hsla(220, 3%, 21%, 1)", "hsla(295, 85%, 63%, 1)", "hsla(0, 0%, 25%, 1)"];
                    ?>
                    <div class="pokedex-Type_Section">
                        <h2 class="pokedex-Type-Tittle"> Types </h2>
                        <?php
                        $listType = [];
                        foreach($types as $type){
                            for($i = 0; $i < 18; $i++){
                                if($type->type->name == $TypeC[$i]){
                                    $space = $i;
                                    $colorOne = $TypeC1[$space];
                                    $colorTwo = $TypeC2[$space];
                                }
                            }
                            echo "<div class='background-type hover-type' style='background: linear-gradient(45deg, $colorOne 0%, $colorTwo 100%)'>";
                            echo "<h4< class='type'>".$type->type->name."</h4>";
                            echo "</div>";
                            array_push($listType, $type->type->name);
                            array_push($weak, $type->type->url);
                        } 
                        ?>
                    </div>
                    <div class="pokedex-Weakness_Section">
                        <h2 class="pokedex-Weakness_Tittle">Weaknesses</h2>
                        <?php
                            $listWeakness = [];
                            foreach($weak as $weakness){
                                $ch = curl_init();
                                curl_setopt($ch, CURLOPT_URL, $weakness);
                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                curl_setopt($ch, CURLOPT_HEADER, 0);
                                $data = curl_exec($ch);
                                curl_close($ch);
                                $pokeWeak = json_decode($data);
                                $pokeWeak = $pokeWeak->damage_relations->double_damage_from;
                                foreach($pokeWeak as $pokeWeakness){
                                    array_push($listWeakness, $pokeWeakness->name);
                                }
                            }
                            $listWeakness = array_unique($listWeakness);
                            foreach($listType as $list){
                                $listWeakness = str_replace($list, "" , $listWeakness);
                            }
                            foreach($listWeakness as $list){
                                if($list == ""){
                                    continue;
                                } else{
                                    for($i = 0; $i < 18; $i++){
                                        if($list == $TypeC[$i]){
                                            $space = $i;
                                            $colorOne = $TypeC1[$space];
                                            $colorTwo = $TypeC2[$space];
                                        }
                                    }
                                    echo "<div class='background-type hover-type' style='background: linear-gradient(45deg, $colorOne 0%, $colorTwo 100%)'>";
                                    echo "<h4< class='type'>".$list."</h4>";
                                    echo "</div>";
                                }
                            }
                            echo "</div>
                        </div>
                        <div>";
                            $stats = $pokemon->stats;
                            stats($stats);
                    echo "</div>";
                echo "</section>";
            echo "</section>";
            ?>
            <section class="pokedex-PokeEvolutions">
                <?php
                echo "<div class='evolution-tittle'>
                        <h1>Evolutions <i class='fa-solid fa-dna'></i></h1>
                    </div>
                    <div class='section-ImagesEvolutions'>";
                    $nameEvolutions = [];
                    $pokeEvolution = $pokeCategory->evolution_chain->url;
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $pokeEvolution);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_HEADER, 0);
                    $data = curl_exec($ch);
                    curl_close($ch);
                    $evolutions = json_decode($data);
                    $secondLevel = [];
                    array_push($nameEvolutions, $evolutions->chain->species->name);
                    $evolutionChain = $evolutions->chain->evolves_to;
                    if(count($evolutionChain) != 0){
                        foreach($evolutionChain as $chain){
                            array_push($nameEvolutions, $chain->species->name);
                            $secondLevel = $chain->evolves_to;
                            foreach($secondLevel as $second){
                                array_push($nameEvolutions, $second->species->name);
                            }
                        }
                        foreach($nameEvolutions as $name){
                            if($name == $pokemon->name){
                                echo "<form action='./Pokedex.php' method='post'>";
                                    echo "<button type='submit' class='circle-evolution'>";
                                        echo "<input type='text' name='findPokemon' style='display: none' value='{$pokemon->name}'>";
                                        echo "<img class='pokedex-EvolutionImage' src='$imagen' alt=''>";
                                    echo "</button>";
                                echo "</form>";
                            } else {
                                echo "<form action='./Pokedex.php' method='post'>";
                                    echo "<button class='circle-evolution'>";
                                        PrintImagesEvolutions($name);
                                    echo "</button>";
                                echo "</form>";
                            }
                        }
                    } else {
                        foreach($nameEvolutions as $name){
                            if($name == $pokemon->name){
                                echo "<form action='./Pokedex.php' method='post'>";
                                    echo "<button type='submit' class='circle-evolution'>";
                                        echo "<input type='text' name='findPokemon' style='display: none' value='{$pokemon->name}'>";
                                        echo "<img class='pokedex-EvolutionImage' src='$imagen' alt=''>";
                                    echo "</button>";
                                echo "</form>";
                            } else {
                                echo "<form action='./Pokedex.php' method='post'>";
                                    echo "<button class='circle-evolution'>";
                                        PrintImagesEvolutions($name);
                                    echo "</button>";
                                echo "</form>";
                            }
                        }
                    }
                echo "</div>";
                echo "<div class='varieties-tittle'>
                        <h1>Varieties <i class='fa-solid fa-gears'></i></h1>
                    </div>";
                echo "<div class='section-ImagesEvolutions'>";
                    $varietiesList = $pokeCategory->varieties; 
                    foreach($varietiesList as $varieties){
                        
                        echo "<form action='./Pokedex.php' method='post'>";
                            echo "<button class='circle-evolution'>";
                                PrintImagesEvolutions($varieties->pokemon->name);
                            echo "</button>";
                        echo "</form>";
                    }

                ?>
            </section>
            <?php
        }
    ?>
</body>
</html>