<?php
session_start();
echo "<h1>Quiz terminé !</h1>";
echo "<p>Votre score final est : " . $_SESSION['score'] . "</p>";
// session_destroy();
?>