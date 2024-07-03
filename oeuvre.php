<?php
require 'header.php';
require 'bdd.php';

// Si l'URL ne contient pas d'id, on redirige sur la page d'accueil
if (empty($_GET['id'])) {
    header('Location: index.php');
    exit;
}
$id = (int) $_GET['id'];

$mysql = connexion();
$res = $mysql->prepare('SELECT * FROM oeuvres WHERE id = :id');
$res->execute(['id' => $id]);
$oeuvre = $res->fetch(PDO::FETCH_ASSOC);

// Si aucune oeuvre trouvée, on redirige vers la page d'accueil
if ($oeuvre === false) {
    header('Location: index.php');
    exit;
}
?>

<article id="detail-oeuvre">
    <div id="img-oeuvre">
        <img src="<?= htmlspecialchars($oeuvre['image']) ?>" alt="<?= htmlspecialchars($oeuvre['titre']) ?>">
    </div>
    <div id="contenu-oeuvre">
        <h1><?= htmlspecialchars($oeuvre['titre']) ?></h1>
        <p class="description"><?= htmlspecialchars($oeuvre['artiste']) ?></p>
        <p class="description-complete">
            <?= htmlspecialchars($oeuvre['description']) ?>
        </p>
    </div>
</article>

<?php require 'footer.php'; ?>
