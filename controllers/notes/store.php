<?php

use Core\Validator;

$errors = [];

if (Validator::validateString($_POST['body_note'], 1, 1000)) {
    $errors['error'] = 'Description cannot be empty neither longer than 1000 characters';
    view('notes/create', compact($errors));
    exit();
}

if (empty($errors)) {
    $database->query(
        sql: 'INSERT INTO notes (body_note, user_id) VALUES (:body_note, :user_id)',
        params: [
            'body_note' => $_POST['body_note'],
            'user_id' => $_SESSION['auth']->getId()
        ]);

    header('Location: /notes');
    exit();
}

