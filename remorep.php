<?php
include("includes/connect.php");
//var_dump($_GET);
$idrep=$_GET['idsent'];
//echo $idrep;
$sq=mysql_query("DELETE FROM comments WHERE com_id='$idrep'") or die(mysql_error());
if ($sq) {
header("LOCATION:adminpage.php");
}
else{
	echo "can't insert the marks";
}
?>