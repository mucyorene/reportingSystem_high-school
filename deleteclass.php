<?php
include("includes/connect.php");
//var_dump($_GET);
$ud=$_GET['idclas'];
$query=mysql_query("DELETE FROM classes WHERE cl_id='$ud'") or die(mysql_error());
if ($query) {
header("LOCATION:adminpage.php");
}
else{
	echo "can't delete man";
}
?>