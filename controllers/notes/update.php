<?php

use Core\Database;
use Core\Validator;

require base_path('Validator.php');

$config = require base_path('config.php');

$db = new Database($config);

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if(Validator::validateNote($_POST['body_note'], 1, 100)) {
        $errors['error'] = 'Description cannot be empty neither longer than 100 characters';
    }

    if (empty($errors)) {
        $db->query('INSERT INTO notes (body_note, user_id) VALUES (:body_note, :user_id)', [
            'body_note' => $_POST['body_note'],
            'user_id' => $config['currentUser']
        ]);
        $_POST['body_note'] = null;
    }
}

require base_path('views/notes/create.view.php');