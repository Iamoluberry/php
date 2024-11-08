<?php

$heading = "Page Not Found";

require(view('404.view.php', [
    'heading' => $heading,
]));