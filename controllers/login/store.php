<?php

use Core\Validators;
use Core\Database;

$config = require(basePath('config.php'));

$db = new Database($config['database']);

$inputErrors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (Validators::string($_POST["email"]) && Validators::string($_POST["password"])) {
        $inputErrors['email'] = "Email is required";
        $inputErrors['password'] = "Password is required";
    } elseif (!Validators::email($_POST["email"])) {
        $inputErrors['email'] = "Email field must be of type email";
    } elseif (Validators::string($_POST["password"])) {
        $inputErrors['password'] = "Password is required";
    }
}

if (!empty($inputErrors)) {
    return require view("login/index.view.php", ["inputErrors" => $inputErrors]);
} else {
    $user = $db->query("SELECT * FROM users WHERE email = :email", [
        "email" => $_POST["email"],
    ])->find();

    if ($user && password_verify($_POST["password"], $user['password'])){

        $_SESSION['user'] = [
            'id' => $user['id'],
            'email' => $user['email'],
        ];

        header("Location: /");

        exit();
    }

    $inputErrors['error'] = "No matching email and password";

    return require view("login/index.view.php", ["inputErrors" => $inputErrors]);

}