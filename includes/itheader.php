<!DOCTYPE html>
<html>
<head>
	<title></title>
<style type="text/css">
ul{
background-color:#5da1a7;
}
ul li{
	text-decoration: none;
	display:inline-block;
	list-style: none;
	padding-left: 2%;
	padding-right: 2%;
	padding-top: 1%;
	padding-bottom: 1%;
	border-radius: 3px 3px 0px 0px;
	margin-left: 5%;
}
ul li:hover{
background-color: white;
}
.active{
	background-color:white;
	text-decoration: none;
	font-size: 150%;
	color: #dde6f4;
	font-family: Arial,Helvetica,sans-serif;

}
.inactive{
text-decoration: none;
	font-size: 150%;
	color: #dde6f4;
	font-family: Arial,Helvetica,sans-serif;
}
.links{
text-decoration: none;
	font-size:20px;
	color: black;
	font-family: Arial,Helvetica,sans-serif;
}
}
</style>
</head>
<body>
<ul>
<li <?php if(isset($_GET['home'])){ echo"class='active'"; } else{ echo "class='inactive'";}?>>
<a href="it.php?home=1" id="new1" class=links>Home</a></li>
<li <?php if(isset($_GET['ch'])){ echo"class='active'"; } else{ echo "class='inactive'";}?>>
<a href="adminreg.php?ch=1" id="new2" class=links>Register dean of Study</a>
</li>
<li <?php if(isset($_GET['disp'])){ echo "class='active'";}else{echo "class='inactive'";}?>>
<a href="displinereg.php?disp" class=links>Add dean of displine</a>
</li>
<li <?php if(isset($_GET['cou'])){ echo "class='active'";}else{echo "class='inactive'";}?>>
<a href="logout.php?dean" class=links>Logout</a>
</li>
</ul>
</body>
</html>