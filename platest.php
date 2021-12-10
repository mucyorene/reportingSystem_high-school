<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
include("includes/connect.php");
$plac=mysql_query("SELECT * FROM percentages WHERE term_status='term 1' ORDER BY percentage desc") or die(mysql_error());
$i=1;
while ($fes=mysql_fetch_array($plac,MYSQL_ASSOC)) {
if ($fes['student_id']==1) {
break;
}
$i++;}
echo $i;
?>
</body>
</html>