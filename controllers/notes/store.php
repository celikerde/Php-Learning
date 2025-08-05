<?php 

use Core\Validator;
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$errors = [];

$body = $_POST['body'];

    if (!Validator::string($body, 1, 1000)) {
        $errors['body'] = 'A body is required and must be less than 1000 characters';
    }

    if(!empty($errors)) {
        return view("notes/create.view.php", [
            "heading" => "Create Note",
            "errors" => $errors,
        ]);
    }

    if (empty($errors)) {

    $db->query('INSERT INTO notes (body, user_id) VALUES (:body, :user_id)', [
        'body' => $body,
        'user_id' => 2
        ]);

        header('Location: /notes');
        die();

    }