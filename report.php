<?php
session_start();
include("includes/connect.php");
//$yid=$_GET['idyear'];
//echo $id;
if (!$_SESSION['s_id']) {
header("location:logout.php");
}
//var_dump($_SESSION['s_id']);
$id=$_SESSION['s_id'];
//echo $id;
$qu=mysql_query("SELECT * FROM students WHERE s_id='$id'");
$fess=mysql_fetch_array($qu);
?>
<!DOCTYPE html>
<html>
<head>
	<title><?= "Welcome ".$fess['firstname']." ".$fess['lastname'];?></title>
<?php
include("includes/banner.php");
include("includes/stheader.php");
?>
<link rel="stylesheet" type="text/css" href="css/admin.css">
<script src="js/jquery.js"></script>
<script src="java/jquery.js"></script>
	<script src="java/jquery-ui.js"></script>
	<link rel="stylesheet" href="java/jquery-ui.css">
</script>
<style type="text/css">
#fter{background-color: #5da1a7;height:60px;margin-top: 407px;font-family:corbel;text-align: center;
padding-top: 3px;position: fixed;z-index: 1px;width: 1200px;
}
</style>

</head>
<body>
	<div id="fter">
<h3>Allright reserved &copy by Mucyo Rene</h3>
</div>
<div id="blankspace" style="overflow-y:scroll;height:72%;">
<br />
Select year:&nbsp &nbsp<select name="years" class=yearid style="display:inline-block;">
<option>--Select--</option>
<?php
$sq=mysql_query("SELECT * FROM years");
if (mysql_num_rows($sq)) {
while ($fey=mysql_fetch_array($sq,MYSQL_ASSOC)) {
?>
<option value="<?php echo $fey['y_id'];?>,<?= $id ?>"><?= $fey['year'];?></option>
<?php
}
}
?>
</select> 
<br />
<br />
<!--ending some codes of the teacher wishes-->
<span class=report></span>
</form>
</div>
</div>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$(".yearid").change(function(){
			//alert("done");
			//send the request to the file holding class information
			//alert($(".yearid").val() );
			$(".report").load("./report_info.php?yid=" + $(".yearid").val() );
		});
	});
</script>
</div>
</body>