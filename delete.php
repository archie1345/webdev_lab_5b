<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Redirect to login page if not logged in
    exit();
}

include 'Database.php';
include 'User.php';
include 'session_timeout.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $matric = $_GET['matric'];
    $database = new Database();
    $db = $database->getConnection();
    $user = new User($db);
    $result = $user->deleteUser($matric);

    $db->close();

    if ($result === true) {
        header("Location: read.php"); // Redirect to read.php
        exit(); // Ensure no further code is executed
    } else {
        echo $result; // Display error message
    }
}