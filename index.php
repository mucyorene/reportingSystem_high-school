	<?php
session_start();
include("includes/connect.php");
include("includes/banner.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>SRIS</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/sindex.css" media="all">
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<style>
#fter{background-color: #5cb85c;height:40px;margin-top: 430px;text-align: center;
position: fixed;z-index: 1px;width: 1200px;color:white;padding-bottom: 10px;
}
	</style>
</head>
<br /><br />
<body>
	<div id="cent" >
		&nbsp
<div id="cen" style="margin-left:28%; color: #5cb85c"><br /><br /><br /><br />
	<form method="POST" class="form-horizontal">
	<div class="form-group">
	<label class="control-label col-sm-3">Username</label>
	<div class="col-sm-8">
	<input style="border-color: #5cb85c;" type="text" name="uname" class="form-control" placeholder="Your username" required>
	</div>
	</div>

<div class="form-group">
	<label class="control-label col-sm-3">Password</label>
	<div class="col-sm-8">
	<input style="border-color: #5cb85c;" type="password" name="pass" class="form-control" placeholder="Your username" required>
	</div>
</div>
<div class="form-group">
	<div class="col-sm-4 col-sm-offset-9">
		<input type="submit" name="login" value="Login" class="btn btn-success">
	</div>
</div>
</div>
</div>
	</form>
</div>
&nbsp
</body>
<?php
include("includes/footer.php");
?>
</html>

<?php
if (isset($_POST['login'])) {
	$ab=$_POST['uname'];
    $bc=$_POST['pass'];
    $a=mysqli_real_escape_string($conn,$ab);
    $b=mysqli_real_escape_string($conn,$bc);
	$sql="SELECT *FROM itmanager WHERE username='$a' AND password='$b'";
	$exex=mysqli_query($conn,$sql);
	$slq1=mysqli_query($conn,"SELECT *FROM teachers where username='$a' and password='$b'");
	$sqls=mysqli_query($conn,"SELECT *FROM students WHERE username='$a' AND password='$b'");
	$sd=mysqli_query($conn,"SELECT *FROM dean where username='$a' and password='$b'");
	$sw=mysqli_query($conn,"SELECT *FROM displine WHERE username='$a' and password='$b'");
	
	if (mysqli_num_rows($sw)) {
	$row=mysqli_fetch_array($sw);
	$_SESSION['disp']=$row['d_id'];
	header("location:dishome.php");
	}
	
	if (mysqli_num_rows($exex)>0) {
		$row=mysqli_fetch_array($exex);
		$_SESSION['it']=$row['username'];
	header("location:adminreg.php");
	
	}
if (mysqli_num_rows($slq1)>0) {
$row=mysqli_fetch_array($slq1);
		$_SESSION['teacher']=$row['t_id'];
	header("location:tehome.php");
	
	}

if (mysqli_num_rows($sqls)>0) {
$row=mysqli_fetch_array($sqls);
		$_SESSION['s_id']=$row['s_id'];
		$_SESSION['password']=$row['password'];
	header("location:studentspage.php");
	
	}
if (mysqli_num_rows($sd)>0) {
$row=mysqli_fetch_array($sd);
		$_SESSION['deanp']=$row['id'];
	header("location:adminpage.php");
	
	}
if (!$exex && !$slq1 && !$sqls && $sd && !$sw) {
echo "<script>alert('no matching')</script>";
}
}

?>

