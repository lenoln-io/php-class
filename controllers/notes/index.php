<?php

$notes = $database->query(
    sql: 'SELECT * FROM notes WHERE user_id = ?',
    class: Notes::class,
    params: [$_SESSION['auth']->getId()]
)->getAll();


view('notes/index', compact('notes'));