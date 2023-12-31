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
            <div class="login form">
                <h1>Log in</h1>
                <form action="#" method="post">
                    <input type="email" placeholder="Enter email here" required>
                    <input type="password" placeholder="Enter Password" required>
                    <button type="submit"> Login</button>
                    <a href="fgt_pwd.html">Forgot password?</a>
                </form>

                <span class="signed">Don't have an account?
                    <a href="Sign_Up.html">Sign up</a>
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