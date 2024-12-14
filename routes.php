<?php

$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');
$router->get('/notes', 'controllers/notes/index.php');

$router->get('/note/create', 'controllers/notes/create.php')->only("auth");
$router->post('/note', 'controllers/notes/store.php');

$router->get('/note', 'controllers/notes/show.php');
$router->delete('/note', 'controllers/notes/destroy.php');

$router->get('/note/edit', 'controllers/notes/edit.php');
$router->patch('/note', 'controllers/notes/update.php');
$router->get('/register', 'controllers/registeration/register.php')->only('guests');
$router->post('/register', 'controllers/registeration/store.php')->only('guests');
$router->get('/login', 'controllers/sessions/login.php')->only('guests');;
$router->post('/sessions', 'controllers/sessions/store.php')->only('guests');;
$router->delete('/session', 'controllers/sessions/destroy.php')->only('auth');
