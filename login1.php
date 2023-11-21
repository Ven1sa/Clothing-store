<?php
@include 'config.php';// Include your database connection file

// Code for login
if (isset($_POST['login'])) {
    $enteredUsername = $_POST['username'];
    $enteredPassword = $_POST['password'];

    // Query to retrieve user data based on the entered username
    $query = "SELECT * FROM register WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $enteredUsername);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        // User with the entered username exists
        $userData = $result->fetch_assoc();

        // Verify the entered password against the hashed password in the database
        if (password_verify($enteredPassword, $userData['password'])) {
            // Password is correct
            echo "Login successful! Redirecting...";

            // Redirect to a protected page (index.html in this case)
            header("Location: index.php");
            exit(); // Ensure no further code execution after redirection
        } else {
            // Password is incorrect
            echo "Incorrect password. Please try again.";
        }
    } else {
        // Username not found in the database
        echo "Username not found. Please register or check your credentials.";
    }
    
    // Close the database connection
    $stmt->close();
}

// Close the database connection (if not already closed)
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="container_register">
    <h2>Login</h2>
    <form action="" method="POST">
    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
    </div>
    <input type="submit"  class="btn-submit" value="Login" name="login">
    </form>
    </div>
</body>
</html>