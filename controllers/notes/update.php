<?php

use Core\App;
use Core\Validator;
use database\Database;

$db = App::resolve(Database::class);

$errors = [];
$id = $_POST['id'];

if(Validator::validateNote($_POST['body_note'], 1, 1000)) {
    $errors['error'] = 'Description cannot be empty neither longer than 1000 characters';
    return require base_path('views/notes/create.view.php');
}

$db->update('notes')
    ->set(['body_note' => $_POST['body_note']])
    ->where('id', $id)
    ->execute();

header('Location: /notes');

die();