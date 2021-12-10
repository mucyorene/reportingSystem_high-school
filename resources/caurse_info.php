<?php
include("includes/connect.php");
//var_dump($_GET);
$sq=mysql_query($s = "SELECT *FROM caurses  WHERE cl_id='{$_GET['courseid']}'")or die(mysql_error());
//echo $s;
?>
Choose course:
<select style="padding-right:50" name=caurses class="caurses">
<option>Select course</option>
<?php
if ($sq) {
$i=1;
while ($d=mysql_fetch_array($sq)) {
echo "<option  value='{$d['c_id']}'>".$d['coursename']."</option>";
$i++;}
}
?>
</select>&nbsp &nbsp &nbsp &nbsp &nbsp
