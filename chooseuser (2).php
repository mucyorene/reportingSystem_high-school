<?php
session_start();
include("includes/connect.php");

if (!$_SESSION['deanp']) {
header("location:index.php");
}

$tid=$_SESSION['deanp'];
$sqli=mysql_query("SELECT *FROM dean WHERE id='$tid'") or die(mysql_error());
$rowtitle=mysql_fetch_array($sqli);
//echo "<script>alert('$tid')</script>";
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $rowtitle['firstname']." ".$rowtitle['lastname'];?></title>
	<?php
include("includes/banner.php");
include("includes/header.php");
?>
	<link rel="stylesheet" type="text/css" href="css/chooseuser.css">
	<style type="text/css">
#fter{background-color: #5da1a7;height:60px;margin-top: 400px;font-family:corbel;text-align: center;
padding-top: 3px;position: fixed;z-index: 1px;width: 1200px;
}
</style>
</head>
<body>
<div id="indcontent">
<div class="action"><!--this is the division of student links-->
	<div id="fter">
<h3>Allright reserved &copy Mucyo Rene</h3>
</div>
<div id="blankspace">
<!--======================================this is the page where admin will choose use to be added
===========================================================-->
<div>
<div id="open"style="display:inline-block;font-size:150%;margin-left:10%;color:none;">
<label>Add student</label>	
</div>
<div id="openx"style="display:inline-block;font-size:150%;margin-left:10%;color: none;">
<label>Add Teachers</label>
</div>
<div id="listt" style="display:none;">
<!--teacher contents-->
<table border="0" style="margin-left:20%;">
	<form method="POST">
		<tr>
		<td id="tds">Firstname</td><td><input type="text" pattern="[A-Za-z']{2,30}" required name="fname1" placeholder="Teacher's firstname"size="20" class="inp" title="Enter the teacher's firstname"></td>
	</tr>
		<tr>
		<td id="tds">Lastname</td><td><input type="text" pattern="[A-Za-z']{2,30}" required name="lname" placeholder="Teacher's lastname" size="20" class="inp" title="Enter the teacher's lastname"></td>
</tr>
    <tr>
		<td id="tds">Sex</td><td width="40"><center>
		<select name="gender" required title="Select gender">
			<option value="">--Select--</option>
			<option value="male">Male</option>
			<option value="female">Female</option>
		</select>
		</center>
		</td>
	</tr>
<tr>
		<td id="tds">id numbers</td><td><input type="text" pattern="119[0-9]{13}" required name="idcard" placeholder="Teacher identity card number"size="20" title="enter the teacher's id" class="inp"></td>
	</tr>

	<tr>
		<td id="tds">Address</td><td>
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
	</tr>
	<tr>
		<td id="tds">Phones</td><td>
<input type="text"  required name="phone1" placeholder="Teacher's phone" size="20" class="inp"
pattern="07[2,3,8]{1}[0-9]{7}" title="Provide the Rwandan valid phone number"></td>
	</tr>
	<tr>
		<td id="tds">Qualification</td><td>
<select name='qualify' required style="padding-right:30%;">
<option>A2</option>
<option>A1</option>
<option>A0</option>
<option>Postgraduate</option>
	</select>
	</td>
	</tr>
	</tr>

		<tr>
		<td id="tds">Email</td><td><input required type="email" name="mail" 
		placeholder="Teacher's email" size="20" class="inp" title="Enter the teacher's email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]{6,5}+\.[a-z]{2,3}$"></td>
	</tr>
	</tr>
	<tr>
	<td colspan="3" align="right" height="25" width="60">
		<input type="submit" name="save" value="Sign up" class="sub"></td>
	</tr>
		</form>
</table>
</div>
<script src="java/jquery.js"></script>
	<script src="java/jquery-ui.js"></script>
	<link rel="stylesheet"href="java/jquery-ui.css">
<script>
$(document).ready(function(){
        $("#listt").hide(500);
   $("#openx").click(function(){
   	$("#lists").hide(200);
$("#listt").slideToggle();
   });
});
</script>

<?php
if (isset($_POST['save'])) {
$a=mysql_real_escape_string($_POST['fname1']);
$b=mysql_real_escape_string($_POST['lname']);
$c=mysql_real_escape_string($_POST['gender']);
$d=mysql_real_escape_string($_POST['idcard']);
$e=mysql_real_escape_string($_POST['location']);
$f=mysql_real_escape_string($_POST['phone1']);
$g=mysql_real_escape_string($_POST['qualify']);
$h=mysql_real_escape_string($_POST['mail']);
$i=$b;
$j=$a.date("y");
$checi=mysql_query("SELECT * FROM teachers WHERE firstname='$a' AND lastname='$b' AND idnumber='$d'") or die(mysql_error());
if (mysql_num_rows($checi)>0) {
echo "<script>alert(' $a $b already registered')</script>";
}else{
$e="INSERT INTO teachers VALUES(' ','$a','$b','$c','$d','$e','$f','$g','$h','$i','$j')";
$sql=mysql_query($e);
if ($sql) {
?>
<script>
alert("Teacher inserted");
</script>
<?php
}else{
?>
<script>
	alert("can't insert plz");
</script>
<?php
echo "can't inserted";
}
}
}
?>
<div id="lists" style="display:none;">
<table border="0">
<form method="POST" enctype="multipart/form-data"action=''>
		<tr>
		<td id="tds">Firstname</td><td><input type="text" pattern="[A-Za-z']{2,30}" name="fname1" required title="provide student firstname" placeholder="Student's firstname"size="20" class="inp"></td>
	</tr>
		<tr>
		<td id="tds">Lastname</td><td><input type="text" pattern="[A-Za-z']{2,30}" name="lname" required placeholder="Student's lastname" size="20" class="inp"></td>
</tr>
    <tr>
		<td id="tds">Gender</td><td width="40"><center><select name="gender"  class="sex" colspan="3">

			<option value="male">Male</option>
			<option value="female">Female</option>
		</select>
		</center>
		</td>
	</tr>
	<tr>
		<td id="tds">Birth</td><td>
			<?php
echo "<select name='sel' title='Enter valid year' required>";
echo "<option value=''>Y</option>";
$i=2016;
for ($i=2016; $i >=1800 ; $i--) { 
	echo "<option>".$i."</option>";
}//ending for loop
echo "</select>";
			?>
	
<?php
echo "<select name='sele' required title='Enter valid month'>";
echo "<option value=''>"."M"."</option>";
$i=1;
for ($i=1; $i <=12 ; $i++) { 
echo "<option>".$i."</option>";
}
echo "</select>";
			?>
<?php
echo "<select name='select' required title='Enter valid day'>";
echo "<option value=''>"."D"."</option>";
$i=1;
for ($i=1; $i<=30 ; $i++) { 
echo "<option>".$i."</option>";
}
echo "</select>";
?>		</td>
	</tr>

	<tr>
		<td id="tds">Address</td><td>
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
	</tr>
<tr>
		<td id="tds">Phone</td><td><input type="text" required name="phone" placeholder="Student's phone" size="20" class="inp"
		pattern="07[2,3,8]{1}[0-9]{7}" title="Provide the Rwandan valid phone number"></td>
	</tr>
	<tr>
		<td id="tds">Fathername</td><td><input type="text" required name="fname" placeholder="Student's fathername" size="20" class="inp"></td>
	</tr>

		<tr>
		<td id="tds">Mathername</td><td><input type="text" required name="mname" placeholder="Student's mathername" size="20" class="inp"></td>
	</tr>
	</tr>

		<tr>
		<td id="tds">Email</td><td><input type="email" required name="emails" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"
		placeholder="Student's email" size="20" class="inp"></td>
	</tr>

<tr>
	<td id="tds">class</td><td>
	<select name="classe" required>
<option valu="">--Select--</option>
	<?php
$sql=mysql_query("SELECT *FROM classes");
if ($sql) {
$i=1;
while ($d=mysql_fetch_array($sql)) {
echo "<option>".$d['classname']."</option>";
}
}
	?>
	</select>
	</td>
	</tr>
<tr>
<td>Profile</td><td><input type="file" name="pic"/></td>
</tr>
	<tr>
	<td colspan="3" align="right" height="25" width="60"><input type="submit" name="saves" value="Sign up" class="sub"></td>
	</tr>
		</form>
</table>
<script>
$(document).ready(function(){
        $("#lists").hide(500);
   $("#open").click(function(){
   	$("#listt").hide(100);
$("#lists").slideToggle();
   });
});
</script>
</div>
</div>
<?php
if (isset($_POST['saves'])) {
$a=mysql_real_escape_string($_POST['fname1']);
$b=mysql_real_escape_string($_POST['lname']);
$c=mysql_real_escape_string($_POST['gender']);
$d=mysql_real_escape_string($_POST['sel']."-".$_POST['sele']."-".$_POST['select']);
$e=mysql_real_escape_string($_POST['location']);
$f=mysql_real_escape_string($_POST['phone']);
$g=mysql_real_escape_string($_POST['fname']);
$h=mysql_real_escape_string($_POST['mname']);
$i=mysql_real_escape_string($_POST['emails']);
$l=mysql_real_escape_string($_FILES['pic']['name']);
$j=$b;
$k=$a.date("Y");
$cv=mysql_real_escape_string($_POST['classe']);
$checkid=mysql_query("SELECT * FROM students WHERE firstname='$a' AND lastname='$b' AND phones='$f'") or die(mysql_error());
if (mysql_num_rows($checkid)>0) {
echo "<script>alert('$a $b already registered')</script>";
}else{
$sq=mysql_query("SELECT *FROM classes WHERE classname='$cv'");
if ($sq) {
$row=mysql_fetch_array($sq);
$cl_id=$row['cl_id'];
}
$sql=mysql_query("INSERT INTO students VALUES
(' ','$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$cl_id','$l','check')") or die(mysql_error());
move_uploaded_file($_FILES['pic']['tmp_name'], 'photos/'.$l);
if ($sql) {
echo "this is inserted";
}
else{
?>
<script>
alert("can't insert the people");
</script>
<?php
}
}
}
?>
</body>
</html>
