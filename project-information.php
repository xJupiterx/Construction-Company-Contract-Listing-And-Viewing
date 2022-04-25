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
                                <center><a href ='project-information.php'><u>Project Information</u></a></center>
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
                    <center><div class="card" style = " width:75%; background-color:gray">
                        <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #869aba">
                            <h4 class="card-title" style="color: white; font-size: 28px"><strong>Project Information</strong></h4>
                        </div>
                        <form class="card-body px-0 pb-0" method='post'>
                            <div class='row'>
                                <div class='col-md-4'>
                                    <p id = 'text4'>Owner Name:</p>
                                </div>
                                <div class='col-md-8'>
                                    <input id = 'textbox10' type="text" name="owner_name" placeholder="" required>
                                </div>
                            </div>
                            <br>
                            <div class='row'>
                                <div class='col-md-4'>
                                    <p id = 'text4'>Project Name:</p>
                                </div>
                                <div class='col-md-8'>
                                    <input id = 'textbox10' type="text" name="proj_name" placeholder="" required>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-4'>
                                    <p id = 'text4'>Project Address:</p>
                                </div>
                                <div class='col-md-8'>
                                    <input id = 'textbox10' type="text" name="proj_address" placeholder="" required>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-4'>
                                    <p id = 'text4'>Type of Project:</p>
                                </div>
                                <div class='col-md-8'>
                                    <input id = 'textbox10' type="text" name="proj_type" placeholder="" required>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-4'>
                                    <p id = 'text4'>General Description:</p>
                                </div>
                                <div class='col-md-8'>
                                    <input id = 'textbox10' type="text" name="proj_desc" placeholder="" required>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-4'>
                                    <p id = 'text4'>Budget:</p>
                                </div>
                                <div class='col-md-8'>
                                    <input id = 'textbox10' type="text" name="budget" placeholder="" required>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-4'>
                                    <p id = 'text4'>Desired Duration:</p>
                                </div>
                                <div class='col-md-4'>
                                    <input id = 'textbox8' type="date" name="start_date" placeholder="Start Date" required>
                                </div>
                                <div class='col-md-4'>
                                    <input id = 'textbox9' type="date" name="end_date" placeholder="End Date" required>
                                </div>
                            </div>
                            <br>
                            <div class='row'>
                                <div class='col-md-4'>
                                    <p id = 'text4'>Name of Contact Person:</p>
                                </div>
                                <div class='col-md-8'>
                                    <input id = 'textbox7' type="text" name="contact_person" placeholder="" required>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-4'>
                                    <p id = 'text4'>Telephone:</p>
                                </div>
                                <div class='col-md-8'>
                                    <input id = 'textbox10' type="text" name="cp_cpno" placeholder="" required>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-4'>
                                    <p id = 'text4'>Email:</p>
                                </div>
                                <div class='col-md-8'>
                                    <input id = 'textbox10' type="text" name="cp_email" placeholder="" required>
                                </div>
                            </div>
                            <br>
                            <div class='row'>
                                <div class='col-md-4'>
                                    <p id = 'text4'>Civil Engineer Information:</p>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-4'>
                                    <p id = 'text4'>Name:</p>
                                </div>
                                <div class='col-md-8'>
                                    <input id = 'textbox10' type="text" name="ce_name" placeholder="" required>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-4'>
                                    <p id = 'text4'>Telephone:</p>
                                </div>
                                <div class='col-md-8'>
                                    <input id = 'textbox10' type="text" name="ce_cpno" placeholder="" required>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-4'>
                                    <p id = 'text4'>Email:</p>
                                </div>
                                <div class='col-md-8'>
                                    <input id = 'textbox10' type="text" name="ce_email" placeholder="" required>
                                </div>
                            </div>
                            <br>
                            <div class='row'>
                                <div class='col-md-4'>
                                    <p id = 'text4'>Architect Information:</p>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-4'>
                                    <p id = 'text4'>Name:</p>
                                </div>
                                <div class='col-md-8'>
                                    <input id = 'textbox10' type="text" name="a_name" placeholder="" required>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-4'>
                                    <p id = 'text4'>Telephone:</p>
                                </div>
                                <div class='col-md-8'>
                                    <input id = 'textbox10' type="text" name="a_cpno" placeholder="" required>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-4'>
                                    <p id = 'text4'>Email:</p>
                                </div>
                                <div class='col-md-8'>
                                    <input id = 'textbox10' type="text" name="a_email" placeholder="" required>
                                </div>
                            </div>
                            <br>
                            <div class='row'>
                                <div class='col-md-4'>
                                    <p id = 'text4'>Contractor Information:</p>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-4'>
                                    <p id = 'text4'>Name:</p>
                                </div>
                                <div class='col-md-8'>
                                    <input id = 'textbox10' type="text" name="c_name" placeholder="" required>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-4'>
                                    <p id = 'text4'>Telephone:</p>
                                </div>
                                <div class='col-md-8'>
                                    <input id = 'textbox10' type="text" name="c_cpno" placeholder="" required>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-4'>
                                    <p id = 'text4'>Email:</p>
                                </div>
                                <div class='col-md-8'>
                                    <input id = 'textbox10' type="text" name="c_email" placeholder="" required>
                                </div>
                            </div>
                            <br>
                            <div class="clearfix">
                                <input class="btn btn-primary float-end" id = 'buttonSize1' type="submit" name="add_project" value="ADD PROJECT" style = 'margin-right:380px'> 
                            </div>
                            <br>
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