<?php
include("includes/connect.php");
//var_dump($_GET);
//$sq=mysql_query($s = "SELECT *FROM students WHERE s_id='{$_GET['clase']}'")or die(mysql_error());
//echo $s;
$idc=explode(',',$_GET['clase']);
$yearids=$idc[0];
$clid=$idc[1];
?>
<table style="margin-top:3%;margin-left:2%;">
<tr align="center">
<td colspan="3">
</td>
</tr>
<tr>
<td style="text-align:center;font-size:150%;color:none;">#&nbsp</td>
<td style="text-align:center;font-size:150%;color:none;">Student name</td>
<td style="text-align:center;font-size:150%;color:none;">Status</td>
</tr>
<?php
$query = "SELECT students.firstname,students.status,students.s_id,students.lastname,classes.cl_id 
	FROM students,classes WHERE classes.cl_id='$clid' AND students.cl_id=classes.cl_id";
$sq=mysqli_query($conn,$query) or die(mysqli_error($conn));
$i=1;
while ($row=mysqli_fetch_array($sq)) {
	$sid=$row['s_id'];//getting the student id
	//var_dump($row);//alright
	//echo $row['s_id']; //this is true
?>
<tr>
<td><?php echo $i;?></td>
<td><?php echo $row['firstname'];?>&nbsp&nbsp<?php echo $row['lastname'];?></td>
<form method="POST">

<td><button class="check"  value="<?php echo $row['s_id']; ?>" style="text-decoration:none;"><?php echo $row['status'];?></button></td>
</tr>
<?php $i++; }?>

<tr><td align="left" colspan="2"><button class="gen" value=<?= $yearids?>,<?= $clid?> style="text-decoration:none;">Generate</button></td>
<td><a href="viewall.php?idcasa=<?php echo $yearids?>&idcl=<?= $clid?>">View report and print all reports</a></td></tr>
</table>
<script type="text/javascript">
	$(function(){
		$(".check").click(function(){
			var id=$(this).val();
			$.get("updatecheck.php",{id:id,action:'check'},function(rensponse){
				alert(rensponse);
				$(".classes").change();
			});
		});
	});
</script>
<script type="text/javascript">
	$(function(){
		$(".gen").click(function(){
			var id=$(this).val();
			$.get("generate.php",{idsa:id},function(rensponse){
				//$(".reports").html(rensponse);
				//$(".classes").change();
				alert("reports successfully generated");
			});
		});
	});
</script>
<div class="reports">
</div>
</body>
</html>
