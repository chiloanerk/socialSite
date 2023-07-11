<?php

use Core\App;
use Core\Database;
use Core\Middleware\Auth;
use Core\Validator;

$db = App::resolve(Database::class);

// Perform authentication
$userId = Auth::handle();

// Handle form submission for updating the user email
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newEmail = $_POST['new_email'];
    $confirmEmail = $_POST['confirm_email'];

    // validate the form inputs
    $errors = [];
    $enteredValues = [
        'email' => $newEmail,
        'confirmEmail' => $confirmEmail
    ];

    // Retrieve user data and pass it to the view
    $user = $db->query('SELECT * FROM users WHERE id = :id', [
        'id' => $userId
    ])->findOrFail();

    // Validate the new email and confirm email fields
    if (!Validator::email($newEmail)) {
        $errors['email'] = 'Please provide a valid email address.';
    }

    if ($newEmail !== $confirmEmail) {
        $errors['email'] = 'Emails do not match';
    }

    if (!empty($errors)) {
        view('profile/change-email.view.php', [
            'errors' => $errors,
            'values' => $enteredValues,
            'user' => $user,
            'heading' => 'Change Email',
        ]);
        exit();
    }

    // Update the user's email in the database
    $db->query('UPDATE users SET email = :newEmail WHERE id = :userId', [
        'newEmail' => $newEmail,
        'userId' => $userId
    ]);

    // Set success message
    $successMessage = 'Email successfully changed';

    // Redirect back to the profile page after successful update
    view('profile/show.view.php', [
        'successMessage' => $successMessage,
        'user' => $user,
        'heading' => 'Change Email',
    ]);
    exit();
}
