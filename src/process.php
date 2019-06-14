<?php
require_once('includes/_db.php');

if (isset($_POST["q"])) {
    $userQuery = $_POST["q"];
    $userQuery = mysqli_real_escape_string($connection, $userQuery);
} else {
    $userQuery = "User did not enter a query";
    //should probably do something here
}

$queryRecipe = "SELECT title,subtitle,dir,id,meat FROM recipe 
    WHERE title LIKE '%{$userQuery}%' 
    OR subtitle LIKE '%{$userQuery}%'
    OR description LIKE '%{$userQuery}%'
    OR ingredientList LIKE '%{$userQuery}%'
    ORDER BY title
    ";

$resultRecipe = mysqli_query($connection, $queryRecipe);
if (!$resultRecipe) {
    die("Database query failed.");
}

$res = [
    "rows" => []
];

$i = 0;
while($row = $resultRecipe->fetch_assoc()) {
    $res['rows'][$i] = [
        "title" => $row['title'],
        "subtitle" => $row['subtitle'],
        "dir" => $row['dir'],
        "id" => $row['id'],
        "meat" => $row['meat']
    ];
    $i++;
}

array_push($res, ["userQuery" => $userQuery]);

// for testing
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
mysqli_free_result($resultRecipe);
?>