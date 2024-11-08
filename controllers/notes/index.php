<?php

use Core\Database;

$config = require basePath('config.php');
$db = new Database($config['database']);

$heading = "Notes";

$authUserId = $_SESSION['user']['id'];

$notes = $db->query("SELECT * FROM notes WHERE user_id = $authUserId")->getAll();

require view("notes/index.view.php", [
    'heading' => $heading,
    'notes' => $notes,
]);