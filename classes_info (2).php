<?php
include("includes/connect.php");
//var_dump($_GET);
$ids=explode(',',$_GET['deptid']);
$clid=$ids[1];
$sq=mysql_query($s = "SELECT * FROM classes WHERE d_dpt='$clid'")or die(mysql_error());
//echo $s;
?>
Choose class:
<select style="padding-right:50" name="clas" class="clas"id="clas">
<option>Select class</option>
<?php
if ($sq) {
$i=1;
while ($d=mysql_fetch_array($sq)) {?>
<option value="<?php echo $ids[0].",".$d['cl_id'];?>"><?php echo $d['classname'];?></option>
<?php
$i++;
}
}
?>
</select>
