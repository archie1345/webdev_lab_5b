<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab_5b</title>
</head>
<body>
    <h1>Login page</h1>
    <form action="authenticate.php" method="POST">
        <label for="matric">Matric:</label>
        <input type="text" name="matric" id="matric" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br>
        <input type="submit" name="submit" value="login">
    </form>
    <p>
        <a href="register.php">Register</a> here if you have not.
    </p>
</body>
</html>