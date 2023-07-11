<?php

use Core\App;
use Core\Validator;
use Core\Database;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $passwordConfirmation = $_POST['password_confirmation'];

// validate the form inputs
    $errors = [];
    $enteredValues = [
        'email' => $email,
        'password' => $password,
        'username' => $username
    ];

    if (!Validator::string($username, 3, 255)) {
        $errors['username'] = 'Please provide a nickname of at least 7 characters.';
    }

    if (!Validator::email($email)) {
        $errors['email'] = 'Please provide a valid email address.';
    }

    if (!Validator::string($password, 7, 255)) {
        $errors['password'] = 'Please provide a password of at least 7 characters.';
    }
//    if (!Validator::passwordComplexity($password)) {
//        $errors['password'] = 'Password (Min. 8 characters, at least 1 uppercase, 1 lowercase, 1 digit, and 1 special character).';
//    }

    if ($password !== $passwordConfirmation) {
        $errors['password_confirmation'] = 'Passwords do not match';
    }

    if (!empty($errors)) {
        view('registration/create.view.php', [
            'errors' => $errors,
            'values' => $enteredValues
        ]);
        exit();
    }

    $db = App::resolve(Database::class);

// check if account already exists
    $user = $db->query('select * from users where email = :email', [
        'email' => $email
    ])->find();

    if ($user) {
        $errors['email'] = 'Email already exists.';
        view('registration/create.view.php', [
            'errors' => $errors,
            'values' => $enteredValues
        ]);
        // then someone with that email already exists
        // if yes, redirect
        header('location: /register');
        exit();
    } else {
        // Save user to database and redirect to homepage

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $db->query('INSERT INTO users(username, email, password) VALUES(:username, :email, :password)', [
            'email' => $email,
            'username' => $username,
            'password' => $hashedPassword
        ]);

        $userId = $db->lastInsertId(); // Get the ID of the newly inserted user

        // Check token duplication
        $tokenExists = true;
        $token = '';

        while ($tokenExists) {
            // Generate a unique token for the user
            $token = bin2hex(random_bytes(4));

            // Check if generated token already exists in the 'tokens' table
            $tokenResult = $db->query('SELECT token FROM tokens WHERE token = :token', [
                'token' => $token
            ])->find();

            $tokenExists = ($tokenResult !== false);
        }

        // Insert the token and user ID into the 'tokens' table
        $db->query('INSERT INTO tokens (token, user_id) VALUES (:token, :user_id)', [
            'token' => $token,
            'user_id' => $userId
        ]);

        // mark that the user has logged in
        $_SESSION['user_token'] = $token;

        header('location: /');
        exit();
    }
} else {
    // Display registration form if form is not submitted
    view('registration/create.view.php');
}