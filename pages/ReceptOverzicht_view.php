<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Je recepten</title>
        <link rel="stylesheet" href="../CSS/Home.css">
        <link rel="stylesheet" href="../CSS/Grid.css">
        <link rel="stylesheet" href="../CSS/ReceptOverzicht.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
        <script src="../scripts/home.js" defer></script>
</head>
<body>
    <?php $terug = '../'; include __DIR__ . '/../includes/Header.php'; ?>


        <div id="grid2">
        <?php foreach ($recepten as $recept): ?>
        <div class="grid-item">
        <h3><?= e($recept['titel']) ?></h3>
        <img src="../<?= e($recept['foto'] ?: 'assets/hero.png') ?>" alt="<?= e($recept['titel']) ?>"><br>
        <a href="Aanmakken.php?id=<?= $recept['id'] ?>">bewerken</a><br>
        <a href="../Data/verwijder.php?id=<?= $recept['id'] ?>" onclick="return confirm('Weet je het zeker?')">verwijderen</a>
        </div>
        <?php endforeach; ?>

        <?php if (!$recepten): ?>
        <p>Je hebt nog geen recepten.</p>
        <?php endif; ?>
        </div>

        <a id="toevoeg" href="Aanmakken.php"><h2>Maak een nieuwe blog <i class="fa-solid fa-plus"></i></h2></a>

</body>
</html>
