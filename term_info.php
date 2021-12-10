<?php
include("includes/connect.php");
var_dump($_GET);

$sq=mysql_query($s = "SELECT *FROM terms'")or die(mysql_error());
//echo $s;
?>
Choose term:
<select style="padding-right:50" name="term" class="clas"id="clas">
<option>Select class</option>
<?php
if ($sq) {
$i=1;
while ($d=mysql_fetch_array($sq)) {
echo "<option value='{$d['term_id']}'>".$d['term_name']."</option>";
$i++;}
}
?>
</select>
