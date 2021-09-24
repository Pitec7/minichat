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

// On récupère le message insérer par l'utilisateur

if (isset($_POST['pseudo']) AND isset($_POST['message']))
{
    $pseudonyme = htmlspecialchars($_POST['pseudo']);
    $message_laisse = htmlspecialchars($_POST['message']);

    // On insère le message dans la base de donnée
    $req = $bdd->prepare('INSERT INTO minichat(pseudo, message) VALUES(:pseudo, :message)');
    $req->execute(array(
        'pseudo' => $pseudonyme,
        'message' => $message_laisse,
    ));
}

//On récupère tout le contenu de la table minichat dans l'ordre décroissant selon ID
$reponse = $bdd->query('SELECT * FROM minichat ORDER BY ID DESC');

// On enregistre les 10 derniers messages dans l'array "$_SESSION['message']" qui contient des array "[$nombre_message]"

$nombre_message = 1;

while ($message = $reponse->fetch())
{    
    if ($nombre_message <= 10)
    {
        $_SESSION['message'][$nombre_message] = $message;
    }
    
    $nombre_message ++;
}

/*

2e méthode:

$reponse = $bdd->query('SELECT * FROM minichat ORDER BY ID DESC LIMIT 0,10');

$nombre_message = 1;

while ($message = $reponse->fetch())
{
    
    $_SESSION['message'][$nombre_message] = $message;
    $nombre_message ++;
}
*/

// On termine le traitement de la requête
$reponse->closeCursor();

/*
while ($message = $reponse->fetch())
{
    while ($message['ID'] == $id)
    {
        $_SESSION['ID'] = $message['ID'];
        $_SESSION['pseudo'] = $message['pseudo'];
        $_SESSION['message'] = $message['message'];
    }
}
*/

// Redirection vers minichat.php
header('Location: minichat.php');
?>