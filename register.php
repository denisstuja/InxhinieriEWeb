
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
    <?php
    
        require 'config.php';

        if(isset($_POST["submit"])){
            $username = $_POST["username"];
            $email = $_POST["email"];
            $age = $_POST["age"];
            $password = $_POST["password"];
            $user = $_POST["user"];

            if ($user === 'admin') {
                $admin_check_query = "SELECT * FROM register WHERE user = 'admin' LIMIT 1";
                $admin_result = mysqli_query($conn, $admin_check_query);
                $admin_exists = mysqli_fetch_assoc($admin_result);
                if ($admin_exists) {
                    echo "<script>alert('There is already an admin registered.'); window.location='register.php';</script>";
                    exit(); // Stop further execution
                }
            }

            $query = "INSERT INTO register (username, email, age, password, user) VALUES ('$username', '$email', '$age', '$password', '$user')";
            mysqli_query($conn, $query);
            echo
            "
            <script>alert('Data Inserted Succesfully!');</script>
            ";
        }

    ?>
    <div class="container">  
        <div class="box form-box">
            <header>Register</header>
            <form action="register.php" method="post">
                <div class="field input">
                    <label>Username</label>
                    <input type="text" name="username" id="username" class="username">
                </div>
                <div class="field input">
                    <label>Email</label>
                    <input type="email" name="email" id="email" class="email">
                </div>
                <div class="field input">
                    <label>Age</label>
                    <input type="number" name="age" id="age" class="age">
                </div>
                <div class="field input">
                    <label>Password</label>
                    <input type="password" name="password" id="password" class="password">
                </div>
                <div class="field input">
                    <label>Confirm Password</label>
                    <input type="password" name="cpassword" id="cpassword" class="confirm-password">
                </div>
                <div class="field input">
                    <label>Role</label>
                    <select name="user" id="user">
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>                
                </div>
                <div class="field">
                    <button type="submit" class="btn" name="submit" value="Sign Up">Sign Up</button>
                </div>
                <div class="links">
                    You have an Accont? <a href="login.php">Log In</a>
                </div>
            </form>
        </div>
    </div>
</body>

<script>
   document.addEventListener("DOMContentLoaded", function () {
        const myForm = document.querySelector('form'); // Select the form element

        myForm.addEventListener('submit', function (event) {
            const username = document.querySelector('.username').value;
            const email = document.querySelector('.email').value;
            const age = document.querySelector('.age').value;
            const password = document.querySelector('.password').value;
            const confirmPassword = document.querySelector('.confirm-password').value;

            if (username === '' || email === '' || age === '' || password === '' || confirmPassword === '') {
                alert("Fill all inputs!");
                event.preventDefault(); // Prevent form submission if inputs are not filled
                return;
            }
            if (email.indexOf('@') === -1) {
                alert("Enter a valid email address!");
                event.preventDefault(); // Prevent form submission if email is invalid
                return;
            }
            if (age < 18 || age > 60) {
                alert("Enter a valid age between 18 and 60!");
                event.preventDefault(); // Prevent form submission if age is not valid
                return;
            }
            if (password.length < 8) {
                alert("Password should be at least 8 characters long!");
                event.preventDefault(); // Prevent form submission if password is too short
                return;
            }
            if (password !== confirmPassword) {
                alert('Passwords do not match!');
                event.preventDefault(); // Prevent form submission if passwords do not match
                return;
            }
        });
    });

</script>
</html>