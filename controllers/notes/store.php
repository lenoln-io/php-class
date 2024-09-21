<?php

use Core\Database;
use Core\Validator;

$config = require base_path('config.php');

$db = new Database($config);

$errors = [];

if(Validator::validateNote($_POST['body_note'], 1, 1000)) {
    $errors['error'] = 'Description cannot be empty neither longer than 1000 characters';
    return require base_path('views/notes/create.view.php');
}

if (empty($errors)) {
    $db->query('INSERT INTO notes (body_note, user_id) VALUES (:body_note, :user_id)', [
        'body_note' => $_POST['body_note'],
        'user_id' => $config['currentUser']
    ]);
    header('Location: /notes');
    exit();
}

