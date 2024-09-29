<?php

use Core\App;
use database\Database;

$config = require base_path('config.php');

$db = App::resolve(Database::class);

$id = $_POST['id'];

$note = $db->select()
        ->from(['notes'])
        ->where('id', $id)
        ->execute()
        ->findOneOrFail();

if (empty($note)) {
    abort();
}
$_POST['body_note'] = $note['body_note'];

authorization($note['user_id'] === $config['currentUser']);

require base_path('views/notes/create.view.php');