<?php
//var_dump($_GET['clasid']);
include("includes/connect.php");
	?>
<form method="POST">
<table>
<?php
$quer=mysqli_query($conn,"SELECT * FROM classes,departement WHERE cl_id='{$_GET['clasid']}'")or die(mysql_error());
$fe=mysqli_fetch_array($quer);
?>
<tr><td>Classname</td><td><input type="text" value="<?= $fe['classname']?>" name="cname" required></td></tr>
<tr><td>Departement</td><td>
<select name="classdpt">
<option value="<?= $row['d_dpt']?>"><?= $fe['dpt_name']?></option>
<?php
$slq=mysqli_query($conn,"SELECT *FROM departement");
if ($slq) {
while ($row=mysqli_fetch_array($slq)) {
?>
<option value="<?= $row['d_dpt']?>"><?= $row['dpt_name']?></option>
<?php
}
}
?>
</select>
</td></tr>
<tr><td>Year</td><td>
<select name="ye">
<option></option>
<?php
$sq=mysqli_query($conn,"SELECT *FROM years");
while ($row=mysqli_fetch_array($sq)) {
?>
<option value="<?= $row['y_id']?>"><?php echo $row['year'];?></option>
<?php
}
?>
</select>
</td></tr>
<tr><td colspan="2" align="right"><input type="submit" value="Update" name="update"></td></tr>
</form>
</table>

<?php
if (isset($_POST['update'])) {
$clasna=mysql_real_escape_string($_POST['cname']);
$classdpt=mysql_real_escape_string($_POST['classdpt']);
$eya=mysql_real_escape_string($_POST['ye']);
$f=mysqli_query($conn,"UPDATE classes SET classname='$clasna',d_dpt='$classdpt',year_id='$eya'")
 or die(mysql_error());
if ($f) {
echo "<script>alert('updated')</script>";
}
}
?>