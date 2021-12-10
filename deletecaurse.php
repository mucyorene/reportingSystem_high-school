<?php
include("includes/connect.php");
var_dump($_GET);
$id=$_GET['idse'];
//echo $id;
$sq=mysqli_query($conn,"DELETE FROM caurses WHERE c_id='$id'") or die(mysqli_error($conn));
if ($sq) {
header("location:caursereg.php");
}
else{
	echo "can't delete boi";
}
?>