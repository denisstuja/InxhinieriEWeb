<?php
      
      require 'config.php';

      if(isset($_POST["contact_submit"])){
          $name = $_POST["name"];
          $email = $_POST["email"];
          $number = $_POST["number"];
          $subject = $_POST["subject"];

          $query = "INSERT INTO contact (name, email, number, subject) VALUES ('$name', '$email', '$number', '$subject')";
          mysqli_query($conn, $query);
          echo
          "
          <script>alert('Data Inserted Succesfully!!');</script>
          ";
      }

  ?>