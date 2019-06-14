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
<div class="content-wrapper">

<main class="no-banner">
        <header class="jumbotron">
            <h1>Füd</h1>            
        </header>

        <div class="search powerbar">
            <div class="input">
                <form action="process.php" method="post" name="form" class="textForm">
                    <input type="text" name="q" pattern="([A-Za-z])+" placeholder="Search for a recipe..." autocomplete="none">
                </form>
                <form action="process.php" method="post" name="form" class="btnForm">
                    <input type="hidden" name="q" value="">
                    <button type="submit">Show All Recipes</button>
                </form>                
            </div>
            <div class="count">
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
                    //                     echo "<source media='(min-width: 430px)' srcset='{$recipeImgLink}/{$recipeRow['dir']}/beauty_pic_500.jpg'>";
                    //                     echo "<img src='{$recipeImgLink}/{$recipeRow['dir']}/beauty_pic_320.jpg' alt='{$recipeRow['title']}'>";
                    //                 echo "</picture>";

                    //             echo "</div>";

                    //         echo "</div>";
                        
                    //     echo "</a>";

                    // } //for returned rows of recipe data
                ?>                    

            </div>
            
        </ul>
    </main>
    </div>
    <script src="js/search.js"></script>
<?php
    require_once('includes/_footer.php');
?>