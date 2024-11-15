<?php


$router->get('/','Home','controllers/home.php');
$router->get('/about','About us!','controllers/about.php');
$router->get('/contact','Contact us!','controllers/contact.php');

$router->get('/notes','My notes','controllers/notes/index.php');
$router->get('/note','My note','controllers/notes/read.php');
$router->get('/note/new','Create a note','controllers/notes/create.php');
$router->get('/note/edit','Edit a note','controllers/notes/edit.php');

$router->post('/notes','Stored','controllers/notes/store.php');
$router->delete('/notes','Deleted','controllers/notes/destroy.php');
$router->patch('/notes','Updated','controllers/notes/update.php');

$router->get('/register', 'Register', 'controllers/registration/create.php');
$router->post('/register', 'Registered', 'controllers/registration/store.php');

$router->get('/login', 'Login', 'controllers/sessions/create.php');
$router->post('/login', 'Logged in', 'controllers/sessions/store.php');

$router->delete('/logout', 'Logged out', 'controllers/sessions/destroy.php');