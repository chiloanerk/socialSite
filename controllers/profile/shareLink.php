<?php

use Core\App;

// Retrieve the user_token from the session
$userToken = $_SESSION['user_token'];

// Generate the shareable link
$shareableLink = 'http://localhost/share/' . urlencode($userToken);

// Pass the shareable link to the view
view('profile/share-link.view.php', [
    'shareableLink' => $shareableLink
]);
