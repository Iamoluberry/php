<?php

use Core\Database;

$config = require basePath('config.php');

$db = new Database($config['database']);

$heading = "Note";

$authUserId = $_SESSION['user']['id'];

    $note = $db->query('SELECT * FROM notes WHERE id = :id', ['id' => $_GET['id']])->findOrFail();

    authorize($note['user_id'] === $authUserId);


require view("notes/show.view.php", [
    'note' => $note,
    'heading' => $heading,
]);