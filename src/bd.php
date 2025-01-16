<?php
declare(strict_types=1);

$pdo = new PDO('sqlite:'.__DIR__.'/../data/bd/db.sqlite');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function recupererChoix(string $nomQuestion):array{
    global $pdo;
    $requete = "SELECT * FROM CHOIX WHERE nomQuestion=?";
    $stmt = $pdo->prepare($requete);
    $stmt->execute([$nomQuestion]);

    $choixBrut = $stmt->fetchAll();
    $choixPropre = [];

    for ($i=0; $i < count($choixBrut); $i++) {
        array_push($choixPropre,$choixBrut[$i]['choix']);
    }
    return $choixPropre;
}

function recupererCorriger(string $nomQuestion):array{
    global $pdo;
    $requete = "SELECT * FROM CORRIGER WHERE nomQuestion=?";
    $stmt = $pdo->prepare($requete);
    $stmt->execute([$nomQuestion]);

    $reponseBrut = $stmt->fetchAll();
    $reponsePropre = [];

    for ($i=0; $i < count($reponseBrut); $i++) {
        array_push($reponsePropre,$reponseBrut[$i]['reponse']);
    }
    return $reponsePropre;
}


function chargerQuestion(int $idQuiz):array{
    global $pdo;

    $requete = "SELECT * FROM QUIZ NATURAL JOIN CONTENIR NATURAL JOIN QUESTION WHERE idQuiz=?";
    $stmt = $pdo->prepare($requete);
    $stmt->execute([$idQuiz]);

    $quizBrut = $stmt->fetchAll();

    $quizPropre = [];
    for ($i=0; $i < count($quizBrut); $i++) {
        $choix = recupererChoix($quizBrut[$i]['nomQuestion']);
        $corriger = recupererCorriger($quizBrut[$i]['nomQuestion']);
        array_push($choix,$corriger);
        array_push($quizPropre,[['nom'=>$quizBrut[$i]['nomQuestion'],
                                    'type'=>$quizBrut[$i]['types'],
                                    'text'=>$quizBrut[$i]['texte'],
                                    'choices'=>$choix,
                                    'answers'=>$corriger,
                                    'score'=>$quizBrut[$i]['score']]]);
    }
    return $quizPropre;
}

function chargerNom(int $id):string{
    global $pdo;

    $requete = "SELECT * FROM QUIZ WHERE idQuiz=?";
    $stmt = $pdo->prepare($requete);
    $stmt->execute([$id]);

    $quizBrut = $stmt->fetch();
    return $quizBrut["nomQuiz"];
}


?>
