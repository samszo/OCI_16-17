<?php

try {
    /*
     *  la connexion à la base de données miniChat
     */
    $connect = new PDO('mysql:host=localhost;dbname=miniChat', "root", "");
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
?>

