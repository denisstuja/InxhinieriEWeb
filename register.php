
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
                    <select name="select" id="select">
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>                
                </div>
                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Sign Up">
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
    const form = document.querySelector('form');
    const btn = document.querySelector('.btn');

    btn.addEventListener('click', function (event) {
        event.preventDefault();

        const username = document.querySelector('.username').value;
        const email = document.querySelector('.email').value;
        const age = document.querySelector('.age').value;
        const password = document.querySelector('.password').value;
        const confirmPassword = document.querySelector('.confirm-password').value;

        if (username === '' || email === '' || age === '' || password === '' || confirmPassword === '') {
            alert("Fill all inputs!");
            return;
        }
        if (email.indexOf('@') === -1) {
            alert("Enter a valid email address!");
            return;
        }
        if (age < 18 || age > 60) {
            alert("Enter a valid age between 18 and 60!");
            return;
        }
        if (password.length < 8) {
            alert("Password should be at least 8 characters long!");
            return;
        }
        if (password !== confirmPassword) {
            alert('Passwords do not match!');
            return;
        }
        form.submit();
    });
});

</script>
</html>