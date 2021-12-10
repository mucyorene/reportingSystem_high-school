<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="includes/header.css">
	<style src="../bootstrap/js/bootstrap.min.js"></style>
</head>
<body>
<ul>
<li <?php if(isset($_GET['home'])){ echo"class='active'"; } else{ echo "class='inactive'";}?>>
<a href="adminpage.php?home=1" id="new1" class=links>Home</a></li>
<li <?php if(isset($_GET['ch'])){ echo"class='active'"; } else{ echo "class='inactive'";}?>>
<a href="chooseuser.php?ch=1" id="new2" class=links>System users</a>
</li>
<li <?php if(isset($_GET['cou'])){ echo "class='active'";}else{echo "class='inactive'";}?>>
<a href="caursereg.php?cou" class=links>Course</a>
</li>
<li <?php if(isset($_GET['ad'])){echo "class='active'";}else{echo "class='inactive'";}
?>><a href="addept.php?ad" class=links>
Department</a>
</li>
<li <?php if(isset($_GET['rep'])){echo "class='active'";}else{echo "class='inactive'";}?>>
<a href="deanreportview.php?rep" class=links>
Report</a></li>
<li <?php if(isset($_GET['ye'])){echo "class='active'";}else{echo "class='inactive'";};?>>
<a href="yearactivate.php?ye" class=links>
Resourse</a></li>
<li <?php if(isset($_GET['pro'])){echo "class='active'";}else{echo "class='inactive'";}?>>
<a href="admiprofile.php?pro" class=links>
Settings</a></li>
<li>
<a href="logout.php" class=logout>logout</a></li>
</ul>
</body>
</html>