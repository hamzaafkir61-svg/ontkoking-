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
    <?php $terug = '../'; include __DIR__ . '/../includes/Header.php'; ?>

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
