<?php include("includes/connect.php");?>
<?php include("includes/header.php");?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
this is the report body
<table border="1">
<font color: "#83b0d2">
	<tr>
		<td height="15" width="907" colspan="17">
		<p>Republic of rwanda</p>
		<p>District Ruhango</p>
		<p>the name of school</p>
		</td>
	</tr>
<tr><td colspan="17"><center>SCHOOL REPORT</center></td></tr>
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
		<td height="15" width="120" align="right" colspan="3"><b><?php echo "cond1";?></b></td>
		<td height="15" width="120" align="right" colspan="3"><b><?php echo "cond2";?></b></td>
		<td height="15" width="120" align="right" colspan="3"><b><?php echo "cond3";?></b></td>
		<td height="15" width="120" align="right" colspan="3"><b><?php echo "cond4";?></b></td>
			<td height="15" align="center"><b><center><?php echo "&nbsp&nbsp";?></b></td>
			<td height="15" align="center"><b><center><?php echo "&nbsp&nbsp";?></b></td>
			<td height="15" align="center"><b><center><?php echo "&nbsp&nbsp";?></b></td>
			<td height="15" align="center"><b><center><?php echo "&nbsp";?></b></td>
</tr>
<tr><td colspan="17" height="15"></td></tr>
<?php
//some total variables
$totalmaxcat=0;
$totalmaxexam=0;
$totalmaxtotal=0;
//ending variable of the maximum
$totalterm1cat=0;
$totalterm1exam=0;
$totalterm1total=0;
//ending the variables of the total term 1
$totalterm2cat=0;
$totalterm2exam=0;
$totalterm2total=0;
//ending the totals of term 2
$totalterm3cat=0;
$totalterm3exam=0;
$totalterm3total=0;
//ending term 3 total

$query=mysql_query("SELECT caurses.*,students.*,
marks.cat_marks,marks.exams_marks FROM caurses,classes,students,marks WHERE students.cl_id=classes.cl_id 
AND students.s_id=7 AND caurses.cl_id=classes.cl_id AND students.s_id=marks.s_id
AND caurses.c_id=marks.c_id AND term_stutus='term 1' AND y_id=2");
$i=1;
while ($row=mysql_fetch_array($query)) {
//var_dump($row);
	$totalyear=0;

?>
<tr>
<td><?php echo $row['coursename'];?></td>
<td><?php $totalmaxcat+=$row['cat_max']; echo $row['cat_max'];?></td>
<td><?php $totalmaxexam+=$row['ex_marks']; echo $row['ex_marks'];?></td>
<td><?php $totalmaxtotal+=$row['maximum'];echo $row['maximum'];?></td>
<!--ending fetchng the max marks-->
<td><?php $totalterm1cat+=$row['cat_marks'];echo $row['cat_marks'];?></td>
<td><?php $totalterm1exam+=$row['exams_marks'];echo $row['exams_marks'];?></td>
<td><?php $total=$row['exams_marks']+$row['cat_marks']; 
$totalterm1total+=$total;$totalyear+=$total; echo $total;?></td>
<?php //ending fetching marks of first term and maximum and courses?>

<?php
$trm2query=mysql_query("SELECT marks.cat_marks as CAT2,marks.exams_marks as EX2 FROM marks where marks.s_id={$row['s_id']} and 
marks.term_stutus='term 2' and marks.c_id={$row['c_id']} ");
while ($row1=mysql_fetch_array($trm2query)) {
	//var_dump($row1);
?>
<td><?php $totalterm2cat+=$row1['CAT2'];echo $row1['CAT2'];?></td>
<td><?php $totalterm2exam+=$row1['EX2']; echo $row1['EX2'];?></td>
<td><?php $total1=$row1['CAT2']+$row1['EX2'];$totalyear+=$total1; $totalterm2total+=$total1;
echo $total1;?></td>
<?php //ending the selection of the second term marks?>
<?php
}
?>
<?php
$trm3=mysql_query("SELECT marks.cat_marks as CAT3,marks.exams_marks as EX3 from marks where marks.s_id={$row['s_id']} and 
marks.term_stutus='term 3' and marks.c_id={$row['c_id']}");
while ($row2=mysql_fetch_array($trm3,MYSQL_ASSOC)) {
?>
<td><?php $totalterm3cat+=$row2['CAT3'];echo $row2['CAT3'];?></td>
<td><?php $totalterm3exam+=$row2['EX3'];echo $row2['EX3'];?></td>
<td><?php $total3=$row2['CAT3']+$row2['EX3'];$totalyear+=$total3;$totalterm3total+=$total3;
echo $total3;?></td>
<?php
}
?>
<td><?php echo $totalyear;?></td>
<td><?php $totalmax=($row['maximum']*3);echo $totalmax;?></td>
<td><?php $per=(($totalyear*100)/$totalmax);echo round($per);?></td>
<td><?php echo " ";?></td>
<?php
}$i++;//ending if of num rows
?>
</tr>
<tr>
<td>Total</td>
<td><?php echo $totalmaxcat;?></td><td><?php echo $totalmaxexam;?></td><td><?php echo $totalmaxtotal;?></td>
<td><?php echo $totalterm1cat;?></td><td><?php echo $totalterm1exam;?></td><td><?php echo $totalterm1total;?></td>
<td><?php echo $totalterm2cat;?></td><td><?php echo $totalterm2exam;?></td><td><?php echo $totalterm2total;?></td>
<td><?php echo $totalterm3cat;?></td><td><?php echo $totalterm3exam;?></td><td><?php echo $totalterm3total;?></td>
<td><?php $finaltotal=($totalterm1total+$totalterm2total+$totalterm3total);echo $finaltotal;?></td>
<td><?php $finalmax=($totalmaxtotal*3);echo $finalmax;?></td>
<td><?php $perce=(($finaltotal*100)/$finalmax);echo round($perce);?></td><td></td>
</tr>
<?php

?>
<tr>
<td colspan="4">Percentage</td>
<td  colspan="3" align="right"><?php $term1per=(($totalterm1total*100)/$totalmaxtotal);echo round($term1per)."%";?></td>
<td  colspan="3"align="right"><?php $term2per=(($totalterm2total*100)/$totalmaxtotal);echo round($term2per)."%";?></td>
<td  colspan="3"align="right"><?php $term3per=(($totalterm3total*100)/$totalmaxtotal);echo round($term3per)."%";?></td>
<td  colspan="3"align="right"><?php $finalper=(($finaltotal*100)/$finalmax);echo round($finalper)."%";?></td>
<td></td>
</tr>
<tr><td colspan="4">Place</td>
<td colspan="3"></td>
<td colspan="3"></td>
<td colspan="3"></td>
<td colspan="3"></td>
<td> </td>
</tr>
</table>
</body>
</html>