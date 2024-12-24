<?php
include 'Database.php';
include 'User.php';

if(isset($_POST['submit'])&&($_SERVER['REQUEST_METHOD']=='POST')){
    $database = new Database();
    $db = $database->getConnection();

    $matric = $db->real_escape_string($_POST['matric']);
    $password = $db->real_escape_string($_POST['password']);

    if (!empty($matric) && !empty($password)) {
        $user = new User($db);
        $userDetails = $user->getUser($matric);

        session_start();

        if ($userDetails && password_verify($password, $userDetails['password'])) {
            $_SESSION['user_id'] = $userDetails['matric'];
            header('Location:read.php');
            exit();
        }else{
            echo 'Invalid username or password, try <a href="login.php">Login</a> again';
        }
    }else{
        echo 'Please fill in all required fields';
    }
}