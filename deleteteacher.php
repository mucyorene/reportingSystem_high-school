<?php
include("includes/connect.php");
$a=$_GET['idtea'];
$x="DELETE FROM teachers WHERE t_id='$a'";
$slq=mysql_query($x);
if ($slq) {
header("location:adminpage.php");
}
?>