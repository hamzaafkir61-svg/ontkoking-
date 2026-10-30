<?php
require 'db.php';
moetInloggen();

// je kan alleen je eigen recepten verwijderen
$stmt = $db->prepare('DELETE FROM recepten WHERE id = ? AND user_id = ?');
$stmt->execute([$_GET['id'] ?? 0, $_SESSION['user_id']]);

header('Location: ../pages/ReceptOverzicht.php');
