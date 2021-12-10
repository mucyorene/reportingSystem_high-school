<?php
//var_dump($_GET);
include("includes/connect.php");
$id=$_GET['idpt'];
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
$query=mysql_query("SELECT * FROM departement WHERE d_dpt='$id'") or die(mysql_error());
$fe=mysql_fetch_array($query);
?>
<form method="POST">
<input type="hidden" name="idpt__" value="<?= $fe['d_dpt'];?>">
<table>
<tr><td>Departement name:</td><td><input type="text"  pattern="[A-Za-z' ]{2,30}" name="updpt" value="<?= $fe['dpt_name']?>"></td></tr>
<tr><td>Departement acronym:</td><td><input type="text"  pattern="[A-Za-z']{2,30}" name="upacrd" value="<?= $fe['acronym'];?>"></td></tr>
<tr><td>Year</td><td>
<select name="yidup" required>
<option value="">--Select--</option>
<?php
$seye=mysql_query("SELECT * FROM years");
if (mysql_num_rows($seye)) {
while ($feye=mysql_fetch_array($seye,MYSQL_ASSOC)) {
?>
<option value="<?= $feye['y_id'];?>"><?= $feye['year'];?></option>
<?php
}
}
?>
</select>
</td></tr>
<tr><td colspan="2" align="right"><input type="submit" name="upd" value="Update"></td></tr>
</table>
</form>
</body>
</html>