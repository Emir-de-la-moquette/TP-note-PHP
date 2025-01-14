<?php
$pdo = new PDO('sqlite:../data/bd/db.sqlite');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

