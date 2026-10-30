<?php
require __DIR__ . '/../Data/db.php';

$fout = '';
$melding = $_SESSION['login_melding'] ?? '';
unset($_SESSION['login_melding']);
$naLogin = $_SESSION['na_login'] ?? 'ReceptOverzicht.php';
if (!in_array($naLogin, ['ReceptOverzicht.php', 'Aanmakken.php'], true)) {
    $naLogin = 'ReceptOverzicht.php';
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $naam = trim($_POST['gebruikersnaam'] ?? '');
    $wachtwoord = $_POST['wachtwoord'] ?? '';

    if (isset($_POST['registreren'])) {
        // nieuw account maken
        try {
            $stmt = $db->prepare('INSERT INTO users (gebruikersnaam, wachtwoord) VALUES (?, ?)');
            $stmt->execute([$naam, password_hash($wachtwoord, PASSWORD_DEFAULT)]);
            $_SESSION['user_id'] = $db->lastInsertId();
            unset($_SESSION['na_login']);
            header('Location: ' . $naLogin);
            exit;
        } catch (PDOException $ex) {
            $fout = 'Die gebruikersnaam bestaat al.';
        }
    } else {
        // inloggen
        $stmt = $db->prepare('SELECT * FROM users WHERE gebruikersnaam = ?');
        $stmt->execute([$naam]);
        $user = $stmt->fetch();
        if ($user && password_verify($wachtwoord, $user['wachtwoord'])) {
            $_SESSION['user_id'] = $user['id'];
            unset($_SESSION['na_login']);
            header('Location: ' . $naLogin);
            exit;
        }
        $fout = 'Verkeerde gebruikersnaam of wachtwoord.';
    }
}

include 'login_view.php';
