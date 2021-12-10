<?php
	include("includes/connect.php");
	//var_dump($_GET);
	$r=mysqli_query($conn,"SELECT *FROM teachers");
	$ro=mysqli_fetch_array($r);
	$idd=$ro['t_id'];
	$bg=mysqli_query($conn,"SELECT *FROM classes");
	$fd=mysqli_fetch_array($bg);
	$idcl=$fd['cl_id'];
	$cget=explode(',',$_GET['cid']);
	$cid=$cget[1];
	//echo $cid;
	$yid=$cget[0];
?>
<html>
<head>
<title></title>
</head>
<script src="java/jquery.js"></script>
<script type="text/javascript">

</script>
<body>
<table style="margin-top:3%;margin-left:2%;">
<tr align="center">
<td colspan="3">
<?php
	$gf=mysqli_query($conn,"SELECT *FROM caurses WHERE c_id='$cid'");
	$rowcourse=mysqli_fetch_array($gf);
	$ty=$rowcourse['c_id'];
	echo "<font size=5px color=black>".$rowcourse['coursename']."</font>";
?>
</td>
</tr>
<tr>
<td style="text-align:center;font-size:150%;color:black;">#&nbsp</td>
<td style="text-align:center;font-size:150%;color:black;">Student name</td>
<td style="text-align:center;font-size:150%;color:black;">CAT/<?php echo $rowcourse['maximum']/2;?></td>
<td style="text-align:center;font-size:150%;color:black;">EXAMS/<?php echo $rowcourse['maximum']/2;?></td>
</tr>
<div id="frmmarks">
<form method="POST"  action="">
<input type="hidden" name="courid" value="<?php echo $_GET['coursesid'];?>">
<?php

$sq=mysqli_query($conn,$s = "SELECT *FROM students,classes,departement,caurses 
WHERE students.cl_id=classes.cl_id AND departement.d_dpt=classes.d_dpt
AND caurses.cl_id=classes.cl_id and caurses.c_id='$cid'")or die(mysqli_error($conn));
$i=1;
while ($row=mysqli_fetch_array($sq)) {
	$sid=$row['s_id'];//getting the student id
?>
<tr>
<td><?php echo $i;?></td>
<td><?php echo $row['firstname'];?>&nbsp&nbsp<?php echo $row['lastname'];?></td>
<input type="hidden" name="cid" value="<?= $cid?>">
<input type="hidden" value="<?php echo $yid;?>" name="years">
<td><input type="number" size="10" name='<?= $row['s_id']."1"; ?>' style="border:1px solid black"></td>
<td><input type="number" size="10" name='<?= $row['s_id']."2"; ?>' style="border:1px solid black"></td>
</tr>
<?php $i++; }?>
<tr>
<td colspan="4" align="right">
<input type="submit" name="save" class="save" value="Save" style="padding:1%;padding-right:2%;margin-right:0%;"></td>
</tr>
</form>
</div>
</table>
</body>
</html>
