<?php
// Démarrage de la session
session_start();

try
{
    // On se connecte à la base de donnée MySQL, ici tp_openclassrooms
    $bdd = new PDO('mysql:host=localhost;dbname=tp_openclassrooms;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : ' . $e->getMessage());
}

// On récupère tout le contenu de la table minichat
$reponse = $bdd->query('SELECT * FROM minichat');
$message = $reponse->fetch();

// Redirection vers minichat.php
header('Location: minichat.php');
?>