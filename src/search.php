<?php
    require_once('includes/_header.php');
    require_once('includes/_db.php');
?>

<?php
    // $queryRecipe = "SELECT id,title,dir,subtitle,description FROM recipe WHERE title LIKE '%Roasted%'";
    // $resultRecipes = mysqli_query($connection, $queryRecipe);
    // if (!$resultRecipes) {
    //     die("Database query failed.");
    // }        
    
?>
<main class="no-banner">
        <header class="jumbotron">
            <h1>Füd</h1>            
        </header>

        <div class="search powerbar">
            <div class="input">
                <form action="process.php" method="post" name="form" id="form">
                    <input type="text" name="q" pattern="([A-Za-z])+" placeholder="Search for a recipe..." autocomplete="none">
                </form>
            </div>
            <div class="count">
                <!-- <span>Showing <span class="set">0</span> results</span> -->
                <span></span>
            </div>
        </div>

        <div class="filters">
            <header>
                <h3>Filter Results</h3>
                <hr>
            </header>            

            <fieldset class="options two-col">

            <?php 
                $tags = ['beef', 'poultry', 'pork', 'fish', 'veg'];

                foreach($tags as $tag){
                    echo "<div data-filter='{$tag}'>";
                    echo "<input type='checkbox' name='{$tag}' id='filter_{$tag}' value='{$tag}' class='css-checkbox' checked>";
                    echo "<label for='filter_{$tag}' class='css-label'>" . ($tag == 'veg' ? 'Vegetarian' : ucfirst($tag) ) . "</label>";
                    echo "</div>";
                }
            ?>   
                         
            </fieldset>

            <!-- <ul class="options two-col">
                <!~~ <li><a href="#">Spicy</a></li>
                <li><a href="#">Vegetarian</a></li>
                <li><a href="#">Carnivorous</a></li>
                <li><a href="#">Ben's Picks</a></li> ~~>                
                <li><input type="checkbox" name="beef" id=""><label for="beef">Beef</label></li>
                <li><input type="checkbox" name="poultry" id=""><label for="poultry">Poultry</label></li>
                <li><input type="checkbox" name="pork" id=""><label for="pork">Pork</label></li>
                <li><input type="checkbox" name="fish" id=""><label for="fish">Fish</label></li>
                <li><input type="checkbox" name="seafood" id=""><label for="seafood">Seafood</label></li>
                <li><input type="checkbox" name="vegetarian" id=""><label for="vegetarian">Vegetarian</label></li>
            </ul>
             -->
        </div>

        <div class="results" id="results">
            <header>
                <h3>Results</h3>
                <hr>
            </header>

            <ul class="content two-col">

                <?php
                    // while($row = $resultRecipes->fetch_assoc()) {
                    //     echo "<a href='recipe.php?{$row['id']}'>";
                        
                    //         echo "<div class='card'>";

                    //             echo "<header>";
                    //             echo "<h4>{$row['title']}</h4>";
                    //             echo "</header>";

                    //             echo "<div class='img'>";

                    //                 echo "<picture>";
                    //                     echo "<source srcset='{$recipeImgLink}/{$row['dir']}/beauty_pic.jpg'>";
                    //                     echo "<img src='{$recipeImgLink}/{$row['dir']}/beauty_pic.jpg' alt='{$row['title']}'>";
                    //                 echo "</picture>";

                    //             echo "</div>";

                    //         echo "</div>";
                        
                    //     echo "</a>";

                    // } //for returned rows of recipe data
                ?>                    

            </div>
            
        </ul>
    </main>
    <script src="js/search.js"></script>
<?php
    require_once('includes/_footer.php');
?>