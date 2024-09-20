<?php

use Core\Database;

$config = require base_path('config.php');

$db = new Database($config);

$notes = $db->query("SELECT * FROM `notes` WHERE user_id = :id", [
    'id' => $config['currentUser']
    ])->getAll();

/*if($_SERVER["REQUEST_METHOD"] === "POST") {
    dd($_SERVER["REQUEST_METHOD"]);
}*/

require base_path('views/notes/index.view.php');