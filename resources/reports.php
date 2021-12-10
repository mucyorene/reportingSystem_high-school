<?php
include("includes/connect.php");
include("includes/banner.php");
include("includes/header.php");
session_start();
if (!$_SESSION['deanp']) {
header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo "Adminpage";?></title>
	<link rel="stylesheet" type="text/css" href="css/report.css">
</head>
<body>
<div id="indcontent">
<div class="action"><!--this is the division of student links-->
<div id="blankspace">
<!--======================================starting student report===========================================================-->
<table border="1">
<font color: "#83b0d2">
	<tr>
		<td height="15" width="907" colspan="15">
		<p>Republic of rwanda</p>
		<p>District Ruhango</p>
		<p>the name of school</p>
		</td>
	</tr>
	<tr>
		<td height="15" width="120"></td>
		<td height="15" width="120" align="center" colspan="3"><b>TERM 1</b></td>
		<td height="10" width="120" align="center" colspan="3"><b>TERM 2</b></td>
		<td height="10" width="120" align="center" colspan="3"><b>TERM 3</b></td>
		<td height="10" width="120" align="center" colspan="3"><b>YEAR</b></td>
	</tr>
	<tr>
		<td height="15" width="120"><b>Conduct</b></td>
		<td height="15" width="120" align="center" colspan="3"><b><center><?php echo "cond1";?></center></b></td>
		<td height="15" width="120" align="center" colspan="3"><b><center><?php echo "cond2";?></center></b></td>
		<td height="15" width="120" align="center" colspan="3"><b><center><?php echo "cond3";?></center></b></td>
		<td height="15" width="120" align="center" colspan="3"><b><center><?php echo "cond4";?></center></b></td>
	</tr>
	<tr>
		<td height="10" width="20" align="center"><b>Course</b></td>
		<td height="15" width="40"><b>CAT</b></td><td height="15" width="40"><b>EXAM</b></td><td height="15" width="40"><b>TOTAL</b></td>
		<td height="15" width="40"><b>CAT</b></td><td height="15" width="40"><b>EXAM</b></td><td height="15" width="40"><b>TOTAL</b></td>
		<td height="15" width="40"><b>CAT</b></td><td height="15" width="40"><b>EXAM</b></td><td height="15" width="40"><b>TOTAL</b></td>
		<td height="15" width="40"><b>CAT</b></td><td height="15" width="40"><b>EXAM</b></td><td height="15" width="40"><b>TOTAL</b></td>
	</tr>
	<tr>
		<td height="10" width="20">
		
		</td>
		<td height="15" width="40"></td><td height="15" width="40"></td><td height="15" width="40"></td>
		<td height="15" width="40"></td><td height="15" width="40"></td><td height="15" width="40"></td>
		<td height="15" width="40"></td><td height="15" width="40"></td><td height="15" width="40"></td>
		<td height="15" width="40"></td><td height="15" width="40"></td><td height="15" width="40"></td>
	</tr>
	<tr>
		<td height="10" width="20"></td>
		<td height="15" width="40"></td><td height="15" width="40"></td><td height="15" width="40"></td>
		<td height="15" width="40"></td><td height="15" width="40"></td><td height="15" width="40"></td>
		<td height="15" width="40"></td><td height="15" width="40"></td><td height="15" width="40"></td>
		<td height="15" width="40"></td><td height="15" width="40"></td><td height="15" width="40"></td>
	</tr>
	<tr>
		<td height="10" width="20"></td>
		<td height="15" width="40"></td><td height="15" width="40"></td><td height="15" width="40"></td>
		<td height="15" width="40"></td><td height="15" width="40"></td><td height="15" width="40"></td>
		<td height="15" width="40"></td><td height="15" width="40"></td><td height="15" width="40"></td>
		<td height="15" width="40"></td><td height="15" width="40"></td><td height="15" width="40"></td>
	</tr>
	<tr>
		<td height="10" width="20"></td>
		<td height="15" width="40"></td><td height="15" width="40"></td><td height="15" width="40"></td>
		<td height="15" width="40"></td><td height="15" width="40"></td><td height="15" width="40"></td>
		<td height="15" width="40"></td><td height="15" width="40"></td><td height="15" width="40"></td>
		<td height="15" width="40"></td><td height="15" width="40"></td><td height="15" width="40"></td>
	</tr>
	<tr>
		<td height="10" width="20"></td>
		<td height="15" width="40"></td><td height="15" width="40"></td><td height="15" width="40"></td>
		<td height="15" width="40"></td><td height="15" width="40"></td><td height="15" width="40"></td>
		<td height="15" width="40"></td><td height="15" width="40"></td><td height="15" width="40"></td>
		<td height="15" width="40"></td><td height="15" width="40"></td><td height="15" width="40"></td>
	</tr>
	<tr>
		<td height="10" width="20"></td>
		<td height="15" width="40"></td><td height="15" width="40"></td><td height="15" width="40"></td>
		<td height="15" width="40"></td><td height="15" width="40"></td><td height="15" width="40"></td>
		<td height="15" width="40"></td><td height="15" width="40"></td><td height="15" width="40"></td>
		<td height="15" width="40"></td><td height="15" width="40"></td><td height="15" width="40"></td>
	</tr>
	<tr>
		<td height="10" width="20"></td>
		<td height="15" width="40"></td><td height="15" width="40"></td><td height="15" width="40"></td>
		<td height="15" width="40"></td><td height="15" width="40"></td><td height="15" width="40"></td>
		<td height="15" width="40"></td><td height="15" width="40"></td><td height="15" width="40"></td>
		<td height="15" width="40"></td><td height="15" width="40"></td><td height="15" width="40"></td>
	</tr>
	<tr>
		<td height="10" width="20"></td>
		<td height="15" width="40"></td><td height="15" width="40"></td><td height="15" width="40"></td>
		<td height="15" width="40"></td><td height="15" width="40"></td><td height="15" width="40"></td>
		<td height="15" width="40"></td><td height="15" width="40"></td><td height="15" width="40"></td>
		<td height="15" width="40"></td><td height="15" width="40"></td><td height="15" width="40"></td>
	</tr>
	<tr>
		<td height="10" width="20"></td>
		<td height="15" width="40"></td><td height="15" width="40"></td><td height="15" width="40"></td>
		<td height="15" width="40"></td><td height="15" width="40"></td><td height="15" width="40"></td>
		<td height="15" width="40"></td><td height="15" width="40"></td><td height="15" width="40"></td>
		<td height="15" width="40"></td><td height="15" width="40"></td><td height="15" width="40"></td>
	</tr>
	<tr>
		<td height="10" width="20"></td>
		<td height="15" width="40"></td><td height="15" width="40"></td><td height="15" width="40"></td>
		<td height="15" width="40"></td><td height="15" width="40"></td><td height="15" width="40"></td>
		<td height="15" width="40"></td><td height="15" width="40"></td><td height="15" width="40"></td>
		<td height="15" width="40"></td><td height="15" width="40"></td><td height="15" width="40"></td>
	</tr>
	<tr>
		<td height="10" width="20"></td>
		<td height="15" width="40"></td><td height="15" width="40"></td><td height="15" width="40"></td>
		<td height="15" width="40"></td><td height="15" width="40"></td><td height="15" width="40"></td>
		<td height="15" width="40"></td><td height="15" width="40"></td><td height="15" width="40"></td>
		<td height="15" width="40"></td><td height="15" width="40"></td><td height="15" width="40"></td>
	</tr>
	<tr>
		<td height="10" width="20"></td>
		<td height="15" width="40"></td><td height="15" width="40"></td><td height="15" width="40"></td>
		<td height="15" width="40"></td><td height="15" width="40"></td><td height="15" width="40"></td>
		<td height="15" width="40"></td><td height="15" width="40"></td><td height="15" width="40"></td>
		<td height="15" width="40"></td><td height="15" width="40"></td><td height="15" width="40"></td>
	</tr>
	</font>
</table>

</div>
</div>
</div>
</body>
</html>