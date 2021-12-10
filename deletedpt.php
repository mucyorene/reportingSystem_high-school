<?php
include("includes/connect.php");
?>
<?php
$a=$_GET['idd'];
$x="DELETE FROM departement where d_dpt='$a'";
$sql=mysql_query($x);
if ($sql) {
header("location:addept.php");
}
?>