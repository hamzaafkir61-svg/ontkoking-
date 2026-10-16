<?php
require_once __DIR__ . '/Data/db.php';

$recepten = $db->query('SELECT * FROM recepten ORDER BY id DESC')->fetchAll();

// de eerste 4 komen bovenaan, de rest eronder
$bovenste = array_slice($recepten, 0, 4);
$rest = array_slice($recepten, 4);

include __DIR__ . '/index_view.php';
