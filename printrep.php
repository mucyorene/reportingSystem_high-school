<?php
//var_dump($_GET);
include("includes/connect.php");
$id=$_GET['id'];
$fes=$_GET['iddis'];
//echo $fes;
$std=mysql_query("SELECT district.*,students.* FROM district,students 
	WHERE students.s_id='$id' AND students.location=district.district_id") or die(mysql_error()) ;
$fes=mysql_fetch_array($std);
$dist=$fes['district_id'];
?>

<table border="1" bgcolor="white" align="center">
<font color: "#83b0d2">
	<tr>
		<td height="15" width="907" colspan="17" style="border:none;">
		<p>Republic of rwanda</p>
		<p>District <?php echo $fes['district_name'];?></p>
		<p>the name of school</p>
		</td>
	</tr>
<tr><td align="center" style="font-size:20px;border:none;" colspan="17">
<?php
$quer=mysql_query("SELECT *FROM students WHERE s_id='$id'");
$fe=mysql_fetch_array($quer);
echo $fe['firstname']." ".$fe['lastname'];
?>
</td></tr>
<tr><td colspan="19"><center>SCHOOL REPORT</center></td></tr>
	<tr>
		<td height="10" width="20" align="center" rowspan="2"><b>Course</b></td>
		<td height="15" width="40" colspan="3" align="center"><b>Maximum</b></td>
		<td height="15" width="40" colspan="3"><b>First term</b></td>
		<td height="15" width="40" colspan="3"><b>Second term</b></td>
		<td height="15" width="40" colspan="3"><b>Third Term</b></td>
		<td colspan="3" height="15" width="40">Year</td>
		<td height="15" width="40">Second setting</td>
	</tr>
	<tr>
		<td height="15" align="center"><b>CAT</b></td>
		<td height="15"  align="center"><b>EXAMS</b></td>
		<td height="10" align="center"><b>TOTAL</b></td>
		<td height="10" align="center"><b>CAT</b></td>
		<td height="10" align="center"><b>EXAMS</b></td>
		<td height="10" align="center"><b>TOTAL</b></td>
<td height="10" align="center"><b>CAT</b></td>
<td height="10" align="center"><b>EXAMS</b></td>
<td height="10" align="center"><b>TOTAL</b></td>
<td height="15" align="center"><b>CAT</b></td>
		<td height="15"  align="center"><b>EXAMS</b></td>
		<td height="10" align="center"><b>TOTAL</b></td>
<td height="15" align="center"><b>TOTAL</b></td>
		<td height="15"  align="center"><b>MAX</b></td>
		<td height="10" align="center"><b>&nbsp%</b></td>
		<td height="10" align="center"><b>&nbsp%</b></td>

	</tr>
<tr>
		<td height="15" width="120"><b>Conduct</b></td>
		<td height="15" width="120" align="center" colspan="3"><b><center><?php echo "cond1";?></center></b></td>
		<td height="15" width="120" align="center" colspan="3"><b><center><?php echo "cond2";?></center></b></td>
		<td height="15" width="120" align="center" colspan="3"><b><center><?php echo "cond3";?></center></b></td>
		<td height="15" width="120" align="center" colspan="3"><b><center><?php echo "cond4";?></center></b></td>
			<td height="15" align="center"><b><center><?php echo "&nbsp&nbsp";?></b></td>
			<td height="15" align="center"><b><center><?php echo "&nbsp&nbsp";?></b></td>
			<td height="15" align="center"><b><center><?php echo "&nbsp&nbsp";?></b></td>
			<td height="15" align="center"><b><center><?php echo "&nbsp";?></b></td>
</tr>
<tr><td colspan="17" height="15"></td></tr>
<?php
$sts=mysql_query("SELECT *FROM students WHERE s_id='$id'") or die(mysql_error());
if ($sts) {
$sidrow=mysql_fetch_array($sts);
$stid=$sidrow['s_id'];
}
//some total variables
$totalmaxcat=0;
$totalmaxexam=0;
$totalmaxtotal=0;
//ending variable of the maximum

//term one marks decration
$totalterm1cat=0;
$totalterm1exam=0;
$totalterm1total=0;
//ending the variables of the total term 1

//starting decration of term 2 marks
$totalterm2cat=0;
$totalterm2exam=0;
$totalterm2total=0;
//ending the totals of term 2

//starting term 3 totals
$totalterm3cat=0;
$totalterm3exam=0;
$totalterm3total=0;
//ending term 3 total
//maximum variable decration
$totalmaximumcat=0;
$totalmaximumexam=0;
$totalmaximumtotal=0;
//ending 
//finding the total year total maximum

$totalyearmaxtotal=0;

$query=mysql_query(
"SELECT caurses.*,students.*,
marks.cat_marks,marks.exams_marks FROM caurses,classes,students,marks WHERE students.cl_id=classes.cl_id 
AND students.s_id='$id' AND caurses.cl_id=classes.cl_id AND students.s_id=marks.s_id
AND caurses.c_id=marks.c_id AND term_stutus='term 1' AND y_id=2") or die(mysql_error());
if(mysql_num_rows($query)){
while ($fet=mysql_fetch_array($query)) {
	//total year of marks

$totalyearcat=0;
$totalyearexam=0;
$totalyearmax=0;
?>
<tr>
<td><?= $fet['coursename'];?></td>
<td>
<?php 
$halfmaximum=($fet['maximum']/2); 
$totalmaximumcat+=$halfmaximum; 
echo $halfmaximum;
?>
</td>
<td>
<?php $halfmaximum=($fet['maximum']/2);$totalmaximumexam+=$halfmaximum; echo $halfmaximum;?>
</td>
<td>
<?php $totalmaximumtotal+=$fet['maximum'];
$totalyearmax=($fet['maximum']*3);
$totalyearmaxtotal+=$totalyearmax;
 echo $fet['maximum'];?></td>
<td>
<?php
$totalterm1cat+=$fet['cat_marks'];
$totalterm1exam+=$fet['exams_marks'];
 echo $fet['cat_marks'];?></td>
<td><?php echo $fet['exams_marks'];?></td>
<td><?php $total1=$fet['cat_marks']+$fet['exams_marks'];
$totalyearcat+=$total1;
 $totalterm1total+=$total1;echo $total1;?>
</td>
<!-- Ending to find the term1 marks-->
<?php
//term 2 marks query
$query2=mysql_query("SELECT marks.*,caurses.*,students.*,classes.* FROM marks,caurses,students,classes WHERE 
students.cl_id=classes.cl_id 
AND students.s_id='$id' AND caurses.cl_id=classes.cl_id AND students.s_id=marks.s_id
AND caurses.c_id=marks.c_id AND term_stutus='term 2' AND y_id=2
") or die(mysql_error());
if (mysql_num_rows($query2)>0) {
	$cout=1;
while ($row2=mysql_fetch_array($query2)) {
?>
<td>
<?php 
$totalterm2cat+=$row2['cat_marks'];
$totalterm2exam+=$row2['exams_marks'];
echo $row2['cat_marks'];?>
</td>
<td><?php echo $row2['exams_marks'];?></td>
<td>
<?php $total2=$row2['cat_marks']+$row2['exams_marks'];
$totalyearcat+=$total2;
$totalterm2total+=$total2; echo $total2;?>
</td>
<?php
}
}else{
echo "<td></td>";
echo "<td></td>";
echo "<td></td>";
}
?>
<!--finding the term 3 marks-->
<?php
$query3=mysql_query(" SELECT marks.*,caurses.*,students.*,classes.* FROM marks,caurses,students,classes WHERE 
students.cl_id=classes.cl_id 
AND students.s_id='$id' AND caurses.cl_id=classes.cl_id AND students.s_id=marks.s_id
AND caurses.c_id=marks.c_id AND term_stutus='term 3' AND y_id=2") or die(mysql_error());
if (mysql_num_rows($query3)>0) {
while ($row3=mysql_fetch_array($query3)) {
?>
<td>
<?php 
$totalterm3cat+=$row3['cat_marks'];
$totalterm3exam+=$row3['exams_marks'];
echo $row3['cat_marks'];?></td>
<td><?php echo $row3['exams_marks'];?></td>
<td>
<?php $total3=$row3['cat_marks']+$row3['exams_marks']; 
$totalyearcat+=$total3;
$totalterm3total+=$total3; 

echo $total3;?></td>
<?php
}
}
else{
?>
<td></td>
<td></td>
<td></td>
<?php
}
?>
<!--year marks finding-->
<td><?php echo $totalyearcat;?></td>
<td><?php echo $totalyearmax;?></td>
<td><?php $pertotal=(($totalyearcat*100)/$totalyearmax);echo round($pertotal);?></td>
<!--finding the marks of second setting-->

<td></td>

</tr>
<?php
}
}else{
?>

<!--html tables-->
<td>
</td>
<?php
}
?>

<!--totals of marks range-->

<tr>
	<td><?php echo "Total";?></td>
<!--finding the maximum-->
<td><?php echo $totalmaximumcat?></td>
<td><?php echo $totalmaximumexam;?></td>
<td><?php echo $totalmaximumtotal;?></td>

<!--total term 1 marks-->
	<td><?php echo $totalterm1cat;?></td>
	<td><?php echo $totalterm1exam;?></td>
	<td><?php echo $totalterm1total;?></td>
<!--total term 2 totals-->
<td><?php echo $totalterm2cat?></td>
<td><?php echo $totalterm2exam?></td>
<td><?php echo $totalterm2total?></td>

<!--total of the term 3-->
<td><?php echo $totalterm3cat?></td>
<td><?php echo $totalterm3exam?></td>
<td><?php echo $totalterm3total?></td>

<!--Finding the total of years's marks-->

<td><?php 
$totalyeartotal=($totalterm2total+$totalterm3total+$totalterm1total); 
echo $totalyeartotal;?></td>
<td>
<?php echo $totalyearmaxtotal;?>
</td>
<td>
<?php
$percentageperyear=(($totalyeartotal*100)/$totalyearmaxtotal);
echo round($percentageperyear);
?>
</td>


<!-- Finding the second settings's marks-->

<td></td>

<tr>


<tr>
<td>Percentage</td>
<td colspan=3 align=right></td>
<td colspan=3 align=right>
<?php $termperce1=(($totalterm1total*100)/$totalmaximumtotal);echo floatval($termperce1)."%";?>
</td>
<td colspan=3 align=right>
<?php $termperce2=(($totalterm2total*100)/$totalmaximumtotal);echo floatval($termperce2)."%";?>
</td>
<td colspan=3 align=right>
<?php $termperce3=(($totalterm3total*100)/$totalmaximumtotal);echo floatval($termperce3)."%";?>
</td>
<td colspan=3 align=right>
<?php
echo round($percentageperyear)."%";
?>
</td>
<td></td>
</tr>
<tr>
<td>Place</td>
<td colspan=3 align=right></td>
<td colspan=3 align=right></td>
<td colspan=3 align=right></td>
<td colspan=3 align=right></td>
<td colspan=3 align=right></td>
<td></td>
</tr>
</table>
<br />
<script src="java/jquery.js"></script>
<button id="print" style="margin-left:82%;padding:1%;">Print</button>
<script type="text/javascript">
$("#print").click(function(){
$(this).hide();
window.print();
});
</script>
