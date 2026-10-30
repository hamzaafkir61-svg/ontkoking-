<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./CSS/Home.css">
    <link rel="stylesheet" href="./CSS/Grid.css">
    <script src="./scripts/home.js" defer></script>

</head>
<body>
    <header class="topbar">
        <div class="topbar-left">
            <button class="menu-button" id="menuButton" aria-label="Open menu" aria-expanded="false">
                <span></span>
            </button>

            <?php $menuBasis = ''; include __DIR__ . '/includes/menu.php'; ?>
        </div>

        <div class="brand">Ontkoking</div>
    </header>

    <div class="page-body">

    <div class="hero">
            <select id="options">
                <option value="First">First</option>
                <option value="Second">Second</option>
                <option value="Third">Third</option>
            </select>
    </div>

    <!--de eerste 4 recepten met de foto in het midden-->
    <div id="grid1">
        <?php foreach ($bovenste as $i => $recept): ?>
            <?php if ($i == 2): ?>
        <img id="minhero" src="assets/hero.png" alt="">
            <?php endif; ?>
        <a class="grid-item" href="pages/recept.php?id=<?= $recept['id'] ?>"><img src="<?= e($recept['foto'] ?: $recept['foto2'] ?: 'assets/hero.png') ?>" alt="<?= e($recept['titel']) ?>">
        <div><h5><?= e($recept['titel']) ?></h5></div></a>
        <?php endforeach; ?>
        <?php if (count($recepten) < 3): ?>
        <img id="minhero" src="assets/hero.png" alt="">
        <?php endif; ?>
    </div>

    <!--de rest van de recepten-->
        <div id="grid2">
        <?php foreach ($rest as $recept): ?>
        <a class="grid-item" href="pages/recept.php?id=<?= $recept['id'] ?>"><img src="<?= e($recept['foto'] ?: $recept['foto2'] ?: 'assets/hero.png') ?>" alt="<?= e($recept['titel']) ?>">
        <div><h5><?= e($recept['titel']) ?></h5></div></a>
        <?php endforeach; ?>
    </div>
    </div>

    <?php $footerBasis = ''; include __DIR__ . '/includes/footer.php'; ?>
</body>
</html>
