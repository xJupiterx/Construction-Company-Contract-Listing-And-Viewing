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
                    <h3>View Client Complete Information</h3>
                </div></center>
                <br>
                <section class="col-md-12">
                        <center><div class="card" style = " width:75%;background-color:gray">
                        <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #869aba">
                            <h4 class="card-title" style="color: white; font-size: 28px"><strong>Client Details</strong></h4>
                        </div>
                        <form class="card-body px-0 pb-0" method = 'post'>
                            <div class='row'>
                                <div class='col-md-4'>
                                    <p id = 'text4'>Name:</p>
                                </div>
                                <div class='col-md-8'>
                                    <p id = 'text5'> <?php echo $_SESSION['client_name'] ?></p>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-4'>
                                    <p id = 'text4'>Mailing Street Address:</p>
                                </div>
                                <div class='col-md-8'>
                                    <p id = 'text5'> <?php echo $_SESSION['client_address'] ?></p>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-4'>
                                    <p id = 'text4'>City:</p>
                                </div>
                                <div class='col-md-8'>
                                    <p id = 'text5'> <?php echo $_SESSION['city'] ?></p>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-4'>
                                    <p id = 'text4'>Telephone:</p>
                                </div>
                                <div class='col-md-8'>
                                    <p id = 'text5'> <?php echo $_SESSION['client_cpno'] ?></p>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-4'>
                                    <p id = 'text4'>Email:</p>
                                </div>
                                <div class='col-md-8'>
                                    <p id = 'text5'> <?php echo $_SESSION['client_email'] ?></p>
                                </div>
                            </div>
                            <br>
                            <div class='row'>
                                <div class='col-md-4'>
                                    <p id = 'text4'>Name of Contact Person:</p>
                                </div>
                                <div class='col-md-8'>
                                    <p id = 'text5'> <?php echo $_SESSION['contact_person'] ?></p>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-4'>
                                    <p id = 'text4'>Telephone:</p>
                                </div>
                                <div class='col-md-8'>
                                    <p id = 'text5'> <?php echo $_SESSION['cp_cpno'] ?></p>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-4'>
                                    <p id = 'text4'>Email:</p>
                                </div>
                                <div class='col-md-8'>
                                    <p id = 'text5'> <?php echo $_SESSION['cp_email'] ?></p>
                                </div>
                            </div>
                            <br>
                            <div class="card-footer" style="background-color: #869aba; position:relative; height:30px">
                                <a style="color: white; font-size:14px; position:relative; bottom:3px" href='client-info-edit.php'><center>Click <u>here</u> to edit Information.</center></a>
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