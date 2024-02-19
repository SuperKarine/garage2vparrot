<?php
//Déclaré la session et bdd pour bannir un membre
session_start();
$bdd = new PDO('mysql:host=localhost:8889;dbname=espace_admin;', 'root', 'root');
//je récupère l'identifiant qui a été mis dans l'url
if (isset($_GET['id']) and !empty($_GET['id'])) {

    //Affichage message erreur
    $getid = $_GET['id'];
    $recupUser = $bdd->prepare('SELECT * FROM connect WHERE id = ?');
    $recupUser->execute(array($getid));
    if ($recupUser->rowCount() > 0) {

        // création système pour banir l'utilisateur

        $bannirUser = $bdd->prepare('DELETE FROM connect WHERE id = ?');
        //Puis j'execute cette requête
        $bannirUser->execute(array($getid));

        // je dirige l'utilisateur vers la page de membres
        header('Location: membres.php');

    } else {
        echo "Aucun membres n'a été trouvé";
    }
} else {
    echo "L'identifiant n'a pas été récupéré";
}
?>