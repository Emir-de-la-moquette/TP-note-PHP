<?php
// Start session and destroy it
session_start();
$_SESSION['loggedin']==false;
session_destroy();
header("Location: ".__DIR__."/../templates/home.php");
exit();
?>
