<?php
include('assets/php/server.php');
?>

<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRITTON</title>
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
                        <div id = 'card'>
                            <div style="margin: 15px;">
                                <div class="text-center mb-5">
                                    <div id = 'titlebg'>
                                        <img src="assets/images/icon/icon.png" id = 'icon' height="80" class='mb-4'>
                                        <h1>TRITTON</h1>
                                    </div>
                                    <div class="divider">
                                        <div class="divider-text">Please sign in to Continue</div>
                                    </div>
                                </div>
                                <form method="POST">
                                    <p id = 'text'>Username:</p>
                                    <input id = 'textbox' type="text" name="username" placeholder="Enter Username" required>
                                    <br><br><br>
                                    <p id = 'text'>Password:</p>
                                    <input id = 'textbox' type="password" name="password" placeholder="Enter Password" required>
                                    <br>
                                    <a href="sign-up.php" id = 'register'>Don't have an account?</a>
                                    <br><br>
                                    <div class="clearfix">
                                        <input class="btn btn-primary" id = 'buttonSize' type="submit" name="signin" value="SIGN-IN">
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