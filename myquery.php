<?php
$t=1;
$cattotaterm1=0;
$cattotaterm2=0;
$cattotaterm3=0;
//end cats variables of all year
$exam_totaterm1=0;
$exam_totaterm2=0;
$exam_totaterm3=0;

$query=mysql_query("SELECT caurses.*,students.*,
	marks.cat_marks,marks.exams_marks FROM caurses,classes,students,marks WHERE students.cl_id=classes.cl_id 
	AND students.s_id=9 AND caurses.cl_id=classes.cl_id AND students.s_id=marks.s_id
AND caurses.c_id=marks.c_id AND term_stutus='term 1' AND y_id=2
	 ");
//ending the exams of all year
while ($row=mysql_fetch_array($query)) {
//getting the course name in first table
				 $catSum=0;
				 $totalyearmarks=0;

			 $examSum=0;
 $cattota=0;
 $totalyear=0;			

?>
	<tr>
<td height="10" width="20"><?php echo $row['coursename'];?></td>
<td height="15" width="40">
<?php $cattotaterm1+=$row['cat_marks'];echo $row['cat_marks'];?>
</td>
<td height="15" width="40">
<?php $examSum+=$row['exams_marks'];$exam_totaterm1+=$row['exams_marks'];  echo  $row['exams_marks'];?></td>
<td height="15" width="40"><?php $totalyear+=($row['cat_marks']+$row['exams_marks']);$totalyearmarks+=$totalyear; echo $totalyear;?></td>
<?php
$trm2query="SELECT marks.cat_marks as CAT2,marks.exams_marks as EX2 from marks where marks.s_id={$row['s_id']} and 
marks.term_stutus='term 2' and marks.c_id={$row['c_id']} ";
$exec=mysql_query($trm2query);
while ($data=mysql_fetch_array($exec)) {
			 	$cattota+=$data['CAT2'];
			 	?>
		<td height="15" width="40">
		<?php $catSum+=$data['CAT2'];$cattotaterm2+=$data['CAT2']; echo $data['CAT2'];?></td><td height="15" width="40">
		<?php $examSum+=$data['EX2']; $exam_totaterm2+=$data['EX2']; echo $data['EX2'];?>
		</td><td height="15" width="40"><?php $totalyear+=($data['CAT2']+$data['EX2']);$totalyearmarks+=$totalyear; echo ($data['CAT2']+$data['EX2']);?></td>
		
			 	<?php	
			 }

			 $trm3="SELECT marks.cat_marks as CAT3,marks.exams_marks as EX3 from marks where marks.s_id={$row['s_id']} and 
			marks.term_stutus='term 3' and marks.c_id={$row['c_id']} ";
			 $exec=mysql_query($trm3);
			 
	while ($data=mysql_fetch_array($exec)) {
			 	$cattota+=$data['CAT3'];
			 	?>
<td height="15" width="40">
<?php $catSum+=$data['CAT3'];$cattotaterm3+=$data['CAT3']; echo $data['CAT3'];?></td>
<td height="15" width="40">
		<?php $examSum+=$data['EX3'];$exam_totaterm3+=$data['EX3']; echo $data['EX3'];?>
</td><td height="15" width="40"><?php $totalyear+=($data['CAT3']+$data['EX3']);$totalyearmarks+=$totalyear;echo ($data['CAT3']+$data['EX3']);?></td>
			 	<?php	
			 }
		?>
<td><?php echo $totalyear;?></td>
<td><?php echo $examSum;?></td>
<td><?php echo ($catSum+$examSum);?></td>
	</tr>
	<?php
}$t++;
?>
<tr>
<td>TOTAL</td><td><?php echo $cattotaterm1;?></td>
<td><?php echo $exam_totaterm1;?></td>
<td><?php echo ($cattotaterm1+$exam_totaterm1);?></td>
<td><?php echo $cattotaterm2;?></td>
<td><?php echo $exam_totaterm2;?></td>
<td><?php echo ($cattotaterm2+$exam_totaterm2);?></td>
<td><?php echo $cattotaterm3;?></td>
<td><?php echo $exam_totaterm3;?></td>
<td><?php echo ($cattotaterm3+$exam_totaterm3);?></td>
<td><?php echo $totalyearmarks;?></td>
<td>total</td><td>total</td>
</tr>
</table>
