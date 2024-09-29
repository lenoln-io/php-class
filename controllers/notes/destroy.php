<?php

use Core\App;
use database\Database;

$config = require base_path('config.php');

$db = App::resolve(Database::class);

$id = $_POST['id'];

$note = $db->select()
    ->from(['notes'])
    ->where('user_id', $config['currentUser'])
    ->execute()
    ->findOneOrFail();

authorization($note['user_id'] === $config['currentUser']);

$db->deleteFrom(['notes'])
    ->where('id', $id)
    ->execute();

header('Location: /notes');
die();