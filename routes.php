<?php

global $router;
$router->get('/', 'controllers/index.php');
$router->get('/secrets', 'controllers/secrets.php');
$router->get('/secret', 'controllers/messages/public/show.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');
$router->get('/privacy', 'controllers/privacy.php');
$router->get('/licensing', 'controllers/licensing.php');


$router->get('/message', 'controllers/messages/user/show.php')->only('auth');
$router->delete('/message', 'controllers/messages/user/destroy.php')->only('auth');

$router->get('/message/edit', 'controllers/messages/user/edit.php')->only('auth');
$router->patch('/message', 'controllers/messages/user/update.php')->only('auth');

$router->post('/register', 'controllers/registration/store.php')->only('guest');
$router->get('/logout', 'controllers/logout.php');

$router->get('/profile', 'controllers/profile/index.php')->only('auth')->only('auth');

$router->post('/messages/transfer', 'controllers/messages/user/transfer.php')->only('auth');

$router->get('/me/{token}', 'controllers/messages/public/create.php');
$router->post('/me/{token}', 'controllers/messages/public/store.php');
$router->get('/success', 'controllers/messages/public/success.php');




