<?php
include("includes/connect.php");
//var_dump($_GET);
$sq=mysql_query($s = "SELECT *FROM classes WHERE d_dpt='{$_GET['deptid']}'")or die(mysql_error());
//echo $s;
?>
Choose class:
<select style="padding-right:50" name="clas" class="clas">
<option>Select class</option>
<?php
if ($sq) {
$i=1;
while ($d=mysql_fetch_array($sq)) {
echo "<option value='{$d['cl_id']}'>".$d['classname']."</option>";
$i++;}
}
?>
</select>&nbsp &nbsp &nbsp &nbsp &nbsp
