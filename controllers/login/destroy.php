<?php

$_SESSION = [];

session_destroy();

$params = session_get_cookie_params();

setcookie(session_name(), '', time() - 3600, $params["path"], $params["domain"], $params["secure"], $params["httponly"],);

redirect('/login');

exit;