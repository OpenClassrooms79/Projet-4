<?php
require 'header.php';
require 'bdd.php';
if (isset($_GET['statut'])) {
    if ($_GET['statut'] == 0) {
        echo "⚠️ Une erreur est survenue lors de l'ajout de l'œuvre dans la base de données.";
    } else {
        echo "✅ L'œuvre d'art a été correctement enregistrée dans la base de données.";
    }
}
?>

<form action="traitement.php" method="POST">
    <div class="champ-formulaire">
        <label for="titre">Titre de l'œuvre</label>
        <input type="text" name="titre" id="titre">
    </div>
    <div class="champ-formulaire">
        <label for="artiste">Auteur de l'œuvre</label>
        <input type="text" name="artiste" id="artiste">
    </div>
    <div class="champ-formulaire">
        <label for="image">URL de l'image</label>
        <input type="url" name="image" id="image">
    </div>
    <div class="champ-formulaire">
        <label for="description">Description</label>
        <textarea name="description" id="description"></textarea>
    </div>

    <input type="submit" value="Valider" name="submit">
</form>

<?php require 'footer.php'; ?>
