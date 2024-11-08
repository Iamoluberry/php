<?php

use Core\Database;
use Core\Validators;

$heading = "Create Note";

$config = require(basePath('config.php'));

$db = new Database($config['database']);

$inputErrors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (Validators::string($_POST["title"]) && Validators::string($_POST["body"])){
        $inputErrors['title'] = "Title is required";
        $inputErrors['body'] = "Body is required";
    } elseif (Validators::string($_POST["title"])) {
        $inputErrors['title'] = "Title is required";
    } elseif (Validators::string($_POST["body"])){
        $inputErrors['body'] = "Body is required";
    } elseif (Validators::stringMaxLength($_POST["title"], 50)) {
        $inputErrors['title'] = "Title max length is 50 characters";
    } elseif (Validators::stringMaxLength($_POST["body"], 1000)) {
        $inputErrors['body'] = "Body max length is 1000 characters";
    }

    if (!empty($inputErrors)) {
        return require view("notes/create.view.php", [
            "inputErrors" => $inputErrors,
            "heading" => $heading,
        ]);
    } else {

        $note = $db->query('UPDATE notes SET title = :title, body = :body where id = :id',
            [
                'title' => $_POST['title'],
                'body' => $_POST['body'],
                'id' => $_POST['id']
            ]);
    }

    header("location: /notes");

    die();
}