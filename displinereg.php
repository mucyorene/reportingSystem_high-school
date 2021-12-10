<?php
session_start();
//var_dump($_SESSION); die;
if (!$_SESSION['it']) {
	header("location:index.php");
}
//die();
include("includes/connect.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo "Displine registration page";?></title>
<?php
include("includes/banner.php");
include("includes/itheader.php");
?>
	<link rel="stylesheet" type="text/css" href="css/admin.css">
	<script src="js/jquery.js"></script>
	<style type="text/css">
#fter{background-color: #5da1a7;height:60px;margin-top: 0px;font-family:corbel;text-align: center;
padding-top: 3px;position: fixed;z-index: 1px;width: 1200px;
}
</style>
</head>
<body>
<div id="deanblspace" style="background-color:white;color:black;overflow:hidden;margin-top:0px;">
&nbsp
<table id="deanregtable">
<form method="POST" class="re">
<tr>
	<td>Firstname</td><td><input type="text" pattern="[A-Za-z']{2,30}" required name="fname" placeholder="Firstname" size="20" class="inp" title="Firstname"></td>
</tr>
		<tr>
		<td>Lastname</td><td><input type="text"  pattern="[A-Za-z']{2,30}" required name="lname" placeholder="Lastname" size="20" class="inp" title="lastname"></td>
</tr>
    <tr>
		<td>Gender</td><td><select name="gender" required>
	<option value="">--Select--</option>
			<option value="male">Male</option>
			<option value="female">Female</option>
		</select>
		</center>
		</td>
	</tr>
<tr>
<td>ID number</td><td><input type="number" required  pattern="119[0-9]{13}" name="idnbr" placeholder="Identification card" size="20" title="Id number" class="inp"></td>
	</tr>
	<tr>
		<td>Address</td><td>
	<select name="location" required>
<option value="">--Select--</option>
<?php
$dis=mysql_query("SELECT * FROM district");
while ($loa=mysql_fetch_array($dis)) {
?>
<option value="<?= $loa['district_id'];?>"><?= $loa['district_name'];?></option>
<?php
}
?>
</select>
	</td>
	</tr>
	<tr>
		<td>Phone</td><td><input type="text" required name="phone" placeholder="Phones" size="20" class="inp" title="Enter the Dean of study's phone number"></td>
	</tr>
	<tr>
		<td>Qualification</td><td>
	<select name='qualification' required>
<option value="">--Select--</option>
<option>A2</option>
<option>A1</option>
<option>A0</option>
<option>Postgraduate</option>
	</select>
</td>
	</tr>
	</tr>

		<tr>
		<td>Email</td><td><input type="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" name="emails" placeholder="emails" size="20" class="inp" title="Email"></td>
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
$i=$a;
$j=$b.date("Y");
$che=mysql_query("SELECT * FROM displine WHERE firstname='$a' AND lastname='$b' AND 
	idnumber='$d' AND email='$h'") or die(mysql_error());
if (mysql_num_rows($che)>0) {
echo "<script>alert('$a $b already registered')</script>";
}else{
$sql=mysql_query("INSERT INTO displine SET 
d_id=null,
firstname='$a',
lastname='$b',gender='$c',idnumber='$d',
location='$e',phones='$f',qualification='$g',
email='$h',username='$i',password='$j'") or die(mysql_error());
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