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
                    Don't have account? <a href="regster.php">Sign up</a>
                </div>
            </form>
        </div>
    </div>
</body>
<script>

    document.addEventListener("DOMContentLoaded",function (){
        const name = document.querySelector('.name');
        const password = document.querySelector('.password');
        const btn = document.querySelector('.btn');
        const form = document.getElementById('loginForm');

        btn.addEventListener('click', (event) => {
            event.preventDefault();

        const nameValue = name.value;
        const passwordValue = password.value;
        
        if(nameValue === '' && passwordValue === ''){
            alert('Fill the inputs');
            return;
        }

        if(nameValue === ''){
            alert('Fill the name');
            return;
        }
        if(passwordValue === ''){
            alert('Fill the password');
            return;
        }
        if(passwordValue.length < 8){
            alert('Password should be at least 8 characters long!');
            return;
        }
        window.location.href = 'home.php';
        });
    })();
</script>
</html>