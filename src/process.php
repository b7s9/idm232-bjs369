<?php
require_once('includes/_db.php');

//sanitize the user query
//make the SQL query 
//put returned rows into an associative 2d array row[0][title],row[0][description]; row[1][title] etc.
//send back json encoded array

if (isset($_POST["q"])) {
    $userQuery = $_POST["q"];
    $userQuery = mysqli_real_escape_string($connection, $userQuery);
} else {
    $userQuery = "User did not enter a query";
}

$queryRecipe = "SELECT title,subtitle FROM recipe 
    id LIKE '%058bec3a9c677f814e6b92bb4125bfe0%'";

$resultRecipe = mysqli_query($connection, $queryRecipe);
if (!$resultRecipe) {
    die("Database query failed.");
}

$res = [
    "rows" => []
];

$i = 0;
while($row = $resultRecipe->fetch_assoc()) {
    $res['rows'][i] = [
        "title" => $row['title'],
        "subtitle" => $row['subtitle']
    ];
    $i++;
}

// array_push($res, ["userQuery" => $userQuery]);

// $res = [
//     "rows" => [
//         [
//             "title" => "Roasted Duck",
//             "subtitle" => "with onions and shit"
//         ],
//         [
//             "title" => "Rainbow Cake",
//             "subtitle" => "with Baltimore Flair"
//         ]
//     ],
//     "userQuery" => $userQuery
// ];

echo json_encode($res);

mysqli_close($connection);
// mysqli_free_result($result);
?>