<?php
require_once('config.php');

if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $user_id = $_GET['id'];
    
    // Fetch user information from the database based on user_id
    $query = "SELECT * FROM register WHERE id = $user_id";
    $result = mysqli_query($conn, $query);
    
    if($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
    } else {
        echo "User not found!";
        exit();
    }
} else {
    echo "Invalid user ID!";
    exit();
}

if(isset($_POST['submit'])) {
    // Retrieve updated user information from the form
    $username = $_POST["username"];
    $email = $_POST["email"];
    $age = $_POST["age"];
    $password = $_POST["password"];
    
    // Update user information in the database
    $update_query = "UPDATE register SET username='$username', email='$email', age='$age', password='$password' WHERE id=$user_id";
    $update_result = mysqli_query($conn, $update_query);
    
    if($update_result) {
        // Redirect to the admin page after successful update
        header("Location: admin.php");
        exit();
    } else {
        echo "Error updating user: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/7669fe5d81.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="stylee.css">
    <title>Home</title>
</head>
<body>
    <h1>Edit User</h1>
    <form action="" method="post">
        <div>
            <label>Username</label>
            <input type="text" name="username" value="<?php echo $user['username']; ?>">
        </div>
        <div>
            <label>Email</label>
            <input type="email" name="email" value="<?php echo $user['email']; ?>">
        </div>
        <div>
            <label>Age</label>
            <input type="number" name="age" value="<?php echo $user['age']; ?>">
        </div>
        <div>
            <label>Password</label>
            <input type="password" name="password" value="<?php echo $user['password']; ?>">
        </div>
        <button type="submit" name="submit">Update</button>
    </form>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const myForm = document.querySelector('form'); // Select the form element

            myForm.addEventListener('submit', function (event) {
                const email = document.querySelector('[name="email"]').value;
                const age = document.querySelector('[name="age"]').value;
                const password = document.querySelector('[name="password"]').value;

                // Email validation
                if (email.indexOf('@') === -1) {
                    alert("Enter a valid email address!");
                    event.preventDefault(); // Prevent form submission if email is invalid
                    return;
                }

                // Age validation
                if (age < 18 || age > 60 || isNaN(age)) {
                    alert("Enter a valid age between 18 and 60!");
                    event.preventDefault(); // Prevent form submission if age is not valid
                    return;
                }

                // Password validation
                if (password.length < 8) {
                    alert("Password should be at least 8 characters long!");
                    event.preventDefault(); // Prevent form submission if password is too short
                    return;
                }
            });
        });
    </script>
</body>
</html>