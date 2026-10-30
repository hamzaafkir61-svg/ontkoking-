<?php
require __DIR__ . '/../Data/db.php';

$stmt = $db->prepare('SELECT recepten.*, users.gebruikersnaam FROM recepten JOIN users ON users.id = recepten.user_id WHERE recepten.id = ?');
$stmt->execute([$_GET['id'] ?? 0]);
$recept = $stmt->fetch();

if (!$recept) {
    header('Location: ../index.php');
    exit;
}

include 'recept_view.php';
