<?php 
include('assets/php/server.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

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
                <div class="page-title">
                    <div class = 'row'>
                        <div class = 'col-md-4'>
                        </div>
                        <div class = 'col-md-4'>
                            <div class = 'row'>
                                <div class = 'col-md-4'>
                                <center><a href ='client-information.php'>Client Information</a></center>
                                </div>
                                <div class = 'col-md-4'>
                                <center><a href ='project-information.php'>Project Information</a></center>
                                </div>
                                <div class = 'col-md-4'>
                                <center><a href ='payment-information.php'>Payment Information</a></center>
                                </div>
                            <div>
                        </div>
                    </div>
                </div>
				<br>
                <section class="col-md-12">
                    <div class="card ">
                            <div class="card-header" style="background-color: #869aba">
                                <h4 style="color: white"><strong>Personal Information</strong></h4>
                            </div>
                            <div class="card-body">
                                <br>
								<div class="row">
                                    <div class = 'col-md-4' >
                                        <?php 
                                        $file = 'assets/images/avatar/' . $_SESSION['username'] . '.jpg';
                                        if(file_exists($file)): ?>
                                            <img src="assets/images/avatar/<?php echo $_SESSION['username']; ?>.jpg" height="300">
                                        <?php endif ?>
                                        <?php 
                                        if(!(file_exists($file))):  ?>
                                            <img src="assets/images/avatar/default.png" height="300"></center>
                                        <?php endif ?>
                                    </div>
                                    <div class = 'col-md-8' style = 'position:relative; right:60px'>
                                        <br><br>
                                        <p style = 'font-size:20px'><b>Name: </b><u><?php echo $_SESSION['lastname']; ?>, <?php echo $_SESSION['firstname']; ?>, <?php echo $_SESSION['middlename']; ?></u></p>
                                        <p style = 'font-size:20px'><b>Email: </b><u><?php echo $_SESSION['email']; ?></u></p>
                                        <p style = 'font-size:20px'><b>Telephone: </b><?php echo $_SESSION['cpno']; ?></p>
                                    </div>
                                    </div>
								</div>
                            </div>
                        </div>
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