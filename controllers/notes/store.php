<?php

use Core\App;
use Core\Validator;
use database\Database;

$config = require base_path('config.php');

$db = App::resolve(Database::class);

$errors = [];

if(Validator::validateNote($_POST['body_note'], 1, 1000)) {
    $errors['error'] = 'Description cannot be empty neither longer than 1000 characters';
    return require base_path('views/notes/create.view.php');
}

if (empty($errors)) {
    $db->insertInto('notes', ['body_note', 'user_id'])
        ->values([$_POST['body_note'],$config['currentUser']])
        ->execute();

    header('Location: /notes');
    exit();
}

