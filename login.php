<?php
    require 'config.php'; // Include the database configuration file

    // Check if form is submitted
    if(isset($_POST["submit"])) {
        $username = mysqli_real_escape_string($conn, $_POST["username"]);
        $password = $_POST["password"]; // Plain text password

        // Fetch user data from database based on username
        $query = "SELECT * FROM register WHERE username = '$username'";
        $result = mysqli_query($conn, $query);

        if($result && mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);

            // Verify the password
            if($password === $user['password']) { // Compare plain text passwords
                // Password is correct, redirect user to home page
                header("Location: home.php");
                exit();
            } else {
                // Password is incorrect
                echo "<script>alert('Incorrect password');</script>";
            }
        } else {
            // User not found
            echo "<script>alert('User not found');</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Projekti</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">  
        <div class="box form-box">
            <header>Log In</header>
            <form id="loginForm" action="" method="post">
                <div class="field input">
                    <label>Username</label>
                    <input type="text" name="username" id="username" class="name">
                </div>
                <div class="field input">
                    <label>Password</label>
                    <input type="password" name="password" id="password" class="password">
                </div>
                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Log In">
                </div>
                <div class="links">
                    Don't have account? <a href="register.php">Sign up</a>
                </div>
            </form>
        </div>
    </div>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const form = document.getElementById('loginForm');

        form.addEventListener('submit', (event) => {
            const usernameInput = document.getElementById('username').value.trim();
            const passwordInput = document.getElementById('password').value.trim();

            if(usernameInput === '' || passwordInput === '') {
                alert('Please fill in both username and password fields.');
                event.preventDefault();
                return;
            }
        });
    });
</script>
</html>
