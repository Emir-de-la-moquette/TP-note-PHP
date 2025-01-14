<?php 
session_start();
$_SESSION['num_q']=0;
$_SESSION['score']=0;
$_SESSION['page']="home";

$getfiles = array_diff(scandir(__DIR__."/../data/quiz/"), array('.', '..'));
$files = array();
foreach ($getfiles as $file) {
    if (pathinfo($file, PATHINFO_EXTENSION)=="json"){
        array_push($files, pathinfo($file, PATHINFO_FILENAME));
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <link rel="stylesheet" href="../style/home.css">
</head>
<body>
    <aside class="sidebar">
        <?php include "LatBarre.php" ?>
    </aside>

    <main>
        <h1>Bienvenue sur le quiz !</h1>
        <h2>choississez un quiz :</h2>
        <div class="fichiers">
            <?php 
            $int = 0;
            foreach($files as $quiz){
                $int += 1;
                echo '<a href="./pageQuiz.php/?name='.$quiz.'.json"><p>'.$quiz.' - composé de '.$int.' questions </p></a>';
            }
            ?>
        </div>
    </main>
</body>
</html>