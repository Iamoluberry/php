<?php

$heading = "Home";

//require basePath("views/index.view.php");
require view("/index.view.php", [
    "heading" => $heading
]);