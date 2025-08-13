<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = 2;

$id = $_POST['id'];
$note = $db->query(
    "SELECT * FROM notes where id = :id",
    [':id' => $id])->findOrFail();

authorize($note['user_id'] === $currentUserId);


$db->query('DELETE FROM notes WHERE id = :id', [':id' => $id]);

header('Location: /notes');
exit();

?>