<?php

use Core\Database;

$config = require base_path("config.php");

$db = new Database($config['database']);

$currentUserId = 2;

    $id = $_GET['id'];

    $note = $db->query(
        "SELECT * FROM notes where id = :id",
        [':id' => $id])->findOrFail();


        
        
        authorize($note['user_id'] === $currentUserId);
        
        // dd($note);


    view("notes/show.view.php", [
        "heading" => "Note",
        "note" => $note
    ]);

