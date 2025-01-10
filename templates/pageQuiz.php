<?php 
require_once '../src/JSONloader.php';
session_start();
$_SESSION['num_q']=0;
$_SESSION['page']="quiz";

if(!empty($_GET['name'])){
    $quests = getQuestions();
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <link rel="stylesheet" href="/style/home.css">
</head>
<body>
    <aside class="sidebar">
        <?php include "LatBarre.php"?>
    </aside>

    <main>
        <h1>Bienvenue sur le quiz !</h1>
    </main>
</body>
</html>