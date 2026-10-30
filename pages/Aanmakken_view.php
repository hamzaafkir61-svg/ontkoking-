<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bekijken</title>
    <link rel="stylesheet" href="../CSS/Home.css">
    <link rel="stylesheet" href="../CSS/Grid.css">
    <link rel="stylesheet" href="../CSS/Aanmakken.css">
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

    <form action="../Data/updateverwerk.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= e($recept['id']) ?>">
                Titel:<br>
                <input type="text" name="titel" required value="<?= e($recept['titel']) ?>">

                <div id="grid2">

                <div>
                <div>
                ingredienten:
                <textarea id="ingredienten" name="ingredienten" required cols="30" rows="20"><?= e($recept['ingredienten']) ?></textarea>
                </div>
                Nieuwe foto (laat leeg om de huidige te behouden):<br>
                <input type="file" name="picture" accept="image/*">
            </div>

                <div>
                Blog:<br>
                <textarea name="blog" required cols="70" rows="55"><?= e($recept['blog']) ?></textarea>
                        </div>
                            <div>
                                Nieuwe foto (laat leeg om de huidige te behouden):<br>
                <input type="file" name="picture2" accept="image/*">
        </div>
            </div>
        <input type="submit" value="<?= $recept['id'] ? 'Bewerken' : 'Aanmaken' ?>">
    </form>



    </body>
</html>
