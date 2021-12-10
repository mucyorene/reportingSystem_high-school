<?php
session_start();
//var_dump($_SESSION); die;
if (!$_SESSION['it']) {
	header("location:index.php");
}
//die();
include("includes/connect.php");
include("includes/banner.php");
include("includes/itheader.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo "welcome IT Technitian";?></title>
	<link rel="stylesheet" type="text/css" href="css/admin.css">
	<script src="js/jquery.js"></script>
	<style type="text/css">
#fter{background-color: #5da1a7;height:60px;margin-top: 0px;font-family:corbel;text-align: center;
padding-top: 3px;position: fixed;z-index: 1px;width: 1200px;
}
</style>
</head>
<body>
<div id="blankspace" style="background-color:white;
color:black;overflow:scrlol;margin-top:0px;">
&nbsp

<form method="POST" enctype="multipart/form-data" class="re">
<table id="deanregtable">
<tr>
	<td>Firstname</td><td><input type="text" required name="fname" placeholder="Firstname" size="20" class="inp" title="Firstname"></td>
</tr>
		<tr>
		<td>Lastname</td><td><input type="text" required name="lname" placeholder="Lastname" size="20" class="inp" title="lastname"></td>
</tr>
    <tr>
		<td>Gender</td><td><select name="gender" required style="padding-right:30%;">
			<option value="male">Male</option>
			<option value="female">Female</option>
		</select>
		</center>
		</td>
	</tr>
<tr>
<td>ID number</td><td><input type="number" pattern="119[0-9]{13}"  required name="idnbr" placeholder="Identification card" size="20" title="Id number" class="inp"></td>
	</tr>
	<tr>
		<td>Address</td><td>
		<select name="location" required style="padding-right:30%;">
<option>--Select--</option>
<?php
$dis=mysql_query("SELECT * FROM district");
while ($loa=mysql_fetch_array($dis)) {
?>
<option><?= $loa['district_name'];?></option>
<?php
}
?>
</select>
	</td>
	</tr>
	<tr>
		<td>Phone</td><td><input type="text" pattern="07[2,3,8]{1}[0-9]{7}" required name="phone" placeholder="Phones" size="20" class="inp" title="Enter the Dean of study's phone number"></td>
	</tr>
	<tr>
		<td>Qualification</td><td>
		<select name='qualification' required style="padding-right:30%;">
<option>A2</option>
<option>A1</option>
<option>A0</option>
<option>Postgraduate</option>
	</select>
	</tr>
	</tr>

		<tr>
		<td>Email</td><td><input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required name="emails" placeholder="emails" size="20" class="inp" title="Email"></td>
	</tr>
<tr>
<td>School name</td><td><input type="text" required name="sname" size="20" class="inp" placeholder="School name"></td>
</tr>
<tr>
	<td>School logo</td><td><input type="file" required name="logo"></td>
</tr>
<tr>
<td>School District</td><td>
<select required name="disname">
<option value="">--Select--</option>
<?php
$qui=mysql_query("SELECT * FROM district") or die(mysql_error());
while ($fe=mysql_fetch_array($qui)) {
?>
<option value="<?= $fe['district_id']?>"><?= $fe['district_name']?></option>
<?php
}
?>
</select>
</td>
</tr>
	<tr>
	<td colspan="3" align="right" height="25" width="60">
	<input type="submit" name="save" value="Sign up"></td>
	</tr>
		</form>
</table>
<?php
if (isset($_POST['save'])) {
$a=mysql_real_escape_string($_POST['fname']);
$b=mysql_real_escape_string($_POST['lname']);
$c=mysql_real_escape_string($_POST['gender']);
$d=mysql_real_escape_string($_POST['idnbr']);
$e=mysql_real_escape_string($_POST['location']);
$f=mysql_real_escape_string($_POST['phone']);
$g=mysql_real_escape_string($_POST['qualification']);
$h=mysql_real_escape_string($_POST['emails']);
$sname=mysql_real_escape_string($_POST['sname']);
$log=$_FILES['logo']['name'];
$disn=mysql_real_escape_string($_POST['disname']);
$i=$a;
$j=$b.date("Y");
$qcheck=mysql_query("SELECT * FROM dean WHERE firstname='$a' AND lastname='$b'") ;
if (mysql_num_rows($qcheck)>0) {
	echo "<script>alert('$a $b already registered')</script>";
}else{
$sql=mysql_query("INSERT INTO dean SET firstname='$a',lastname='$b',gender='$c',idnumber='$d',
location='$e',phones='$f',qualification='$g',email='$h',username='$i',password='$j',schoolname='$sname'
,logos='$log',schoollocation='$disn'");
move_uploaded_file($_FILES['logo']['tmp_name'],"photos/".$log);
if ($sql) {
echo "dean inserted";
}
}
}
?>
</div>
<div id="fter">
<h3>Allright reserved &copy by Mucyo Rene</h3>
</div>
</body>
</html>