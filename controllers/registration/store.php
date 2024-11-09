<?php

use Core\Database;
use Core\Validators;

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
    } elseif (Validators::stringMinLength($_POST["password"], 8)) {
        $inputErrors['password'] = "Password min length is 8 characters";
    } elseif (Validators::stringMaxLength($_POST["password"], 255)) {
        $inputErrors['password'] = "Password max length is 255 characters";
    }

}

if (!empty($inputErrors)) {
    return require view("registration/index.view.php", ["inputErrors" => $inputErrors]);
} else {

        $user = $db->query('SELECT * FROM users WHERE email = :email',
            [
                ":email" => $_POST["email"],
            ]
        )->find();

        if ($user) {

            //user already exist so user is redirected to login page
            $inputErrors['error'] = "User already exists, Kindly use another email";
            return require view("registration/index.view.php", [
                "heading" => "Registration",
                "inputErrors" => $inputErrors
            ]);
//
//            header("Location: /login");
//            exit;

        } else {

            $db->query('INSERT INTO users (email, password) VALUES (:email, :password)',
                [
                    ":email" => $_POST["email"],
                    ":password" => password_hash($_POST["password"], PASSWORD_DEFAULT)
                ]
            );

            $_SESSION['user'] = [
                "id" => $user->id,
                "email" => $user->email,
            ];

            redirect('/');

            exit();
        }
}
