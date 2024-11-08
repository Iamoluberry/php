<?php

$heading = "Create Note";

$inputErrors = [];

require view("notes/create.view.php", [
    "heading" => $heading,
    "inputErrors" => $inputErrors,
]);