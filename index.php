<?php
require 'bdd.php';
require 'header.php';
?>
<div id="liste-oeuvres">
    <?php
    $mysql = connexion();
    $res = $mysql->query('SELECT * FROM oeuvres');
    $oeuvres = $res->fetchAll(PDO::FETCH_ASSOC);
    foreach ($oeuvres as $oeuvre): ?>
        <article class="oeuvre">
            <a href="oeuvre.php?id=<?= $oeuvre['id'] ?>">
                <img src="<?= htmlspecialchars($oeuvre['image']) ?>" alt="<?= htmlspecialchars($oeuvre['titre']) ?>">
                <h2><?= htmlspecialchars($oeuvre['titre']) ?></h2>
                <p class="description"><?= htmlspecialchars($oeuvre['artiste']) ?></p>
            </a>
        </article>
    <?php endforeach; ?>
</div>
<?php require 'footer.php'; ?>
