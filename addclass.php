<?php
include("includes/connect.php");
session_start();
if (!$_SESSION['deanp']) {
header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo "Adminpage";?></title>
	<link rel="stylesheet" type="text/css" href="css/addept.css">
	<script src="js/jquery.js"></script>
</head>
<body>
<div id="indcontent">
<div class="action"><!--this is the division of student links-->
<div class="linkspace"><!--this division combine links and user output interface-->
<ul>
	<li><a href="adminpage.php">&nbspHome</a></li>
	<li><a href="chooseuser.php">&nbspSystem users</a></li>
	<li><a href="report.php">&nbspReport</a></li>
	<li><a href="caursereg.php">&nbspCaurse</a></li>
	<li><a href="addclass.php">&nbspClass</a></li>
	<li><a href="addept.php">&nbspDepertment</a></li>
	<li><a href="yearactivate.php">&nbspYear</a></li>
	<li><a href="#">&nbspProfile</a></li>
	<li><a href="logout.php">logout</a></li>
</ul>
<div id="blankspace">
<table border="1">
<tr><td>Class name</td><input type="text" name="clname"size="4" placeholder="enter classname"></tr>
</table>
</div>
</div>
</div>
</div>
</body>
</html>