<?php
$conn=mysqli_connect("localhost","root","") or die("There is no connection with databases1".mysql_error());
$sele=mysqli_select_db($conn,"reporting") or die("This page is not connected to the table properly".mysql_error());
?>