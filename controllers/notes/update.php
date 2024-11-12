<?php

use Core\Validator;

$errors = [];
$id = $_POST['id'];

if (Validator::validateString($_POST['body_note'], 1, 1000)) {
    $errors['error'] = 'Description cannot be empty neither longer than 1000 characters';
    view('notes/create', compact($errors));
}

$database->query(
    sql: 'UPDATE notes SET body_note = ? WHERE id = ?',
    params: [
        $_POST['body_note'], $id
    ]);

header('Location: /notes');
die();