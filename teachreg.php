<?php
include("includes/connect.php");
if (isset($_POST['save'])) {
	$a=$_POST['fname1'];
$b=$_POST['lname'];
$c=$_POST['gender'];
$d=$_POST['idcard'];
$e=$_POST['location'];
$f=$_POST['phone1'];
$g=$_POST['qualify'];
$h=$_POST['mail'];
$i=$_POST['users'];
$j=$_POST['pass'];
$sql=mysql_query("INSERT INTO teachers VALUES(' ','$a','$b','$c','$d','$e','$f','$g','$h','$i','$j')");
if ($sql) {
echo "this is inserted";
}
}
?>
<!--School Repporting And Information System
this page designed since 10/04/2016
for the final project of senior six computer scince-->
<!DOCTYPE html>
<html>
<head>
	<title><?php echo "Teacher registration page";?></title>
	<link rel="stylesheet" type="text/css" href="css/teachreg.css">
</head>
<body>
<div id="dialogx">
<div id="sregcontent">
<p style="font-size:20px; color: #dde6f4; margin-top:0px;">sign up..</p>
<table border="0">
<form method="POST">
<tr>
	<td colspan="2" align="right"><button>X</button></td>
</tr>
		<tr>
		<td>Firstname</td><td><input type="text" name="fname1" placeholder="Teacher's firstname"size="20" class="inp" title="Enter the teacher's firstname"></td>
	</tr>
		<tr>
		<td>Lastname</td><td><input type="text" name="lname" placeholder="Teacher's lastname" size="20" class="inp" title="Enter the teacher's lastname"></td>
</tr>
    <tr>
		<td>Sex</td><td width="40"><center><select name="gender">
			<option value="male">Male</option>
			<option value="female">Female</option>
		</select>
		</center>
		</td>
	</tr>
<tr>
		<td>id numbers</td><td><input type="text" name="idcard" placeholder="Teacher identity card number"size="20" title="enter the teacher's id" class="inp"></td>
	</tr>

	<tr>
		<td>Address</td><td><input type="text" name="location" placeholder="Province/district/sector" size="20" class="inp" title="Enter the teacher's location"></td>
	</tr>
	<tr>
		<td>Phones</td><td><input type="text" name="phone1" placeholder="Teacher's phone" size="20" class="inp" title="Enter the teacher's phone number"></td>
	</tr>
	<tr>
		<td>Qualification</td><td><input type="text" name="qualify" placeholder="Teacher's qualification" size="20" class="inp" title="Enter the teacher's qualification"></td>
	</tr>
	</tr>

		<tr>
		<td>Email</td><td><input type="email" name="mail" placeholder="Teacher's email" size="20" class="inp" title="Enter the teacher's email"></td>
	</tr>
	</tr>

		<tr>
		<td>Username</td><td><input type="text" name="users" placeholder="Teacher's usernames" size="20" class="inp" title="Enter the teacher's username"></td>
	</tr>

	</tr>
	<tr>
		<td>Password</td><td><input type="password" name="pass" placeholder="Teacher's password" size="20" class="inp" title="Enter the teacher's password"></td>
	</tr>
	<tr>
	<td colspan="3" align="center" height="25" width="60"><input type="submit" name="save" value="Sign up" class="sub"></td>
	</tr>
		</form>
</table>
</center>
</div>
</div>
</body>
</html>