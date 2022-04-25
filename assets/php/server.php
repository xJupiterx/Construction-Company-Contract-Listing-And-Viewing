<?php

include('assets/php/connection.php');

$errors = [];

if (isset($_POST['logout'])) {
	session_destroy();
	$_SESSION['blocker'] = 'blocked';
	header("location: sign-in.php");
}

if (isset($_POST['signin'])) {
	$username= mysqli_real_escape_string($db,$_POST['username']); 
	$password = mysqli_real_escape_string($db,$_POST['password']);
	$spassword = md5($password);

	if (empty($username)) {array_push($errors, 'username is required');}
	if (empty($password)) {array_push($errors, 'password is required');}
	
	if (count($errors) == 0) {
		$querys = "SELECT * FROM users WHERE username = '$username' AND (password = '$password' OR password = '$spassword') " ;
		$results = mysqli_query($db,$querys);
		if (mysqli_num_rows($results)) {
			//display lastname depends on username
			$lastquery = "SELECT lastname FROM users WHERE username = '$username'";
			$lquery = mysqli_query($db,$lastquery);
			$lastnamequery = mysqli_fetch_assoc($lquery);
			$lastname = reset($lastnamequery);
			
			//display firstname depends on username
			$firstquery = "SELECT firstname FROM users WHERE username = '$username'";
			$fquery = mysqli_query($db,$firstquery);
			$firstnamequery = mysqli_fetch_assoc($fquery);
			$firstname = reset($firstnamequery);
			
			//display middlename depends on username
			$midquery = "SELECT middlename FROM users WHERE username = '$username'";
			$mquery = mysqli_query($db,$midquery);
			$middlenamequery = mysqli_fetch_assoc($mquery);
			$middlename = reset($middlenamequery);

            //display cpno depends on username
			$cnquery = "SELECT cpno FROM users WHERE username = '$username'";
			$cnquery = mysqli_query($db,$cnquery);
			$cnquery = mysqli_fetch_assoc($cnquery);
			$cnquery = reset($cnquery);
			
			//display email depends on username
			$emquery = "SELECT email FROM users WHERE username = '$username'";
			$equery = mysqli_query($db,$emquery);
			$mailquery = mysqli_fetch_assoc($equery);
			$email = reset($mailquery);
			
			//display accesslevel depends on username
			$accequery = "SELECT accesslevel FROM users WHERE username = '$username'";
			$aquery = mysqli_query($db,$accequery);
			$levelquery = mysqli_fetch_assoc($aquery);
			$acclevel = reset($levelquery);
			
			$_SESSION['username'] = $username ;
			$_SESSION['lastname'] = $lastname ;
			$_SESSION['firstname'] = $firstname ;
			$_SESSION['middlename'] = $middlename ;
			$_SESSION['cpno'] = $cnquery ;
			$_SESSION['email'] = $email ;
			$_SESSION['accesslevel'] = $acclevel ;
			if($acclevel == 'ADMIN'){
				header("location: admin-dashboard.php");
			}
            if($acclevel == 'CLIENT'){
				header("location: client-dashboard.php");
			}
		}
		else{
			array_push($errors, "wrong username/password");
		}
	}
}

if (isset($_POST['signup'])) {
	$lastname = "";
	$firstname = "";
	$middlename = "" ;
	$username = "";
    $cpno = "";
	$email = "";
	$password = "";
	$accesslevel = "CLIENT";

	$lastname= mysqli_real_escape_string($db,$_POST['lastname']);
	$firstname = mysqli_real_escape_string($db,$_POST['firstname']);
	$middlename = mysqli_real_escape_string($db,$_POST['middlename']);
	$username = mysqli_real_escape_string($db,$_POST['username']);
	$cpno = mysqli_real_escape_string($db,$_POST['cpno']);
	$email = mysqli_real_escape_string($db,$_POST['email']);
	$password = mysqli_real_escape_string($db,$_POST['password']);

	$password = md5($password);
	if (empty($lastname)) {array_push($errors, 'Lastname is Required'); $_SESSION['data'] = 'empty';}
	if (empty($firstname)) {array_push($errors, 'Firstname is Required'); $_SESSION['data'] = 'empty';}
	if (empty($middlename)) {array_push($errors, 'Middlename is Required'); $_SESSION['data'] = 'empty';}
	if (empty($username)) {array_push($errors, 'Username is Required'); $_SESSION['data'] = 'empty';}
	if (empty($cpno)) {array_push($errors, 'Phone number is Required'); $_SESSION['data'] = 'empty';}
	if (empty($email)) {array_push($errors, 'Email is Required'); $_SESSION['data'] = 'empty';}
	if (empty($password)) {array_push($errors, 'Password is Required'); $_SESSION['data'] = 'empty';}

	$userquery = "SELECT * FROM users WHERE username = '$username' or email ='$email' LIMIT 1";
	$query = mysqli_query($db,$userquery);
	$user = mysqli_fetch_assoc($query);

	if ($user > 0) {
		if ($user['username'] == $username) {
			array_push($errors, 'username already exist');
			$_SESSION['data'] = 'exist1';
		}
		if ($user['email'] == $email) {
			array_push($errors, 'email already exist');
			$_SESSION['data'] = 'exist2';
		}
	}

	if (count($errors) == 0) {
		$query = "INSERT INTO users (lastname,firstname,middlename,cpno,username,email,password,accesslevel) 
		VALUES ('$lastname','$firstname','$middlename','$cpno','$username','$email','$password','$accesslevel')" ;
		mysqli_query($db,$query);
		$_SESSION['username'] = $username ;
		echo '<script>alert("Account Successfully Created, Please Login!");window.location.href="sign-in.php";</script>';
	}
	$_SESSION['errors'] = $errors;
}

if (isset($_POST["clientviewer"])){
	
	$client_id = $_POST["clientviewer"];

	// Select all data in row (client)
	$all = "SELECT * FROM client WHERE client_id = '$client_id'";
	$all = mysqli_query($db,$all);
	$all = mysqli_fetch_assoc($all);

	$_SESSION['client_id'] = $client_id;
	$_SESSION['client_name'] = $all['client_name'];
	$_SESSION['client_address'] = $all['client_address'];
	$_SESSION['city'] = $all['city'];
	$_SESSION['client_cpno'] = $all['client_cpno'];
	$_SESSION['client_email'] = $all['client_email'];
	$_SESSION['contact_person'] = $all['contact_person'];
	$_SESSION['cp_cpno'] = $all['cp_cpno'];
	$_SESSION['cp_email'] = $all['cp_email'];

	if($_SESSION['accesslevel'] == 'ADMIN'){
		header('location: client-info.php');
	}
	else{
		header('location: client-client-info.php');
	}

}

if (isset($_POST['add_client'])) {

	$client_name= mysqli_real_escape_string($db,$_POST['client_name']);
	$client_address = mysqli_real_escape_string($db,$_POST['client_address']);
	$city = mysqli_real_escape_string($db,$_POST['city']);
	$client_cpno = mysqli_real_escape_string($db,$_POST['client_cpno']);
	$client_email = mysqli_real_escape_string($db,$_POST['client_email']);
	$contact_person = mysqli_real_escape_string($db,$_POST['contact_person']);
	$cp_cpno = mysqli_real_escape_string($db,$_POST['cp_cpno']);
	$cp_email = mysqli_real_escape_string($db,$_POST['cp_email']);

	$query = "INSERT INTO client (client_name,client_address,city,client_cpno,client_email,contact_person,cp_cpno,cp_email) 
	VALUES ('$client_name','$client_address','$city','$client_cpno','$client_email','$contact_person','$cp_cpno','$cp_email')" ;
	mysqli_query($db,$query);
	echo '<script>alert("Client Information was Successfully Uploaded!");window.location.href="admin-dashboard.php";</script>';
}

if (isset($_POST['update_client'])) {

	$client_name1 = mysqli_real_escape_string($db,$_POST['client_name1']);
	$client_address1 = mysqli_real_escape_string($db,$_POST['client_address1']);
	$city1 = mysqli_real_escape_string($db,$_POST['city1']);
	$client_cpno1 = mysqli_real_escape_string($db,$_POST['client_cpno1']);
	$client_email1 = mysqli_real_escape_string($db,$_POST['client_email1']);
	$contact_person1 = mysqli_real_escape_string($db,$_POST['contact_person1']);
	$cp_cpno1 = mysqli_real_escape_string($db,$_POST['cp_cpno1']);
	$cp_email1 = mysqli_real_escape_string($db,$_POST['cp_email1']);

	$query = 	"UPDATE client
				SET client_name = '$client_name1',
					client_address = '$client_address1',
					city = '$city1',
					client_cpno = '$client_cpno1',
					client_email = '$client_email1',
					contact_person = '$contact_person1',
					cp_cpno = '$cp_cpno1',
					cp_email = '$cp_email1'
				WHERE client_id = '$_SESSION[client_id]';";
	mysqli_query($db,$query);
	echo '<script>alert("Client Information was Successfully Updated!");window.location.href="admin-dashboard.php";</script>';
}

if (isset($_POST["projectviewer"])){
	
	$project_id = $_POST["projectviewer"];

	// Select all data in row (client)
	$all = "SELECT * FROM project WHERE project_id = '$project_id'";
	$all = mysqli_query($db,$all);
	$all = mysqli_fetch_assoc($all);

	$_SESSION['project_id'] = $project_id;
	$_SESSION['owner_name'] = $all['owner_name'];
	$_SESSION['proj_name'] = $all['proj_name'];
	$_SESSION['proj_address'] = $all['proj_address'];
	$_SESSION['proj_type'] = $all['proj_type'];
	$_SESSION['proj_desc'] = $all['proj_desc'];
	$_SESSION['budget'] = $all['budget'];
	$_SESSION['start_date'] = $all['start_date'];
	$_SESSION['end_date'] = $all['end_date'];
	$_SESSION['contact_person'] = $all['contact_person'];
	$_SESSION['cp_cpno'] = $all['cp_cpno'];
	$_SESSION['cp_email'] = $all['cp_email'];
	$_SESSION['ce_name'] = $all['ce_name'];
	$_SESSION['ce_cpno'] = $all['ce_cpno'];
	$_SESSION['ce_email'] = $all['ce_email'];
	$_SESSION['a_name'] = $all['a_name'];
	$_SESSION['a_cpno'] = $all['a_cpno'];
	$_SESSION['a_email'] = $all['a_email'];
	$_SESSION['c_name'] = $all['c_name'];
	$_SESSION['c_cpno'] = $all['c_cpno'];
	$_SESSION['c_email'] = $all['c_email'];
	
	if($_SESSION['accesslevel'] == 'ADMIN'){
		header('location: project-info.php');
	}
	else{
		header('location: client-project-info.php');
	}

}

if (isset($_POST['add_project'])) {

	$owner_name= mysqli_real_escape_string($db,$_POST['owner_name']);
	$proj_name= mysqli_real_escape_string($db,$_POST['proj_name']);
	$proj_address = mysqli_real_escape_string($db,$_POST['proj_address']);
	$proj_type = mysqli_real_escape_string($db,$_POST['proj_type']);
	$proj_desc = mysqli_real_escape_string($db,$_POST['proj_desc']);
	$budget = mysqli_real_escape_string($db,$_POST['budget']);
	$start_date = mysqli_real_escape_string($db,$_POST['start_date']);
	$end_date = mysqli_real_escape_string($db,$_POST['end_date']);
	$contact_person = mysqli_real_escape_string($db,$_POST['contact_person']);
	$cp_cpno= mysqli_real_escape_string($db,$_POST['cp_cpno']);
	$cp_email = mysqli_real_escape_string($db,$_POST['cp_email']);
	$ce_name = mysqli_real_escape_string($db,$_POST['ce_name']);
	$ce_cpno = mysqli_real_escape_string($db,$_POST['ce_cpno']);
	$ce_email = mysqli_real_escape_string($db,$_POST['ce_email']);
	$a_name = mysqli_real_escape_string($db,$_POST['a_name']);
	$a_cpno = mysqli_real_escape_string($db,$_POST['a_cpno']);
	$a_email = mysqli_real_escape_string($db,$_POST['a_email']);
	$c_name = mysqli_real_escape_string($db,$_POST['c_name']);
	$c_cpno = mysqli_real_escape_string($db,$_POST['c_cpno']);
	$c_email = mysqli_real_escape_string($db,$_POST['c_email']);

	$query = "INSERT INTO project (owner_name,proj_name,proj_address,proj_type,proj_desc,budget,start_date,end_date,contact_person,cp_cpno,cp_email,ce_name,
	ce_cpno,ce_email,a_name,a_cpno,a_email,c_name,c_cpno,c_email) 
	VALUES ('$owner_name','$proj_name','$proj_address','$proj_type','$proj_desc','$budget','$start_date','$end_date','$contact_person',
	'$cp_cpno','$cp_email','$ce_name','$ce_cpno','$ce_email','$a_name','$a_cpno','$a_email','$c_name','$c_cpno','$c_email')" ;
	mysqli_query($db,$query);
	echo '<script>alert("Project Information was Successfully Uploaded!");window.location.href="admin-dashboard.php";</script>';
}

if (isset($_POST['update_project'])) {

	$proj_name2 = mysqli_real_escape_string($db,$_POST['proj_name2']);
	$proj_address2 = mysqli_real_escape_string($db,$_POST['proj_address2']);
	$proj_type2 = mysqli_real_escape_string($db,$_POST['proj_type2']);
	$proj_desc2 = mysqli_real_escape_string($db,$_POST['proj_desc2']);
	$budget2 = mysqli_real_escape_string($db,$_POST['budget2']);
	$start_date2 = mysqli_real_escape_string($db,$_POST['start_date2']);
	$end_date2 = mysqli_real_escape_string($db,$_POST['end_date2']);
	$contact_person2 = mysqli_real_escape_string($db,$_POST['contact_person2']);
	$cp_cpno2 = mysqli_real_escape_string($db,$_POST['cp_cpno2']);
	$cp_email2 = mysqli_real_escape_string($db,$_POST['cp_email2']);
	$ce_name2 = mysqli_real_escape_string($db,$_POST['ce_name2']);
	$ce_cpno2 = mysqli_real_escape_string($db,$_POST['ce_cpno2']);
	$ce_email2 = mysqli_real_escape_string($db,$_POST['ce_email2']);
	$a_name2 = mysqli_real_escape_string($db,$_POST['a_name2']);
	$a_cpno2 = mysqli_real_escape_string($db,$_POST['a_cpno2']);
	$a_email2 = mysqli_real_escape_string($db,$_POST['a_email2']);
	$c_name2 = mysqli_real_escape_string($db,$_POST['c_name2']);
	$c_cpno2 = mysqli_real_escape_string($db,$_POST['c_cpno2']);
	$c_email2 = mysqli_real_escape_string($db,$_POST['c_email2']);

	$query = 	"UPDATE project
				SET proj_name = '$proj_name2',
					proj_address = '$proj_address2',
					proj_type = '$proj_type2',
					proj_desc = '$proj_desc2',
					budget = '$budget2',
					start_date = '$start_date2',
					end_date = '$end_date2',
					contact_person = '$contact_person2',
					cp_cpno = '$cp_cpno2',
					cp_email = '$cp_email2',
					ce_name = '$ce_name2',
					ce_cpno = '$ce_cpno2',
					ce_email = '$ce_email2',
					a_name = '$a_name2',
					a_cpno = '$a_cpno2',
					a_email = '$a_email2',
					c_name = '$c_name2',
					c_cpno = '$c_cpno2',
					c_email = '$c_email2'
				WHERE project_id = '$_SESSION[project_id]';";
	mysqli_query($db,$query);
	echo '<script>alert("Project Information was Successfully Updated!");window.location.href="admin-dashboard.php";</script>';
}

if (isset($_POST["paymentviewer"])){
	
	$payment_id = $_POST["paymentviewer"];

	// Select all data in row (payment)
	$all = "SELECT * FROM payment WHERE payment_id = '$payment_id'";
	$all = mysqli_query($db,$all);
	$all = mysqli_fetch_assoc($all);

	$_SESSION['payment_id'] = $payment_id;
	$_SESSION['owner_name'] = $all['owner_name'];
	$_SESSION['payment_name'] = $all['payment_name'];
	$payment_name = $_SESSION['payment_name'];
	$_SESSION['payment_cost'] = $all['payment_cost'];


	// Select all data in row (payment_list)
	$all = "SELECT * FROM payment_list WHERE payment_name = '$payment_name'";
	$all = mysqli_query($db,$all);
	$all = mysqli_fetch_assoc($all);

	$_SESSION['payment1'] = $all['payment1'];
	$_SESSION['payment2'] = $all['payment2'];
	$_SESSION['payment3'] = $all['payment3'];
	$_SESSION['payment4'] = $all['payment4'];
	$_SESSION['payment5'] = $all['payment5'];
	$_SESSION['payment6'] = $all['payment6'];
	$_SESSION['payment7'] = $all['payment7'];
	$_SESSION['payment8'] = $all['payment8'];
	$_SESSION['payment9'] = $all['payment9'];
	$_SESSION['payment10'] = $all['payment10'];
	$_SESSION['payment11'] = $all['payment11'];
	$_SESSION['payment12'] = $all['payment12'];
	$_SESSION['payment13'] = $all['payment13'];
	$_SESSION['payment14'] = $all['payment14'];
	$_SESSION['payment15'] = $all['payment15'];
	$_SESSION['payment16'] = $all['payment16'];
	$_SESSION['payment17'] = $all['payment17'];
	$_SESSION['payment18'] = $all['payment18'];
	$_SESSION['payment19'] = $all['payment19'];
	$_SESSION['payment20'] = $all['payment20'];

	$_SESSION['date1'] = $all['p1_date'];
	$_SESSION['date2'] = $all['p2_date'];
	$_SESSION['date3'] = $all['p3_date'];
	$_SESSION['date4'] = $all['p4_date'];
	$_SESSION['date5'] = $all['p5_date'];
	$_SESSION['date6'] = $all['p6_date'];
	$_SESSION['date7'] = $all['p7_date'];
	$_SESSION['date8'] = $all['p8_date'];
	$_SESSION['date9'] = $all['p9_date'];
	$_SESSION['date10'] = $all['p10_date'];
	$_SESSION['date11'] = $all['p11_date'];
	$_SESSION['date12'] = $all['p12_date'];
	$_SESSION['date13'] = $all['p13_date'];
	$_SESSION['date14'] = $all['p14_date'];
	$_SESSION['date15'] = $all['p15_date'];
	$_SESSION['date16'] = $all['p16_date'];
	$_SESSION['date17'] = $all['p17_date'];
	$_SESSION['date18'] = $all['p18_date'];
	$_SESSION['date19'] = $all['p19_date'];
	$_SESSION['date20'] = $all['p20_date'];

	if($_SESSION['accesslevel'] == 'ADMIN'){
		header('location: payment-info.php');
	}
	else{
		header('location: client-payment-info.php');
	}

}

if (isset($_POST['add_payment'])) {
	
	$owner_name= mysqli_real_escape_string($db,$_POST['owner_name']);
	$proj_name= mysqli_real_escape_string($db,$_POST['proj_name']);
	$proj_cost = mysqli_real_escape_string($db,$_POST['proj_cost']);

	$query = "INSERT INTO payment (owner_name,payment_name,payment_cost) 
	VALUES ('$owner_name','$proj_name','$proj_cost')" ;
	mysqli_query($db,$query);
	$query1 = "INSERT INTO payment_list (payment_name) 
	VALUES ('$proj_name')" ;
	mysqli_query($db,$query1);
	echo '<script>alert("Payment Information was Successfully Uploaded!");window.location.href="admin-dashboard.php";</script>';
}

if (isset($_POST['update_payment'])) {

	$date3 = mysqli_real_escape_string($db,$_POST['date3']);
	$payment3 = mysqli_real_escape_string($db,$_POST['payment3']);
	$dateupdater = 'p' . $_SESSION['lastCount'] . '_date';
	$paymentupdater = 'payment' . $_SESSION['lastCount'];

	$query = 	"UPDATE payment_list
				SET $dateupdater = '$date3',
					$paymentupdater = '$payment3'
				WHERE payment_name = '$_SESSION[payment_name]';";
	mysqli_query($db,$query);
	echo '<script>alert("Payment Successfully Updated!");window.location.href="admin-dashboard.php";</script>';
}