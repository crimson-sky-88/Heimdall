<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heimdall - SIGN IN</title>
    <link rel="stylesheet" href="stylesheets/login-page.css">
    <link rel="stylesheet" href="stylesheets/shared-resources.css">
    <link rel="icon" type="image/x-icon" href="assets/project-logo.png">
</head>

<body>
    <main>
        <div class="container">
            <div class="content-container">
                <div class="form-container">
                    <div class="page-heading">
                        <!-- <div class="site-heading">
                            <h4>
                                Heimdall
                            </h4>
                            <h4>
                                Workforce
                            </h4>
                            <h4>
                                Solutions
                            </h4>
                        </div> -->
                        <div class="project-logo-container">
                            <img src="assets/project-logo.png" class="project-logo">
                        </div>
                    </div>
                    <div class="form-input">
                        <div class="form-header">
                            <h2>Sign in to continue</h2>
                        </div>
<<<<<<< HEAD:index.php
                        <form action="index.php" method='post'>
=======
                        <form action="employee/employee-dashboard.html">
>>>>>>> 260518c0d4f95858bf813ffe19f41bc9f2dfb4a8:index.html
                            <div class="input-group">
                                <input name='usernameInput' type="text" placeholder="Username">
                                <img src="assets/input-group/person.svg" class="input-img">
                            </div>
                            <div class="input-group">
                                <input name='passwordInput' type="password" placeholder="Password">
                                <img src="assets/input-group/lock.svg" class="input-img">
                            </div>
<!--
                            <div class="remember-me">
                                <label><input type="checkbox"> Remember Me?</label>
                                <a href="#" class="forgot-password">Forgot Password?</a>
                            </div>
-->
                            <div class="input-button">
                                <button type='submit' name='logInButt'>LOG IN</button>
                            </div>
<<<<<<< HEAD:index.php
<!--
                            <div class="register">
                                <p>Don't have an account? <a href="">Register</a></p>
                            </div>
-->
=======
                            <!-- 
                            <div class="register">
                            <p>Don't have an account? <a href="">Register</a></p>
                            </div> 
                            -->
>>>>>>> 260518c0d4f95858bf813ffe19f41bc9f2dfb4a8:index.html
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <?php 
            require 'admin/snippets/footer.php';
        ?>
    </footer>
</body>

</html>
<?php

    if(isset($_POST['logInButt'])){
        
        if($_POST['usernameInput'] == "admin" && $_POST['passwordInput'] == "admin"){
           header("Location: admin/admin-dashboard-dashboard.php");
        }else{

            ?><script>alert("Wrong Credentials!!")</script><?php

        };

    }

?>