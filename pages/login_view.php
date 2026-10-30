<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../CSS/Home.css">
    <script src="../scripts/home.js" defer></script>
</head>
<body>
    <header class="topbar">
        <div class="topbar-left">
            <button class="menu-button" id="menuButton" aria-label="Open menu" aria-expanded="false">
                <span></span>
            </button>

            <nav class="nav-menu" id="navMenu" aria-label="Main navigation">
                <a href="login.php">login</a>
                <a href="ReceptOverzicht.php">je recepten</a>
                <a href="../index.php">recepten bekijken</a>
            </nav>
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
            <h1>Login</h1>
            <?php if ($fout): ?><p><?= e($fout) ?></p><?php endif; ?>
            <form method="post">
                Gebruikersnaam:<br>
                <input type="text" name="gebruikersnaam" required><br>
                Wachtwoord:<br>
                <input type="password" name="wachtwoord" required><br><br>
                <input type="submit" value="Inloggen">
                <input type="submit" name="registreren" value="Registreren">
            </form>
        </div>
    </div>
</body>
</html>
