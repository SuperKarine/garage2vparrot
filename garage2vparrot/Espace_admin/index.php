<?php
//page d'accueil de l'administrateur
//Sécurité
session_start();

if (!$_SESSION['mdp'])
    header('Location: connexion.php');

?>


<!DOCTYPE html>
<html lang="fr">
<!--Je vais mettre un lien pour être rediriger vers l'espace membres-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
<a href="membres.php">Afficher tous les membres</a>
<a href="publier_article.php">Publier un nouvel article</a>
<a href="article.php">Afficher tous les articles</a>

</body>
</html>
