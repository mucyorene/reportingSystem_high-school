<?php
include("includes/connect.php");
//var_dump($_GET['clasid']);
$r=mysql_query("SELECT *FROM teachers");
$ro=mysql_fetch_array($r);
$idd=$ro['t_id'];
$bg=mysql_query("SELECT *FROM classes");
$fd=mysql_fetch_array($bg);
$idcl=$fd['cl_id'];
$cget=explode(',',$_GET['clasid']);
$clids=$cget[1];
//echo $cid;
$yid=$cget[0];

//var_dump($_GET['clid']);

$r=mysql_query("SELECT *FROM classes WHERE classes.cl_id='$clids'");
$ro=mysql_fetch_array($r);
?>
<html>
<head>
<title></title>
</head>
<body>
<table style="margin-top:3%;margin-left:2%;">
<tr align="center">
<td colspan="3">
</td>
</tr>
<tr>
<td style="text-align:center;font-size:150%;color:none;">#&nbsp</td>
<td style="text-align:center;font-size:150%;color:none;">Student name</td>
<td style="text-align:center;font-size:150%;color:none;">Second setting marks</td>

</tr>
<form method="POST" action="">
<input type="hidden" name="courid" value="<?php echo $_GET['coursesid'];?>">
<?php
$stuincl=mysql_query("SELECT students.*,classes.* FROM students,classes WHERE 
	students.cl_id=classes.cl_id AND classes.cl_id='$clids'") or die(mysql_error());
$i=1;
while ($row=mysql_fetch_array($stuincl)) {
	$sid=$row['s_id'];//getting the student id
	//var_dump($row);
?>
<tr>
<input type="hidden" name="yss" value="<?= $yeid?>">
<input type="hidden" name="sid" value="<?= $row['s_id'];?>">
<td><?php echo $i;?></td>
<td><?php echo $row['firstname'];?>&nbsp&nbsp<?php echo $row['lastname'];?>&nbsp&nbsp&nbsp</td>

<td><input type="text" size="20" name='<?= $row['s_id']."1"; ?>'></td>
</tr>
<?php $i++; }?>
<tr>
<td colspan="4" align="right">
<input type="submit" name="save" value="Save" style="padding:1%;padding-right:2%;margin-right:0%;"></td>
</tr>
</form>
</table>
</body>
</html>
