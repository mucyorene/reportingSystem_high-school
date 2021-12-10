<!DOCTYPE html>
<html>
<head>
	<title></title>
<style>
#baner{height: 122px;background-color: #5cb85c;text-align: center;color: white;
padding-top: 4px; margin-top: 10px;border-radius: 10px 10px 0px 0px;}
#in{margin-left: 90%;margin-top: -60px;border-radius: 5px 5px 5px 5px;}
</style>
</head>
<body>
	<?php
include("includes/connect.php");
$quer=mysqli_query($conn,"SELECT * FROM dean");
$row=mysqli_fetch_array($quer);
	?>
<div id="baner">
<h1>SCHOOL REPORTING AND INFORMATION SYSTEM
<img src="photos/wda.jpg" height="100" width="100" id="in"></h1>
</div>
</body>
</html>