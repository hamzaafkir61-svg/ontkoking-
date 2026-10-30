<?php
$terug = $terug ?? '';
?>
    <header class="topbar">
        <div class="topbar-left">
            <button class="menu-button" id="menuButton" aria-label="Open menu" aria-expanded="false">
                <span></span>
            </button>

            <?php $menuBasis = $terug; include __DIR__ . '/menu.php'; ?>
        </div>

        <div class="brand">Ontkoking</div>
    </header>
