<?php
require_once __DIR__.'/../src/JSONloader.php';
if(!empty($_GET['name'])){
    $quests = getQuestions($_GET['name']);
    $names = getNomQuestions($_GET['name']);
}

session_start();

?>

<head>
    <link rel="stylesheet" href="/style/LatBarre.css">
</head>

<div class="logo">
    <img src="/style/images/logo.png" alt="Logo">
</div>
<?php

if ($_SESSION['page']=="home" ){
    if ($_SESSION['loggedin'] == false){echo '<a href="./login.php">se connecter</a>';}
    else {echo '<a href="../src/logout.php">se déconnecter</a>';}
}

if ($_SESSION['page']=="quiz"){
    echo '<div class="nom">
        <h2>'.$_GET['name'].'</h2>
    </div>';
    echo '<a href=/templates/home.php>
    <div class="home">
    <img src="/style/images/maison.png" alt="home">
    </div>
    </a>';
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