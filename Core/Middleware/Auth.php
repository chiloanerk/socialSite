<?php

namespace Core\Middleware;

use Core\App;
use Core\Database;

class Auth
{
    public static function handle()
    {
        if (!isset($_COOKIE['user_token'])) {
            header('Location: /');
            exit();
        }

        $db = App::resolve(Database::class);

// Retrieve the user ID associated with the logged-in user's token
        $user = $db->query('SELECT user_id FROM tokens WHERE token = :token', [
            'token' => $_COOKIE['user_token']
        ])->find();

        if (!$user) {
// If the user is not found, redirect or display an error message
            abort();
            exit();
        }

        return $user['user_id'];
    }

    public static function user()
    {
        return $_COOKIE['user_token'] ?? null;
    }
}
