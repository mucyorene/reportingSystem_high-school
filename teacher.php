<?php
session_start();
include("includes/connect.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Teacher</title>
<?php
include("includes/banner.php");
include("includes/theader.php");
?>
	<link rel="stylesheet" type="text/css" href="css/teacher.css">
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
<div id="indcontent">
<div class="action"><!--this is the division of student links-->
<div id="blankspace" style="overflow-y:scroll;">

<!--give the parmission to the teacher before insert marks-->

<br />
<form method="POST">
Choose Year:
<select style="padding-right:50" class=yid name="dept">
<option>Select year</option>
<?php
$sql=mysqli_query($conn,"SELECT *FROM years");
	if ($sql) {
		$i=1;
		while ($d=mysqli_fetch_array($sql)) {
			echo "<option value='{$d['y_id']}'>".$d['year']."</option>";
			$i++;
		}
	}
?>
</select>&nbsp &nbsp &nbsp &nbsp &nbsp 
<span class=dept style="display:inline-block;"></span>
<span class=classes style="display:inline-block;"></span>
<span class=courses style="display:inline-block;"></span>

select term
<select style="padding-right:50" name="term">
<?php
$selterm=mysqli_query($conn,"SELECT * FROM terms");
while ($feterm=mysqli_fetch_array($selterm)) {
?>
<option value="<?= $feterm['term_name'];?>"><?= $feterm['term_name']?></option>
<?php
}
?>
</select>&nbsp &nbsp &nbsp &nbsp &nbsp
<!--ending some codes of the teacher wishes-->
<span class=studentlist></span>
</form>
</div>
</div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$(".yid").change(function(){
			//alert($(this).val())
			//send the request to the file holding class information
			$(".dept").load("./dep_info.php?yid=" + $(".yid").val() );
		});
	});
</script>
<script type="text/javascript">
$(document).ready(function(){
$(".dept").change(function(){
	//alert($(".depta").val())
//send the request to the file holding class information
$(".classes").load("./classe_info.php?deptid=" + $(".depta").val() );
		});
	});
</script>

<script type="text/javascript">
$(document).ready(function(){
$(".classes").change(function(){
	//alert($(".clas").val())
//send the request to the file holding class information
$(".courses").load("./caurse_info.php?clasid=" + $(".clas").val() );
		});
	});
</script>

<script type="text/javascript">
$(document).ready(function(){
$(".courses").change(function(){
//alert($(".caurses").val())
//send the request to the file holding class information
$(".studentlist").load("./student_in_class_info.php?cid=" + $(".caurses").val() );
		});
	});
</script>
<?php
if (isset($_POST['save'])) {
	$var=$_POST['term'];
	$y=$_POST['years'];
	$cor=$_POST['cid'];
//echo "<script>alert('$cor')</script>";
	foreach ($_POST as $key => $value) {
	
		if(!is_numeric($key)){
			continue;
		}
		$type = substr($key,(strlen($key) - 1));
		$fld = $type == 1?"cat_marks":"exams_marks";
		$id = substr($key,0,(strlen($key) - 1));
		$checkmax=mysqli_query($conn,"SELECT * FROM caurses WHERE c_id='$cor'")or die(mysqli_error($conn));
		$comax=mysqli_fetch_array($checkmax);
		if (($comax['maximum']/2)<$value) {
		echo "<script>alert('enter the correct marks please')</script>";
		}else{
		//check if the student has any marks registered of the current course in the term in the current year
		$check = mysqli_query($conn,$q="SELECT * FROM marks WHERE c_id='$cor' AND s_id='{$id}' AND term_stutus='$var' AND y_id='$y'");
		if(mysqli_num_rows($check)>0){
			$data = mysqli_fetch_array($check);
			mysqli_query($conn,"UPDATE marks SET `{$fld}`='{$value}' WHERE m_id='{$data['m_id']}'");
		} else{
			//insert codes here
$insert=mysqli_query($conn,$insert="INSERT INTO marks SET m_id=null,c_id='{$cor}',s_id='{$id}',`$fld`={$value},term_stutus='{$var}',y_id='{$y}'");
		}
	}
	}
echo "thank you marks of inserted";

}
?>
