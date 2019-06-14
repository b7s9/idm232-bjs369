<?php
    require_once('includes/_header.php');
    require_once('includes/_db.php');
?>

<?php
    $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $urlQuery = parse_url($url, PHP_URL_QUERY);

    $queryRecipe = "SELECT * FROM recipe WHERE id LIKE '{$urlQuery}'";
    $resultRecipe = mysqli_query($connection, $queryRecipe);
    if (!$resultRecipe) {
        die("Database query failed.");
    }
    
    while($recipeRow = $resultRecipe->fetch_assoc()) {

        $queryKitchenTool = "SELECT * FROM kitchenTool WHERE id={$recipeRow['kitchenToolid']}";
        $resultKitchenTool = mysqli_query($connection, $queryKitchenTool);        

        $queryHowTo = "SELECT * FROM howTo WHERE id={$recipeRow['howToid']}";
        $resultHowTo = mysqli_query($connection, $queryHowTo);
        
    }
    
?>
    <div class="banner">
        <div class="flex-wrapper"> 

            <nav>                
                <a href="search.php" class="logo">Füd</a>
                <ul class="desktop-nav">
                    <li><a href="#desc">Description</a></li>
                    <li><a href="#ingredients">Ingredients</a></li>
                    <li><a href="#steps">Steps</a></li>
                    <li><a href="#how-to">How To</a></li>
                    <li><a href="search.php">Find a Recipe</a></li>
                </ul>
            </nav>

            <div class="nav-toggle menu-ico ico" aria-hidden="true">
                <svg width="32px" height="27px" viewBox="0 0 32 27" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <defs></defs>
                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="square">
                        <g id="home" transform="translate(-277.000000, -13.000000)" stroke="#093354" stroke-width="3">
                            <g id="navbar" transform="translate(0.000000, -1.000000)">
                                <g id="menu-icon" transform="translate(272.000000, 6.000000)">
                                    <path d="M7,9.5 L35,9.5" id="Line"></path>
                                    <path d="M7,21.5 L35,21.5" id="Line-Copy"></path>
                                    <path d="M7,33.5 L35,33.5" id="Line-Copy-2"></path>
                                </g>
                            </g>
                        </g>
                    </g>
                </svg>
            </div>

        </div>

        <ul class="mobile-nav visually-hidden">
            <li><a href="#desc">Description</a></li>
            <li><a href="#ingredients">Ingredients</a></li>
            <li><a href="#steps">Steps</a></li>
            <li><a href="#how-to">How To</a></li>
            <li><a href="search.php">Find a Recipe</a></li>
            <!-- <li><a href="search.php">I'm Feeling Lucky</a></li> -->
        </ul>
        
    </div>

    <div class="banner-ghost"></div>


    <div class="content-wrapper">

    <main>
        <header class="intro">
            <?php
                mysqli_data_seek($resultRecipe, 0);
                while($recipeRow = $resultRecipe->fetch_assoc()) {
                    echo '<h1>' . $recipeRow['title'] . '</h1>';
                    echo '<h2>' . $recipeRow['subtitle'] . '</h2>';
                }
            ?>            
        </header>
        
        <div class="intro hero">
            <picture>
                <!-- <source media="(min-width:48rem)"> -->
                <?php
                    mysqli_data_seek($resultRecipe, 0);
                    while($recipeRow = $resultRecipe->fetch_assoc()) {
                        echo "<source media='(min-width: 990px)' srcset='{$recipeImgLink}/{$recipeRow['dir']}/beauty_pic_1200.jpg'>";
                        echo "<source media='(min-width: 638px)' srcset='{$recipeImgLink}/{$recipeRow['dir']}/beauty_pic_800.jpg'>";
                        echo "<source media='(min-width: 430px)' srcset='{$recipeImgLink}/{$recipeRow['dir']}/beauty_pic_500.jpg'>";
                        echo "<img src='{$recipeImgLink}/{$recipeRow['dir']}/beauty_pic_320.jpg' alt='{$recipeRow['title']}'>";
                    }
                ?>
            </picture>
        </div>

        <div class="desc" id="desc">
            <header>
                <h3>Description</h3>
                <hr>
            </header>

            <div class="content">
                <?php
                    mysqli_data_seek($resultRecipe, 0);
                    while($recipeRow = $resultRecipe->fetch_assoc()) {
                        echo "<p>{$recipeRow['description']}</p>";
                    }
                ?>
            </div>
        </div>
        
        <?php
            mysqli_data_seek($resultRecipe, 0);
            while($recipeRow = $resultRecipe->fetch_assoc() ) {
                if( $recipeRow['kitchenToolid'] != 0 ){

                    mysqli_data_seek($resultKitchenTool, 0);
                    while($kitchenRow = $resultKitchenTool->fetch_assoc() ){

        ?>
                
        <div class="kitchen-tool">
            <header>
                <h3>Featured Tool</h3>
                <hr>                
            </header>

            <div class="content">
                <a href="<?php echo $kitchenRow['ctaLink'];?>" target="_blank">           
                    <picture>
                        <source srcset="<?php echo "{$kitchenToolImgLink}/{$kitchenRow['id']}/{$kitchenRow['imgLink1']}"; ?>">
                        <img src="<?php echo "{$kitchenToolImgLink}/{$kitchenRow['id']}/{$kitchenRow['imgLink1']}"; ?>" alt="Kitchen Tool">
                    </picture>
                </a>
                <figcaption>
                        <a href="<?php echo $kitchenRow['ctaLink'];?>" target="_blank"><?php echo $kitchenRow['title']; ?></a>
                </figcaption>

                <p><?php echo $kitchenRow['description']; ?></p>
            </div>
        </div>

        <?php
                    } // while kitchenRow
                } // if kitchenTool
            } // while recipeRow
        ?>

        <div class="ingredients" id="ingredients">
            <header>
                <h3>Ingredients</h3>
                <hr>
            </header>

            <div class="content">              
                <picture>
                    <?php
                        mysqli_data_seek($resultRecipe, 0);
                        while($recipeRow = $resultRecipe->fetch_assoc()) {
                            echo "<source srcset='{$recipeImgLink}/{$recipeRow['dir']}/ingredients.png'>";
                            echo "<img src='{$recipeImgLink}/{$recipeRow['dir']}/ingredients.png' alt='Ingredients'>";
                        }
                    ?>
                </picture>

                <ul class="two-col">
                    <?php
                        mysqli_data_seek($resultRecipe, 0);
                        while($recipeRow = $resultRecipe->fetch_assoc()) {
                            $ingredientList = preg_split('/\R/', $recipeRow['ingredientList']);
                            foreach($ingredientList as $ingredient){
                                if(strlen($ingredient) > 1 ) echo "<li>{$ingredient}</li>";                                
                            }
                        }
                    ?>
                </ul>
            </div>

        </div>

        <?php
            mysqli_data_seek($resultRecipe, 0);
            while($recipeRow = $resultRecipe->fetch_assoc() ) {
                if( $recipeRow['howToid'] != 0 ){

                    mysqli_data_seek($resultHowTo, 0);
                    while($howToRow = $resultHowTo->fetch_assoc() ){

        ?>
                
        <div class="how-to" id="how-to">
            <header>
                <h3>How To...</h3>
                <hr>                
            </header>

            <div class="content">
            <header>
                    <h4><?php echo $howToRow['title'];?></h4>
                </header>
                <picture>
                    <source srcset="<?php echo "{$howToImgLink}/{$howToRow['id']}/{$howToRow['marqueeImgLink']}"; ?>">
                    <img src="<?php echo "{$howToImgLink}/{$howToRow['id']}/{$howToRow['marqueeImgLink']}"; ?>" alt="How To">
                </picture>

                <p><?php echo $howToRow['description']; ?></p>
            </div>
        </div>

        <?php
                    } // while howToRow
                } // if kitchenTool
            } // while recipeRow
        ?>

        <div class="steps" id="steps">
            
            <header>
                <h3>Steps</h3>
                <hr>
            </header>

            <div class="content">

                <?php
                    mysqli_data_seek($resultRecipe, 0);
                    while($recipeRow = $resultRecipe->fetch_assoc()) {
                       
                        $instructionList = preg_split('/```/', $recipeRow['instructionList']);
                        $step = 0;

                        foreach($instructionList as $instruction){
                            
                            $instructionNewlineList = explode('\r\n', $instruction);

                            foreach($instructionNewlineList as $instructionNewline){

                                if($step == 0){
                                    continue;
                                }

                                $instructionSplitList = explode(',,,', $instructionNewline);

                                // open step
                                echo "<div class='step'>";
                                if( count($instructionSplitList) > 1){
                                    echo "<picture class='split'>";                                    
                                }else {
                                    echo "<picture>";
                                }

                                echo "<source srcset='{$recipeImgLink}/{$recipeRow['dir']}/step_0{$step}.jpg'>";
                                echo "<img src='{$recipeImgLink}/{$recipeRow['dir']}/step_0{$step}.jpg' alt='Instruction Step Image'>";

                                echo "</picture>";
                                

                                if( count($instructionSplitList) > 1){
                                    echo "<header>";
                                    echo "<h4>" . trim($instructionSplitList[0]) . "</h4>";
                                    echo "</header>";

                                    echo "<p class='split'>" . trim($instructionSplitList[1]) . "</p>";                            
                                    
                                }else{
                                    echo "<p>" . trim($instructionSplitList[0]) . "</p>";                            

                                }
                                
                                echo "</div>"; 
                                //close step            
                                
                                echo "<hr class='step'>";
                            }

                            $step++;
                        } //foreach step
                    } // this recipe row (sql)
                ?>                             

            </div>

        </div>
        <!-- close instructions -->

    </main>
    </div>
    <script src="js/navbar.js"></script>
<?php
    mysqli_free_result($resultRecipe);
    mysqli_close($connection);
    require_once('includes/_footer.php');
?>