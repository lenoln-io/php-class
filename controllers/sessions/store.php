<?php

$email = $_POST['email'];
$password = $_POST['password'];

/*$user = $database->select()
    ->from(['users'])
    ->where('email', $email)
    ->andWhere('password', $password)
    ->execute()
    ->findOne();*/

$user = $database->query(
    sql: 'SELECT * FROM users WHERE email = :email',
    class: Users::class,
    params: compact('email')
)->findOne();

if (password_verify($password, $user->getPassword())) {
    login($user);
}

$errors['notAuth'] = 'Email ou senha incorreta!';
view('sessions/login', compact('errors'));
exit();
