<?php
session_start();
require_once __DIR__."/../src/bd.php"; // Inclure le modèle contenant la fonction `verifierUtilisateur`
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats du Quiz</title>
    <link rel="stylesheet" href="../style/home.css">
    <link rel="stylesheet" href="../style/result.css">
</head>
<body>
    <aside class="sidebar">
        <?php include "LatBarre.php"; ?>
    </aside>

    <main>
        <h1>Quiz terminé !</h1>
        <p>Votre score final est :</p>
        <div class="result">
            <span class="score"><?php echo $_SESSION['score']; ?></span>
        </div>
        <div class="actions">
            <a href="home.php" class="button">Retour à l'accueil</a>
            <a href="pageQuiz.php/?name=<?=$_SESSION['Qname']?>" class="button">Refaire le quiz</a>
        </div>
        <?php 
        try {
            ajouterResultat($_SESSION['user'], $_SESSION['idQ'], (int)$_SESSION['score']);
        } catch(Exception $e){}
        $_SESSION['num_q']=0;
        $_SESSION['score']=0;
        ?>
    </main>
</body>
</html>
