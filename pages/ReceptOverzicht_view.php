<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Je recepten — Ontkoking</title>
    <link rel="stylesheet" href="../CSS/Home.css">
    <link rel="stylesheet" href="../CSS/ReceptOverzicht.css">
    <script src="../scripts/home.js" defer></script>
</head>
<body class="recepten-pagina">
    <header class="topbar recepten-topbar">
        <div class="topbar-left">
            <button class="menu-button" id="menuButton" aria-label="Open menu" aria-expanded="false" aria-controls="navMenu">
                <span></span>
            </button>
            <a class="header-link" href="../index.php">home</a>
            <?php $menuBasis = '../'; include __DIR__ . '/../includes/menu.php'; ?>
        </div>
        <h1 class="pagina-titel">je recepten</h1>
        <a class="header-link" href="login.php">login</a>
    </header>

    <main class="recepten-inhoud">
        <?php foreach ([array_slice($recepten, 0, 3), array_slice($recepten, 3)] as $groepIndex => $groep): ?>
            <?php if ($groep): ?>
            <section class="recepten-grid <?= $groepIndex === 0 ? 'recepten-uitgelicht' : 'recepten-overig' ?>" aria-label="<?= $groepIndex === 0 ? 'Je nieuwste recepten' : 'Je overige recepten' ?>">
                <?php foreach ($groep as $recept): ?>
                <article class="recept-kaart">
                    <a class="recept-foto" href="recept.php?id=<?= (int)$recept['id'] ?>">
                        <img src="../<?= e($recept['foto'] ?: $recept['foto2'] ?: 'assets/hero.png') ?>" alt="<?= e($recept['titel']) ?>">
                    </a>
                    <div class="recept-acties">
                        <a href="Aanmakken.php?id=<?= (int)$recept['id'] ?>" aria-label="<?= e($recept['titel']) ?> bewerken">bewerken</a>
                        <a href="../Data/verwijder.php?id=<?= (int)$recept['id'] ?>" aria-label="<?= e($recept['titel']) ?> verwijderen" onclick="return confirm('Weet je zeker dat je dit recept wilt verwijderen?')">verwijderen</a>
                    </div>
                </article>
                <?php endforeach; ?>
            </section>
            <?php endif; ?>
        <?php endforeach; ?>

        <?php if (!$recepten): ?>
        <p class="lege-recepten">Je hebt nog geen recepten. Maak je eerste blog aan!</p>
        <?php endif; ?>

        <a class="recept-toevoegen" href="Aanmakken.php">
            <span>maak een nieuwe blog</span>
            <span class="toevoegen-plus" aria-hidden="true">+</span>
        </a>
    </main>

    <footer class="recepten-footer" aria-label="Maaltijden">
        <span>ontbijt</span>
        <span>Lunch</span>
        <span>Avond eten</span>
    </footer>
</body>
</html>
