<?php

$config = require "config.php";

$db = new Database($config['database']);

$heading = "My Notes";

$notes = $db->query("SELECT * FROM notes where user_id = 2")->get();


require "views/notes.view.php";

