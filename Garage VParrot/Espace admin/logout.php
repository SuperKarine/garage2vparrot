//page de deconnexion tout est stocker dans array et je détruis tout avec detroy
<?php
session_start();
$_SESSION = array();
session_destroy();
header('Location: connexion.php');
?>