<nav class="nav-menu" id="navMenu" aria-label="Hoofdnavigatie">
    <a href="<?= $menuBasis ?>index.php">recepten bekijken</a>
    <a href="<?= $menuBasis ?>pages/login.php">inloggen / registreren</a>
    <a href="<?= $menuBasis ?>pages/ReceptOverzicht.php">je recepten</a>
    <a href="<?= $menuBasis ?>pages/Aanmakken.php">recept aanmaken</a>
    <?php if (!empty($_SESSION['user_id'])): ?>
    <a href="<?= $menuBasis ?>Data/uitloggen.php">uitloggen</a>
    <?php endif; ?>
</nav>
