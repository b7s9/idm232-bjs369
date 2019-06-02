<?php
    require_once('includes/_header.php');
    require_once('includes/_db.php');
?>

<?php
    $queryRecipe = "SELECT * FROM recipe WHERE id LIKE '15cf76ac4a9f42fa0cb00886bf1da458'";
    $resultRecipe = mysqli_query($connection, $queryRecipe);
    if (!$resultRecipe) {
        die("Database query failed.");
    }
    
    while($recipeRow = $resultRecipe->fetch_assoc()) {
        
        // get associated kitchen tool
        // echo $recipeRow['kitchenToolid'];
        // echo "<hr>";

        $queryKitchenTool = "SELECT * FROM kitchenTool WHERE id={$recipeRow['kitchenToolid']}";
        $resultKitchenTool = mysqli_query($connection, $queryKitchenTool);        
        // while($kitchenRow = $resultKitchenTool->fetch_assoc()) {
        //     var_dump($kitchenRow);
        //     echo "<hr>";
        // }

        // get associated howTo
        // echo $recipeRow['howToid'];
        // echo "<hr>";

        $queryHowTo = "SELECT * FROM kitchenTool WHERE id={$recipeRow['howToid']}";
        $resultHowTo = mysqli_query($connection, $queryHowTo);
        // while($howRow = $resultHowTo->fetch_assoc()) {
        //     var_dump($howRow);
        //     echo "<hr>";
        // }
        
    }
    
?>
<div class="banner">
        <div class="flex-wrapper">
        
            <div class="logo">Füd</div>

            <div class="nav-toggle">
                <div class="menu-ico ico" aria-hidden="true">
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
                <button class="nav-toggle">Go To</button>           
            </div>

            <div class="search">
                <div class="search-ico ico" aria-hidden="true">
                    <svg width="27px" height="27px" viewBox="0 0 27 27" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <defs></defs>
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="menu-nav" transform="translate(-188.000000, -14.000000)" fill="#A2AEB8">
                                <path d="M214.34905,37.4177353 L208.794254,31.863166 C210.13291,29.9307374 210.802578,27.7764664 210.802578,25.4014874 C210.802578,23.8576092 210.502855,22.3810609 209.90341,20.9721828 C209.304361,19.5630777 208.494532,18.3485315 207.474261,17.3282605 C206.453989,16.3079895 205.239613,15.4981597 203.830792,14.8990546 C202.421517,14.2997794 200.945082,14.0001702 199.401204,14.0001702 C197.857439,14.0001702 196.380891,14.2997794 194.972013,14.8990546 C193.562908,15.4981597 192.348361,16.3079895 191.32809,17.3282605 C190.307706,18.3485315 189.497989,19.5633046 188.898828,20.9721828 C188.299609,22.3812311 188,23.8576092 188,25.4014874 C188,26.9452521 188.299609,28.4212899 188.898828,29.8305651 C189.497933,31.2394433 190.307706,32.4538193 191.32809,33.4740903 C192.348361,34.4947017 193.563134,35.3041912 194.972013,35.9036366 C196.381061,36.5027983 197.857439,36.8023508 199.401204,36.8023508 C201.776693,36.8023508 203.930624,36.1326261 205.863166,34.794084 L211.417962,40.3325441 C211.806626,40.7427059 212.291832,40.9479286 212.875338,40.9479286 C213.436723,40.9479286 213.922836,40.7427626 214.332771,40.3325441 C214.742876,39.9224391 214.948099,39.4365525 214.948099,38.8751681 C214.948269,38.3032899 214.748548,37.8172332 214.34905,37.4177353 Z M204.526893,30.5266092 C203.107181,31.9465483 201.39875,32.6564895 199.401204,32.6564895 C197.403998,32.6564895 195.695567,31.9463782 194.275742,30.5266092 C192.855916,29.1068971 192.146032,27.3986933 192.146032,25.4011471 C192.146032,23.4039412 192.856086,21.6952269 194.275742,20.2756849 C195.695284,18.8558025 197.403998,18.1459748 199.401204,18.1459748 C201.398523,18.1459748 203.106954,18.8560861 204.526893,20.2756849 C205.946832,21.6952269 206.656716,23.4039412 206.656716,25.4011471 C206.656716,27.3986933 205.946605,29.1068971 204.526893,30.5266092 Z" id="Shape"></path>
                            </g>
                        </g>
                    </svg>
                </div>
                <!-- <label for="search">Search</label> -->
                <div class="input">
                    <input type="text" name="search" id="search" placeholder="Search for a recipe...">
                </div>
            </div>

        </div>

        <nav class="visually-hidden">                
            <!-- <div class="menu"> -->
                <ul>
                    <li><a href="#desc">Description</a></li>
                    <li><a href="#ingredients">Ingredients</a></li>
                    <li><a href="#steps">Steps</a></li>
                    <li><a href="#how-to">How To</a></li>
                    <li><a href="search.html">Find a Recipe</a></li>
                    <li><a href="search.html#results">I'm Feeling Lucky</a></li>
                </ul>
            <!-- </div> -->
        </nav>

    </div>

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
                        echo "<source srcset='{$recipeImgLink}/{$recipeRow['dir']}/{$recipeRow['heroImgLink']}'>";
                        echo "<img src='{$recipeImgLink}/{$recipeRow['dir']}/{$recipeRow['heroImgLink']}' alt='a picture'>";
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
                <h3>Kitchen Tool</h3>
                <hr>                
            </header>

            <div class="content">
                <picture>
                    <source srcset="<?php echo "{$howToImgLink}/{$kitchenRow['id']}/{$kitchenRow['imgLink1']}"; ?>">
                    <img src="<?php echo "{$howToImgLink}/{$kitchenRow['id']}/{$kitchenRow['imgLink1']}"; ?>" alt="Kitchen Tool">
                </picture>
                <figcaption>
                        <a href="#"><?php echo $kitchenRow['title']; ?></a>
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
                            echo "<source srcset='{$recipeImgLink}/{$recipeRow['dir']}/{$recipeRow['ingredientImgLink']}'>";
                            echo "<img src='{$recipeImgLink}/{$recipeRow['dir']}/{$recipeRow['ingredientImgLink']}' alt='Ingredients'>";
                        }
                    ?>
                </picture>

                <ul class="two-col">
                    <?php
                        mysqli_data_seek($resultRecipe, 0);
                        while($recipeRow = $resultRecipe->fetch_assoc()) {
                            $ingredientList = preg_split('/\R/', $recipeRow['ingredientList']);
                            foreach($ingredientList as $ingredient){
                                echo "<li>{$ingredient}</li>";
                            }
                        }
                    ?>
                </ul>
            </div>

        </div>

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
                        foreach($instructionList as $instruction){
                        ?>

                <div class="step">
                    <picture>
                        <source srcset="assets/img/0101_2PV1_Broccoli-Bucatini-Fettucine_18429_WEB_retina_feature.jpg">
                        <img src="assets/img/0101_2PV1_Broccoli-Bucatini-Fettucine_18429_WEB_retina_feature.jpg" alt="Step 1">
                    </picture>

                        <?php    
                            
                            $instructionNewlineList = explode('\r\n', $instruction);

                            foreach($instructionNewlineList as $instructionNewline){
                                
                                $instructionSplitList = explode(',,,', $instructionNewline);

                                if( count($instructionSplitList) > 1){
                                    echo "<header>";
                                    echo "<h4>" . trim($instructionSplitList[0]) . "</h4>";
                                    echo "</header>";

                                    echo "<p>" . trim($instructionSplitList[1]) . "</p>";                            
                                    
                                }else{
                                    echo "<p>" . trim($instructionSplitList[0]) . "</p>";                            

                                }                           
                            }
                            ?>
                </div> 
                <!-- close step -->

                            <?php
                        } //foreach step
                    } // this recipe row (sql)
                ?>                             

            </div>

        </div>
        <!-- close instructions -->

    </main>
<?php
    require_once('includes/_footer.php');
?>