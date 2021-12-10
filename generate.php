<?php
session_start();
if (!$_SESSION['deanp']) {
header("location:index.php");
}
$idcas=explode(",", $_GET['idsa']);
$yid=$idcas[0];
$clid=$idcas[1];

//var_dump($_GET['idc']);
//var_dump($_GET['idcl']);
include("includes/connect.php");
$test___=mysqli_query($conn,"SELECT students.*
	FROM students,classes WHERE students.cl_id=classes.cl_id AND classes.cl_id='$clid'")
	 or die(mysql_error());
while ($feid=mysqli_fetch_array($test___)) {
//var_dump($feid);
	$id=$feid['s_id'];
//echo $id;
$sel=mysqli_query($conn,"SELECT FROM years WHERE y_id='$yid'");

$std=mysqli_query($conn,"SELECT district.*,students.* FROM district,students 
	WHERE students.s_id='$id' AND students.location=district.district_id") or die(mysql_error()) ;
$fes=mysqli_fetch_array($std);
//$dist=$fes['district_id'];
?>
<?php
$clas=mysqli_query($conn,"SELECT classes.cl_id,classes.classname,students.cl_id FROM classes,students WHERE classes.cl_id='$clid' AND students.cl_id=classes.cl_id AND students.s_id='$id'");
$clfe=mysqli_fetch_array($clas,MYSQL_ASSOC);
$sname=mysqli_query($conn,"SELECT dean.schoolname FROM dean");
$fename=mysqli_fetch_array($sname,MYSQL_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
<!--starting ici-->
&nbsp
<table border="1" bgcolor="white" align="center">
<font color: "#83b0d2">
	<tr>
		<td height="15" width="907" colspan="17" style="border:none;">
		<p>Republic of rwanda</p>
		<p>District <?php echo $fes['district_name'];?></p>
		<p><?= $fename['schoolname']?></p>
		<p>class: <?= $clfe['classname']?>
		</td>
	</tr>
<tr><td align="center" style="font-size:20px;border:none;" colspan="17">
<?php
$quer=mysqli_query($conn,"SELECT *FROM students WHERE s_id='$id'");
$fe=mysqli_fetch_array($quer);
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
<?php
$ma=mysqli_query($conn,"SELECT * FROM displine_max WHERE y_id='2'");
if (mysqli_num_rows($ma)>0) {
while ($maw=mysqli_fetch_array($ma,MYSQL_ASSOC)) {
	$totmax=($maw['displine_max']*3);
echo "<td colspan='3' align='right'>".$maw['displine_max']."</td>";
}
}else{
	echo "<td colspan='3'></td>";
}
$totyeardis=0;
$can=mysqli_query($conn,"SELECT * FROM dis_marks WHERE s_id='$id' AND term_status='term 1' AND year_dis='$yid'") or die(mysql_error());
if (mysqli_num_rows($can)>0) {
while ($dis=mysqli_fetch_array($can,MYSQL_ASSOC)) {
	$totyeardis+=$dis['marks'];
echo "<td colspan='3' align='right'>".$dis['marks']."</td>";
}
}else{
echo "<td colspan='3' align='right'></td>";
}
?>
<?php
$disterm2=mysqli_query($conn,"SELECT * FROM dis_marks WHERE s_id='$id' AND term_status='term 2' AND year_dis='$yid'") or die(mysql_error());
if (mysqli_num_rows($disterm2)>0) {
while ($dis2=mysqli_fetch_array($disterm2)) {
	$totyeardis+=$dis2['marks'];
echo "<td colspan='3' align='right'>".$dis2['marks']."</td>";
}
}else{
	echo "<td colspan='3'></td>";
}
?>
<?php
$ter3dis=mysqli_query($conn,"SELECT * FROM dis_marks WHERE s_id='$id' AND term_status='term 3' AND year_dis='$yid'") or die(mysql_error());
if (mysqli_num_rows($ter3dis)>0) {
while ($ter3mar=mysqli_fetch_array($ter3dis)) {
echo "<td colspan='3' align='right'>".$ter3mar['marks']."</td>";
$totyeardis+=$ter3mar['marks'];
}
}else{
	echo "<td colspan='3'></td>";
}
?>
<?php
if(mysqli_num_rows($can)>0 && mysqli_num_rows($disterm2)>0 && mysqli_num_rows($ma) && mysqli_num_rows($ter3dis)>0) {
echo "<td align='right'>".$totyeardis."</td>";
echo "<td align='right'>".$totmax."</td>";
echo "<td align='right'>".round(($totyeardis*100)/$totmax)."</td>";
}
else{
	echo "<td></td>";
	echo "<td></td>";
	echo "<td></td>";
}
?>
<td></td>
</tr>
<tr><td colspan="17" height="15"></td></tr>

<?php
// all combination of variables of years
$totalyeartotalcor=0;
$totalyeamaxcor=0;
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

//finding the year marks total

$totalyearmarkstotal=0;

//total year maximum total
$tymt=0;

$sts=mysqli_query($conn,"SELECT *FROM students WHERE s_id='$id'") or die(mysql_error());
if ($sts) {
$sidrow=mysqli_fetch_array($sts);
$stid=$sidrow['s_id'];
}
$caurse=mysqli_query($conn,"SELECT * FROM caurses WHERE cl_id='$clid'");
while ($caursena=mysqli_fetch_array($caurse)) {
	?>
<tr>
<td><?php echo $caursena['coursename'];?></td>
<td><?php $totalmaximumcat+=($caursena['maximum']/2); echo $caursena['maximum']/2;?>
<td><?php $totalmaximumexam+=($caursena['maximum']/2);echo $caursena['maximum']/2;?>
<td><?php $totalmaximumtotal+=$caursena['maximum']; echo $caursena['maximum'];?>
<?php
$ter=mysqli_query($conn,"SELECT * FROM marks WHERE s_id='$id' AND c_id='{$caursena['c_id']}' AND 
	term_stutus='term 1' AND y_id='$yid'") or die(mysql_error());
if (mysqli_num_rows($ter)>0) {
$count=1;
while ($term1marks=mysqli_fetch_array($ter,MYSQL_ASSOC)) {
	$totalyea=0;
?>
<td><?php $totalterm1cat+=$term1marks['cat_marks']; echo $term1marks['cat_marks'];?></td>
<td><?php $totalterm1exam+=$term1marks['exams_marks']; echo $term1marks['exams_marks'];?></td>
<td>
<?php
 $totalterm1=$term1marks['cat_marks']+$term1marks['exams_marks'];
$totalyea+=$totalterm1;$totalterm1total+=$totalterm1;
$totalyearmarkstotal+=$totalterm1;
echo $totalterm1?>
</td>
<?php
}
}else{
echo "<td></td>";
echo "<td></td>";
echo "<td></td>";
}
?>
<?php
$term2=mysqli_query($conn,"SELECT * FROM marks WHERE s_id='$id' AND c_id='{$caursena['c_id']}'
 AND term_stutus='term 2' AND y_id='$yid'")or die(mysql_error());
if (mysqli_num_rows($term2)>0) {
while ($term2marks=mysqli_fetch_array($term2)) {
?>
<td><?php $totalterm2cat+=$term2marks['cat_marks']; echo $term2marks['cat_marks'];?></td>
<td><?php $totalterm2exam+=$term2marks['exams_marks']; echo $term2marks['exams_marks'];?></td>
<td><?php 
$total2=$term2marks['cat_marks']+$term2marks['exams_marks'];
$totalyea+=$total2;$totalterm2total+=$total2;$totalyearmarkstotal+=$total2;
echo $total2;?></td>
<?php
}
}else{
echo "<td></td>";
echo "<td></td>";
echo "<td></td>";
}
?>

<?php
$term3=mysqli_query($conn,"SELECT * FROM marks WHERE s_id='$id' AND c_id='{$caursena['c_id']}'
 AND term_stutus='term 3' AND y_id='$yid'") or die(mysql_error());
if (mysqli_num_rows($term3)>0) {
while ($term3marks=mysqli_fetch_array($term3)) {
?>
<td><?php $totalterm3cat+=$term3marks['cat_marks']; echo $term3marks['cat_marks'];?></td>
<td><?php $totalterm3exam+=$term3marks['exams_marks']; echo $term3marks['exams_marks'];?></td>
<td><?php 
$total3=$term3marks['cat_marks']+$term3marks['exams_marks'];
$totalyea+=$total3; $totalterm3total+=$total3;$totalyearmarkstotal+=$total3;
 echo $total3;?></td>

<?php
}
}else{
echo "<td></td>";
echo "<td></td>";
echo "<td></td>";
}
?>
<?php
if (mysqli_num_rows($ter)>0 && mysqli_num_rows($term2)>0 && mysqli_num_rows($term3)>0) {
?>
<td><?php echo $totalyea;?></td>
<td><?php $totalyeamax=($caursena['maximum']*3);$tymt+=$totalyeamax; echo $totalyeamax;?></td>
<td><?php $perace=(($totalyea*100)/$totalyeamax);echo round($perace);?></td>
<?php
}else{
echo "<td></td>";
echo "<td></td>";
echo "<td></td>";
}
?>
<?php 
$set=mysqli_query($conn,"SELECT * FROM setting WHERE s_id='$id' AND c_id='{$caursena['c_id']}' AND
 y_id='$yid'") or die(mysql_error());
if (mysqli_num_rows($set)>0) {
while ($fetset=mysqli_fetch_array($set,MYSQL_ASSOC)) {
?>
<td><?php $fetset['markset'];?></td>
<?php
}
}else{
	echo "<td></td>";
}
?>
</tr>
	<?php
}
?>

<?php
if (mysqli_num_rows($ter)>0) {
?>
<tr>
<td>Total</td>
<td><?= $totalmaximumcat?></td>
<td><?= $totalmaximumexam?></td>
<td><?= $totalmaximumtotal?></td>
<td><?= $totalterm1cat?></td>
<td><?= $totalterm1exam?></td>
<td><?= $totalterm1total?></td>
<?php
if (mysqli_num_rows($term2)>0) {
?>
<td><?= $totalterm2cat?></td>
<td><?= $totalterm2exam?></td>
<td><?= $totalterm2total?></td>
<?php
}else{
echo "<td></td>";
echo "<td></td>";
echo "<td></td>";
}
?>
<?php
if (mysqli_num_rows($term3)>0) {
?>
<td><?= $totalterm3cat?></td>
<td><?= $totalterm3exam?></td>
<td><?= $totalterm3total?></td>
<?php
}else{
	echo "<td></td>";
	echo "<td></td>";
	echo "<td></td>";
}
?>
<?php

?>
<?php
if (mysqli_num_rows($ter)>0 && mysqli_num_rows($term2)>0 && mysqli_num_rows($term3)>0) {
?>
<td><?= $totalyearmarkstotal?></td>
<td><?= $tymt?></td>
<td><?= round(($totalyearmarkstotal*100)/$tymt)?></td>
<td></td>
<?php
}else{
	echo "<td></td>";
	echo "<td></td>";
	echo "<td></td>";
	echo "<td></td>";
}
?>
</tr>
<?php
}
?>
<?php
if (mysqli_num_rows($ter)>0) {
?>
<tr>
<td>Percentage</td>
<td colspan="3"></td>
<td colspan="3" align="right">
<?php
$term1perce=(($totalterm1total*100)/$totalmaximumtotal);
echo round($term1perce)."%";
?>
</td>
<?php
}else{
	echo "<td colspan='3'></td>";
}
?>
<?php
if (mysqli_num_rows($term2)>0) {
?>
<td colspan="3" align="right">
<?php
$term2perce=(($totalterm2total*100)/$totalmaximumtotal);
echo round($term2perce)."%";
?>
</td>
<?php
}else{
	echo "<td colspan='3'></td>";
}
?>
<?php
if (mysqli_num_rows($term3)>0) {
?>
<td colspan="3" align="right">
<?php
$term3perce=(($totalterm3total*100)/$totalmaximumtotal);
echo round($term3perce)."%";
?>
</td>
<?php
}else{
	echo "<td colspan='3'></td>";
}
?>
<?php
if (mysqli_num_rows($ter)>0 && mysqli_num_rows($term2)>0 && mysqli_num_rows($term3)) {
?>
<td align=right colspan=3><?= $yearperca=round(($totalyearmarkstotal*100)/$tymt)."%"?></td>
<?php
}else{
	echo "<td colspan='3'></td>";
}
?>
<td></td>
</tr>

<tr>
<td>Place</td>
<td colspan="3"></td>
<?php
if (mysqli_num_rows($ter)>0) {
$quese=mysqli_query($conn,"SELECT * FROM percentages WHERE student_id='$id' and term_status='term 1' AND y_id='$yid'");
$che=mysqli_fetch_array($quese);
//var_dump($che);
if (mysqli_num_rows($quese)>0) {
echo " ";
}else{
$querype=mysqli_query($conn,"INSERT INTO percentages SET perid=null,student_id='$id',
	percentage='$term1perce',term_status='term 1', y_id='$yid'") or die(mysql_error());
if ($querype) {
echo "<td colspan='3' align='right'></td>";
}else{
echo "<td colspan='3'></td>";
}
}}
?>
<?php
if (mysqli_num_rows($ter)>0) {
//finding the total of the students in one classe
$sup=0;
$pla=mysqli_query($conn,"SELECT students.*
	FROM students,classes WHERE students.cl_id=classes.cl_id AND classes.cl_id='$clid'");
$pl=1;
while ($plas=mysqli_fetch_array($pla)) {
$sup+=$pl;
}$pl++;
}
?>
<?php
if (mysqli_num_rows($ter)>0) {
$plac=mysqli_query($conn,"SELECT * FROM percentages,students WHERE 
	term_status='term 1' AND percentages.student_id=students.s_id AND students.cl_id='$clid' AND y_id='$yid' ORDER BY percentage desc") or die(mysql_error());
$pa=1;
while ($fe=mysqli_fetch_array($plac)) {
//var_dump($fe);
if ($fe['student_id']==$id) {
break;
}
$pa++;}
?>
<td colspan='3' align='right'><?= $pa." out of ".$sup?></td>
<?php
}else{
	echo "<td colspan='3' align='right'></td>";
}
?>
<?php
if (mysqli_num_rows($term2)>0) {
$quese2=mysqli_query($conn,"SELECT * FROM percentages WHERE student_id='$id' and term_status='term 2'");
$che=mysqli_fetch_array($quese2);
//var_dump($che);
if (mysqli_num_rows($quese2)>0) {
echo " ";
}
else{
$querype2=mysqli_query($conn,"INSERT INTO percentages SET perid=null,student_id='$id',
	percentage='$term2perce',term_status='term 2',y_id='$yid'")or die(mysql_error());
if ($querype2) {
echo "<td colspan='3' align='right'></td>";
}else{
echo "<td colspan='3'></td>";
}
}}
?>


<?php
if (mysqli_num_rows($term2)>0) {
//finding the total of the students in one classe
$sup2=0;
$pla2=mysqli_query($conn,"SELECT students.*
	FROM students,classes WHERE students.cl_id=classes.cl_id AND classes.cl_id='$clid'");
$pl2=1;
while ($plas=mysqli_fetch_array($pla2)) {
$sup2+=$pl2;
}$pl2++;
}
?>
<?php
if (mysqli_num_rows($term2)>0) {
$plac2=mysqli_query($conn,"SELECT * FROM percentages,students WHERE 
	term_status='term 2' AND percentages.student_id=students.s_id AND students.cl_id='$clid' AND y_id='$yid' ORDER BY percentage DESC") or die(mysql_error());
$pa2=1;
while ($fe2=mysqli_fetch_array($plac2)) {
//var_dump($fe);
if ($fe2['student_id']==$id) {
break;
}
$pa2++;}
?>
<td colspan='3' align='right'><?= $pa2." out of ".$sup2?></td>
<?php
}else{
	echo "<td colspan='3' align='right'></td>";
}
?>

<?php
if (mysqli_num_rows($term3)>0) {
$quese3=mysqli_query($conn,"SELECT * FROM percentages,students WHERE term_status='term 2' AND percentages.student_id=students.s_id AND 
	students.cl_id='1' AND y_id='2' ORDER BY percentage DESC");
$che=mysqli_fetch_array($quese);
//var_dump($che);
if (mysqli_num_rows($quese3)>0) {
echo " ";
}
else{
$querype3=mysqli_query($conn,"INSERT INTO percentages SET perid=null,student_id='$id',
	percentage='$term3perce',term_status='term 3',y_id='$yid'")or die(mysql_error());
if ($querype3) {
echo "<td colspan='3' align='right'></td>";
}else{
echo "<td colspan='3'></td>";
}
}}
?>

<?php
if (mysqli_num_rows($term3)>0) {
//finding the total of the students in one classe
$sup3q=0;
$pla3q=mysqli_query($conn,"SELECT students.*
	FROM students,classes WHERE students.cl_id=classes.cl_id AND classes.cl_id='$clid'");
$pl3q=1;
while ($plasq=mysqli_fetch_array($pla3q)) {
$sup3q+=$pl3q;
}$pl3q++;
}
?>
<?php
if (mysqli_num_rows($term3)>0) {
$plac3q=mysqli_query($conn, $test="SELECT * FROM percentages,students WHERE 
	term_status='term 3' AND percentages.student_id=students.s_id AND students.cl_id='$clid' AND y_id='$yid' ORDER BY percentage desc") or die(mysql_error());
$pa3q=1;
while ($fe3q=mysqli_fetch_array($plac3q)) {
//var_dump($fe);
if ($fe3q['student_id']==$id) {
break;
}
$pa3q++;}
?>
<td colspan='3' align='right'><?= $pa3q." out of ".$sup3q?></td>
<?php
}else{
	echo "<td colspan='3' align='right'></td>";
}
?>
<?php
if (mysqli_num_rows($ter)>0 && mysqli_num_rows($term2)>0 && mysqli_num_rows($term3)>0) {
$queseyear=mysqli_query($conn,"SELECT * FROM yearperce WHERE student_id='$id' AND ypercentages='$yearperca'");
$cheyear=mysqli_fetch_array($queseyear);
//var_dump($che);
if (mysqli_num_rows($queseyear)>0) {
echo " ";
}
else{//this is used for insert after empty row found in this year
$querypeyear=mysqli_query($conn,"INSERT INTO yearperce SET pery_id=null,student_id='$id',
	ypercentages='$yearperca',y_id='$yid'")or die(mysql_error());
//this insert query work properly
if ($querypeyear) {
echo "<td colspan='3' align='right'></td>";
}else{
echo "<td colspan='3'></td>";
}//ending all about insert query and checking
}//ending else for insert query above insert query
$placeyer=mysqli_query($conn,"SELECT * FROM yearperce,students WHERE yearperce.student_id=students.s_id AND 
	students.cl_id='$clid' AND y_id='$yid' ORDER BY ypercentages DESC") or die(mysql_error());
$pyea=1;
while ($feyeap=mysqli_fetch_array($placeyer)) {
//var_dump($fe);
if ($feyeap['student_id']==$id) {
break;
}
$pyea++;}
?>
<td colspan='3' align='right'><?= $pyea." out of ".$sup3q?></td>
<?php
}else{
	echo "<td colspan='3' align='right'></td>";
}
?>
<td></td>

<!--<?php
/*if (mysqli_num_rows($term2)>0) {
	$quese2=mysqli_query($conn,"SELECT * FROM percentages WHERE student_id='1'");
while ($rw2=mysqli_fetch_array($quese2)) {
if ($rw2['student_id']=='1') {
continue;
}
}
$querype2=mysqli_query($conn,"INSERT INTO percentages SET perid=null,student_id='1',
	percentage='$term2perce',term_status='term 2'")or die(mysql_error());
if ($querype2) {
echo "<td colspan='3' align='right'></td>";
}
}else{
	echo "<td colspan='3'></td>";
}
?>
<?php
if (mysqli_num_rows($term3)>0) {
	$quese3=mysqli_query($conn,"SELECT * FROM percentages WHERE student_id='1'");
while ($rw3=mysqli_fetch_array($quese3)) {
if ($rw3['student_id']=='1') {
continue;
}
}
$querype3=mysqli_query($conn,"INSERT INTO percentages SET perid=null,student_id='1',
	percentage='$term3perce',term_status='term 3'")or die(mysql_error());
if ($querype3) {
echo "<td colspan='3' align='right'></td>";
}
}else{
	echo "<td colspan='3'></td>";
}
?>
<?php
if (mysqli_num_rows($ter)>0 && mysqli_num_rows($term2)>0 && mysqli_num_rows($term3)>0) {
echo "<td colspan='3' align='right'>y</td>";
}else{
	echo "<td colspan='3'></td>";
}
?>
<?php
if (mysqli_num_rows($set)>0) {
echo "<td></td>";
}else{
	echo "<td align='right'></td>";
}*/
?>-->
<!--<?php 
$ch/*=mysqli_query($conn,"SELECT * FROM places WHERE student_id='1' AND percentage='$term1perce' AND
 term_id='1' AND cl_id='1'") or die(mysql_error());
if (mysqli_num_rows($ch)>0) {
echo "Percentage inserted";
}else{
$insert=mysqli_query($conn,"INSERT INTO places SET place_id=null,
	student_id='1',percentage='$term1perce',cl_id='1',term_id='1'") or die(mysql_error());
}*/
?>-->
</tr>
<tr height="90">
	<td colspan="17"></td>
</tr>
</table>
<?php
}

?>