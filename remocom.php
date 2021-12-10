<?php
include("includes/connect.php");
//var_dump($_GET);
$idrep=$_GET['idsents'];
//echo $idrep;
$sq=mysql_query("DELETE FROM reported WHERE id_rep='$idrep'") or die(mysql_error());
if ($sq) {
header("LOCATION:adminpage.php");
}
else{
	echo "can't insert the marks";
}
?>