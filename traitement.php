<?php
function ajouterOeuvre()
{
    if (empty($_POST['titre']) || empty($_POST['artiste']) || empty($_POST['description']) || empty($_POST['image'])
        || (strlen($_POST['description']) < 3) || !filter_var($_POST['image'], FILTER_VALIDATE_URL)) {
        header('Location: index.php');
    }

    // insertion dans la table 'oeuvres'
    $mysql = connexion();
    $mysql->prepare('INSERT INTO oeuvres(titre, artiste, description, image) VALUES (:titre, :artiste, :description, :image)')->execute([
        'titre' => $_POST['titre'],
        'artiste' => $_POST['artiste'],
        'description' => $_POST['description'],
        'image' => $_POST['image'],
    ]);
}