<?php

use Core\Database;

$heading = 'Edit note';

$config = require basePath('config.php');

$db = new Database($config['database']);

$authUserId = $_SESSION['user']['id'];

$note = $db->query('SELECT * FROM notes WHERE id = :id', ['id' => $_GET['id']])->findOrFail();

authorize($note['user_id'] === $authUserId);

require view('/notes/edit.view.php', [
    'heading' => 'Edit note',
    'note' => $note,
]);

