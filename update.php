<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Redirect to login page if not logged in
    exit();
}

include 'Database.php';
include 'User.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the data from the POST request
    $oldMatric = $_POST['old_matric'];
    $matric = $_POST['matric'];
    $name = $_POST['name'];
    $role = $_POST['role'];

    // Create an instance of the Database class and get the connection
    $database = new Database();
    $db = $database->getConnection();

    $user = new User($db);
    $result = $user->updateUser($oldMatric,$matric, $name, $role);

    // Close the connection
    $db->close();

    if ($result === true) {
        header("Location: read.php"); // Redirect to read.php
        exit(); // Ensure no further code is executed
    } else {
        echo $result; // Display error message
    }
}