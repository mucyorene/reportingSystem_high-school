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
	<link rel="stylesheet" type="text/css" href="css/admin.css">
	<script src="js/jquery.js"></script>
	<script>
$(document).ready(function(){
    $("#menuico").click(function(){
        $("#menu").hide(500);
    });
    $("#menuico").click(function(){
        $("#menu").show(1000);
    });
});//this hiding is running but no content to be hidded or showed
	</script>
</head>
<body>
<div id="indcontent">
<div class="action"><!--this is the division of student links-->
<div class="linkspace"><!--this division combine links and user output interface-->
<ul>
	<li><a href="adminpage.php">&nbspHome</a></li>
	<li><a href="chooseuser.php">&nbspSystem users</a></li>
	<li><a href="report.php">&nbspReport</a></li>
	<li><a href="#">&nbspCaurse</a></li>
	<li><a href="#">&nbspClass</a></li>
	<li><a href="deptreg.php">&nbspDepertment</a></li>
	<li><a href="#">&nbspYear</a></li>
	<li><a href="#">&nbspProfile</a></li>
	<li><a href="logout.php">logout</a></li>
</ul>
<div id="blankspace">

</div><!--ending blank space-->
</div><!--ending linkspace-->
</div>
</body>
</html>