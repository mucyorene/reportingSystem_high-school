<?php
include("includes/connect.php");
//var_dump($_GET);
$r=mysql_query("SELECT *FROM departement");
$ro=mysql_fetch_array($r);
$idd=$ro['d_dpt'];

$bg=mysql_query("SELECT *FROM classes");
$fd=mysql_fetch_array($bg);
$idcl=$fd['cl_id'];
?>
<table>
<form method="POST" name=studentlist>
<?php

$sq=mysql_query($s = "SELECT *FROM students,classes,departement,caurses 
WHERE students.cl_id=classes.cl_id AND departement.d_dpt=classes.d_dpt
AND caurses.cl_id=classes.cl_id and caurses.c_id={$_GET['coursesid']}")or die(mysql_error());
$i=1;
while ($row=mysql_fetch_array($sq)) {
?>
<tr><td><?php echo $row['firstname'];?>&nbsp&nbsp<?php echo $row['lastname'];?></td>
<td><input type="text" size="30" name='<?= $i ?>'></td>
</tr>
<?php $i++; }?>
<tr><td colspan="2" align="right"><input type="submit" name="save" value="Save"></td></tr>
</form>
</table>
<?php
if (isset($_POST['save'])) {
	foreach ($_POST as $key => $value) {
		if(!is_numeric($key))
			continue;
		mysql_query("INSERT INTO marks SET Marks='{$value}', student='{$key}', term");
		# code...
	}
}
?>