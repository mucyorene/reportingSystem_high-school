<?php include("includes/connect.php");
//var_dump($_GET['idm']);
?>
<?php
$idt=$_GET['idm'];
//echo $idt;
$updatequery=mysqli_query($conn,"SELECT *FROM teachers WHERE t_id='$idt'") or die(mysqli_error());
if (mysqli_num_rows($updatequery)) {
$value=mysqli_fetch_array($updatequery);
?>
<form method="POST">
<input type="hidden" name="ide" value="<?php echo $idt;?>">
<table>
		<tr>
		<td>Firstname</td><td>
	<input type="text" name="fname1" value="<?php echo $value['firstname'];?>" size="20"></td>
	</tr>
		<tr>
		<td>Lastname</td><td><input type="text" name="lname" value="<?php echo $value['lastname'];?>" size="20"></td>
</tr>
    <tr>
		<td>Sex</td><td width="40"><center><select name="gender" value="<?php echo $data['gender'];?>" >
		<option><?php echo $value['gender'];?></option>
		</select>
		</center>
		</td>
	</tr>
<tr>
		<td>id numbers</td><td><input type="text" name="idcard" value="<?php echo $value['idnumber'];?>" size="20" class="inp"></td>
	</tr>

	<tr>
		<td>Address</td><td>
<select name="location">
<?php
$sq=mysqli_query($conn,"SELECT * FROM district") or die(mysqli_error());
while ($loa=mysqli_fetch_array($sq)) {
?>
<option value="<?= $loa['district_id'];?>"><?php echo $loa['district_name'];?></option>
<?php
}
?>
</select>
	</td>
	</tr>
	<tr>
		<td>Phones</td><td><input type="text" name="phone1" value="<?php echo $value['phones'];?>" size="20" class="inp"></td>
	</tr>
	<tr>
		<td>Qualification</td><td><input type="text" name="qualify" value="<?php echo $value['qualification'];?>" size="20" class="inp"></td>
	</tr>
	</tr>

		<tr>
		<td>Email</td><td><input type="email" name="mail" value="<?php echo $value['email'];?>" size="20" class="inp"></td>
	</tr>
	</tr>
	<tr>
	<td colspan="3" align="center" height="25" width="60">
	<input type="submit" name="savechange" value="Update" class="upd" id="file"/>
	</td>
	</tr>

</table>
<?php
}
?>
</form>
</html>