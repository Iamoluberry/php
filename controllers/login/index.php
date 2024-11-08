<?php

$heading = 'Login';

$inputErrors = [];

require view('login/index.view.php', ['heading' => $heading, 'inputErrors' => $inputErrors]);