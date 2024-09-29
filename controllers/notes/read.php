<?php

use Core\App;
use database\Database;

$config = require base_path('config.php');

$db = App::resolve(Database::class);

$id = $_GET['id'];

$note = $db->query("SELECT * FROM `notes` WHERE id = :id", [
    'id' => $id
])->findOneOrFail();

authorization($note['user_id'] === $config['currentUser']);

require base_path('views/notes/read.view.php');