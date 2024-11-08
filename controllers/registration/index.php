<?php

use Core\Validators;

$heading = "Registration";

$inputErrors = [];

require view('registration/index.view.php', ['heading' => $heading, 'inputErrors' => $inputErrors]);