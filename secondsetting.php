<?php
session_start();
include("includes/connect.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Second setting</title>
<?php
include("includes/banner.php");
include("includes/theader.php");?>
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
<div class="action"><!--this is the division of student links-->
<div id="blankspace">
<!--give the parmission to the teacher before insert marks-->
<br />
<form method="POST">
Choose Year:
<select style="padding-right:50" class=yid name="yid">
<option>Select year</option>
<?php
$sql=mysql_query("SELECT *FROM years");
if ($sql) {
$i=1;
while ($d=mysql_fetch_array($sql)) {
echo "<option value='{$d['y_id']}'>".$d['year']."</option>";
$i++;}
}
?>
</select>&nbsp &nbsp &nbsp &nbsp &nbsp 

<span class=dept style="display:inline-block;"></span>
<span class=classes style="display:inline-block;"></span>
<span class=courses style="display:inline-block;"></span>
<span class=seting style="display:in-line-block;"></span>
</div>
</div>
</form>
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
	//alert($(".clas").val())
//send the request to the file holding class information
$(".seting").load("./student_in_setting.php?clasid=" + $(".clas").val() );
		});
	});
</script>

<?php
if (isset($_POST['save'])) {
$y=$_POST['yid'];

//searching the year id
//ending to find year id
$cor=$_POST['courid'];
	foreach ($_POST as $key => $value) {
	//$max=mysql_query("SELECT *FROM caurses");
	//$maxrow=mysql_fetch_array($max);
	//$cat_max=$maxrow['cat_max'];$exam_max=$maxrow['ex_marks'];
//ending to finding max

		if(!is_numeric($key)){
			continue;
		}
		//$type = substr($key,(strlen($key) - 1));
		//finding fields
		/*$fld = $type == 1?"cat_marks":"exams_marks";
		fing the student id
		$id = substr($key,0,(strlen($key) - 1));*/
		//check if the student has any marks registered of the current course in the term in the current year
		$id = substr($key,0,(strlen($key) - 1));
		$check = mysql_query($q="SELECT * FROM setting WHERE s_id='{$id}' AND y_id='$y' AND markset='{$value}'") or die(mysql_error());
if(mysql_num_rows($check)>0){
			$data = mysql_fetch_array($check);
			$seid=$data['settingid'];
			//echo "<script>alert('$seid')</script>";
			mysql_query("UPDATE setting SET markset='{$value}' WHERE settingid='$seid'") or die(mysql_error());
		} else{
		//insert codes here
$insert=mysql_query($insert="INSERT INTO setting SET 
	settingid=null,
	s_id='{$id}',
	markset='{$value}',
	y_id='{$y}',
	c_id='$cor'") or die(mysql_error());
		//}
	}}
echo "inserted please";
}
?>