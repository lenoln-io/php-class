<?php

use Core\Database;

$config = require base_path('config.php');

$db = new Database($config);

$id = $_POST['id'];

$note = $db->query("SELECT * FROM `notes` WHERE id = :id", [
    'id' => $id
])->findOneOrFail();

if (empty($note)) {
    abort();
}

$_POST['body_note'] = $note['body_note'];

authorization($note['user_id'] === $config['currentUser']);

require base_path('views/notes/create.view.php');