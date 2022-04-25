<?php
include('assets/php/server.php');
?>

<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/design.css">
    <link rel="shortcut icon" href="assets/images/icon/icon.png" type="image/x-icon">
</head>
<body>
    <div id="background">
        <div class="overlay">
            <div class="container">
                <div class="row" id = 'pageHeight'>
                    <center>
                        <div id = 'card1'>
                            <div style="margin: 15px;">
                                <div class="text-center mb-5">
                                    <div id = 'titlebg'>
                                        <img src="assets/images/icon/icon.png" id = 'icon' height="80" class='mb-4'>
                                        <h1>TRITON</h1>
                                    </div>
                                    <div class="divider">
                                        <div class="divider-text">Please Fillup The Fields</div>
                                    </div>
                                </div>
                                <form action = 'sign-up.php' method="POST">
                                    <div class = 'row'>
                                        <div class = 'col-md-4'>
                                        <div class = 'row'>
                                                <p id = 'text'>First Name:</p>
                                                <input id = 'textbox1' type="text" name="firstname" required>
                                            </div>
                                        </div>
                                        <div class = 'col-md-4'>
                                        <div class = 'row'>
                                                <p id = 'text1'>Middle Name:</p>
                                                <input id = 'textbox2' type="text" name="middlename" required>
                                            </div>
                                        </div>
                                        <div class = 'col-md-4'>
                                            <div class = 'row'>
                                                <p id = 'text2'>Last Name:</p>
                                                <input id = 'textbox3' type="text" name="lastname" required>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class = 'row'>
                                        <div class = 'col-md-6'>
                                            <p id = 'text'>Username:</p>
                                            <input id = 'textbox4' type="text" name="username" placeholder="Enter Username" required>
                                        </div>
                                        <div class = 'col-md-6'>
                                            <p id = 'text3'>Phone Number:</p>
                                            <input id = 'textbox5' type="text" name="cpno" placeholder="Enter Phone" required>
                                        </div>
                                    </div>
                                    <br>
                                    <p id = 'text'>Email:</p>
                                    <input id = 'textbox' type="text" name="email" placeholder="Enter Email" required>
                                    <br><br>
                                    <div class = 'row'>
                                        <div class = 'col-md-6'>
                                            <p id = 'text'>Password:</p>
                                            <input id = 'textbox4' type="password" name="password" placeholder="Enter Password" required>
                                        </div>
                                        <div class = 'col-md-6'>
                                            <p id = 'text3'>Confirm Password:</p>
                                            <input id = 'textbox5' type="password" name="cpassword" placeholder="Confirm Password" required>
                                        </div>
                                    </div>
                                    <br>
                                    <a href="sign-in.php" id = 'register'>I already have an account?</a>
                                    <br><br>
                                    <div class="clearfix">
                                        <input class="btn btn-primary" id = 'buttonSize' type="submit" name="signup" value="SIGN-UP">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </center>
                </div>
            </div>
        </div>
    </div>
</body>
<style>
    #background {
        background: url('assets/images/background/bg.jpeg') no-repeat center center fixed; 
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
</style>
</html>