<?php
$serveur = "localhost:8889";
$utilisateur = "root";
$motDePasse = "root";
$nomBaseDeDonnees = "espace_Admin";
// Connexion à la base de données
$connexion = mysqli_connect($serveur, $utilisateur, $motDePasse, $nomBaseDeDonnees);

// Je vérifie ma connexion
if (!$connexion) {
    die("Erreur de connexion à la base de données : " . mysqli_connect_error());
} else {
    echo "Connexion réussie à la base de données";
}

//Je ferme la connexion
mysqli_close($connexion);
?>

