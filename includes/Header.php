<?php
$terug = $terug ?? '';
?>
    <header class="topbar">
        <div class="topbar-left">
            <button class="menu-button" id="menuButton" aria-label="Open menu" aria-expanded="false">
                <span></span>
            </button>

            <nav class="nav-menu" id="navMenu" aria-label="Main navigation">
                <?php if (empty($_SESSION['user_id'])): ?>
                <a href="<?= $terug ?>pages/login.php">login</a>
                <?php else: ?>
                <a href="<?= $terug ?>Data/uitloggen.php">uitloggen</a>
                <?php endif; ?>
                <a href="<?= $terug ?>pages/ReceptOverzicht.php">je recepten</a>
                <a href="<?= $terug ?>index.php">recepten bekijken</a>
            </nav>
        </div>

        <div class="brand">Ontkoking</div>
        <?php include __DIR__ . '/Footer.php'; ?>
    </header>
