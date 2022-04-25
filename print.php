<?php 
include('assets/php/server.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Information</title>

    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/chartjs/Chart.min.css">

    <link rel="stylesheet" href="assets/css/design.css">
    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/icon/icon.png" type="image/x-icon">
<style type="text/css" media="print">
        @media print{
            .noprint, .noprint *{
                display: none;
            }
        }
</style>   
</head>
<body onload = "print()">
<div class="container">
    <center>
    <div class="p-3 mb-2 bg-warning text-dark" style="font-size: 50px; font-weight: bold;"></div>
        <hr>
    </center>
   
    <table id="ready" class="table table-striped  table-bordered bg-warning" style="width: 100%;">
  </thead>
  <tbody><div class="main-content container-fluid">
                <br>
                <div class="page-title">
                    <h3>Payment Information</h3>
                </div>
                <br>
                <section class="col-md-12">
                        <div class="card" style = " width:75%;background-color:#869aba">
                        <div class = 'row'>
                            <div class = 'col-md-12'>
                                <center><p id = 'text4' style = 'font-size: 26px; font-weight:bold'>Payment Details</p></center>
                            </div>
                        </div>
                        <form class="card-body px-0 pb-0" method = 'post'>
                            <p id = 'text4'>Project Name: <?php echo $_SESSION['payment_name'] ?></p>
                            <p id = 'text4'>Project Cost: ₱ <?php echo $_SESSION['payment_cost'] ?></p>
                            <?php $total = $_SESSION['payment_cost']; 
                            $amountpaid = 0;
                            ?>
                            
                            <br><br><br>
                            <div class = 'row'>
                                <div class = 'col-md-12'>
                                    <center><p id = 'text4' style = 'font-size: 26px; font-weight:bold'>Payment Breakdown</p></center>
                                </div>
                            </div>
                            <br>
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
                                        <p id = 'text4'>Date: <?php echo $_SESSION[$datecounter] ?></p>
                                    </div>
                                    <div class = 'col-md-4'>
                                        <p id = 'text4'>Amount Paid: ₱ <?php echo $_SESSION[$paymentcounter] ?></p>
                                    </div>
                                    <div class = 'col-md-4'>
                                        <p id = 'text4'>Balance:₱ <?php echo $total ?><p>
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
                        </form>
                    </div>
                </section>
            </div>
  <div class="container">
        <?php if($_SESSION['accesslevel'] == 'ADMIN'){ ?>
            <button type="" class="btn btn-info noprint" style="width: 100%;" onclick="window.location.replace('payment-info.php');">CANCEL PRINTING</button>
        <?php }else{ ?>
            <button type="" class="btn btn-info noprint" style="width: 100%;" onclick="window.location.replace('client-payment-info.php');">CANCEL PRINTING</button>
        <?php } ?>
  </div>
    

       
</div>
    
</body>
</html>