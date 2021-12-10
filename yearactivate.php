<?php
include("includes/connect.php");
session_start();
if (!$_SESSION['deanp']) {
header("location:index.php");
}
?>
<?php
$b="SELECT *FROM teachers";
$de=mysqli_query($conn,$b);
$e=1;
while ($row=mysqli_fetch_array($de)) {
$id=$row['t_id'];
}
$e++;
?>
<?php
$s="SELECT *FROM students";
$k=mysqli_query($conn,$s);
while ($row=mysqli_fetch_array($k)) {
$ids=$row['s_id'];
}
?>
<?php
$q="SELECT *FROM departement";
$k=mysqli_query($conn,$q);
while ($row=mysqli_fetch_array($k)) {
$idd=$row['d_dpt'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo "Resourses";?></title>
<?php
include("includes/banner.php");
include("includes/header.php");
?>
	<link rel="stylesheet" type="text/css" href="css/ccss.css">
	<script src="js/jquery.js"></script>
	<style type="text/css">
#fter{background-color: #5da1a7;height:60px;margin-top: 350px;font-family:corbel;text-align: center;
padding-top: 3px;position: fixed;z-index: 1px;width: 1200px;
}
#termopen{
width:100%;height: 100%;background-color: rgba(8,7,5,.7);top: 0px;position: fixed;left: 0px;display: none;
}
#insterm{height: 25%;width: 50%;background-color: white;
margin-left: 25%;margin-top: 12%;overflow-y:scroll;
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
<div>
<div id="open" style="display:inline-block;font-size:150%;"><label>Activate year
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  </label></div>

<div id="openx" style="display:inline-block;font-size:150%;"><label>Add class</label></div>
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 

<div id="ter" style="display:inline-block;font-size:150%;"><label>Term registration
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  </label></div>

<div id="termopen">
<button id="okbu" style="margin-left:90%;margin-top:2%;font-size:20px;color:red;font-weight:bold;">x</button>
<div id="insterm">
	<form method="POST">
<table>
<tr><td>Term name</td>
<td><input type="text" name="termname" size="20" placeholder="Enter term name" required></td>
</tr>
<tr>
<td>Year</td>
<td align="right">
 <select name="yearid" required>
 <option value="">--Select--</option>
 	<?php
$sqterm=mysqli_query($conn,"SELECT * FROM years");
while ($termf=mysqli_fetch_array($sqterm)) {
?>
<option value="<?= $termf['y_id'];?>"><?php echo $termf['year'];?></option>
<?php
}
?>
 </select>
</td>
<tr><td align="right" colspan="2">
<input type="submit" name="saveterm" value="Save">
</td></tr>
</tr>
</table>
</form>
<?php
if (isset($_POST['saveterm'])) {
$aa=$_POST['termname'];
$termname=mysqli_real_escape_string($conn,$aa);
$bb=$_POST['yearid'];
$yeari=mysqli_real_escape_string($conn,$bb);
$quercheck=mysqli_query($conn,"SELECT * FROM terms WHERE term_name='$termname' AND year_id='$yeari'");
if (mysqli_num_rows($quercheck)>0) {
echo "<script>alert('$termname already registered')</script>";
}else{

$sqd=mysqli_query($conn,"INSERT INTO terms SET term_id=null,term_name='$termname',year_id='$yeari'")
or die(mysqli_error());
if ($sqd) {
?>
<script type="text/javascript">alert("Inserted");</script>
<?php
}else{
?>
<script type="text/javascript">alert("can't insert");</script>
<?php
}
}
}
?>
</div>
</div>

<script type="text/javascript">
$(function(){
$("#termopen").hide();
$("#ter").click(function(){
$("#termopen").show(500);
});
$("#okbu").click(function(){
$("#termopen").hide(500);
});
});
</script>


<div id="year" style="display:none;">
<form method="POST">
<table>
<tr><td>Year</td><td>
	<select style="width:100%;" name="yea" required>
<option value="">--Select--</option>
<?php
$a=2014;
for ($a=2014; $a <=2060 ; $a++) { 
echo "<option>".$a."</option>";
}
?>
</select>
</td></tr>
</form>
<tr><td colspan="2" align="right"><input type="submit" value="Save" name="year"></td>
	<?php
if (isset($_POST['year'])) {
$yearname=mysqli_real_escape_string($_POST['yea']);
$ch=mysqli_query($conn,"SELECT * FROM years WHERE year='$yearname'") or die(mysqli_error());
if (mysqli_num_rows($ch)>0) {
echo "<script>alert('already inserted')</script>";
}else{
$quw=mysqli_query($conn,"INSERT INTO years SET y_id=null,year='$yearname'") or die(mysqli_error());
if ($quw) {
echo "<script>alert('inserted')</script>";
}else{
	echo "not inserted";
}
}
}
	?>
</tr>
</table>
</div>
<div id="classe" style="margin-left:20%;display:none;">
<form method="POST">
<table><tr><td>Classname</td><td><input type="text" pattern="[A-Za-z' ]{2,30}" id="classe" name="cname" required></td></tr>
<tr><td>Departement</td><td>
<select name="classdpt" required>
<option value="">--Select--</option>
<?php
$slq=mysqli_query($conn,"SELECT *FROM departement");
if ($slq) {
while ($row=mysqli_fetch_array($slq)) {
?>
<option value="<?= $row['d_dpt']?>"><?= $row['dpt_name']?></option>
<?php
}
}
?>
</select>
</td></tr>
<tr><td>Year</td><td>
<select name="ye">
<?php
$sq=mysqli_query($conn,"SELECT *FROM years");
while ($row=mysqli_fetch_array($sq)) {
?>
<option value="<?= $row['y_id']?>"><?php echo $row['year'];?></option>
<?php
}
?>
</select>
</td></tr>
<tr><td colspan="2" align="right"><input type="submit" value="Save" name="saves"></td></tr>
</form>
</table>
</div>
<script src="java/jquery.js"></script>
	<script src="java/jquery-ui.js"></script>
	<link rel="stylesheet"href="java/jquery-ui.css">
<script>
$(document).ready(function(){
$("#date").datepicker();
});
</script>
<script>
$(document).ready(function(){
$("#year").hide();
$("#open").click(function(){
$("#classe").hide();
$("#year").slideToggle();
});
});
</script>
<script>
$(document).ready(function(){
$("#classe").hide();
$("#openx").click(function(){
$("#year").hide();
$("#classe").slideToggle();
});
});
</script>
</body>
</html>
<?php
if (isset($_POST['saves'])) {
$a=mysqli_real_escape_string($_POST['cname']);
$b=mysqli_real_escape_string($_POST['classdpt']);
$c=mysqli_real_escape_string($_POST['ye']);
$first=mysqli_query($conn,"SELECT * FROM classes WHERE classname='$a' AND d_dpt='$b' AND year_id='$c'")
or die(mysqli_error());
if (mysqli_num_rows($first)>0) {
echo "<script>alert('$a already regitered')</script>";
}else{
$sd=mysqli_query($conn,"INSERT INTO classes VALUES('','$a','$b','$c')");
if ($sd) {
echo "class inserted";
}
else{
	echo "can't insert class";
}
}
}
?>