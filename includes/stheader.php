<!DOCTYPE html>
<html>
<head>
	<title></title>
<style type="text/css">
ul{background-color:#5da1a7;height: 60px;}
ul li{
	text-decoration: none;
	display:inline-block;
	list-style: none;
	padding-left: 2%;
	padding-right: 2%;
	padding-top: 1%;
	border-radius: 3px 3px 0px 0px;
	margin-left: 10%;
}
ul li:hover{
background-color: white;
height: 60px;
}
.active{
	background-color:white;
	text-decoration: none;
	font-size:20px;
	height: 60px;
	border-top:1px solid #5da1a7;
	border-bottom:none;

	color: black;
	font-family: Arial,Helvetica,sans-serif;

}
.inactive{
text-decoration: none;
	font-size:20px;
	color: black;
	font-family: Arial,Helvetica,sans-serif;
}
.logout{
text-decoration: none;
	font-size:20px;
	color: black;
	font-family: Arial,Helvetica,sans-serif;
}
.links{
text-decoration: none;
	font-size: 120%;
	color: black;
	font-family: Arial,Helvetica,sans-serif;
}
</style>
</head>
<body>
<ul>
<li <?php if(isset($_GET['home'])){ echo"class='active'"; } else{ echo "class='inactive'";}?>>
<a href="studentspage.php?home=1" id="new1" class=links>Home</a></li>
<li <?php if(isset($_GET['ch'])){ echo"class='active'"; } else{ echo "class='inactive'";}?>>
<a href="report.php?ch=1" id="new2" class=links>Report</a>
</li>
<li <?php if(isset($_GET['cou'])){ echo "class='active'";}else{echo "class='inactive'";}?>>
<a href="studentprofile.php?cou" class=links>Settings</a>
</li>
<li>
<a href="logout.php?cou" class=links>Logout</a>
</li>
</ul>
</body>
</html>