<?php
//Création des membres
//Sécurité
session_start();
$bdd = new PDO('mysql:host=localhost:8889;dbname=espace_admin;', 'root', 'root');
if (!$_SESSION['mdp']) {
    header('Location: connexion.php');
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Afficher les membres</title>
</head>

<body>
<!--Afficher tous les membres-->
<!-- Lancement de requête dans la bdd pour récupérer tous les membres en bdd et dans la boucle je récupères tous les membres de cette bdd
récupéré grâce à la rêquête de la table connect  et banir les membres avec leur id-->

<?php
$recupUsers = $bdd->query('SELECT * FROM connect');
while ($user = $recupUsers->fetch()) {
    ?>
    <p><?= $user['pseudo']; ?></p><a href="bannir.php?id=<?= $user['id']; ?>" style="color:red; text-decoration: none;">Bannir
        le membre</a></p>
    <?php


}
?>
<!--Fin d'afficher tous les membres-->

</body>
</html>

