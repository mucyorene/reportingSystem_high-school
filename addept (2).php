<?php
include("includes/connect.php");
session_start();
if (!$_SESSION['deanp']) {
header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo "Departement registration page";?></title>
<?php
include("includes/banner.php");
include("includes/header.php");
?>
	<link rel="stylesheet" type="text/css" href="css/addept.css">
<script src="java/jquery.js"></script>
	<script src="java/jquery-ui.js"></script>
	<link rel="stylesheet"href="java/jquery-ui.css">
	<style type="text/css">
#fter{background-color: #5da1a7;height:60px;margin-top:350px;font-family:corbel;text-align: center;
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
<table>
<form method="POST">
<tr><td>Departement name:</td><td><input type="text" required  pattern="[A-Za-z']{2,30}" name="dpt" placeholder="Department name"></td></tr>
<tr><td>Departement acronym:</td><td><input type="text" required  pattern="[A-Za-z']{2,30}" name="dpta" placeholder="Department acronym"></td></tr>
<tr><td>Year</td><td>
<select name="yid" required>
<option value="">--Select--</option>
<?php
$seye=mysql_query("SELECT * FROM years");
if (mysql_num_rows($seye)) {
while ($feye=mysql_fetch_array($seye,MYSQL_ASSOC)) {
?>
<option value="<?= $feye['y_id'];?>"><?= $feye['year'];?></option>
<?php
}
}
?>
</select>
</td></tr>
<tr><td colspan="2" align="right"><input type="submit" name="saving" value="Save"></td></tr>
</form>
</table>
<?php
$sql="SELECT *FROM departement";
$exe=mysql_query($sql);
if ($exe) {
?>
<table border="1">
	<tr><td>Departement Names</td><td>Acronym</td><td colspan="2" align="center">Action</td></tr>
<?php
$i=1;
while ($row=mysql_fetch_array($exe)) {
?>
<tr><td><?php echo $row['dpt_name'];?></td>
<td><?php echo $row['acronym'];?></td>
<td><a href="deletedpt.php?idd=<?php echo $row['d_dpt'];?>"><button>Delete</button></a></td>
<td><button value="<?= $row['d_dpt'];?>" class="dptup">Update</button></a></td>
</tr>
<?php
}$i++;
}
else{
	echo "can't fetch people";
}
?>
</table>
<script type="text/javascript">
	$(function(){
		$("#dptdia").dialog({
    autoOpen:false,
    modal:true,
    width:400,
    height:250,
     position:{
  my:"center top",
  at:"center top",
  of:"#blankspace",
}
  });
$(".dptup").click(function(){	
//alert("this was clicked");
var iddpt=$(this).val();
//alert($(this).val());
$("#dptdia").dialog("open");
$("#dptdia").load("updatedpt.php?idpt=" + iddpt +'');
});
	});
</script>
<div id="dptdia"></div>
</div>
</div><!--ending linkspace-->
</div><!--ending blank space-->
<div id="fter">
<h3>Allright reserved &copy by Mucyo Rene</h3>
</div>
</body>
</html>
<?php
if (isset($_POST['saving'])) {
	$aa=$_POST['dpt'];
$a=mysql_real_escape_string($aa);
	$bb=$_POST['dpta'];
$b=mysql_real_escape_string($bb);
$cc=$_POST['yid'];
$c=mysql_real_escape_string($cc);
$x="INSERT INTO departement VALUES(' ','$a','$b','$c')" or die(mysql_error());
$slq=mysql_query($x);
if ($slq) {
echo "department inserted";
}
else{
echo "can't insert";
}
}
?>
<?php
if (isset($_POST['upd'])) {
$updname=mysql_real_escape_string($_POST['updpt']);
$acroup=mysql_real_escape_string($_POST['upacrd']);
$upyear=mysql_real_escape_string($_POST['yidup']);
$iddd=mysql_real_escape_string($_POST['idpt__']);
$queries=mysql_query("UPDATE departement SET dpt_name='$updname',acronym='$acroup',year_id='$upyear' WHERE d_dpt='$iddd'")
 or die(mysql_error());
 if ($queries) {
 echo "<script>alert('Update')</script>";
 }
 else{
 	echo "<script>alert('not done')</script>";
 }
}
?>