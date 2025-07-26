<?php

$heading = "Create Note";

$config = require "config.php";

$db = new Database($config['database']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $body = $_POST['body'];
    $db->query('INSERT INTO notes (body, user_id) VALUES (:body, :user_id)', [
        'body' => $body,
        'user_id' => 2
    ]);

}

require "views/note-create.view.php";