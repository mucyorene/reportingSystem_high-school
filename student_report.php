<?php
include("includes/connect.php");
//var_dump($_GET);
?>
<html>
<head>
<title></title>
</head>
<body>
<table>
<form method="POST" action="" class=studentlist>
<?php
$sq=mysql_query("SELECT * FROM student WHERE student.cl_id=")or die(mysql_error());
$row=mysql_fetch_array($sq);
?>
<tr>
<td><?php echo $row['firstname'];?>&nbsp&nbsp<?php echo $row['lastname'];?></td>
</tr>
<?php $i++; }?>
</form>
</table>
</body>
</html>
