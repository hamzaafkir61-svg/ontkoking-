<?php
// $terug is '' op index.php en '../' op de pagina's in pages/
// $paginaTitel is de tekst in het midden van de header
$terug = $terug ?? '';
$paginaTitel = $paginaTitel ?? 'Ontkoking';
?>
    <header class="topbar recepten-topbar">
        <div class="topbar-left">
            <button class="menu-button" id="menuButton" aria-label="Open menu" aria-expanded="false" aria-controls="navMenu">
                <span></span>
            </button>
            <a class="header-link" href="<?= $terug ?>index.php">home</a>
            <?php $menuBasis = $terug; include __DIR__ . '/menu.php'; ?>
        </div>
        <h1 class="pagina-titel"><?= e($paginaTitel) ?></h1>
        <?php if (empty($_SESSION['user_id'])): ?>
        <a class="header-link" href="<?= $terug ?>pages/login.php">login</a>
        <?php else: ?>
        <a class="header-link" href="<?= $terug ?>Data/uitloggen.php">uitloggen</a>
        <?php endif; ?>
    </header>
