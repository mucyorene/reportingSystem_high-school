<?php
session_start();
include("includes/connect.php");
if (!$_SESSION['deanp']) {
header("LOCATION:logout.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Setting</title>
<?php
include("includes/banner.php");
include("includes/header.php");
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
<h3>Allright reserved &copy by Mucyo Rene</h3>
</div>
<div id="deanspace">
<div style="margin-left:25%;background-color:#dde6f4;height:70%;width:50%;">
<?php
$quer=mysql_query("SELECT * FROM dean WHERE id='{$_SESSION['deanp']}'") or die(mysql_error());
$i=1;
while ($row=mysql_fetch_array($quer)) {

?>
<form method="POST">
<table align="center">
<tr>
<td>First name</td>
<td><input type="text" name="fname" value="<?= $row['firstname']?>" size="20"></td>
</tr>
<tr>
<td>Last name</td>
<td><input type="text" name="lname" value="<?= $row['lastname']?>" size="20"></td>
</tr>
<tr>
<td>Identification number</td>
<td><input type="text" name="idnumber" size="20" value="<?= $row['idnumber']?>"></td>
</tr>
<tr>
<td>Location</td>
<td><input type="text" name="loca" value="<?= $row['location']?>" size="20" disabled ></td>
</tr>
<tr>
<td>Phones</td>
<td><input type="text" name="phone" value="<?= $row['phones']?>" size="20"></td>
</tr>
<tr>
<td>Qualification</td>
<td><input type="text" name="quali" value="<?= $row['qualification']?>" size="20"></td>
</tr>
<tr>
<td>Username</td>
<td><input type="text" name="uname" value="<?= $row['username']?>" size="20"></td>
</tr>
<tr>
<td>Password</td>
<td><input type="password" name="pass" value="<?= $row['password']?>" size="20"></td>
</tr>
<tr><td colspan="2" align="right"><input type="submit" name="update" value="Update"></td></tr>
</table>
</form>
<?php
$i++;}
?>
</div>
<?php
if (isset($_POST['update'])) {
$fna=mysql_real_escape_string($_POST['fname']);
$lna=mysql_real_escape_string($_POST['lname']);
$idn=mysql_real_escape_string($_POST['idnumber']);
$ph=mysql_real_escape_string($_POST['phone']);
$qu=mysql_real_escape_string($_POST['quali']);
$una=mysql_real_escape_string($_POST['uname']);
$pa=mysql_real_escape_string($_POST['pass']);
$rea=mysql_query("UPDATE dean SET firstname='$fna',lastname='$lna',idnumber='$idn',
	phones='$ph',qualification='$qu',username='$una',password='$pa'") or die(mysql_error());
if ($rea) {
echo "<script>alert('done')</script>";
}else{
	echo "<script>alert('not update')</script>";
}
}
?>
</div>
</body>
</html>