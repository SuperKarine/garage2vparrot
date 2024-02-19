<?php
//Je vais déclarer ma bdd
$bdd = new PDO('mysql:host=localhost:8889;dbname=espace_admin;', 'root', 'root');
//Je vérifie si un identifiant à été rentré en parallèle dans les paramètres url avec get id
if (isset($_GET['id']) and !empty($_GET['id'])) {
    //Je vais stocké l'id dans une nouvelle variable getid
    $getid = $_GET['id'];
    //Je vérifie dans la bdd si un article possède l'identifiant rentré en paramètre je lance une requête SELECT
    $recupArticle = $bdd->prepare('SELECT * FROM voitures WHERE id = ?');
    //Puis j'execute la requête
    $recupArticle->execute(array($getid));
    //Puis je vérifie si cette article existe
    if ($recupArticle->rowCount() > 0) {

        //Je vais effectuer une requête qui va permettre de supprimer l'article

        $deleteArticle = $bdd->prepare('DELETE FROM voitures WHERE id = ?');
        //Cet id va être récupérer
        $deleteArticle->execute(array($getid));
        //Une fois que l'article à été supprimé, je reviens dans mon fichier article.php
        header('Location: articles.php');

        //Puis j'execute mon code si 0 article, message d'erreur

    } else {
        echo "Aucun article trouvé";
    }

} else {
    //si aucun identifiant n'a été passé en paramètre, je mets un echo de message d'erreur
    echo "Aucun identifiant trouvé";
}
?>

