<?php
    require_once('includes/_header.php');
    require_once('includes/_db.php');
?>

<?php
    $queryRecipe = "SELECT id,title,dir,subtitle,description,heroImgLink FROM recipe WHERE title LIKE '%Roasted%'";
    $resultRecipes = mysqli_query($connection, $queryRecipe);
    if (!$resultRecipes) {
        die("Database query failed.");
    }
    // while($row = $resultRecipes->fetch_assoc()) {
    //     echo var_dump($row);
    //     echo "<hr>";
    // }
        
    
?>
<main class="no-banner">
        <header class="jumbotron">
            <h1>Füd</h1>            
        </header>

        <div class="search powerbar">
            <div class="input">
                <input type="text" name="search" placeholder="Search for a recipe...">
            </div>
        </div>

        <div class="filters">
            <header>
                <h3>Available Filters</h3>
                <hr>
            </header>

            <ul class="options two-col">
                <li><a href="#">Spicy</a></li>
                <li><a href="#">Vegetarian</a></li>
                <li><a href="#">Carnivorous</a></li>
                <li><a href="#">Ben's Picks</a></li>
            </ul>
            
        </div>

        <div class="results" id="results">
            <header>
                <h3>Results</h3>
                <hr>
            </header>

            <ul class="content two-col">

                <?php
                    while($row = $resultRecipes->fetch_assoc()) {
                        echo "<a href='recipe.php?{$row['id']}'>";
                        
                            echo "<div class='card'>";

                                echo "<header>";
                                echo "<h4>{$row['title']}</h4>";
                                echo "</header>";

                                echo "<div class='img'>";

                                    echo "<picture>";
                                        echo "<source srcset='{$recipeImgLink}/{$row['dir']}/{$row['heroImgLink']}'>";
                                        echo "<img src='{$recipeImgLink}/{$row['dir']}/{$row['heroImgLink']}' alt='{$row['title']}'>";
                                    echo "</picture>";

                                echo "</div>";

                            echo "</div>";
                        
                        echo "</a>";
                ?>
                
                    <!-- <a href="recipe.php">
                        <div class="card">
                            <header>
                                <h4>Crispy Chicken Sandwhiches</h4>
                            </header>
                            <div class="img">
                                <picture>
                                    <img src="assets/img/0101_FPF_Crispy-Wild-Alaskan-Pollock_97377_WEB_SQ_hi_res.jpg" alt="Hero image of recipe">
                                </picture>
                            </div> 
                        </div> 
                    </a> -->

                <?php
                    } //for returned rows of recipe data
                ?>

                    <!-- <a href="recipe.php">
                        <div class="card">
                            <header>
                                <h4>Mexican Spiced Barramundi</h4>
                            </header>
                            <div class="img">
                                <picture>
                                    <img src="assets/img/0108_2PF_Barramundi_98380_SQ_hi_res.jpg" alt="Hero image of recipe">
                                </picture>
                            </div>
                        </div>
                    </a>
        
                    <a href="recipe.php">
                        <div class="card">
                            <header>
                                <h4>Roasted Chicken Fall Vegetables</h4>
                            </header>
                            <div class="img">
                                <picture>
                                    <img src="assets/img/1120_FPP_Roasted-Chicken_92314_WEB_SQ_hi_res.jpg" alt="Hero image of recipe">
                                </picture>
                            </div>
                        </div>
                    </a>
                    
                    <a href="recipe.php">
                        <div class="card">
                            <header>
                                <h4>Roasted Red Pepper Pasta</h4>
                            </header>
                            <div class="img">
                                <picture>
                                    <img src="assets/img/0108_2PV1_Roasted-Pepper-Pasta_97907_SQ_hi_res.jpg" alt="Hero image of recipe">
                                </picture>
                            </div>
                        </div>
                    </a> -->

            </div>
            
        </ul>
    </main>
    <script src="js/search.js"></script>
<?php
    require_once('includes/_footer.php');
?>