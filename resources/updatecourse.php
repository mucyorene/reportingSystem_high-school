<?php
include("./includes/connect.php");
var_dump($_GET['idcourse']);
?>
<form method="POST">
<table>
<tr><td>CaurseName</td><td><input type="text" name="cname" 
placeholder="Enter caurse name" size="30"></td></tr>
<tr><td>Acronym</td><td><input type="text" placeholder="Enter acronym " size="30" name="acronym"></td></tr>
<tr><td>Class</td>
<td>
<select name="clid">
<?php
$fd=mysql_query("SELECT *FROM classes");
while ($rowd=mysql_fetch_array($fd)) {
?>
<option value="<?php echo $rowd['cl_id'];?>"><?php echo $rowd['classname'];?></option>
<?php
}
?>
</select>
</td>
</tr>

<tr><td>Teacher</td>
<td>
<select name="tid">
<?php
$fd=mysql_query("SELECT DISTINCT *FROM teachers");
while ($rowd=mysql_fetch_array($fd)) {
?>
<option value="<?php echo $rowd['t_id'];?>">
<?php echo $rowd['firstname']." ".$rowd['lastname'];?></option>
<?php
}
?>
</select>
</td>
</tr>

<tr><td>Departement</td>
<td>
<select name="did">
<?php
$fd=mysql_query("SELECT DISTINCT *FROM departement");
while ($rowd=mysql_fetch_array($fd)) {
?>
<option value="<?php echo $rowd['d_dpt'];?>"><?php echo $rowd['dpt_name'];?></option>
<?php
}
?>
</select>
</td>
</tr>

<tr><td>Maximum</td><td><input type="text" name="max" placeholder="Enter caurse name" size="30"></td></tr>
<tr><td colspan="2" align="right"><input type="submit" value="Save" name="save"></td></tr>
</form>
</table>