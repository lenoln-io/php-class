<?php

$id = $_POST['id'];

$note = $database->query(
    sql: 'SELECT * FROM notes WHERE id = ?',
    class: Notes::class,
    params: [$id]
)->findOneOrFail();

if (empty($note)) {
    abort();
}

$_POST['body_note'] = $note->getBodyNote();

authorization($note->getUserId() === $_SESSION['auth']->getId());

view('notes/create', compact('note'));