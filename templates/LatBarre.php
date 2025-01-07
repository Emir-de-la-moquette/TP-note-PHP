<?php
require_once '../src/JSONloader.php';
$quests = getQuestions();
$names = getNomQuestions();

?>

<head>
    <link rel="stylesheet" href="../style/LatBarre.css">
</head>

<div class="logo">
    <img src="../style/images/logo.png" alt="Logo">
</div>
<div class="nom">
    <h2>Nom Quiz</h2>
</div>
<nav>
    <ul>
        <?php
        $int = 0;
        foreach($names as $quest){
            $int += 1;
            echo '<li style="color:rgb(255, 255, 255);"> Question '.$int.' - '.$quest.'</li>';
        }
        ?>
    </ul>
</nav>