<?php

use Core\Session;

$errors = Session::get('errors');
$old = Session::get('old');

Session::unflash();

// Clear flash messages immediately after retrieving them

view("session/create.view.php", [
    "heading" => "Login",
    "errors" => $errors,
    "old" => $old,
]);

