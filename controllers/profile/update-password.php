<?php
use Core\App;
use Core\Database;
use Core\Middleware\Auth;
use Core\Validator;

$db = App::resolve(Database::class);

// Perform authentication
$userId = Auth::handle();

// Handle form submission for updating the user password
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $currentPassword = $_POST['current_password'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    // validate the form inputs
    $errors = [];

    // Retrieve user data
    $user = $db->query('SELECT * FROM users WHERE id = :id', [
        'id' => $userId
    ])->findOrFail();

    // Validate the current password
    if (!password_verify($currentPassword, $user['password'])) {
        $errors['current_password'] = 'Incorrect current password.';
    }

    // Validate the new password and confirm password fields
    if (!Validator::string($newPassword, 7, 255)) {
        $errors['new_password'] = 'Please provide a password of at least 7 characters.';
    }

    if ($newPassword !== $confirmPassword) {
        $errors['confirm_password'] = 'Passwords do not match.';
    }

    if (!empty($errors)) {
        view('profile/change-password.view.php', [
            'errors' => $errors,
            'user' => $user,
            'heading' => 'Change Password',
        ]);
        exit();
    }

    // Hash the new password
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    // Update the user's password in the database
    $db->query('UPDATE users SET password = :hashedPassword WHERE id = :userId', [
        'hashedPassword' => $hashedPassword,
        'userId' => $userId
    ]);

    // Set success message
    $successMessage = 'Password successfully changed';

    // Redirect back to the profile page after successful update
    view('profile/show.view.php', [
        'successMessage' => $successMessage,
        'user' => $user,
        'heading' => 'Change Email',
    ]);
    exit();

}
