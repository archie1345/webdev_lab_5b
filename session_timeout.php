<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Start the session only if it hasn't been started
}

// Set the timeout duration (in seconds)
$timeout_duration = 900; // 15 minutes

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    // Check if the last activity time is set
    if (isset($_SESSION['LAST_ACTIVITY'])) {
        // Calculate the session's duration
        if (time() - $_SESSION['LAST_ACTIVITY'] > $timeout_duration) {
            // Last activity was more than the timeout duration
            session_unset(); // Unset session variables
            session_destroy(); // Destroy the session
            header('Location: login.php'); // Redirect to login page
            exit();
        }
    }
    // Update the last activity time
    $_SESSION['LAST_ACTIVITY'] = time(); // Update last activity time
} else {
    // If not logged in, redirect to login page
    header('Location: login.php');
    exit();
}
?>