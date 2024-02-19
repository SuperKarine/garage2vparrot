<?php
//Sécurité
session_start();
$bdd = new PDO('mysql:host=localhost:8889;dbname=espace_admin;', 'root', 'root');

if (isset($_GET['id']) and !empty($_GET['id'])) {

} else {
    echo "Aucun identifiant trouvé"
    }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"

    <title>Afficher tous les articles</title>
</head>
<body>
<?php
//Je fais une requête pour récupérer tous les articles dans la bdd
//Requête query pour selectionner tous les articles et non en fonction d'un identifiant sinon prendre prepare
//il faudra changer le select * from
$recupArticle = $bdd->query('SELECT * FROM voitures');
while ($article = $recupArticle->fetch()) {
    ?>
    <!-- Je vais afficher la marque et le prix de chaque voiture-->
    <!-- Et pour distinguer les articles les uns des autres, je vais styliser la div avec style-->
    <div class="article" style="border: 1px solid black;">
        <h1><?= $article['marque']; ?></h1>
        <!--Pour afficher la description-->


        <p><?= $article['prix']; ?></p>

        <!--Je vais créer un système pour suppression d'article-->
        <!--Je vais diriger le bouton au niveau de la page suppression article-->
        <!--Et je vais passer l'url dans l'identifaint de l'article-->

        <a href="supprimer_article.php?id=<?= $article['id']; ?>">
            <button style="color:white; background-color:red; margin-bottom: 10px;">Supprimer l'article</button>
        </a>

        <!--Je vais créer un bouton pour modifier l'article-->
        <a href="modifier_article.php?id=<?= $article['id']; ?>">
            <button style="color:black; background-color:  yellow; margin-bottom: 10px;">Modifier l'article</button>
        </a>

    </div>
    <br>

    <?php
}

?>


</body>
</html>

