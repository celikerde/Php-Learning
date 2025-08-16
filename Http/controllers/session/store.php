<?php

use Core\Validator;
use Core\Database;
use Core\App;
use Http\Forms\LoginForm;
use Core\Authenticator;
use Core\Session;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if($form->validate($email, $password)) {

    if((new Authenticator)->attempt($email, $password)) {
        redirect('/');
    }
        $form->error('password', 'No matching account found for that email address and password');
}

Session::flash('errors', $form->errors());
Session::flash('old', [
    'email' => $email
]);


return redirect('/login');
