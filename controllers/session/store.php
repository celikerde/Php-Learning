<?php

use Core\Validator;
use Core\Database;
use Core\App;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address';
}

if (!Validator::string($password)) {
    $errors['password'] = 'Please provide a correct password';
}

if (!empty($errors)) {
    view("session/create.view.php", [
        "heading" => "Log In",
        "errors" => $errors
    ]);
}

$user = $db->query("SELECT * FROM users WHERE email = :email", [
    "email" => $email
])->find();

if($user) {
    if(password_verify($password, $user['password'])) {
        login($user);
        header('location: /');
        exit();
    }
}

return view("session/create.view.php", [
    "heading" => "Log In",
    "errors" => [
        "password" => "No matching account found for that email address and password"
    ]
]);



