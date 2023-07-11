<?php

use Core\App;
use Core\Database;
use Core\Middleware\Auth;

$db = App::resolve(Database::class);

// Perform authentication
$userId = Auth::handle();

// Retrieve user data and pass it to the view
$user = $db->query('SELECT * FROM users WHERE id = :id', [
    'id' => $userId
])->findOrFail();

view("profile/show.view.php", [
'heading' => 'User Profile',
'user' => $user
]);
