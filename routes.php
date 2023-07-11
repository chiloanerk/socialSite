<?php

global $router;
$router->get('/home', 'controllers/index.php');
$router->get('/contact', 'controllers/contact.php');

$router->get('/register', 'controllers/registration/create.php')->only('guest');
$router->post('/register', 'controllers/registration/store.php');

$router->get('/login', 'controllers/login/login.php')->only('guest');
$router->post('/login', 'controllers/login/authenticate.php');
$router->get('/logout', 'controllers/login/logout.php');

$router->get('/profile', 'controllers/profile/show.php')->only('auth');

$router->get('/profile/change-email', 'controllers/profile/change-email.php')->only('auth');
$router->post('/profile/update-email', 'controllers/profile/update-email.php')->only('auth');

$router->get('/profile/change-password', 'controllers/profile/change-password.php')->only('auth');
$router->post('/profile/update-password', 'controllers/profile/update-password.php')->only('auth');

