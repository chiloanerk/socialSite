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

// Render the change password view
view("profile/change-password.view.php", [
    'heading' => 'Change Password',
    'user' => $user
]);