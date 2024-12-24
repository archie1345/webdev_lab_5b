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

if ($_SERVER["REQUEST_METHOD"]=="GET") {
    $matric = $_GET['matric'];

    $database = new Database();
    $db = $database->getConnection();

    $user = new User($db);
    $userDetails = $user->getUser($matric);

    $db->close();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update form</title>
</head>
<body>
    <h1>Update User</h1>
    <form action="update.php" method="post">
        <input type="hidden" name="old_matric" value="<?php echo $userDetails['matric']; ?>">
        <label for="matric">Matric:</label>
        <input type="text" id="matric" name="matric" value="<?php echo $userDetails['matric']; ?>"><br>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $userDetails['name']; ?>"><br>
        <label for="role">Access Level:</label>
        <select name="role" id="role" required>
            <option value="">Please select</option>
            <option value="lecturer" <?php if ($userDetails['role'] == 'lecturer')
                echo "selected" ?>>Lecturer</option>
                <option value="student" <?php if ($userDetails['role'] == 'student')
                echo "selected" ?>>Student</option>
            </select><br>
        <input type="submit" value="Update">
        <a href="read.php">Cancel</a>
    </form>
</body>
</html>

<?php
}
?>