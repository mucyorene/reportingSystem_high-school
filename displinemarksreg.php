<?php
session_start();
include("includes/connect.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Displine marks</title>
<?php
include("includes/banner.php");
include("includes/dheader.php");
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
<div id="blankspace">

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
$i++;}
}
?>
</select>&nbsp &nbsp &nbsp &nbsp &nbsp 
<span class=dept></span>
<span class=classes></span>

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
<span class=courses></span>
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
<script>
$(document).ready(function(){
$(".classes").change(function(){
//alert($(".clas").val());
$(".studentlist").load("./student_in_dis.php?clid="+ $(".clas").val());
});
});
</script>
<?php
if (isset($_POST['save'])) {
	$var=$_POST['term'];
	$y=$_POST['yss'];
//searching the year id
//ending to find year id
	//$cor=$_POST['courid'];
	foreach ($_POST as $key => $value) {
	//$max=mysqli_query($conn,"SELECT *FROM caurses");
	//$maxrow=mysqli_fetch_array($max);
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
		$check = mysqli_query($conn,$q="SELECT * FROM dis_marks WHERE s_id='{$id}' AND year_dis='$y' AND marks='{$value}' AND term_status='$var'") or die(mysqli_error($conn));
if(mysqli_num_rows($check)>0){
			$data = mysqli_fetch_array($check);
			mysqli_query($conn,"UPDATE dis_marks SET marks='{$value}' WHERE dis_id='{$data['dis_id']}'") or die(mysqli_error($conn));
		} else{
		//insert codes here
$insert=mysqli_query($conn,$insert="INSERT INTO dis_marks SET 
	dis_id=null,
	s_id='{$id}',
	marks='{$value}',
	term_status='{$var}',
	year_dis='{$y}'") or die(mysqli_error($conn));
		//}
	}}
echo "inserted please";
}
?>
</div>
</div>

</body>
</html>