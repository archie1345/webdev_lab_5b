<?php
include 'Database.php';
include 'User.php';
include 'session_timeout.php';

$database = new Database();
$db = $database->getConnection();
$user = new User($db);
$result = $user->createUser($_POST['matric'],$_POST['name'],$_POST['password'],$_POST['role']);
$db->close();

if ($result === true) {
    header("Location: login.php");
    exit();
} else {
    echo $result;
}