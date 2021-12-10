
<?php
include("includes/connect.php");
//var_dump($_GET['ids']);
$ids=$_GET['ids'];
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="POST">
<input type="hidden" name="ids" value="<?php echo $ids;?>">
<table>
<?php
$upsele=mysql_query("SELECT students.*,district.* FROM students,district WHERE s_id='$ids'") or die(mysql_error());
if (mysql_num_rows($upsele)>0) {
	//var_dump($row);
$row=mysql_fetch_array($upsele);
?>
		<tr>
		<td>Firstname</td><td><input type="text" name="fname1" value="<?php echo $row['firstname'];?>" size="20" class="inp"></td>
	</tr>
		<tr>
		<td>Lastname</td><td><input type="text" name="lname" value="<?php echo $row['lastname'];?>" size="20" class="inp"></td>
</tr>
    <tr>
		<td>Gender</td><td width="40"><center><select name="gender" class="sex" colspan="3" value="<?php $row['gender'];?>">

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
<?php
$sq=mysql_query("SELECT * FROM district") or die(mysql_error());
while ($loa=mysql_fetch_array($sq)) {
?>
<option value="<?= $loa['district_id'];?>"><?php echo $loa['district_name'];?></option>
<?php
}
?>
</select>
</td>
	</tr>
<tr>
		<td>Phone</td><td><input type="text" name="phone" value="<?php echo $row['phones'];?>" size="20" class="inp"></td>
	</tr>
	<tr>
		<td>Fathername</td><td><input type="text" name="fname" value="<?php echo $row['fathername'];?>" size="20" class="inp"></td>
	</tr>

		<tr>
		<td>Mathername</td><td><input type="text" name="mname" value="<?php echo $row['mathername'];?>" size="20" class="inp"></td>
	</tr>
	</tr>

		<tr>
		<td>Email</td><td><input type="email" name="emails" value="<?php echo $row['email'];?>" size="20" class="inp"></td>
	</tr>

<tr>
	<td>class</td><td>
	<select name="classe">
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
	<td colspan="3" align="center" height="25" width="60">
	<input type="submit" name="update" value="Update" class="upd" style="color:black;"></td>
	</tr>
</table>
<?php
}
?>
</form>
</body>
</html>