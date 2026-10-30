<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($recept['titel']) ?></title>
    <link rel="stylesheet" href="../CSS/Home.css">
    <script src="../scripts/home.js" defer></script>
</head>
<body>
    <header class="topbar">
        <div class="topbar-left">
            <button class="menu-button" id="menuButton" aria-label="Open menu" aria-expanded="false">
                <span></span>
            </button>

            <?php $menuBasis = '../'; include __DIR__ . '/../includes/menu.php'; ?>
        </div>

        <div class="brand">Ontkoking</div>
        <div class="footer">
            <div class="footer-item">Contact</div>
            <div class="footer-item">Privacy</div>
            <div class="footer-item">Terms</div>
        </div>
    </header>

    <div class="content">
        <div class="card">
            <h1><?= e($recept['titel']) ?></h1>
            <p>door <?= e($recept['gebruikersnaam']) ?></p>
            <?php if ($recept['foto']): ?>
            <img src="../<?= e($recept['foto']) ?>" alt="" style="width: 100%;">
            <?php endif; ?>

            <h3>ingredienten</h3>
            <p><?= nl2br(e($recept['ingredienten'])) ?></p>

            <h3>Blog</h3>
            <p><?= nl2br(e($recept['blog'])) ?></p>

            <?php if ($recept['foto2']): ?>
            <img src="../<?= e($recept['foto2']) ?>" alt="" style="width: 100%;">
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
