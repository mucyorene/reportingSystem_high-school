<?php include("includes/connect.php");?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo "welcome dean of displine";?></title>
	<link rel="stylesheet" type="text/css" href="css/displine.css">
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
<div class="action"><!--this is the division of student links-->
<div class="linkspace"><!--this division combine links and user output interface-->
<ul>
	<li>Home</a></li>
	<li><a href="displinemarksreg.php">Insert marks</a></a></li>
	<li> Profile</a></li>
	<li><a href="logout.php">Logout</a></a></li>
</ul>
<div id="blankspace">
this is the space reserved for action view
</div>
</div>
</div>
</div>
</body>
</html>