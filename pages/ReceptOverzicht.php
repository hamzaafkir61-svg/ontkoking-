<?php
require __DIR__ . '/../Data/db.php';
moetInloggen();

$stmt = $db->prepare('SELECT * FROM recepten WHERE user_id = ? ORDER BY id DESC');
$stmt->execute([$_SESSION['user_id']]);
$recepten = $stmt->fetchAll();

include 'ReceptOverzicht_view.php';
