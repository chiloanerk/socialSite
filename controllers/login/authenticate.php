<?php

use Core\App;
use Core\Validator;
use Core\Database;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $errors = [];
    $enteredValues = [
        'email' => $email,
        'password' => $password
    ];

    if (!Validator::email($email)) {
        $errors['email'] = 'Please provide a valid email address.';
    }

    if (!Validator::string($password, 7, 255)) {
        $errors['password'] = 'Please provide a password of at least 7 characters.';
    }

    if (!empty($errors)) {
        view('login/login.view.php', [
            'errors' => $errors,
            'values' => $enteredValues
        ]);
        exit();
    }

    $db = App::resolve(Database::class);

// Check if user exists
    $user = $db->query('select * from users where email = :email', [
        'email' => $email
    ])->find();

    if (!$user) {
        $errors['login'] = 'Invalid email or password.';
        view('login/login.view.php', [
            'errors' => $errors,
            'email' => $email
        ]);
        exit();
    }

// verify password

    if (!password_verify($password, $user['password'])) {
        $errors['login'] = 'Invalid email or password.';
        view('login/login.view.php', [
            'errors' => $errors,
            'email' => $email
        ]);
        exit();
    }

    // Fetch the token associated with the user
    $tokenResult = $db->query('SELECT token FROM tokens WHERE user_id = :userId', [
        'userId' => $user['id']
    ])->find();

    if (!$tokenResult) {
        $errors['login'] = 'Token not found for user.';
        view('login/login.view.php', [
            'errors' => $errors,
            'email' => $email
        ]);
        exit();
    }

    $token = $tokenResult['token'];

    // Mark that the user has logged in with the token
    $_SESSION['user_token'] = $token;

    header('location: /');
    exit();
} else {
    header('location: /login');
    exit();
}