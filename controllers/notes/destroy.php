<?php

use Core\Database;

$config = require base_path('config.php');

$db = new Database($config);

$id = $_GET['id'];

$note = $db->query("DELETE FROM `notes` WHERE id = :id", [
    'id' => $id
]);

header('Location: /notes');