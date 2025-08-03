<?php

use Core\Validator;
use Core\Database;

require base_path("Core/Validator.php");

$config = require base_path("config.php");

$db = new Database($config['database']);

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $body = $_POST['body'];
    

    if (!Validator::string($body, 1, 1000)) {
        $errors['body'] = 'A body is required and must be less than 1000 characters';
    }

    if (empty($errors)) {

    $db->query('INSERT INTO notes (body, user_id) VALUES (:body, :user_id)', [
        'body' => $body,
        'user_id' => 2
        ]);

        exit();
    }
}

view("notes/create.view.php", [
    "heading" => "Create Note",
    "errors" => $errors,
]);