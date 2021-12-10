<?php
session_start();
if (!$_SESSION['deanp']) {
header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Report</title>
<?php
include("includes/banner.php");
include("includes/header.php");
include("includes/connect.php");
?>
<link rel="stylesheet" type="text/css" href="css/admin.css">
<script src="js/jquery.js"></script>
<style type="text/css">
#fter{background-color: #5da1a7;height:60px;margin-top: 350px;font-family:corbel;text-align: center;
padding-top: 3px;position: fixed;z-index: 1px;width: 1200px;
}
</style>

</head>
<body>
	<div id="fter">
<h3>Allright reserved &copy by Mucyo Rene</h3>
</div>
<div id="deanview" style="overflow-y:scroll;">
<br />
Select year:&nbsp &nbsp<select name="years" id="yearid">
<option>--Select--</option>
<?php
$sq=mysqli_query($conn,"SELECT * FROM years");
if (mysqli_num_rows($sq)) {
while ($fey=mysqli_fetch_array($sq)) {
?>
<option value="<?php echo $fey['y_id'];?>"><?= $fey['year'];?></option>
<?php
}
}
?>
</select> 
<span class=depart style="display:inline-block;"></span>
<span class=classes style="display:inline-block;"></span>

<span class=courses></span>
<!--ending some codes of the teacher wishes-->
<span class=studentlist></span>
</form>
</div>
</div>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$("#yearid").change(function(){
			//alert("done");
			//send the request to the file holding class information
			//alert($("#yearid").val());
			$(".depart").load("./dept_info.php?yid=" + $("#yearid").val() );
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$(".depart").change(function(){
			//alert($(".dept").val());
			//send the request to the file holding class information
			$(".classes").load("./classes_info.php?deptid=" + $(".dept").val() );
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
	$(".classes").change(function(){
		//alert($(".clas").val());
	//send the request to the file holding class information
	$(".courses").load("./st_class_info.php?clase=" + $(".clas").val() );
		});
	});
</script>
</div>
</body>
</html>