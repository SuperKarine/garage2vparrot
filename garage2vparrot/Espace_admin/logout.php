<?php
//page de deconnexion tout est stocké dans array et je détruis tout avec destroy
//Sécurité
session_start();
$_SESSION = array();
session_destroy();
header('Location: connexion.php');

//Redirection après avoir terminé les opérations nécessaires
header('Location: connexion.php');
exit();
?>