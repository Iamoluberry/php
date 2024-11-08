<?php

use Core\Database;
use Core\Validators;

$heading = "Create Note";

$config = require(basePath('config.php'));

$db = new Database($config['database']);

$inputErrors = [];

$authUserId = $_SESSION['user']['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (Validators::string($_POST["title"]) && Validators::string($_POST["body"])){
        $inputErrors['title'] = "Title is required";
        $inputErrors['body'] = "Body is required";
    } elseif (Validators::string($_POST["title"])) {
        $inputErrors['title'] = "Title is required";
    } elseif (Validators::string($_POST["body"])){
        $inputErrors['body'] = "Body is required";
    } elseif (Validators::stringMaxLength($_POST["title"], 15)) {
        $inputErrors['title'] = "Title max length is 5 characters";
    } elseif (Validators::stringMaxLength($_POST["body"], 1000)) {
        $inputErrors['body'] = "Body max length is 1000 characters";
    }

    if (!empty($inputErrors)) {
        return require view("notes/create.view.php", [
            "inputErrors" => $inputErrors,
            "heading" => $heading,
        ]);
    } else {

        $note = $db->query('INSERT INTO notes (title, body, user_id) VALUES (:title, :body, :user_id)',
            [
                'title' => $_POST['title'],
                'body' => $_POST['body'],
                'user_id' => $authUserId
            ]);

        $_POST['title'] = '';
        $_POST['body'] = '';
    }

    header("location: /notes");

    die();
}