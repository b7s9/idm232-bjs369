<?php
    require_once('includes/_header.php');
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

                    <a href="recipe.html">
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
                    </a>

                    <a href="recipe.html">
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
        
                    <a href="recipe.html">
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
                    
                    <a href="recipe.html">
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
                    </a>

            </div>
            
        </ul>
    </main>
<?php
    require_once('includes/_footer.php');
?>