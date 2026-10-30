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
    <?php include __DIR__ . '/includes/Header.php'; ?>

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
        <?php endif; ?>
    </div>

    <!--de rest van de recepten-->
        <div id="grid2">
        <?php foreach ($rest as $recept): ?>
        <a class="grid-item" href="pages/recept.php?id=<?= $recept['id'] ?>"><img src="<?= e($recept['foto'] ?: $recept['foto2'] ?: 'assets/hero.png') ?>" alt="<?= e($recept['titel']) ?>">
        <div><h5><?= e($recept['titel']) ?></h5></div></a>
        <?php endforeach; ?>
    </div>
    <?php include __DIR__ . '/includes/Footer.php'; ?>
</body>
</html>
