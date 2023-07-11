<?php

use Core\App;
use Core\Middleware\Auth;
use Core\Database;

$db = App::resolve(Database::class);

// Perform authentication
$userId = Auth::handle();

// Retrieve user data and pass it to the view
$user = $db->query('SELECT * FROM users WHERE id = :id', [
    'id' => $userId
])->findOrFail();

view("profile/change-email.view.php", [
    'heading' => 'Change Email',
    'user' => $user
]);
