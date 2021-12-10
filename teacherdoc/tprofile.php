<?php
include("../includes/banner.php");
include("../includes/theader.php");
include("../includes/connect.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
<link rel="stylesheet" type="text/css" href="../css/admin.css">
</head>
<body>
<div id="deanview">
<br />
<form method="POST">
Choose departement:
<select style="padding-right:50" class=dept name="dept">
<option>Select Departement</option>
<?php
$sql=mysql_query("SELECT *FROM departement");
if ($sql) {
$i=1;
while ($d=mysql_fetch_array($sql)) {
echo "<option value='{$d['d_dpt']}'>".$d['dpt_name']."</option>";
$i++;}
}
?>
</select>&nbsp &nbsp &nbsp &nbsp &nbsp 
<span class=classes></span>
<span class=courses></span>
select term
<select style="padding-right:50" name="term">
<option>Term 1</option>
<option>Term 2</option>
<option>Term 3</option>
</select>&nbsp &nbsp &nbsp &nbsp &nbsp
<select name="years">
<?php 
$er=mysql_query("SELECT *FROM years");
$j=1;
while ($df=mysql_fetch_array($er)) {
?>
<option><?php echo $df['year'];?></option>
<?php
}
?>
</select>
<!--ending some codes of the teacher wishes-->
<span class=studentlist></span>
</form>
</div>
</div>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$(".dept").change(function(){
			//send the request to the file holding class information
			$(".classes").load("./classes_info.php?deptid=" + $(".dept").val() );
		});
	});
</script>
<script type="text/javascript">
$(document).ready(function(){
$(".classes").change(function(){
//send the request to the file holding class information
$(".courses").load("./caurse_info.php?courseid=" + $(".clas").val() );
		});
	});
</script>

<script type="text/javascript">
$(document).ready(function(){
$(".courses").change(function(){
//send the request to the file holding class information
$(".studentlist").load("./student_in_class_info.php?coursesid=" + $(".caurses").val() );
		});
	});
</script>

</div>
</body>
</html>