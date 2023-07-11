<?php
// unset the user session data
unset($_SESSION['user_token']);

// Set logout message
$_SESSION['logout_message'] = 'You have been logged out.';


// Redirect to login page
header('location: /login?logout=1');
exit();