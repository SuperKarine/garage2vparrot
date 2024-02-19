<?php
//Je récupère la bdd
$bdd = new PDO('mysql:host=localhost:8889;dbname=espace_admin;', 'root', 'root');
//Je vais récupérer l'id qui à été récupéré dans l'url de la page et je vérifie si cet id n'est pas vide
if (isset($_GET['id']) and !empty($_GET['id'])) {

    // et je déclare un else qui va me permettre d'afficher le message d'erreur si aucun id n'a été passé en paramètre
    //Je vais déclarer une variable getid pour stocker cet identifiant que je viens de récupérer

    $getid = $_GET['id'];

    //Je vais récupérer l'article qui correspond à l'id récupéré dans les paramètres de l'url
    //Je récupère cet id et en fonction de cet id récupéré je vérifie si cet article existe bien et je vais envoyer une requête update qui va
    //permettre de modifier la description de l'article en question
    //je récupère toutes les informations qui correspondent  à l'article que possède l'id
    //je récupère l'article avec une requête préparer et je sélectionne avec la requête SELECToù l'id correspond à l'id récup dans l'url

    $recupArticle = $bdd->prepare('SELECT * FROM voitures WHERE id = ?');
    //J'execute cette requête

    $recupArticle->execute(array($getid));

    //si cet article existe

    if ($recupArticle->rowCount() > 0) {

        // et on execute le code et on affiche un message d'erreur

        //je vais stocké toutes les infos de l'article récupéré à l'intérieur d'une variable
        //et je vais récupérer le titre et la description

        $articleInfos = $recupArticle->fetch();
        $titre = $articleInfos['titre'];

        //je vais utiliser la fonction str_replace pour remplacer les <br> par rien du tout

        $description = str_replace('<br />', '', $articleInfos['description']);


        //Pour vérifier si l'utilisateur clique sur le bouton

        if (isset($_POST['valider'])) {

            //Système de modification
            //je récupère toutes les valeus saisies par l'utilisateur en créant une nouvelle variable de titre_saisi
            // qui est le titre saisi par l'utilisateur dans le formulaire

            $titre_saisi = htmlspecialchars($_POST['titre']);

            // et la description saisie par l'utilisateur

            $description_saisie = nl2br(htmlspecialchars($_POST['description']));

            //une fois saisie toutes les données rentrées par l'utilisateur, je vais effectuer une requête au niveau de la bdd
            // je vais créer une requête de modification
            //je souhaite modifier les articles et la description

            $updateArticle = $bdd->prepare('UPDATE voitures SET titre = ?, description = ? WHERE id = ?');

            //Puis j'execute cette nouvelle requête et je mets l'ancien titre saisi au nouveau titre saisi par l'utilisateur
            //et l'identifiant c'est celui récupéré par l'url

            $updateArticle->execute(array($titre_saisi, $description_saisie, $getid));

            //je redirige l'utilisateur vers la page des articles

            header('Location: articles.php');
        }


    } else {
        echo "Aucun article trouvé";
    }


} else {
    echo "Aucun identifiant trouvé";

}
//Je créer un formulaire en html qui va permettre de modifier cet article
?>

<!DOCTYPE html>
<html>
<head>

    <title>Modifier l'article</title>
    <meta charset="utf-8">
</head>
<body>
<form method="POST" action="">
    <input type="text" name="titre" value="<?= $titre; ?>">
    <br>
    <!--Je vais mettre une description-->
    <textarea name="description"
    <?= $description; ?></textarea>
    <br><br>
    <!--Je crée un bouton submit qui va permettre d'envoyer toutes les données-->
    <input type="submit" name="valider">
</form>

</body>

</html>



