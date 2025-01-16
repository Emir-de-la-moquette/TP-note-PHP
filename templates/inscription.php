<script src="../src/popup_valid.js"></script>

<?php
// Fichier : register.php
session_start();
require_once __DIR__."/../src/bd.php"; // Inclure le modèle contenant la fonction `verifierUtilisateur`


// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $email = $_POST['email'] ?? null;
    $mdp = $_POST['password'] ?? null;

    // Validation de base
    if ($email && $mdp) {
        try {
            if (isUtilisateurExistant($email, $mdp)) {
                echo '<script>showPopup("Cet email est déjà utilisé.", false);</script>';
            } else {
                // Insérer les données dans la table "users"
                // function insertAdherent($nom, $prenom, $tel, $mail, $taille, $poids, $dateInscription, $mdp){
                insertUser($email, $mdp);

                $_SESSION['user']=$email;

                echo '<script>showPopup("Inscription réussie !", true);</script>';
                header("Location: login.php");
                exit();
            }
        } catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    } else {
        echo '<script>showPopup("Veuillez remplir tous les champs obligatoires.", false);</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/login.css">
    <link rel="stylesheet" href="../src/popup_valid.css">
    <title>Inscription</title>
</head>
<body>
    <main class="login-container">
        <form id="registerForm" method="POST">
            <h1>Inscription</h1>

            <div class="form-group">
                <label for="email">eMail *</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Mot de passe *</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="form-group" id="btnform">
                <button type="submit">S'inscrire</button>
            </div>
        </form>
    </main>
</body>
</html>
