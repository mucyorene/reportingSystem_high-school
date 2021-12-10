<?php
include("includes/connect.php");
$dpt=mysqli_query("SELECT *FROM departement");
$er=mysqli_fetch_array($dpt);

$sq=mysqli_query("SELECT * FROM students WHERE s_id=4");
$sinfo=mysqli_fetch_array($sq);

$sql=mysqli_query("SELECT *FROM classes");
$class=mysqli_fetch_array($sql);
	
?>
<html>
<head>
	<title></title>
</head>
<body>
	<table>
		<tr>
				<td colspan="4" style="border:1px solid black;width:300px;">
				    Year: <?php echo date('Y');?><br>
					Class: <?php echo $class['classname'];?><br />
				    </td>
				</tr>


				<tr>
				
					<td colspan="9">
Name:<b style="font-family:Cambria;"><?php echo $sinfo['firstname']." ".$sinfo['lastname'];?></b><br>
<!--<?php //echo $b['registration_id'];?><br>-->
Option:<?php echo $er['dpt_name'];?><br>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<u style="color:black;font-family:Balthazar;font-size:20px;">School report</u><hr color="skyblue";>
					</td>

				</tr>
				<tr>
					<td width="320" colspan="2" style="border:1px solid black;"><b>Course</b></td>
					<td></td>
					<td colspan="7" align="center" style="border:1px solid black;"><b>Marks</b></td>
				</tr>
				
				<tr  style="border:2px solid black;">
<td colspan="3"></td>
<td colspan="2" align="center" style="border:2px solid black;">CAT/T.J</td>
<td colspan="2" align="center" style="border:2px solid black;">&nbsp&nbsp&nbspEXAM&nbsp&nbsp&nbsp</td>
<td colspan="2" align="center" style="border:2px solid black;">&nbspTOTAL&nbsp&nbsp</td>
</tr>
<tr>
	<?php
$dis = mysqli_query("SELECT * FROM marks where s_id='1'")or die(mysqli_error());
$di = mysqli_fetch_array($dis);
?>
<td colspan="2" style="border:2px solid black;">Displine</td>
<td colspan="5"></td>
					<td align="center" bgcolor="#7f8283" style="border:solid 2px black"><b>40</b></td>
				</tr>
				<tr>
					<td  style="border:2px solid black;"></td>
				</tr>
				<?php 
$ama = mysqli_query("SELECT caurses.coursename,caurses.maximum,marks.cat_marks,marks.exams_marks
 FROM caurses,classes,teachers,marks,students
where caurses.t_id=teachers.t_id and caurses.c_id=marks.c_id and students.s_id='4' and 
marks.s_id='4' AND term_stutus='term 2'")or die(mysqli_error());

?>

<?php
while($a = mysqli_fetch_array($ama)){
?>
<tr>
					
<td colspan="2"style="border:2px solid black;"><?php echo $a['coursename'];?></td>
					<td></td>

<td style="border:1px solid black;">
	<?php 

					if($a['cat_marks'] < ($a['maximum']/4)){
					echo $cati = "<u style='color:red;font-weight:bold;'>".$a['cat_marks']."</u>";
					}
					else{
						echo $a['cat_marks'];
					}
					?>

</td>
<td align="center" bgcolor="#7f8283" style="border:solid 2px black"><b>
	<?php echo $a['maximum']/2;?></b></td>
<td style="border:1px solid black;">
	<?php 

					if($a['exams_marks'] < ($a['maximum']/4)){
					echo $cati = "<u style='color:red;font-weight:bold;'>".$a['exams_marks']."</u>";
					}
					else{
						echo $a['exams_marks'];
					}
					?>

</td>
<td align="center" bgcolor="#7f8283" style="border:2px solid black;"><b>
	<?php echo $a['maximum']/2;?></b></td>
<td style="border:1px solid black;">
	
	<?php 

					if(($a['cat_marks']+$a['exams_marks']) < ($a['maximum']/2)){
					echo $tot = "<u style='color:red;font-weight:bold;'>".($a['cat_marks']+$a['exams_marks'])."</u>";
					}
					else{
						echo $a['cat_marks']+$a['exams_marks'];
					}
					?>

</td>
<td align="center" bgcolor="#7f8283"  style="border:2px solid black;"><b>
	<?php echo $a['maximum'];?></b></td>
					
				</tr>

				<?php
			}?><tr>
					<td  style="border:2px solid black;"></td>
	</tr>
	<tr>

<?php 
$n = mysqli_query("SELECT sum(marks.cat_marks) as sum,sum(marks.exams_marks)as sum2,
count(marks.c_id)as lesson,sum(caurses.maximum) as max,caurses.maximum 
from marks,caurses where marks.s_id='1' and caurses.c_id=marks.c_id")or die(mysqli_error());
$aa = mysqli_fetch_array($n);
?>
					<td style="border:2px solid black;" colspan="2">TOTAL</td>
<td></td>
<td style="border:1px solid black;"><?php echo $aa['sum'];?></td>
<td align="center" bgcolor="#7f8283" style="border:solid 2px black"><b><?php echo $aa['max']/2;?></b></td>
<td style="border:1px solid black;"><?php echo $aa['sum2'];?></td>
<td align="center" bgcolor="#7f8283" style="border:solid 2px black"><b><?php echo $aa['max']/2;?></b></td>
<td style="border:1px solid black;"><?php echo $aa['sum']+$aa['sum2'];?></td>
<td align="center" bgcolor="#7f8283" style="border:solid 2px black"><b><?php echo $aa['max'];?><b></td>
					
				</tr>
				<tr>
					<td colspan="2"style="border:2px solid black;">PERCENTAGE</td>
					<td></td>
					<td colspan="7" align="right" style="border:1px solid black;">
						

						<?php
						 $p = (($aa['sum']+$aa['sum'])/$aa['max'])*100;
						 echo $p=round($p,2);
						?>
						 %</td>
</tr>
<tr>
<td colspan="2" style="border:2px solid black;"></td>
<td style="border:1px solid black;"></td>
</tr>
<tr>
	<td colspan="2" style="border:2px solid black;">PLACE</td>
	<td></td>
	<td colspan="7" align="right" height="20" style="border:1px solid black;">
<?php 
$place = mysqli_query("SELECT * from place,students where place.student_id='1' and students.s_id='1'")or die(mysqli_error());
$w = mysqli_fetch_array($place);
$class = $w['cl_id'];
//$department = $w['d_dpt'];

echo $w['place'];
?> out of
<?php 
$ab = mysqli_query("SELECT * FROM place")or die(mysqli_error());
$i=1;
$sum=0;
while ($row=mysqli_fetch_array($ab,MYSQLi_ASSOC)) {

}$i++;
$sum+=$i;
echo $sum;
?>
	</td>
				</tr>
				<tr>
					<td colspan="2" style="border:2px solid black;">SIGNATURE</td>
					<td></td>
					<td height="20" style="border:1px solid black;"></td>
				</tr>

			</table>


	
	

	</td>
</tr>
<tr>
<td></td>
</tr>
</table>
<table width="851"height="50">
<tr>
	<td class="footer">
<h3 align="center">&copy Copyright 2015 all right reserved</h3>
	</td>
</tr>
</table>
</div>
</center>
	</body>
</html>