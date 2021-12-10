<?php
include("includes/connect.php");
//var_dump($_GET);
$mix=explode(',',$_GET['clasid']);
$clid=$mix[1];
$yid=$mix[0];
$sq=mysqli_query($conn,$s = "SELECT *FROM caurses  WHERE cl_id='$clid'")or die(mysql_error());
//echo $s;
?>
Course:
<select style="padding-right:50" name=caurses class="caurses">
<option>Select course</option>
<?php
if ($sq) {
$i=1;
while ($d=mysqli_fetch_array($sq)) {
?>
<option value="<?php echo $yid[0].",".$d['c_id'];?>"><?php echo $d['coursename'];?></option>
<?php
$i++;}
}
?>
</select>&nbsp &nbsp &nbsp &nbsp &nbsp
