<?php
	session_start();
	//var_dump($_SESSION); die;
	if (!$_SESSION['disp']) {
		header("location:logout.php");
	}
	//die();
	include("includes/connect.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo "Welcome IT Technitian";?></title>
<?php
	include("includes/banner.php");
	include("includes/dheader.php");
?>
	<link rel="stylesheet" type="text/css" href="css/admin.css">
<style type="text/css">
	#fter{background-color: #5da1a7;height:60px;margin-top: 350px;font-family:corbel;text-align: center;
	padding-top: 3px;position: fixed;z-index: 1px;width: 1200px;
	}
</style>
</head>
<body>
<div id="fter">
	<h3>Allright reserved &copy Mucyo Rene</h3>
</div>
<div id="blankspace" style="overflow-y:scroll;height:350px;">
<div style="height:350px;width:450px;text-align:center;
	font-size:20px;margin-left:5%;overflow-y:scroll;">
	<h3>WELCOME TO YOUR REPORTING SYSTEM<hr width="350"></h3>
	<i>-In Rwandan technology this reporting system will be the most interesting and useful application in most of our schools concerning with reporting operations within high schools.<br>
		-This computer based information system will be displaying all the student marks there at school and it will make easy communication between the school and the students.<br> 
		
		-For the users of our system,you need to login with your username and password that you've given by the school.<br>
		-Unless you're a member in our school you can read more information.</i><br><br>
</div>
</div>
</body>
</html>
