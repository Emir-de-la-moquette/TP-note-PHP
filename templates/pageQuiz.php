<?php 
declare(strict_types=1);
require_once __DIR__.'/../src/JSONloader.php';
require __DIR__.'/../Classes/autoLoader.php';


session_start();
if (!isset($_SESSION['num_q']) or $_SESSION['num_q'] == 0) {
    $_SESSION['num_q'] = 1; // Initialise uniquement si non défini
}
$_SESSION['page']="quiz";

if(!empty($_GET['name'])){
    $quests = getQuestions();
    $names = getNomQuestions();
}


AutoLoader::register();


use tools\types\Radio;
use tools\types\Text;
use tools\types\CheckBox;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // echo "feur";
    $currentQuestion = $quests[$_SESSION['num_q']-1];
    // echo $_SESSION['num_q']-1;
    // echo PHP_EOL;
    // var_dump($currentQuestion);
    // echo PHP_EOL;

    switch ($currentQuestion['type']) {
        case 'text':
            $questionObj = new Text($currentQuestion['nom'], $currentQuestion['text'], $currentQuestion['score'], $currentQuestion['answers'][0]);
            $score = $questionObj->comparerReponse($_POST[$currentQuestion['nom']] ?? '');
            // var_dump($questionObj);
            break;
        case 'radio':
            $questionObj = new Radio($currentQuestion['nom'], $currentQuestion['text'], $currentQuestion['score'], $currentQuestion['choices'], $currentQuestion['answers'][0]);
            $score = $questionObj->comparerReponse($_POST[$currentQuestion['nom']] ?? '');
            // var_dump($questionObj);
            break;
        case 'checkbox':
            $questionObj = new CheckBox($currentQuestion['nom'], $currentQuestion['text'], $currentQuestion['score'], $currentQuestion['choices'], $currentQuestion['answers']);
            $score = $questionObj->comparerReponse([$_POST[$currentQuestion['nom']]] ?? []);
            // var_dump($questionObj);
            break;
    }

    $_SESSION['score'] += $score;

    // Passe à la question suivante
    $_SESSION['num_q']++;
    if ($_SESSION['num_q'] > count($quests)) {
        // Redirection vers la page des résultats si le quiz est terminé
        header('Location: ../result.php');
        exit();
    }
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
        <h1>question <?php echo $_SESSION['num_q']; echo " - "; echo $names[$_SESSION['num_q']-1];?></h1>
        <form method="POST">
            <?php 
            $feur = $quests[$_SESSION['num_q']-1];
            // var_dump($feur);
            echo "question : ".$_SESSION['num_q'];
            echo "  score : ".$_SESSION['score'];
            switch($feur['type']){
                case 'text':
                    $question_pour_un_champion = new Text($feur['nom'],$feur['text'],$feur['score'],$feur['answers'][0]);
                    break;
                case 'radio':
                    $question_pour_un_champion = new Radio($feur['nom'],$feur['text'],$feur['score'],$feur['choices'],$feur['answers'][0]);
                    break;
                case 'checkbox':
                    $question_pour_un_champion = new CheckBox($feur['nom'],$feur['text'],$feur['score'],$feur['choices'],$feur['answers']);
                    break;
            }
            // $question_radio = new Radio('questionRadio','Qui es-tu ?',2,['moi','twa','ui','UwU'],'ui');
            echo $question_pour_un_champion;
            ?> 
            <div class="form-group" id="btnform">
                <button type="submit">Valider la réponse</button>
            </div>
        </form>
    </main>
</body>
</html>