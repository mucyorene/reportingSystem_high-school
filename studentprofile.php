<?php
session_start();
include("includes/connect.php");
if (!$_SESSION['s_id']) {
header("LOCATION:logout.php");
}
?>
<html>

<head>
	<title>Setting</title>
<?php
include("includes/banner.php");
include("includes/stheader.php");
?>
	<link rel="stylesheet" type="text/css" href="css/teacher.css">
	<style type="text/css">
#fter{background-color: #5da1a7;height:60px;margin-top: 350px;font-family:corbel;text-align: center;
padding-top: 3px;position: fixed;z-index: 1px;width: 1200px;
}
	</style>
</head>

<body>
<div id="fter">
<h3>Allright reserved &copy by Mucyo Rene</h3>
</div>
<div id="blankspace" style="overflow-y:scroll;">
<div style="margin-left:25%;height:50%;width:50%;background-color:#dde6f4;">
<?php
$query=mysql_query("SELECT * FROM students,district WHERE district.district_id=students.location 
	AND s_id='{$_SESSION['s_id']}'") or die(mysql_error());
$roop=1;
while ($fet=mysql_fetch_array($query)) {

?>
<form method="POST">
<table align="center">
	<tr><td>First name</td><td><input type="text" name="fname" disabled value="<?= $fet['firstname'];?>" pattern="[A-Za-z]{2,30}" title="Enter valid username"></td></tr>
	<tr><td>Last name</td><td><input type="text" name="lname" disabled value="<?= $fet['lastname']?>" pattern="[A-Za-z]{2,30}"></td></tr>
	<tr><td>Gender</td><td><select disabled name="gender" style="width:100%;"><option><?= $fet['gender'];?></option></select></td></tr>
	<tr><td>Date of birth</td><td><input type="text" name="dob" disabled value="<?= $fet['DOB'];?>"></td></tr>
	<tr><td>Location</td><td><input type="text" name="location" disabled value="<?= $fet['district_name']?>"></td></tr>
	<tr><td>Phones</td><td><input type="text" name="phone" disabled value="<?= $fet['phones']?>"></td></tr>
	<tr><td>Fathername</td><td><input type="text" name="father" disabled value="<?= $fet['fathername']?>"></td></tr>
	<tr><td>Mothername</td><td><input type="text" name="mother" disabled value="<?= $fet['mathername']?>"></td></tr>
	<tr><td>Email</td><td><input type="email" name="mother" title="Enter valid email" value="<?= $fet['email'];?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"></td></tr>
	<tr><td>Username</td><td><input type="text" name="uname" value="<?= $fet['username']?>" required pattern=".{2,10}" title="Enter valid password"></td></tr>
	<tr><td>Password</td><td><input type="password" name="pass" value="<?= $fet['password']?>" required></td></tr>
<tr><td colspan="2" align="right"><input type="submit" name="update" value="Update" id="update"></td></tr>
</table>
</form>
<?php $roop++;}?>
</div>
</div>
</body>
</html>
<?php
if (isset($_POST['update'])) {
//echo "<script>alert('cricked')</script>";
	$a=mysql_real_escape_string($_POST['uname']);
	$b=mysql_real_escape_string($_POST['pass']);
	$up=mysql_query("UPDATE students SET username='$a',
		password='$b' WHERE s_id='{$_SESSION['s_id']}'") or die(mysql_error());
if ($up) {
echo "<script>alert('updated')</script>";
}
}
?>