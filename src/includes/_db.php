<?php
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "idm232";
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    if (mysqli_connect_errno()) {
        die("Database connection failed: " .
          mysqli_connect_error() .
          " (" . mysqli_connect_errno() . ")"
        );
    }

    //------------
    // Get recipe
    // $queryRecipe = "SELECT * FROM recipe WHERE id LIKE '0da65b64c460b6887dc3109e77f1e481'";
    // $resultRecipe = mysqli_query($connection, $queryRecipe);
    // if (!$resultRecipe) {
    //     die("Database query failed.");
    // }
    // while($row = $resultRecipe->fetch_assoc()) {
        
    //     // get associated kitchen tool
    //     echo $row['kitchenToolid'];
    //     echo "<hr>";

    //     $queryKitchenTool = "SELECT * FROM kitchenTool WHERE id={$row['kitchenToolid']}";
    //     $resultKitchenTool = mysqli_query($connection, $queryKitchenTool);
    //     if (!$resultKitchenTool) {
    //         die("Database query failed.");
    //     }
    //     while($kitchenRow = $resultKitchenTool->fetch_assoc()) {
    //         var_dump($kitchenRow);
    //         echo "<hr>";
    //     }

    //     // get associated howTo
    //     echo $row['howToid'];
    //     echo "<hr>";

    //     $queryHowTo = "SELECT * FROM kitchenTool WHERE id={$row['howToid']}";
    //     $resultHowTo = mysqli_query($connection, $queryHowTo);
    //     if (!$resultHowTo) {
    //         die("Database query failed.");
    //     }
    //     while($howRow = $resultHowTo->fetch_assoc()) {
    //         var_dump($howRow);
    //         echo "<hr>";
    //     }
        
    // }

    //------------

?>