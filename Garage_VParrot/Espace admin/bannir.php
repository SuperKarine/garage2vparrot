//Déclaré la session et bdd pour bannir un membre
<?php
session_start();
$bdd =new PDO('mysql:host=localhost;dbname=espace_admin;', 'root', 'root');
//je récupère l'identifiant qui a été mis dans l'url
if(isset($_GET['id']) AND !empty($_GET['id'])){
    //Affichage message erreur
}else{
    echo "L'identifiant n'a pas été récupéré";
}

?>