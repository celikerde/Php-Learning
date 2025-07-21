<?php

$heading = "Create Note";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $body = $_POST['body'];
    dd($body);
}

require "views/note-create.view.php";