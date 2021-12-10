<!--
School reporting and information system designed by MUCYO 
Tuyisenge Réné edited from 7/4/2016as final project of high
school at SAVE Technical School
-->
<!DOCTYPE html>
<html>
<head>
	<title><?php echo "st_page";?></title>
	<link rel="stylesheet" type="text/css" href="css/st_page.css">
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
<div id="banner">
<img src="images/bann.png" height="150" width="850px">
</div>
<div id="adcss">
	<img src="images/betterone.jpg" height="65" width="60">
</div>
<div id="logoutico">
<p>
		<img src="images/menu.png" style="width:30px;height:30px;margin-top:
	-5px;float:right;margin-top:-27px; margin-right:45px" id="setting" alt="setting icon">
</div>
<div class="action"><!--this is the division of student links-->
<div class="linkspace"><!--this division combine links and user output interface-->
<ul>
	<li><a href="#"><img src="images/index.png" height="50" width="50"> Home</a></li>
	<li><a href="#"><img src="images/space.png" height="50" width="50"> Report</a></li>
	<li><a href="#"><img src="images/prof.png" height="50" width="50"> Profile</a></li>
</ul>
<div id="blankspace">

</div>
</div>
</div>
</div>
</body>
</html>
