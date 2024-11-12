<?php

use Core\Validator;

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

if (Validator::validateString($name)) {
    $errors['name'] = 'O campo nome não pode ser vazio!';
}

if (!Validator::validateEmail($email)) {
    $errors['email'] = 'Insira um email válido!';
}

if (Validator::validateString($password, 8, 24)) {
    $errors['password'] = 'Sua senha deve conter no mínimo 8 e no máximo 24 caracteres!';

}

if (isset($errors)){
    view('registration/create', compact('errors'));
    exit();
}

if (empty($errors)) {
    $userExists = $database->query(
        sql: 'SELECT * FROM users WHERE email = ?',
        params: [$email]
    )->findOne();

    if ($userExists) {
        $errors['email'] = 'Email já existe!';
        view('registration/create', compact('errors'));
        exit();
    }

    $database->query(
        sql: 'INSERT INTO users (name, email, password) VALUES (:name, :email, :password)',
        params: [
            'name' => $name,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT)
        ]
    );

    $user = $database->query(
        sql: 'SELECT * FROM users WHERE email = ?',
        class: Users::class,
        params: [$email]
    )->findOne();

    login($user);
}

