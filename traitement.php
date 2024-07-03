<?php
require 'bdd.php';

if (empty($_POST['titre']) || empty($_POST['artiste']) || empty($_POST['description']) || empty($_POST['image'])
    || (strlen($_POST['description']) < 3) || !filter_var($_POST['image'], FILTER_VALIDATE_URL)) {
    header('Location: ajouter.php?statut=0');
    exit;
}

// insertion dans la table 'oeuvres'
// pas d'utilisation de htmlspecialchars() ici, il est utilisé après récupération des données, avant insertion sur les pages web (dans index.php et oeuvre.php)
$mysql = connexion();
$res = $mysql->prepare('INSERT INTO oeuvres(titre, artiste, description, image) VALUES (:titre, :artiste, :description, :image)');
if ($res->execute([
    'titre' => $_POST['titre'],
    'artiste' => $_POST['artiste'],
    'description' => $_POST['description'],
    'image' => $_POST['image'],
])) {
    header('Location: ajouter.php?statut=1');
    exit;
}
header('Location: ajouter.php?statut=0');
