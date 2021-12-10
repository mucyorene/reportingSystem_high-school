<?php
include("includes/connect.php");
$id=$_GET['id'];
//echo $id;
//die;
$select=mysqli_query($conn,"SELECT *FROM students WHERE s_id='$id'");
$serow=mysqli_fetch_array($select);
$status=$serow['status'];
if ($status=='check') {
$query=mysqli_query($conn,"UPDATE students SET status='checked' WHERE s_id='$id'");
if ($query) {
/*header("location:deanreportview.php");*/
echo "student checked";
}
}else{
$query=mysqli_query($conn,"UPDATE students SET status='check' WHERE s_id='$id'");
if ($query) {
	echo "student unchecked";
/*header("location:deanreportview.php");*/
}
}

