<?php
session_start();
//var_dump($_SESSION);
if (!$_SESSION['disp']) {
header("location:logout.php");
}
include("includes/connect.php");
?>
<!DOCTYPE html>
<html>

<head>
	<title>Setting</title>
<?php
include("includes/banner.php");
include("includes/dheader.php");
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
<div id="deanspace" style="overflow-y:scroll;">
	<div id="to" style="margin:left:25%;">
<form method="POST">
<table align="center">
<?php
//echo $_SESSION['teacher'];
$quer=mysql_query("SELECT * FROM displine WHERE d_id='{$_SESSION['disp']}'") or die(mysql_error());
$i=1;
while ($row=mysql_fetch_array($quer)) {

?>
<tr>
<td>First name</td>
<td><input type="text" name="fname" value="<?= $row['firstname']?>" size="20" disabled></td>
</tr>
<tr>
<td>Last name</td>
<td><input type="text" name="fname" value="<?= $row['lastname']?>" size="20" disabled></td>
</tr>
<tr>
<td>Identification number</td>
<td><input type="text" name="idnumber" size="20" value="<?= $row['idnumber']?>" disabled></td>
</tr>
<tr>
<td>Location</td>
<td><input type="text" name="location" value="<?= $row['location']?>" size="20" disabled></td>
</tr>
<tr>
<td>Phones</td>
<td><input type="text" name="phone" value="<?= $row['phones']?>" size="20" pattern="07[2,3,8]{1}[0-9]{7}"></td>
</tr>
<tr>
<td>Qualification</td>
<td><select disabled style="width:100%;"><option><?= $row['qualification']?></option></select></td>
</tr>
<tr>
<td>Username</td>
<td><input type="text" name="uname" value="<?= $row['username']?>" size="20"></td>
</tr>
<tr>
<td>Password</td>
<td><input type="password" name="pass" value="<?= $row['password']?>" size="20"></td>
</tr>
<tr><td colspan="2" align="right"><input type="submit" name="note" value="Update"></td></tr>
</table>
</form>
<?php
$i++;}
?>
	</div>
	<?php
if (isset($_POST['note'])) {
$a=mysql_real_escape_string($_POST['phone']);
$b=mysql_real_escape_string($_POST['uname']);
$c=mysql_real_escape_string($_POST['pass']);
$qwer=mysql_query("UPDATE displine SET phones='$a',username='$b',password='$c' WHERE d_id='{$_SESSION['disp']}'") or die(mysql_error());
if ($qwer) {
echo "<script>alert('done')</script>";
}
}
	?>
</div>
</body>
</html>