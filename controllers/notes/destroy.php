<?php

$id = $_POST['id'];

$note = $database->query(
    sql: 'SELECT * FROM notes WHERE user_id = :user_id',
    class: Notes::class,
    params: [
        'user_id' => $_SESSION['auth']->getId(),
    ]
)->findOneOrFail();

authorization($note->getUserId() === $_SESSION['auth']->getId());

$database->query(
    sql: 'DELETE FROM notes WHERE id = :id',
    params: [
        'id' => $id,
    ]);

header('Location: /notes');
die();