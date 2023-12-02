<?php include('config.php');


if(isset($_POST['submit'])){

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
    $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
 
    $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');
 
    if(mysqli_num_rows($select_users) > 0){
       $message[] = 'user already exists!';
    }else{
       if($pass != $cpass){
          $message[] = 'Passwords do not match!';
       }else{
          mysqli_query($conn, "INSERT INTO `users` (email, password) VALUES( '$email', '$cpass')") or die('query failed');
          $message[] = 'registered successfully!';
          header('location:login_Page.php');
       }
    }
 
 }


 ?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Fusion">
        <title>Chasma Pasal</title>
        <link rel="stylesheet" href="login_style.css">
        <style>
            .message{
                font-size: medium;
                color: red;
            }
        </style>
    </head>
<body>
    <section class="container">
        <div class="registration form">
            <h1>Create Account</h1>
            <form action="" method="post">
              <input type="email" name="email" placeholder="Enter your email" required>
              <input type="password"  name="password"placeholder="Create a password" required>
              <input type="password"  name="cpassword" placeholder="Confirm your password" required>
              <button type="submit"  name="submit">Create Account</button>
            </form>
             <?php
                if(isset($message)){
                foreach($message as $message){
                    echo '
                    <div class="message">
                        <span>'.$message.'</span>
                        <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
                    </div>
                    ';
                }
                }
            ?>
              <span class="signup">Already have an account?
               <a href="login.php">Log in</a>
              </span>
            
          </div>
          <script>
                // Display an alert message when the form is submitted
                const form = document.getElementById("payment");
                form.addEventListener("submit", function(event) {
                    event.preventDefault();
                    alert("Account created successfully");
                    location.reload(true);
                });
            </script>
    </section>
</body>
</html>
