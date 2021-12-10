<?php
session_start();
include("includes/connect.php");

if (!$_SESSION['deanp']) {
header("location:index.php");
}

$tid=$_SESSION['deanp'];
$sqli=mysql_query("SELECT *FROM dean WHERE id='$tid'") or die(mysql_error());
$rowtitle=mysql_fetch_array($sqli);
//echo "<script>alert('$tid')</script>";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome <?php echo $rowtitle['firstname']." ".$rowtitle['lastname'];?></title>
  <?php
include("includes/banner.php");
include("includes/header.php");
?>
	<link rel="stylesheet" type="text/css" href="css/admin.css">
	<script src="js/jquery.js"></script>
  <style type="text/css">
#fter{background-color: #5da1a7;height:60px;margin-top: 350px;font-family:corbel;text-align: center;
padding-top: 3px;position: fixed;z-index: 1px;width: 1200px;
}
#reported{
width:100%;height: 100%;background-color: rgba(8,7,5,.7);top: 0px;position: fixed;left: 0px;
display: none;
}
#conte{height: 50%;width: 87%;background-color: white;
margin-left: 6%;margin-top: 6%;overflow-y:scroll;
}
#commented{
width:100%;height: 100%;background-color: rgba(8,7,5,.7);top: 0px;position: fixed;left: 0px;
display: none;
}
#coco{height: 70%;width: 87%;background-color: white;
margin-left: 6%;margin-top: 6%;overflow-y:scroll;
}

</style>
</head>
<body>
  <div id="fter">
<h3>Allright reserved &copy by Mucyo Rene</h3>
</div>
<div id="indcontent">
<div class="action"><!--this is the division of student links-->
<div id="blankspace" style="height:390px;overflow:scroll;">

<!--======================================starting student report===========================================================-->
<!--seeing the system users-->
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<div id="open"style="display:inline-block;font-size:120%;color:none;">
<label>View Students</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp	
</div>
<div id="openx"style="display:inline-block;font-size:120%;color:none;">
<label class="p">View Teachers</label>
</div>
<div id="vclass" 
style="display:inline-block;font-size:120%; marign-top:0%;font-size:120%;color:none;font-style:bold;">
<label>&nbsp&nbsp&nbspView classes</label>
</div>
<div id="viewrep" 
style="display:inline-block;font-size:120%; marign-top:0%;font-size:120%;color:none;font-style:bold;">
<label>&nbsp&nbsp&nbspView Reports</label>
</div>
<div id="comments"
style="display:inline-block;font-size:120%; marign-top:0%;font-size:120%;color:none;font-style:bold;">
<label>&nbsp&nbsp&nbspView comments</label>
</div>

<div id="reported">
<button id="ok" style="margin-left:90%;margin-top:2%;font-size:20px;color:red;font-weight:bold;">X</button>
<div id="conte">

<table align=center>
<tr><td id="as">#</td><td id="as">Name</td><td id="as">Contents</td>
<td id="as">Action</td>
</tr>
<?php

$stdsel=mysql_query("SELECT students.*,reported.* FROM students,reported WHERE 
  students.s_id=reported.reporter_id order by reported.reporter_id desc") or die(mysql_error());
$count=1;
while ($std=mysql_fetch_array($stdsel,MYSQL_ASSOC)) {
?>
<tr>
  <td><?= $count++;?></td>
<td><?php echo $std['firstname']." ".$std['lastname']."&nbsp &nbsp";?></td>
<td  style="width:400px;"><?= $std['rep_subject'];?></td>
<td>
<a onclick="asee('<?= $std['id_rep'];?>');" style="text-decoration:none;color:black;" 
id="remo">
Remove</a></td>
  </tr>
<?php
}
?>
</table>
<script type="text/javascript">
  function asee(idu){
    var delss=confirm('Are you sure to remove this report???');
if (delss==true) {
 window.location='remocom.php?idsents='+idu;
}
  }
</script>
</div>
</div>

<div id="commented">
<button id="wy" style="margin-left:90%;margin-top:2%;font-size:20px;color:red;font-weight:bold;">X</button>
<div id="coco">
  <table align="center">
<tr><td>#</td><td id="as">Name</td><td id='as'>Comments</td><td id='as'>Action</td></tr>
<?php

$stdsel=mysql_query("SELECT students.*,comments.* FROM students,comments WHERE 
  students.s_id=comments.commenter_id order by comments.com_id desc") or die(mysql_error());
$coco=1;
while ($com=mysql_fetch_array($stdsel)) {
?>
<tr>
<td><?= $coco++;?></td>
<td><?php echo $com['firstname']." ".$com['lastname']." ";?></td>
<td style="width:400px;padding-left:2%;padding-right:2%;"><?php echo $com['contents'];?></td>
<td><a  
onclick="ase('<?= $com['com_id'];?>');"
style="text-decoration:none;color:black;">Remove</a></td>
</tr>
<?php
}
?>
</table>
<script type="text/javascript">
  function ase(idq){
    var dels=confirm('Are you sure to Delete this comment?');
if (dels==true) {
 window.location='remorep.php?idsent='+idq;
}
  }
</script>
</div>
</div>

<div id="classview" style="margin-left:15%;display:none">
<?php
$so=mysql_query("SELECT *FROM classes");
?>
<table border="1">
<tr>
<td>#&nbsp</td>
<td>Class names</td><td colspan="2" align="center">Actions</td>
</tr>
<?php
$u=1;
while ($row=mysql_fetch_array($so)) {
  /*if ($u%2==0) {
    $color="#3d5457";
  }else{
    $color="#49676b";
  }*/
?>
<tr style='background:<?php echo $color;?>'>
<td><?php echo $u;?></td>
<td><?php echo $row['classname'];?></td>
<td><a onclick="delcl('<?= $row['cl_id'];?>','<?= $row['classname'];?>')"><button>Delete</button></a></td>
<td><button value="<?= $row['cl_id'];?>" class="butcl">UPDATE</button></td>
</tr>
<script type="text/javascript">
  function delcl(idcl,classname){
    var sinfocla=confirm('Are you sure to Delete '+classname+'?');
if (sinfocla==true) {
  //alert("clicked");
 window.location='deleteclass.php?idclas=' +idcl;
}
  }
</script>
<script type="text/javascript">
$(function(){
$("#classes").dialog({
    autoOpen:false,
    modal:true,
    width:350,
    position:{
  my:"center top",
  at:"center top",
  of:"#blankspace",
}
  });
$(".butcl").click(function(){
//alert("clicked boi");
var idcl=$(this).val();
$("#classes").dialog("open");
$("#classes").load('updateclasses.php?clasid='+idcl+'');
});
});
</script>
<?php
$u++;}
?>
</table>
</div>
&nbsp
<div id="lists">
 <div id="classes"></div>
<form method="POST" style="margin-left:40%;margin-top:3%;">
  Search here student:
<input type="text" size="40" name="secontents" placeholder="Enter your search" id=search>
<input type="submit" name="searchbutton" id="searchtton" value="Search" id="searchbuto">
</form>
<?php
//this is the php codes of search
if (isset($_POST['searchbutton'])) {
$vars=$_POST['secontents'];
$var=mysql_real_escape_string($vars);
$searchquery=mysql_query("SELECT * FROM students WHERE firstname like '%$var%'
OR lastname like '%$var%'") or die(mysql_error());
if (mysql_num_rows($searchquery)>0) {
  ?>

<table border="1">
<tr><td id="as">#&nbsp</td>
<td id="as">Firstname</td><td id="as">Lastname</td><td id="as">Gender</td><td id="as">DOB</td>
<td id="as">Location</td><td id="as">Phone</td><td id="as">Fathername</td><td id="as">Mathername</td>
<td id="as">Email</td>
<td colspan="2" align="center" id="as">Action</td>
</tr>
<?php
$secount=1;
while ($rowsearch=mysql_fetch_array($searchquery)) {
?>
<tr>
<td><?php echo $secount++;?></td>
<td><?php echo $rowsearch['firstname'];?></td>
<td><?php echo $rowsearch['lastname'];?></td>
<td><?php echo $rowsearch['gender'];?></td>
<td><?php echo $rowsearch['DOB'];?></td>
<td><?php echo $rowsearch['location'];?></td>
<td><?php echo $rowsearch['phones'];?></td>
<td><?php echo $rowsearch['fathername'];?></td>
<td><?php echo $rowsearch['mathername'];?></td>
<td><?php echo $rowsearch['email'];?></td>
<td><a id="lim">Delete</a></td>
<td><a id="update">Update</a></td>
<?php
}
}else{
echo "<script>alert('make good search please!!')</script>";
}
}else{

?>

<?php

$slq="SELECT *FROM students";
$exe=mysql_query($slq);
if ($exe) {
$u=1;
?>
<table border="1" class="fetch">
<tr><td id="as">#&nbsp</td>
<td id="as">Firstname</td><td id="as">Lastname</td><td id="as">Gender</td><td id="as">DOB</td>
<td id="as">Phone</td>
<td id="as">Email</td><td id="as">Username</td><td id="as">Password</td>
<td colspan="2" align="center" id="as">Action</td>
</tr>
<?php
while ($row=mysql_fetch_array($exe)) {
   if ($u%2==0) {
    $color="#3d5457";
  }else{
    $color="#49676b";
  }
?>
<tr>
<td><?php echo $u;?></td>
<td><?php echo $row['firstname'];?></td>
<td><?php echo $row['lastname'];?></td>
<td><?php echo $row['gender'];?></td>
<td><?php echo $row['DOB'];?></td>
<td><?php echo $row['phones'];?></td>
<td><?php echo $row['email'];?></td>
<td><?= $row['username']?></td>
<td><?= $row['password']?></td>
<td>
<a onclick="dela('<?= $row['s_id'];?>','<?= $row['firstname'];?>','<?= $row['lastname'];?>');">
<button>Delete</button></a>
</td>
<td><button value="<?php echo $row['s_id'];?>" class="but">Update</button></td>
</tr>
<script type="text/javascript">
$(document).ready(function(){
  $("#load").dialog({
    autoOpen:false,
    modal:true,
    width:350,
    position:{
  my:"center top",
  at:"center top",
  of:"#blankspace",
}
  });
$(".but").click(function(){
//alert('ccc');
var id=$(this).val();
$("#load").dialog("open");
$("#load").load('ajupdate.php?ids='+id+'');
});
});
</script>
<?php
$u++;}
  
}
}
?>
<script type="text/javascript">
  function dela(ids,firstname,lastname){
    var sinfo=confirm('Are you sure to Delete '+firstname+' '+lastname+'?');
if (sinfo==true) {
 window.location='delete.php?idse='+ids;
}
  }
</script>
<?php
$qrys="SELECT *FROM students";
$m=mysql_query($qrys);
$rows=mysql_num_rows($m);
?>
<a href=""></a>
</table>

<script>
$(document).ready(function(){
$("#classview").hide(200);
$("#vclass").click(function(){
$("#lists").hide();
$("#listt").hide();
$("#classview").slideToggle();
   });
});
</script>

<script>
$(document).ready(function(){
   $("#open").click(function(){
   	$("#listt").hide();
   	$("#classview").hide();
$("#lists").show(200);
   });
});
</script>



</div>
&nbsp&nbsp
<div id="listt" style="display:none;">
<!--to see the list of teachers-->

<?php
$a="SELECT *FROM teachers";
$sql1=mysql_query($a);
if ($sql1) {
$s=1;
?>
<table border="1" class="fet">
<tr>
<td id="as">#&nbsp</td>
<td id="as">Firstname</td>
<td id="as">Lastname</td><td id="as">identification number</td>
<td id="as">Location</td><td id="as">Phone</td><td id="as">username</td><td id="as">Password</td>
<td colspan="2" align="center" id="as">Action</td>
</tr>
<?php

while ($rowa=mysql_fetch_array($sql1)) {
   if ($u%2==0) {
    $color="#3d5457";
  }else{
    $color="#49676b";
  }
	?>
<tr>
<td><?php echo $s;?></td>
<td><?php echo $rowa['firstname'];?></td><td><?php echo $rowa['lastname'];?></td>
<td><?php echo $rowa['idnumber'];?></td>
<td><?php echo $rowa['location'];?></td><td><?php echo $rowa['phones'];?></td>
<td><?php echo $rowa['username'];?></td><td><?php echo $rowa['password'];?></td>
<td>
<a onclick="del('<?= $rowa['t_id'];?>','<?= $rowa['firstname'];?>','<?= $rowa['lastname'];?>');">
<button>Delete</button></a>
<td><button value="<?php echo $rowa['t_id'];?>" class="idt">Update</button></td>
</tr>
<script type="text/javascript">
$(document).ready(function(){
  $("#loadteacher").dialog({
    autoOpen:false,
    modal:true,
     position:{
  my:"center top",
  at:"center top",
  of:"#blankspace",
}
  });
$(".idt").click(function(){
//alert('ccc');
var idter=$(this).val();
$("#loadteacher").dialog("open");
$("#loadteacher").load('ajupdateteacher.php?idm='+idter+'');
});
});
</script>
<?php
$s++;}
}
?>
<script type="text/javascript">
function del(id,firstname,lastname){
 var conf=confirm('Are you sure to delete '+firstname+' '+lastname+'?');
 if (conf==true) {
  window.location='deleteteacher.php?idtea='+id;
 }else{
  //
 }
}
</script>
</table>
</div><!--ending list division-->
<script src="java/jquery.js"></script>
	<script src="java/jquery-ui.js"></script>
	<link rel="stylesheet"href="java/jquery-ui.css">
<script>
$(document).ready(function(){
        $("#listt").hide(500);
   $("#openx").click(function(){
   	$("#lists").hide();
   	$("#classview").hide();
$("#listt").slideToggle();
   });
});
</script>
<?php
if (isset($_POST['update'])) {
$ids=$_POST['ids'];
$a=$_POST['fname1'];
$b=$_POST['lname'];
$c=$_POST['gender'];
$d=$_POST['sel']."-".$_POST['sele']."-".$_POST['select'];
$e=$_POST['location'];
$f=$_POST['phone'];
$g=$_POST['fname'];
$h=$_POST['mname'];
$i=$_POST['emails'];
$j=$b;
$k=$a.date("Y");
$cv=$_POST['classe'];
$sq=mysql_query("SELECT *FROM classes WHERE classname='$cv'");
if ($sq) {
$row=mysql_fetch_array($sq);
$cl_id=$row['cl_id'];
}
$sqlupdate=mysql_query("UPDATE students SET 
  firstname='$a',
lastname='$b',
gender='$c',
DOB='$d',
location='$e',
phones='$f',
fathername='$g',
mathername='$h',
email='$i' WHERE s_id='$ids'") or die(mysql_error());
if ($sqlupdate) {
echo "updated";
}
else{
?>
<script>
alert("can't insert the people");
</script>
<?php
}
}
?>

<?php
if (isset($_POST['savechange'])) {
$teacher=$_POST['ide'];
$aa=mysql_real_escape_string($_POST['fname1']);
$bb=mysql_real_escape_string($_POST['lname']);
$cc=mysql_real_escape_string($_POST['gender']);
$dd=mysql_real_escape_string($_POST['idcard']);
$ee=mysql_real_escape_string($_POST['location']);
$ff=mysql_real_escape_string($_POST['phone1']);
$gg=mysql_real_escape_string($_POST['qualify']);
$hh=mysql_real_escape_string($_POST['mail']);
$teacherup=mysql_query("UPDATE teachers SET
 firstname='$aa',
lastname='$bb',
gender='$cc',
idnumber='$dd',
location='$ee',
phones='$ff',
qualification='$gg',
email='$hh'
  WHERE t_id='$teacher'") or die(mysql_error());
if ($teacherup) {
echo "updated";
}else{
  echo "can't update table";
}}
?>
<div id="classes"></div>
<div id="load"></div>
<div id="loadteacher"></div>
</div><!--ending linkspace-->
</div><!--ending blank space-->
<script>
$(document).ready(function(){
$("#reported").hide();
$("#viewrep").click(function(){
$("#reported").show(400);
});
$("#ok").click(function(){
$("#reported").hide(100);
});
});
</script>
<script>
$(document).ready(function(){
$("#commented").hide();
$("#comments").click(function(){
$("#commented").show(400) ;
});
$("#wy").click(function(){
$("#commented").hide(100);
});
});
</script>
</body>
<?php
include("includes/footer.php");
?>
</html>