<?php
require_once '../src/JSONloader.php';
$quests = getQuestions();
$names = getNomQuestions();

session_start();

?>

<head>
    <link rel="stylesheet" href="/style/LatBarre.css">
</head>

<div class="logo">
    <img src="/style/images/logo.png" alt="Logo">
</div>
<?php

if ($_SESSION['page']=="quiz"){
    echo '<div class="nom">
        <h2>Nom Quiz</h2>
    </div>';
}
?>

<nav>
    <ul>
        <?php
        if ($_SESSION['page']=="quiz"){
            $int = 0;
            foreach($names as $quest){
                $int += 1;
                if ($_SESSION["num_q"]>$int) {
                    echo '<li style="color:rgb(255, 255, 255);"> Question '.$int.' - '.$quest.'</li>';
                }
                elseif ($_SESSION["num_q"]==$int){
                    echo '<li style="color:rgb(255, 255, 255); font-weight:bold;"> Question '.$int.' - '.$quest.'</li>';
                }
                else {
                    echo '<li style="color:rgb(125, 125, 125);"> Question '.$int.' - '.$quest.'</li>';
                }
                
            }
        }
        ?>
    </ul>
</nav>