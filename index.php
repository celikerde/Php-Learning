<?php

require "functions.php";
require "Database.php";
$config = require "config.php";
// require "router.php";



$db = new Database($config['database']);

$id = $_GET['id'];
$query = "SELECT * FROM posts WHERE id = :id";

$post = $db->query($query, [':id' => $id])->fetch();

dd($post);



