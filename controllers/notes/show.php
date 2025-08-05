<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

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

