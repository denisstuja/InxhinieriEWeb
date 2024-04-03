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