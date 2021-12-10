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
</head>
<body>
<div id="deanblspace">
&nbsp
<table id="deanregtable">
<form method="POST">
<tr>
	<td>Firstname</td><td><input type="text" name="fname" placeholder="Firstname" size="20" class="inp" title="Firstname"></td>
</tr>
		<tr>
		<td>Lastname</td><td><input type="text" name="lname" placeholder="Lastname" size="20" class="inp" title="lastname"></td>
</tr>
    <tr>
		<td>Gender</td><td><select name="gender">
			<option value="male">Male</option>
			<option value="female">Female</option>
		</select>
		</center>
		</td>
	</tr>
<tr>
<td>ID number</td><td><input type="number" name="idnbr" placeholder="Identification card" size="20" title="Id number" class="inp"></td>
	</tr>
	<tr>
		<td>Address</td><td><input type="text" name="location" placeholder="Province/district/sector" size="20" class="inp" title="Location"></td>
	</tr>
	<tr>
		<td>Phone</td><td><input type="text" name="phone" placeholder="Phones" size="20" class="inp" title="Enter the Dean of study's phone number"></td>
	</tr>
	<tr>
		<td>Qualification</td><td><input type="text" name="qualification" placeholder="Qualification" size="20" class="inp" title="Enter the Dean of study's qualification"></td>
	</tr>
	</tr>

		<tr>
		<td>Email</td><td><input type="email" name="emails" placeholder="emails" size="20" class="inp" title="Email"></td>
	</tr>
	<tr>
	<td colspan="3" align="center" height="25" width="60"><input type="submit" name="save" value="Sign up" class="sub"></td>
	</tr>
		</form>
</table>
<?php
if (isset($_POST['save'])) {
$a=$_POST['fname'];
$b=$_POST['lname'];
$c=$_POST['gender'];
$d=$_POST['idnbr'];
$e=$_POST['location'];
$f=$_POST['phone'];
$g=$_POST['qualification'];
$h=$_POST['emails'];
$i=$a;
$j=$b.date("Y");
$sql=mysql_query("INSERT INTO displine SET d_firstname='$a',
	d_lastname='$b',d_gender='$c',d_idno='$d',
d_location='$e',d_phone='$f',d_qualification='$g',
d_email='$h',username='$i',password='$j'");
if ($sql) {
echo "dean inserted";
}
}
?>
</div>
<?php include("includes/footer.php");?>
</body>
</html>