<?php
session_start();
include("includes/connect.php");
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
<title><?php echo"Course registration"?></title>
  <?php
include("includes/banner.php");
include("includes/header.php");
?>
	<link rel="stylesheet" type="text/css" href="css/caursereg.css">
	<script src="java/jquery.js"></script>
  <script src="java/jquery-ui.js"></script>
  <link rel="stylesheet"href="java/jquery-ui.css">
	<script type="text/javascript">
var a;
$(function(){
$(".up").click(function(){
//alert($(this).val());
a=$(this).val();

});
$("#frm").submit(function(e){
e.preventDefault();
var b=("#cname").val();
var c=("#acrony").val();
var d=("#clid").val();
var e=("#tid").val();
var f=("#did").val();
$.post("updatecourse.php",{id:a,cname:b,acrony:c,clid:d,tid:e,did:f},function(data){
	alert(data);
});
});
});
	</script>
	<style type="text/css">
#fter{background-color: #5da1a7;height:60px;margin-top: 1px;font-family:corbel;text-align: center;
padding-top: 3px;position: fixed;z-index: 1px;width: 1200px;
}
#commented{
width:100%;height: 100%;background-color: rgba(8,7,5,.7);top: 0px;position: fixed;left: 0px;
}
#coco{height: 25%;width: 50%;background-color: white;
margin-left: 25%;margin-top: 12%;overflow-y:scroll;
}
</style>
	<script>

$(document).ready(function(){
    $("#menuico").click(function(){
        $("#menu").hide(500);
    });
    $("#menuico").click(function(){
        $("#menu").show(1000);
    });
});//this hiding is running but no content to be hidded or showed
	</script>
</head>
<body>
<div id="indcontent">
<div class="blankspace"><!--this is the division of student links-->
	<div id="data">
<form method="POST">
<table>
<tr><td>CaurseName</td><td><input type="text" name="cname"  pattern="[A-Za-z']{2,30}"
placeholder="Enter caurse name" size="30" id="cname" required></td></tr>
<tr><td>Acronym</td><td>
<input type="text" required pattern="[A-Za-z']{1,30}" placeholder="Enter acronym " size="30" name="acronym" id="acrony"></td></tr>
<tr><td>Class</td>
<td>
<select name="clid" id="clid" required>
  <option value="">--Select--</option>
<?php
$fd=mysqli_query($conn,"SELECT *FROM classes");
while ($rowd=mysqli_fetch_array($fd)) {
?>
<option value="<?php echo $rowd['cl_id'];?>"><?php echo $rowd['classname'];?></option>
<?php
}
?>
</select>
</td>
</tr>

<tr><td>Teacher</td>
<td>
<select name="tid" id="tid" required>
<option value="">--Select--</option>
<?php
$fd=mysqli_query($conn,"SELECT DISTINCT *FROM teachers");
while ($rowd=mysqli_fetch_array($fd)) {
?>
<option value="<?php echo $rowd['t_id'];?>">
<?php echo $rowd['firstname']." ".$rowd['lastname'];?></option>
<?php
}
?>
</select>
</td>
</tr>

<tr><td>Departement</td>
<td>
<select name="did" id="did" required>
  <option value="">--Select--</option>
<?php
$fd=mysqli_query($conn,"SELECT DISTINCT *FROM departement");
while ($rowd=mysqli_fetch_array($fd)) {
?>
<option value="<?php echo $rowd['d_dpt'];?>"><?php echo $rowd['dpt_name'];?></option>
<?php
}
?>
</select>
</td>
</tr>

<tr><td>Maximum</td><td>
	<input type="text" name="max" placeholder="Enter caurse name" size="30" id="max"></td></tr>
<tr><td colspan="2" align="right"><input type="submit" value="Save" name="save"></td></tr>
</form>
</table>

<table border="1">
<tr><td>CaurseName</td><td>Acronym</td><td>Maximum</td><td colspan="3" align="center">Action</td></tr>

<?php
$srq=mysqli_query($conn,"SELECT *FROM caurses");
if ($srq) {
	$o=1;
while ($row=mysqli_fetch_array($srq)) {
?>
<tr>
<td><?php echo $row['coursename'];?></td>
<td><?php echo $row['acronym'];?></td>
<td><?php echo $row['maximum'];?></td>
<td>
<a onclick="dela('<?= $row['c_id'];?>','<?= $row['coursename'];?>');">
Delete</a>
<td>
<button class="buton" value="<?= $row['c_id']?>"><a>Update</a></button>
</tr>
<script type="text/javascript">
$(document).ready(function(e){
  $("#load").dialog({
    autoOpen:false,
    modal:true,
    width:400,
    position:{
      my:"center top",
      at:"center top",
      of:".blankspace",
    }
  });
$(".buton").click(function(e){
  e.preventDefault();
  //alert($(this).val());
 var id=$(this).val();
$("#load").dialog("open");
$("#load").load('updatecourse.php?idcau='+id+'');
});
});
</script>
<?php
}$o++;
}
?>

<script type="text/javascript">
  function dela(ids,caursenames){
    var sinfo=confirm('Are you sure to Delete '+caursenames+'?');
if (sinfo==true) {
 window.location='deletecaurse.php?idse='+ids;
}
  }
</script>

<div id="back">
<div id="inside">
<!--this is the contents for updates of caurses-->


</div>
</div>

</table>
<script src="java/jquery-ui.js"></script>
	<link rel="stylesheet"href="java/jquery-ui.css">
<script type="text/javascript">
</script>
</div><!--ending data division-->
</div><!--ending linkspace-->
</div><!--ending blank space-->
<div id="load"></div>
<div id="fter">
<h3>Allright reserved &copy by Mucyo Rene</h3>
</div>
</body>
</html>
<?php
if (isset($_POST['save'])) {
$ff=$_POST['cname'];
$f=mysqli_real_escape_string($ff);
$cc=$_POST['acronym'];
$c=mysqli_real_escape_string($cc);
$ii=$_POST['max'];
$i=mysqli_real_escape_string($ii);
$cat_mx=$i/2;
$exam_mx=$i/2;
$ww=$_POST['tid'];
$w=mysqli_real_escape_string($ww);
$mm=$_POST['did'];
$m=mysqli_real_escape_string($mm);
$nn=$_POST['clid'];
$n=mysqli_real_escape_string($nn);
$ex=mysqli_query("INSERT INTO caurses SET 
c_id=null,
coursename='$f',
acronym='$c',
maximum='$i',
t_id='$w',
d_id='$m',
cl_id='$n'") or die(mysqli_error());
if ($ex) {

?>
<script type="text/javascript">
alert("inserted");
</script>
<?php
}else{
?>
<?php
}
}
?>