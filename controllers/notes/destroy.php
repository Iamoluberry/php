<?php


use Core\Database;

$config = require basePath('config.php');

$db = new Database($config['database']);

$heading = "Delete Note";

$authUserId = $_SESSION['user']['id'];

if ($_POST['_method'] === 'DELETE') {
    $note = $db->query('SELECT * FROM notes WHERE id = :id', ['id' => $_POST['id']])->findOrFail();

    authorize($note['user_id'] === $authUserId);

    $db->query('DELETE FROM notes WHERE id = :id', ['id' => $_POST['id']]);

    header('Location: /notes');
}

