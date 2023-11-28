<?php include('config.php'); 

session_start();
$errors = array(); 
if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   

   if (count($errors) == 0) {
    $results = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');
    
    
    if (mysqli_num_rows($results) > 0) {
        $row = mysqli_fetch_assoc($results);
      $_SESSION['user_id'] = $row['id'];
      $_SESSION['success'] = "You are now logged in";
      header('location: Chasma_Pasal_Glasses_Payment.php');
    }else {
        array_push($errors, "Wrong username/password combination");
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
    </head>
    <body>
        <section class="container">
    <div class="Login form">
         <h1>Login</h1>
        <form id= "login" action="" method="post">
            <input type="email" name="email" placeholder="Enter your email" required>
            <input type="password"  name="password" placeholder="Enter your password" required>
            <button type="submit" name="submit">Login</button>
            <a href="forgot_pwd.html">Forgot password?</a>
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
        <span>Don't have an account?
            <a href="SignUp_Page.php">Signup</a>
        </span>
    </div>
</section>
<script>
    // Display an alert message when the form is submitted
    const form = document.getElementById("payment");
    form.addEventListener("submit", function(event) {
        event.preventDefault();
        alert("Login successful!");
        location.reload(true);
    });
</script>
    </body>
</html>
