<?php include("includes/connect.php");
if (isset($_POST['save'])) {
$a=$_POST['fname1'];
$b=$_POST['lname'];
$c=$_POST['gender'];
$d=$_POST['sel']."-".$_POST['sele']."-".$_POST['select'];
$e=$_POST['location'];
$f=$_POST['classe'];
$g=$_POST['phone'];
$h=$_POST['dpt'];
$i=$_POST['fname'];
$j=$_POST['mname'];
$k=$_POST['emails'];
$l=$_POST['usernames'];
$m=$_POST['passe'];
$sql=mysql_query("INSERT INTO students VALUES(' ','$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m')");
if ($sql) {
echo "this is inserted";
?>
<script>
alert("Student insertd");
</script>
<?php
}
else{
	echo "can't insert ma boi";
}
}
?>
<script src="java/jquery.js"></script>
	<script src="java/jquery-ui.js"></script>
	<link rel="stylesheet"href="java/jquery-ui.css">
</script>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo "student registration page";?></title>
	<link rel="stylesheet" type="text/css" href="css/sreg.css">
</head>
<body>
<div id="open">
<label>Add student</label>
</div>
<div id="lists">
<div id="dialog">
<div id="sregcontent">
<p style="font-size:20px; color: #dde6f4; margin-top:0px;">sign up..</p>
<table border="0">
<form method="POST">
		<tr>
		<td>Firstname</td><td><input type="text" name="fname1" title="provide student firstname" placeholder="Student's firstname"size="20" class="inp"></td>
	</tr>
		<tr>
		<td>Lastname</td><td><input type="text" name="lname" placeholder="Student's lastname" size="20" class="inp"></td>
</tr>
    <tr>
		<td>Gender</td><td width="40"><center><select name="gender" class="sex" colspan="3">

			<option value="male">Male</option>
			<option value="female">Female</option>
		</select>
		</center>
		</td>
	</tr>
	<tr>
		<td>Birth</td><td>
			<?php
echo "<select name='sel'>";
echo "<option>Y</option>";
$i=2016;
for ($i=2016; $i >=1800 ; $i--) { 
	echo "<option>".$i."</option>";
}//ending for loop
echo "</select>";
			?>
	
<?php
echo "<select name='sele'>";
echo "<option>"."M"."</option>";
$i=1;
for ($i=1; $i <=12 ; $i++) { 
echo "<option>".$i."</option>";
}
echo "</select>";
			?>
<?php
echo "<select name='select'>";
echo "<option>"."D"."</option>";
$i=1;
for ($i=1; $i<=30 ; $i++) { 
echo "<option>".$i."</option>";
}
echo "</select>";
?>		</td>
	</tr>

	<tr>
		<td>Address</td><td>
<select name="location">
<option>--Select--</option>
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
		<td>Class</td><td><input type="text" name="classe" placeholder="Student's class" size="20" class="inp"></td>
	</tr>
	</tr>
	<tr>
		<td>Phone</td><td><input type="text" name="phone" placeholder="Student's phone" size="20" class="inp"></td>
	</tr>
		<tr>
		<td>Departement</td><td><input type="text" name="dpt" placeholder="Student's departement" size="20" class="inp"></td>
	</tr>
	<tr>
		<td>Fathername</td><td><input type="text" name="fname" placeholder="Student's fathername" size="20" class="inp"></td>
	</tr>
	</tr>

		<tr>
		<td>Mathername</td><td><input type="text" name="mname" placeholder="Student's mathername" size="20" class="inp"></td>
	</tr>
	</tr>

		<tr>
		<td>Email</td><td><input type="email" name="emails" placeholder="Student's email" size="20" class="inp"></td>
	</tr>

	</tr>

		<tr>
		<td>Username</td><td><input type="text" name="usernames" placeholder="Student's username" size="20" class="inp"></td>
	</tr>
	<tr>
		<td>Password</td><td><input type="password" name="passe" placeholder="Student's password" size="20" class="inp"></td>
	</tr>
	<tr>
	<td colspan="3" align="center" height="25" width="60"><input type="submit" name="save" value="Sign up" class="sub"></td>
	</tr>
		</form>
</table>
</div>
</center>
</div>
</div>
</body>
</html>