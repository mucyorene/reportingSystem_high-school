<?php
include("includes/connect.php");
$all=mysql_query("SELECT * FROM marks where c_id=1") or die(mysql_error());



while ($allmarks=mysql_fetch_array($all)) {
	
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
$finaltotal=0;
//ending term 3 total

$query=mysql_query("SELECT caurses.*,students.*,
	marks.cat_marks,marks.exams_marks FROM caurses,classes,students,marks WHERE students.cl_id=classes.cl_id 
	AND students.s_id={$allmarks['s_id']} AND caurses.cl_id=classes.cl_id AND students.s_id=marks.s_id
AND caurses.c_id=marks.c_id AND marks.term_stutus='{$allmarks['term_stutus']}' AND y_id=2 AND students.status='checked' AND caurses.cl_id=1");
$i=1;
while ($row=mysql_fetch_array($query)) {
//var_dump($row);
	$totalyear=0;

$totalmaxcat+=$row['cat_max']; 

$totalmaxexam+=$row['ex_marks']; 
$totalmaxtotal+=$row['maximum'];
$totalterm1cat+=$row['cat_marks'];
$totalterm1exam+=$row['exams_marks'];
$total=$row['exams_marks']+$row['cat_marks']; 
$totalterm1total+=$total;$totalyear+=$total; 

$trm2query=mysql_query("SELECT marks.cat_marks as CAT2,marks.exams_marks as EX2 FROM marks where marks.s_id={$row['s_id']} and 
marks.term_stutus='term 2' and marks.c_id={$row['c_id']} ");
while ($row1=mysql_fetch_array($trm2query)) {
	//var_dump($row1);

$totalterm2cat+=$row1['CAT2'];
$totalterm2exam+=$row1['EX2'];
$total1=$row1['CAT2']+$row1['EX2'];
$totalyear+=$total1; $totalterm2total+=$total1;

//ending the selection of the second term marks

}


$trm3=mysql_query("SELECT marks.cat_marks as CAT3,marks.exams_marks as EX3 from marks where marks.s_id={$row['s_id']} and 
marks.term_stutus='term 3' and marks.c_id={$row['c_id']}");
while ($row2=mysql_fetch_array($trm3,MYSQL_ASSOC)) {

$totalterm3cat+=$row2['CAT3'];
$totalterm3exam+=$row2['EX3'];
$total3=$row2['CAT3']+$row2['EX3'];
$totalyear+=$total3;$totalterm3total+=$total3;


}


$totalmax=($row['maximum']*3);
$per=(($totalyear*100)/$totalmax);

}$i++;//ending if of num rows

$finaltotal=($totalterm1total+$totalterm2total+$totalterm3total);
$finalmax=($totalmaxtotal*3);
$perce=(($finaltotal*100)/$finalmax);

echo "<br>".$finaltotal."</br>";

}
?>
