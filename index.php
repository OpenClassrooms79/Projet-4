<?php
require 'bdd.php';
require 'header.php';
?>
<div id="liste-oeuvres">
    <?php
    $mysql = connexion();
    $mysql->query('SELECT * FROM oeuvres');
    $oeuvres = $mysql->fetchAll(PDO::FETCH_ASSOC);
    foreach ($oeuvres as $oeuvre): ?>
        <article class="oeuvre">
            <a href="oeuvre.php?id=<?= $oeuvre['id'] ?>">
                <img src="<?= $oeuvre['image'] ?>" alt="<?= $oeuvre['titre'] ?>">
                <h2><?= $oeuvre['titre'] ?></h2>
                <p class="description"><?= $oeuvre['artiste'] ?></p>
            </a>
        </article>
    <?php endforeach; ?>
</div>
<?php require 'footer.php'; ?>
