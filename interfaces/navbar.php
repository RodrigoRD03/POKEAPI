<nav class="navbar-Container">
    <div class="logo-Container">
        <a href="./index.php">
            <img  class="logo-Image" src="./images/Pokemon.png" alt="">
        </a>
    </div>
    <div class="form-SendPokemon">
        <form action="./Pokedex.php" method="post">
            <input class="input-Pokemon" required type="text" name="findPokemon" placeholder="Search" autocomplete="off">
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