<?php

require "Validator.php";

$heading = "Create Note";

$config = require "config.php";

$db = new Database($config['database']);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $body = $_POST['body'];
    
    $errors = [];

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

require "views/note-create.view.php";