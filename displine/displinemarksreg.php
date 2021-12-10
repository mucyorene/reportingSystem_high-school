<?php
session_start();
include("includes/connect.php");

include("includes/banner.php");
include("includes/dheader.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Displine dean</title>
	<link rel="stylesheet" type="text/css" href="css/teacher.css">
	<script src="js/jquery.js"></script>
</head>
<body>
<div id="indcontent">
<div class="action"><!--this is the division of student links-->
<div id="blankspace">

<!--give the parmission to the teacher before insert marks-->

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
$(".studentlist").load("./student_in_dis.php?coursesid=" + $(".clas").val() );
		});
	});
</script>
<?php
if (isset($_POST['save'])) {
	$var=$_POST['term'];
	$y=$_POST['years'];
//searching the year id
$yearq=mysql_query("SELECT *FROM years WHERE year='$y'");
$yearid=mysql_fetch_array($yearq);
$yearf=$yearid['y_id'];
//ending to find year id
	$cor=$_POST['courid'];
	foreach ($_POST as $key => $value) {
	$max=mysql_query("SELECT *FROM caurses");
	$maxrow=mysql_fetch_array($max);
	$cat_max=$maxrow['cat_max'];$exam_max=$maxrow['ex_marks'];
//ending to finding max

		if(!is_numeric($key)){
			continue;
		}
		$type = substr($key,(strlen($key) - 1));
		if ($value>$cat_max && $value>$ex_marks) {
		?>
		<script type="text/javascript">alert("enter according to the maximum")</script>
		<?php
		}else{
		$fld = $type == 1?"cat_marks":"exams_marks";
		$id = substr($key,0,(strlen($key) - 1));
		//check if the student has any marks registered of the current course in the term in the current year
		$check = mysql_query($q="SELECT * FROM marks WHERE c_id='$cor' AND s_id='{$id}' AND term_stutus='$var' AND y_id='$yearf'");

		if(mysql_num_rows($check)>0){
			$data = mysql_fetch_assoc($check);
			mysql_query("UPDATE marks SET `{$fld}`='{$value}' WHERE m_id='{$data['m_id']}'");
		} else{
			//insert codes here
$insert=mysql_query($insert="INSERT INTO marks SET m_id=null,c_id='{$cor}',s_id='{$id}',`$fld`={$value},term_stutus='{$var}',y_id='{$yearf}'");
		?>
		<script type="text/javascript">
		alert("inserted boi");
		</script>
		<?php
		}
	}
	}

}
?>