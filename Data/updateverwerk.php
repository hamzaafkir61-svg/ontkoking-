<?php
require 'db.php';
moetInloggen();

$id = $_POST['id'] ?? '';
$titel = trim($_POST['titel'] ?? '');
$ingredienten = trim($_POST['ingredienten'] ?? '');
$blog = trim($_POST['blog'] ?? '');
$maaltijd = $_POST['maaltijd'] ?? '';

if (!in_array($maaltijd, ['ontbijt', 'lunch', 'avondeten'], true)) {
    http_response_code(400);
    exit('Kies ontbijt, lunch of avondeten. Ga terug naar het formulier en kies een maaltijd.');
}

if ($titel == '') {
    header('Location: ../pages/Aanmakken.php?id=' . $id);
    exit;
}

$foto = uploadFoto('picture');
$foto2 = uploadFoto('picture2');

if ($id == '') {
    // nieuw recept
    $stmt = $db->prepare('INSERT INTO recepten (titel, ingredienten, blog, maaltijd, foto, foto2, user_id) VALUES (?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute([$titel, $ingredienten, $blog, $maaltijd, $foto, $foto2, $_SESSION['user_id']]);
} else {
    // recept bewerken alleen je eigen recepten
    $stmt = $db->prepare('UPDATE recepten SET titel = ?, ingredienten = ?, blog = ?, maaltijd = ? WHERE id = ? AND user_id = ?');
    $stmt->execute([$titel, $ingredienten, $blog, $maaltijd, $id, $_SESSION['user_id']]);

    // fotos alleen vervangen als er een nieuwe is
    if ($foto) {
        $db->prepare('UPDATE recepten SET foto = ? WHERE id = ? AND user_id = ?')->execute([$foto, $id, $_SESSION['user_id']]);
    }
    if ($foto2) {
        $db->prepare('UPDATE recepten SET foto2 = ? WHERE id = ? AND user_id = ?')->execute([$foto2, $id, $_SESSION['user_id']]);
    }
}

header('Location: ../pages/ReceptOverzicht.php');
