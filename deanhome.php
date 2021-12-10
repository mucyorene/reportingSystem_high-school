<?php
	include("includes/connect.php");
?>
<!DOCTYPE html>
<html>
<head>
		<title>Maximum</title>
	<?php
		include("includes/banner.php");
		include("includes/dheader.php");
	?>
	<link rel="stylesheet" type="text/css" href="css/teacher.css">
	<script src="java/jquery.js"></script>
	<script src="java/jquery-ui.css"></script>

	<style type="text/css">
		#fter{background-color: #5da1a7;height:60px;margin-top: 350px;font-family:corbel;text-align: center;
		padding-top: 3px;position: fixed;z-index: 1px;width: 1200px;
		}
	</style>

</head>
<body>
<div id="deanspace">
<div id="click" style="display:inline-block;font-size:100%;color:none;">
<div id="fter">
<h3>Allright reserved &copy by Mucyo Rene</h3>
</div>
</div>&nbsp&nbsp&nbsp&nbsp
<div id="max" style="display:inline-block;font-size:100%;color:none;">
<label>Add Displine maximum</label>
</div>
<div id="maxform">
<form method="POST">
<table>
<tr><td>Enter Maximum marks</td><td><input type="text" name="max" size="20"></td></tr>
<tr><td>Year</td><td>
	<select name="yearid">
<?php 
	$yeid=mysqli_query($conn,"SELECT *FROM years");
	$u=1;
	while ($rowid=mysqli_fetch_array($yeid)) {
?>
<option value="<?= $rowid['y_id']?>"><?= $rowid['year'];?></option>
<?php
	}
?>
	</select>
</td></tr>
<tr><td colspan="2" align="right"><input type="submit" name="maxs" value="save"></td></tr>
</table>
</form>
</div><!--ending the form of insert-->
<script type="text/javascript">
$(function(){
	$("#maxform").hide();
	$("#max").click(function(){
	$("#maxform").slideToggle(500);
	});
});
</script>
<?php
	if (isset($_POST['maxs'])) {
		$a=$_POST['max'];
		$yea=$_POST['yearid'];
		$check=mysqli_query($conn,"SELECT * FROM displine_max WHERE displine_max='$a' AND y_id='$yea'")or die(mysqli_error());
		if (mysqli_num_rows($check)>0) {
		echo "<script>alert('Already inserted')</script>";
		}else{
		$sql=mysqli_query($conn,"INSERT INTO displine_max SET id=null,displine_max='$a',y_id='$yea'") or die(mysqli_error());
		}
	}
?>
</div><!--ending the contents of the body-->
</body>
</html>