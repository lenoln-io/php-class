<?php
$config = require 'config.php';

$db = new Database($config);

$currentUser = 1;
$id = $_GET['id'];

$note = $db->query("SELECT * FROM `notes` WHERE id = :id", [
    'id' => $id
])->findOrFail();

if($currentUser !== $note['user_id']){
    abort(Response::FORBIDDEN);
}

require 'views/notes/note.view.php';