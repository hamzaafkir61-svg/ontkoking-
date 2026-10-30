<?php
require __DIR__ . '/../Data/db.php';
moetInloggen();

// als er een id is dan bewerk je een recept, anders maak je een nieuwe
$recept = ['id' => '', 'titel' => '', 'ingredienten' => '', 'blog' => ''];
if (!empty($_GET['id'])) {
    $stmt = $db->prepare('SELECT * FROM recepten WHERE id = ? AND user_id = ?');
    $stmt->execute([$_GET['id'], $_SESSION['user_id']]);
    $recept = $stmt->fetch();
    if (!$recept) {
        header('Location: ReceptOverzicht.php');
        exit;
    }
}

include 'Aanmakken_view.php';
