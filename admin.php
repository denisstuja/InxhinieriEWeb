<?php
    require_once('config.php');

    // Check if the delete button is clicked and a valid delete ID is provided
    if(isset($_POST['delete_id']) && is_numeric($_POST['delete_id'])) {
        $delete_id = $_POST['delete_id'];

        // Delete the row from the database
        $delete_query = "DELETE FROM register WHERE id = $delete_id";
        $delete_result = mysqli_query($conn, $delete_query);

        if($delete_result) {
            // Redirect to the current page after deletion
            header("Location: admin.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn); // Handle deletion error
        }
    }

    // Fetch data from the database
    $query = "SELECT * FROM register WHERE user != 'admin'";
    $result = mysqli_query($conn, $query);

    if(!$result) {
        echo "Query failed: " . mysqli_error($conn);
    }
?>
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
    <table class="table">
        <tr>
            <th class="inside-table">ID</th>
            <th class="inside-table">Username</th>
            <th class="inside-table">Email</th>
            <th class="inside-table">Password</th>
            <th class="inside-table">Age</th>
            <th class="inside-table">Action</th>
        </tr>
        <?php
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['password'] . "</td>";
                echo "<td>" . $row['age'] . "</td>";
                // Add delete form with hidden input for delete_id
                echo "<td>";
                echo "<form method='POST' action=''>";
                echo "<input type='hidden' name='delete_id' value='" . $row['id'] . "'>";
                echo "<button type='submit' name='delete' class='btn-delete'>Delete</button>";
                echo "</form>";
                echo "<a href='edit.php?id=" . $row['id'] . "' class='btn-edit'>Edit</a>";
                echo "</td>";
                echo "</tr>";
            }
        ?>
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
                <p>@2024 SocialSphere. All Rights Reserved Design & Developed by SocialSphere</>
            </div>
        </div>
    </footer>
</body>
</html>