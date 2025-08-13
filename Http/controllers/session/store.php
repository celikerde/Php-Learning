<?php

use Core\Validator;
use Core\Database;
use Core\App;
use Http\Forms\LoginForm;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();
$form->validate($email, $password);

if(!$form->validate($email, $password)) {
    return view("session/create.view.php", [
        "errors" => $form->errors()
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



