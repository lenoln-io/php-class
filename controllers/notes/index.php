<?php

$config = require base_path('config.php');

$db = new Database($config);

$notes = $db->query("SELECT * FROM `notes` WHERE user_id = :id", [
    'id' => $config['currentUser']
    ])->getAll();

require base_path('views/notes/index.view.php');