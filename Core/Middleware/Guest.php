<?php

namespace Core\Middleware;
class Guest
{
    public function handle()
    {
        if ($_COOKIE['user_token'] ?? false) {
            header('location: /');
            exit();
        }
    }
}