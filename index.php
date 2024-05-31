<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heimdall - SIGN IN</title>
    <link rel="stylesheet" href="stylesheets/login-page.css">
    <link rel="icon" type="image/x-icon" href="assets/project-logo.png">
</head>

<body>
    <main>
        <div class="container">
            <div class="content-container">
                <div class="form-container">
                    <div class="page-heading test">
                        <div class="site-heading">
                            <h4>
                                Heimdall
                            </h4>
                            <h4>
                                Workforce
                            </h4>
                            <h4>
                                Solutions
                            </h4>
                        </div>
                        <div class="project-logo-container">
                            <img src="assets/project-logo.png" class="project-logo">
                        </div>
                    </div>
                    <div class="form-input">
                        <div class="form-header">
                            <h2>Sign in to continue</h2>
                        </div>
                        <form action="index.php" method='post'>
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
<!--
                            <div class="register">
                                <p>Don't have an account? <a href="">Register</a></p>
                            </div>
-->
                        </form>

                    </div>
                    <!-- To Do: Insert github icon that leads to the repository -->
                </div>
                <!-- To Do: Fix login page carousel -->
                <div class="carousel-container ">
                    <div class="slider-wrapper">
                        <div class="slider test">
                            <img src="assets/carousel/Performance Management Made Easy.png" alt="" id="slide-1">
                            <img src="assets/carousel/Simplified Payroll Processing.png" alt="" id="slide-2">
                            <img src="assets/carousel/Real Time Insights.png" alt="" id="slide-3">
                        </div>
                    </div>
                    <div class="slider-button">
                            <a href="#slide-1"></a>
                            <a href="#slide-2"></a>
                            <a href="#slide-3"></a>
                    </div>
                </div>
            </div>
        </div>
    </main>
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