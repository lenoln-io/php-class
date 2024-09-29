<?php

use Core\App;
use database\Database;

$config = require base_path('config.php');

$db = App::resolve(Database::class);

$notes = $db->select()
    ->from(['notes'])
    ->where('user_id', $config['currentUser'])
    ->execute()
    ->getAll();

require base_path('views/notes/index.view.php');