<?php
$config = require 'config.php';

$db = new Database($config);

$id = $_GET['id'];

$note = $db->query("SELECT * FROM `notes` WHERE id = :id", [
    'id' => $id
])->findOneOrFail();

authorization($config, $note, Response::FORBIDDEN);

require 'views/notes/read.view.php';