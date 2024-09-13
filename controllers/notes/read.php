<?php

$config = require 'config.php';

$db = new Database($config);

$currentUser = 1;
$notes = $db->query("SELECT * FROM `notes` WHERE user_id = :id", [
    'id' => $currentUser
    ])->get();

require 'views/notes/read.view.php';