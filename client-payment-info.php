<?php 
include('assets/php/server.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Information</title>

    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/chartjs/Chart.min.css">

    <link rel="stylesheet" href="assets/css/design.css">
    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/icon/icon.png" type="image/x-icon">
</head>

<body>
    <div id="app">
        <?php 
            if($_SESSION['accesslevel'] == 'ADMIN'){
                include('sidebar/admin-sidebar.html'); 
            }
            else{
                include('sidebar/client-sidebar.html'); 
            }
        ?>
        <div id="main">
            <nav class="navbar navbar-header navbar-expand navbar-light">
                <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
                <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">
                        <li class="dropdown">
                            <a href="#" data-bs-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="avatar me-1">
                                    <?php 
                                    $file = 'assets/images/avatar/' . $_SESSION['username'] . '.jpg';
                                    if(file_exists($file)): ?>
                                        <img src="assets/images/avatar/<?php echo $_SESSION['username']; ?>.jpg" alt="" srcset="">
                                    <?php endif ?>
                                    <?php 
                                    if(!(file_exists($file))):  ?>
                                        <img src="assets/images/avatar/default.png" height="80">
                                    <?php endif ?>
                                </div>
                                <div class="d-none d-md-block d-lg-inline-block">Hi, <?php echo $_SESSION['lastname']; ?>, <?php echo $_SESSION['firstname']; ?>!</div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <form class = 'row' style = 'height:22px' method ='post'>
                                    <input class = "col-md-6" type="submit" name="logout" value="LOGOUT" style = 'border:none; background-color:white; position:relative; left:34px; height:18px'>
                                    <p class="col-md-6" style = 'width:5px; position:relative; right:92px; bottom:2px'><i data-feather="log-out"></i></p>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="main-content container-fluid">
                <br>
                <center><div class="page-title">
                    <h3>View Payment Information</h3>
                </div></center>
                <br>
                <section class="col-md-12">
                        <center><div class="card" style = " width:75%;background-color:#869aba">
                        <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #869aba">
                            <h4 class="card-title" style="color: white; font-size: 28px"><strong>Payment Details</strong></h4>
                        </div>
                        <form class="card-body px-0 pb-0" method = 'post'>
                            <div class='row'>
                                <div class='col-md-4'>
                                    <p id = 'text4'>Owner Name:</p>
                                </div>
                                <div class='col-md-8'>
                                    <p id = 'text5'><?php echo $_SESSION['owner_name'] ?></p>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-4'>
                                    <p id = 'text4'>Project Name:</p>
                                </div>
                                <div class='col-md-8'>
                                    <p id = 'text5'><?php echo $_SESSION['payment_name'] ?></p>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-4'>
                                    <p id = 'text4'>Project Cost:</p>
                                </div>
                                <div class='col-md-8'>
                                    <p id = 'text5'>₱ <?php echo $_SESSION['payment_cost'] ?></p>
                                </div>
                            </div>
                            <?php if($_SESSION['payment1'] == 0){ ?>
                                <div class = 'row'>
                                    <div class = 'col-md-12'>
                                        <center><p id = 'text4'>No Available Payment</p></center>
                                    </div>
                                </div>
                                <div class = 'row'>
                                    <div class = 'col-md-4'>
                                        <p id = 'text4'>Date:</p>
                                    </div>
                                    <div class = 'col-md-4'>
                                        <p id = 'text4'>Amount Paid:</p>
                                    </div>
                                    <div class = 'col-md-4'>
                                        <p id = 'text4'>Balance:</p>
                                    </div>
                                </div>
                            <?php 
                            $lastCount = 1;
                            }else{?>
                            <?php $total = $_SESSION['payment_cost']; 
                            $amountpaid = 0;
                            ?>
                            <div class = 'row'>
                                <div class = 'col-md-12'>
                                    <center><p id = 'text4'>Payment Details</p></center>
                                </div>
                            </div>
                            <div class = 'row'>
                                <div class = 'col-md-4'>
                                    <p id = 'text4'>Date:</p>
                                </div>
                                <div class = 'col-md-4'>
                                    <p id = 'text4'>Amount Paid:</p>
                                </div>
                                <div class = 'col-md-4'>
                                    <p id = 'text4'>Balance:</p>
                                </div>
                            </div>
                            <?php

                                for($i = 1; $i<=20; $i++) {
                                    $i = strval($i);
                                    $datecounter = 'date' . $i;
                                    $paymentcounter = 'payment' . $i;
                            ?>
                            <?php if($_SESSION[$paymentcounter] > 0){ ?>
                                <div class = 'row'>
                                    <?php 
                                    $total = $total - $_SESSION[$paymentcounter];
                                    $amountpaid = $amountpaid + $_SESSION[$paymentcounter];
                                    ?>
                                    <div class = 'col-md-4'>
                                        <p id = 'text4'><?php echo $_SESSION[$datecounter] ?></p>
                                    </div>
                                    <div class = 'col-md-4'>
                                        <p id = 'text4'>₱ <?php echo $_SESSION[$paymentcounter] ?></p>
                                    </div>
                                    <div class = 'col-md-4'>
                                        <p id = 'text4'>₱ <?php echo $total ?><p>
                                    </div>
                                </div>
                            <?php $i = intval($i);
                            }else{ 
                                $lastCount = $i;
                                break;  
                            } ?>
                            <?php
                            }
                            ?>
                            <?php } ?>
                            <br><br>
                            <p><?php $_SESSION['lastCount'] = $lastCount; ?><p>
                            <div class = 'row'>
                                <div class = 'col-md-4'>
                                </div>
                                <div class = 'col-md-4'>
                                    <p id = 'text4'>Total Amount Paid: ₱ <?php echo $amountpaid ?></p>
                                </div>
                                <div class = 'col-md-4'>
                                    <p id = 'text4'>Balance: ₱ <?php echo $total ?><p>
                                </div>
                            </div>
                            <div class="card-footer" style="background-color: #869aba; position:relative; height:30px">
                                <a style="color: white; font-size:14px; position:relative; bottom:3px" href='print.php'><center>Click <u>here</u> to Print Receipt.</center></a>
                            </div>
                        </form></center>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <script src="assets/js/feather-icons/feather.min.js"></script>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/vendors/chartjs/Chart.min.js"></script>
    <script src="assets/vendors/apexcharts/apexcharts.min.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>