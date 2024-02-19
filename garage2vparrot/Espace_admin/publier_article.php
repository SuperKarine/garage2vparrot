<?php
//Sécurité
session_start();
$bdd = new PDO('mysql:host=localhost:8889;dbname=espace_admin;', 'root', 'root');
if (!$_SESSION['mdp']) {
    header('Location: connexion.php');
}

//Il faut créer la table article dans la bdd
if (isset($_POST['envoi'])) {
    if (!empty($_POST['marque']) and !empty($_POST['prix'])) {
        $marque = htmlspecialchars($_POST['marque']);
//Pour mettre des sauts de lignes
        $prix = nl2br(htmlspecialchars($_POST['prix']));
//insérer du contenu dans la nouvelle bdd en créant une nouvelle requête

        $insererArticle = $bdd->prepare('INSERT INTO voitures(marque, prix)VALUES(?, ?)');
        $insererArticle->excute(array($marque, $prix));

        echo "L'article a bien été envoyé"
        } else {
        echo "Veuillez compléter tous les champs...";
    }

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Publier un article</title>
    <meta charset="UTF-8">

</head>
<body>
<form method="POST" action="">
    <input type="text" name="marque">
    <br>
    <textarea name="prix"></textarea>
    <br>
    <input type="submit" name="envoi">

</form>

</body>

</html>

