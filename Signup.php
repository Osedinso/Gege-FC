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
<html>
    <head lang="en">
        <!--
            Cooking with you project
            Author: Josemaria Ezejelue
            Date: 10/26/2023

            Filename: Cooking with you sign up.html
        -->

        <meta charset="utf-8" />
        <meta name ="viewport" content="width=device-width, initial-scale=1" />
        <link href="SignUp_design.css" rel="stylesheet"/>
        <link href="Cooking_design.css" rel="stylesheet"/>
        <title> Cookin With You</title>
    </head>
    <body>
        <header class="header-background">
            <div class="container">
                <div class ="logo">
                    <a href ="Cooking_homePg.html">
                        <h1> Cooking with you</h1>
                    </a>
                </div>
                <div ><img id="logoimg"src="chef-logo.jpg" alt ="logo"></div>
                <nav>
                    
                    <ul>
                        <li><a  href="Cooking_homePg.html">Home</a></li>
                        <li><a  href="Sign_Up.html">Login</a></li>
                        <li><a  href="recipes.html">Recipes</a></li>
                        <li><a  href="contactUs.html">Contact Us</a></li>
                        <li><input type="text" placeholder="Search.."> 
                            <img id="search" src="search.png"   alt"search icon">
                        </li>
                    </ul>
                </nav>
            </div>
        </header>
        <section class ="cont">
            <div class="signUp form">
                <h1>Create Account</h1>
                <form action="#" method="post">
                    <input type="email" placeholder="Enter email here" required>
                    <input type="password" placeholder="Enter Password" required>
                    <input type="password" placeholder="Confirm Password" required>
                    <button type="submit"> Create Account</button>
                </form>

                <span class="signed">Already have an account?
                    <a href="login.html">Log in</a>
                </span>
            </div>
            
        </section>
        <script>
                // Display an alert message when the form is submitted
                const form = document.getElementById("payment");
                form.addEventListener("submit", function(event) {
                    event.preventDefault();
                    alert("Account created successfully");
                    location.reload(true);
                });
            </script>
    </body>
</html>