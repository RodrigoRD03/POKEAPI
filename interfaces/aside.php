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