<?php

namespace Core\Middleware;
class Guest
{
    public function handle()
    {
        if ($_SESSION['user_token'] ?? false) {
            header('location: /');
            exit();
        }
    }
}