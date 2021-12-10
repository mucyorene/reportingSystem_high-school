<?php
include("includes/connect.php");
//var_dump($_GET['yid']);
$yearid=$_GET['yid'];

?>
<form method="POST">
Choose departement:
<select style="padding-right:50" class=dept name="dept">
<option>Select Departement</option>
<?php
$sql=mysqli_query($conn,"SELECT * FROM departement WHERE year_id='$yearid'");
if ($sql) {
$i=1;
while ($d=mysqli_fetch_array($sql)) {
	?>
<option value="<?php echo $yearid.",".$d['d_dpt'];?>"><?php echo $d['dpt_name'];?></option>
<?php
$i++;}
}
?>
</select>&nbsp &nbsp &nbsp &nbsp &nbsp