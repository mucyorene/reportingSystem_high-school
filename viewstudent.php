<?php
include("includes/connect.php");
//this is pagination page and codes
$limit=4;
$page=$_GET['pag'];
if($page==" "||$page==1){
$start=0;}
else{
	$start=($page*$limit=3)-$limit;
}
$slq="SELECT *FROM students LIMIT $start,$limit";
$exe=mysql_query($slq);
if ($exe) {
$u=1;
?>
<table border="1" class="fetch">
<tr><td>Firstname</td><td>Lastname</td><td>Gender</td><td>DOB</td>
<td>Location</td><td>Class</td><td>Phones</td><td>Departement</td><td>Fathername</td>
<td>Mathername</td><td>Username</td><td>Password</td><td colspan="2">Action</td>
</tr>
<?php
while ($row=mysql_fetch_array($exe)) {
?>
<tr>
<td><?php echo $row['firstname'];?></td>
<td><?php echo $row['lastname'];?></td>
<td><?php echo $row['gender'];?></td>
<td><?php echo $row['DOB'];?></td>
<td><?php echo $row['location'];?></td>
<td><?php echo $row['class'];?></td>
<td><?php echo $row['phones'];?></td>
<td><?php echo $row['departement'];?></td>
<td><?php echo $row['fathername'];?></td>
<td><?php echo $row['mathername'];?></td>
<td><?php echo $row['password'];?></td>
<td><a href="delete.php?ids=<?php echo $row['s_id'];?>">Delete</a>
</td><td><a href="#">Update</a></td>
</tr>
<?php
}$u++;
}
?><?php
$qrys="SELECT *FROM students";
$m=mysql_query($qrys);
$rows=mysql_num_rows($m);
$p=ceil($rows/$limit);
for($a=1;$a<=$p;$a++){
	?><a href="index.php?pag=<?php echo $a; ?>"><?php echo $a;?></a>
	<?php

}
?>
<!--this is the ajax that help me to avoi page refresh-->


</table>
