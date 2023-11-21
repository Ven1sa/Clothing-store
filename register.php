<?php
@include 'config.php';

// Code for register
if(isset($_POST['register']))
{
    // Get user inputs from the form
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $get_values=$conn->prepare("SELECT * from register where email=?");
    $get_values->bind_param('s',$email);
    $get_values->execute();
    $get_values_result=$get_values->get_result();
    if($get_values_result->num_rows > 0)
    {
        //message for duplicate
        echo "Please enter another email_id";
    }
    else
    {
         // Check if passwords match
    if ($password != $confirm_password) {
        echo "Passwords do not match. Please try again.";
    } else {
        // Hash the password for security (you should use a more secure hashing method)
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert user data into the database
        // Example of prepared statement for user insertion (add this code below the existing prepared statement)
        $stmt = $conn->prepare("INSERT INTO register (username, email, password) VALUES (?,?,?)");
        $stmt->bind_param("sss", $username, $email, $hashed_password);


        if ($stmt->execute()) {
            echo "Registration successful!";
        } else {
            $stmt->error;
    }
        // Close the database connection
        $conn->close();
    }
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="index.css">
</head>
<body>
<section id="header">
        <a href="#"><img src="img/logo.png" class="logo" alt=""></a>
        <div>
            <ul id="navbar">
                <li><a href="index.php">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li id="lg-bag"><a href="cartpage.html"><i class="fas fa-shopping-cart"></i></a></li>
                <li><a href="register.php">Register</a></li>
                <a href="#" id="close"><i class="fas fa-times"></i></a>
            </ul>
        </div>
        <div id="mobile">
            <a href="cart.html"><i class="fas fa-shopping-cart"></i></a>
            <i id="bar" class="fas fa-outdent"></i>
        </div>
    </section>

    <div class="container_register">
        <h2>Registration Form</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>
            <button type="submit" class="btn-submit" name="register">Register</button>
        </form>
        <p>If you have an account? <a href="login1.php">Login Here</a></p>
    </div>
</body>
</html>