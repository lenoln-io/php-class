<?php

use Core\Database;

$config = require base_path('config.php');

$db = new Database($config);

$id = $_POST['id'];

$note = $db->query("SELECT user_id FROM `notes` WHERE id = :id", [
    'id' => $id
])->findOneOrFail();

authorization($note['user_id'] === $config['currentUser']);

$note = $db->query("DELETE FROM `notes` WHERE id = :id", [
    'id' => $id
]);

header('Location: /notes');
die();