<?php

use Core\Database;
use Core\Validator;

$config = require base_path('config.php');

$db = new Database($config);

$errors = [];
$id = $_POST['id'];

if(Validator::validateNote($_POST['body_note'], 1, 1000)) {
    $errors['error'] = 'Description cannot be empty neither longer than 1000 characters';
    return require base_path('views/notes/create.view.php');
}

if (empty($errors)) {
    $db->query('UPDATE `notes` SET body_note = :body_note WHERE id = :id', [
        'body_note' => $_POST['body_note'],
        'id' => $id
    ]);
}
header('Location: /notes');
die();