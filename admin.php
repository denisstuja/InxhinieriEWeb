<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
        <link rel="stylesheet" href="stylee.css">
        <title>Admin Page</title>
    </head>
<body>
    <div class="header">
        <div class="logo">
            <a href="home.php"><img src="fotot/2d8y_nlz2_221115-removebg-preview.png" height="70px" width="70px" class="logoo"></a>
        </div>
        <div class="menu">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="news.php">News</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="admin.html">Admin Page</a></li>
            </ul>
        </div>
    </div>
    <h1>Welcome to the Admin Dashboard</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Age</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['username']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td><?php echo $user['age']; ?></td>
                <td><?php echo $user['password']; ?></td>
                <td>
                    <a href="edit_user.php?id=<?php echo $user['id']; ?>">Edit</a>
                    <a href="delete_user.php?id=<?php echo $user['id']; ?>" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="login.php" class="logout">Logout</a>
    <footer>
        <div class="footer">
            <div class="informatat">
                <div class="boxes">
                    <a href="home.php"><img src="fotot/2d8y_nlz2_221115-removebg-preview.png" height="300px" class="logoo"></a>
                </div>
                <div class="boxes">
                    <h2>Pages</h4>
                        <ul>
                            <li><a href="products.php" style="text-decoration: none;">Products</a></li>
                            <li><a href="about.php" style="text-decoration: none;">About</a></li>
                            <li><a href="news.php" style="text-decoration: none;">News</a></li>
                            <li><a href="contact.php" style="text-decoration: none;">Contact</a></li>
                        </ul>
                </div>
                <div class="boxes">
                    <h2>Contact</h2>
                        <ul class="kontakti">
                            <li>info@socialsphere.com</li>
                            <li>+383 49 153 733</li>
                            <li>+383 49 833 637</li>
                        </ul>
                </div>
            </div>
            <div class="poshte">
                <p>@2024 Lawyerlead. All Rights Reserved Design & Developed by SocialSphere</>
            </div>
        </div>
    </footer>
</body>
</html>