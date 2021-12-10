
<!--this is the final project for senior six 2016-2017 realized by MUCYO TUYISENGE Rene 
on this student page which were design from 8 april 2016 is not full then the next is 
to ask for superviser to help me to displace in blankspace division the action desired by navigator
-->
<?php 
session_start();
include("includes/connect.php");
if (!$_SESSION['s_id']) {
header("location:index.php");
}
$qd=mysql_query("SELECT * FROM students WHERE s_id='{$_SESSION['s_id']}'");
$fefd=mysql_fetch_array($qd);
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo "Welcome ".$fefd['firstname']." ".$fefd['lastname'];?></title>
	<link rel="stylesheet" type="text/css" href="css/teacher.css">
	<style type="text/css">
#fter{background-color: #5da1a7;height:60px;margin-top:390px;font-family:corbel;text-align: center;
padding-top: 3px;position: fixed;z-index: 1px;width: 1200px;
}

#back1{
width:100%;height: 100%;background-color: rgba(8,7,5,.7);top: 0px;position: fixed;left: 0px;
display: none;
}
#blem{height: 70%;width: 87%;background-color: white;
margin-left: 6%;margin-top: 3%;overflow-y:scroll;
}
#commentco{
width:100%;height: 100%;background-color: rgba(8,7,5,.7);top: 0px;position: fixed;left: 0px;
}
#insco{height: 70%;width: 87%;background-color: white;
margin-left: 6%;margin-top: 3%;overflow-y:scroll;
}

</style>
<?php
include("includes/banner.php");
include("includes/stheader.php");
?>
</head>
<body style="height:650px;">
<div id="fter">
<h3>Allright reserved &copy by Mucyo Rene</h3>
</div>
<div id="blankspace">
<!--================================================starting page student home================================================-->
<div id="comment" style="display:inline-block;font-size:25px;color:none;
padding-right:4%;margin-left:4%;">
<label>Send comment</label>
</div>
<div id="report" style="display:inline-block;font-size:25px;color:none;">
	<label>Report Problems</label>
</div>
<div id="commentco">
	<button id="wi" style="margin-left:90%;margin-top:2%;font-size:20px;color:red;font-weight:bold;">X</button>
<div id="insco">
<table align=center>
<tr>
<th align="center" colspan="2"><font color="none">ENTER THE COMMENTS</font></th>
</tr>
<tr>
<td>Enter the comment</td>
<form method="POST">
<td><textarea rows="5" cols="30" placeholder="   Your comment here" name="coment" required></textarea></td>
</tr>
<tr><td colspan="2" align="right"><input type="submit" name="sendco" value="Send" required></td></tr>
</table>
</form>
</div>
</div>

<div id="back1">
	<button id="ok" style="margin-left:90%;margin-top:2%;font-size:20px;color:red;font-weight:bold;">X</button>
<div id="blem">
<form method="POST">
<table align=center>
<tr><th align="center" colspan="2"><font color="none">REPORT HERE</font></th></tr>
<tr><td>Enter subject</td><td><input type="text" name="resubject" placeholder="  Your subject here" required></td></tr>
<tr><td>Enter report</td><td><textarea rows="5" cols="30" name="recontents" placeholder="  Your report here" required></textarea></td></tr>
<tr><td colspan="2" align="right"><input type="submit" name="subcont" value="Send"></td></tr>
</table>
</form>
</div>
</div>
<script src="js/jquery.js"></script>
<script>
$(document).ready(function(){
$("#back1").hide();
$("#commentco").hide();
$("#report").click(function(){
$("#back1").show(400) ;
});
$("#ok").click(function(){
//alert("yes");
$("#back1").hide(600);
});
$("#comment").click(function(){
$("#commentco").show(600);
});
$("#wi").click(function(){
$("#commentco").hide();
});
});
</script>
<?php
$stdid=mysql_query("SELECT *FROM students WHERE s_id={$_SESSION['s_id']}");
if ($stdid) {
$stdrow=mysql_fetch_array($stdid);
$commenterid=$stdrow['s_id'];
}
if (isset($_POST['sendco'])) {
$a=$_POST['coment'];
$sqlinsert=mysql_query("INSERT INTO comments SET com_id=null,
	commenter_id='$commenterid',contents='$a'") or die(mysql_error());
if ($sqlinsert) {
?>
<script type="text/javascript">
alert("Your comment sent successfully");
</script>
<?php
}
}
?>
<?php
if (isset($_POST['subcont'])) {
$bx=$_POST['resubject'];
$b=mysql_real_escape_string($bx);
$cx=$_POST['recontents'];
$c=mysql_real_escape_string($cx);
$repinsert=mysql_query("INSERT INTO reported SET id_rep=null,
	reporter_id='$commenterid',rep_subject='$b',contents='$c',times=null") or die(mysql_error());
if ($repinsert) {
?>
<script type="text/javascript">
alert("Your report sent successfully");
</script>
<?php
}
}
?>
</div><!-- end the main contents-->
</body>
</html>
