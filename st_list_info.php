<?php
include("includes/connect.php");
//var_dump($_GET);
$gtid=explode(',',$_GET['clase']);
$clid=$gtid[1];
$yid=$gtid[0];
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
Select your name<select name="maname" class="maname">
<option>--Select your name--</option>
<?php

//finding the list of students
$sq=mysql_query($s = "SELECT students.firstname,students.status,students.s_id,students.lastname,classes.cl_id 
	FROM students,classes WHERE students.cl_id=classes.cl_id AND classes.cl_id='$clid'")or die(mysql_error());
$i=1;
while ($row=mysql_fetch_array($sq)) {
	$sid=$row['s_id'];//getting the student id
	//var_dump($row);//alright
	//echo $row['s_id']; //this is true
?>
<option value="<?= $sid?>,<?= $yid?>,<?= $clid?>"><?php echo $row['firstname']." ".$row['lastname'];?></option>
<?php
}
?>
</select>
</body>
</html>