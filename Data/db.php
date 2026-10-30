<?php
session_start();

// maakt de database aan als hij nog niet bestaat
$nieuw = !file_exists(__DIR__ . '/ontkoking.db');
$db = new PDO('sqlite:' . __DIR__ . '/ontkoking.db');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

if ($nieuw) {
    $db->exec(<<<'SQL'
CREATE TABLE users (
  id             INTEGER PRIMARY KEY AUTOINCREMENT,
  gebruikersnaam TEXT NOT NULL UNIQUE,
  wachtwoord     TEXT NOT NULL
);

CREATE TABLE recepten (
  id           INTEGER PRIMARY KEY AUTOINCREMENT,
  titel        TEXT NOT NULL,
  ingredienten TEXT,
  blog         TEXT,
  maaltijd     TEXT,
  foto         TEXT,
  foto2        TEXT,
  user_id      INTEGER NOT NULL,
  aangemaakt   TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
);
SQL);
}

// Bestaande databases bijwerken zonder recepten te verwijderen.
$kolommen = $db->query('PRAGMA table_info(recepten)')->fetchAll(PDO::FETCH_COLUMN, 1);
if (!in_array('maaltijd', $kolommen, true)) {
    $db->exec('ALTER TABLE recepten ADD COLUMN maaltijd TEXT');
}

function e($tekst) {
    return htmlspecialchars((string)$tekst, ENT_QUOTES, 'UTF-8');
}

// stuurt je naar login als je niet ingelogd bent
function moetInloggen() {
    if (empty($_SESSION['user_id'])) {
        $pagina = basename($_SERVER['SCRIPT_NAME'] ?? '');
        if (in_array($pagina, ['ReceptOverzicht.php', 'Aanmakken.php'], true)) {
            $_SESSION['na_login'] = $pagina;
        }
        $_SESSION['login_melding'] = 'Log eerst in of maak een account aan om je recepten te bekijken of een recept aan te maken.';
        header('Location: ../pages/login.php');
        exit;
    }
}

// slaat een geuploade foto op in assets/uploads en geeft het pad terug
function uploadFoto($naam) {
    if (empty($_FILES[$naam]['name']) || $_FILES[$naam]['error'] !== 0) {
        return null;
    }
    $ext = strtolower(pathinfo($_FILES[$naam]['name'], PATHINFO_EXTENSION));
    if (!in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
        return null;
    }
    $pad = 'Uploads/' . uniqid() . '.' . $ext;
    move_uploaded_file($_FILES[$naam]['tmp_name'], __DIR__ . '/../' . $pad);
    return $pad;
}
