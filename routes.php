<?php

$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');


$router->get('/notes', 'controllers/notes/index.php')->onlyMiddleware('auth', '/login');
$router->get('/notes/create', 'controllers/notes/create.php')->onlyMiddleware('auth', '/login');
$router->get('/note', 'controllers/notes/show.php')->onlyMiddleware('auth', '/login');
$router->post('/note', 'controllers/notes/store.php')->onlyMiddleware('auth', '/login');
$router->get('/note/edit', 'controllers/notes/edit.php')->onlyMiddleware('auth', '/login');
$router->put('/note/edit', 'controllers/notes/update.php')->onlyMiddleware('auth', '/login');
$router->delete('/note', 'controllers/notes/destroy.php')->onlyMiddleware('auth', '/login');


$router->get('/register', 'controllers/registration/index.php')->onlyMiddleware('guest', '/');
$router->post('/register', 'controllers/registration/store.php');


$router->get('/login', 'controllers/login/index.php')->onlyMiddleware('guest', '/');;
$router->post('/login', 'controllers/login/store.php');
$router->delete('/logout', 'controllers/login/destroy.php')->onlyMiddleware('auth', '/login');
?>