<?php
include("includes/connect.php");
$a=$_GET['idse'];
$x="DELETE FROM students WHERE s_id='$a'";
$slq=mysql_query($x);
if ($slq) {
header("location:adminpage.php");
}
?>