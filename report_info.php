<?php
session_start();
if (!$_SESSION['s_id']) {
header("location:logout.php");
}
//var_dump($_SESSION['s_id']);
include("includes/connect.php");
$status=mysql_query($statusd="SELECT * FROM students WHERE s_id='{$_SESSION['s_id']}'") or die(mysql_error());
$idcheckstatus=mysql_fetch_array($status);
if ($idcheckstatus['status']=='check') {
	echo "you have no longer have the report";
}else{

$yid=$_GET['yid'];
$id=$_SESSION['s_id'];
$clidquery=mysql_query("SELECT * FROM students WHERE s_id='$id'") or die(mysql_error());
$feid=mysql_fetch_array($clidquery);
	$clid=$feid['cl_id'];
//echo $id;
$sel=mysql_query("SELECT FROM years WHERE y_id='$yid'");

$std=mysql_query("SELECT district.*,students.* FROM district,students 
	WHERE students.s_id='$id' AND students.location=district.district_id") or die(mysql_error()) ;
$fes=mysql_fetch_array($std);
//$dist=$fes['district_id'];
?>
<?php
$clas=mysql_query("SELECT classes.cl_id,classes.classname,students.cl_id FROM classes,students WHERE classes.cl_id='$clid' AND students.cl_id=classes.cl_id AND students.s_id='$id'");
$clfe=mysql_fetch_array($clas,MYSQL_ASSOC);
$sname=mysql_query("SELECT dean.*,district.* FROM dean,district WHERE district.district_id=dean.schoollocation");
$fename=mysql_fetch_array($sname,MYSQL_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
<a href="stprintview.php?cbn=<?= $yid?>&ids=<?= $id?>&clid=<?= $clid?>">View and print</a>
<!--starting ici-->
&nbsp
<table border="1" bgcolor="white" align="center">
<font color: "#83b0d2">
	<tr>
		<td height="15" width="907" colspan="14" style="border:none;">
			<br>
		<p>REPUBLIC OF RWANDA</p>
		<p>DISTRICT <?php echo $fename['district_name'];?></p>
		<p><?= $fename['schoolname']?></p>
		<p>CLASS: <?= $clfe['classname']?>
		</td>
<td colspan="3"><img src="photos/<?= $fes['profile']?>" height="150" width="120"></td>
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
<?php
$ma=mysql_query("SELECT * FROM displine_max WHERE y_id='$yid'");
if (mysql_num_rows($ma)>0) {
while ($maw=mysql_fetch_array($ma,MYSQL_ASSOC)) {
	$totmax=($maw['displine_max']*3);
echo "<td colspan='3' align='right'>".$maw['displine_max']."</td>";
}
}else{
	echo "<td colspan='3'></td>";
}
?>
<?php
$totyeardis=0;
$can=mysql_query("SELECT * FROM dis_marks WHERE s_id='$id' AND term_status='term 1' AND year_dis='$yid'") or die(mysql_error());
if (mysql_num_rows($can)>0) {
while ($dis=mysql_fetch_array($can,MYSQL_ASSOC)) {
	$totyeardis+=$dis['marks'];
echo "<td colspan='3' align='right'>".$dis['marks']."</td>";
}
}else{
echo "<td colspan='3' align='right'></td>";
}
?>
<?php
$disterm2=mysql_query("SELECT * FROM dis_marks WHERE s_id='$id' AND term_status='term 2' AND year_dis='$yid'") or die(mysql_error());
if (mysql_num_rows($disterm2)>0) {
while ($dis2=mysql_fetch_array($disterm2)) {
	$totyeardis+=$dis2['marks'];
echo "<td colspan='3' align='right'>".$dis2['marks']."</td>";
}
}else{
	echo "<td colspan='3' align='right'></td>";
}
?>
<?php
$ter3dis=mysql_query("SELECT * FROM dis_marks WHERE s_id='$id' AND term_status='term 3' AND year_dis='$yid'") or die(mysql_error());
if (mysql_num_rows($ter3dis)>0) {
while ($ter3marks=mysql_fetch_array($ter3dis)) {
	$totyeardis+=$ter3marks['marks'];
echo "<td colspan='3' align='right'>".$ter3marks['marks']."</td>";
}
}else{
	echo "<td colspan='3' align='right'></td>";
}
?>
<?php
if(mysql_num_rows($can)>0 && mysql_num_rows($disterm2)>0 && mysql_num_rows($ter3dis)>0) {
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
<tr><td colspan="18" height="15"></td></tr>

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

$sts=mysql_query("SELECT *FROM students WHERE s_id='$id'") or die(mysql_error());
if ($sts) {
$sidrow=mysql_fetch_array($sts);
$stid=$sidrow['s_id'];
}
$caurse=mysql_query("SELECT * FROM caurses WHERE cl_id='$clid'");
while ($caursena=mysql_fetch_array($caurse)) {
	?>
<tr>
<td><?php echo $caursena['coursename'];?></td>
<td><?php $totalmaximumcat+=($caursena['maximum']/2); echo $caursena['maximum']/2;?>
<td><?php $totalmaximumexam+=($caursena['maximum']/2);echo $caursena['maximum']/2;?>
<td><?php $totalmaximumtotal+=$caursena['maximum']; echo $caursena['maximum'];?>
<?php
$ter=mysql_query("SELECT * FROM marks WHERE s_id='$id' AND c_id='{$caursena['c_id']}' AND 
	term_stutus='term 1' AND y_id='$yid'") or die(mysql_error());
if (mysql_num_rows($ter)>0) {
$count=1;
while ($term1marks=mysql_fetch_array($ter,MYSQL_ASSOC)) {
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
$term2=mysql_query("SELECT * FROM marks WHERE s_id='$id' AND c_id='{$caursena['c_id']}'
 AND term_stutus='term 2' AND y_id='$yid'")or die(mysql_error());
if (mysql_num_rows($term2)>0) {
while ($term2marks=mysql_fetch_array($term2)) {
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
$term3=mysql_query("SELECT * FROM marks WHERE s_id='$id' AND c_id='{$caursena['c_id']}'
 AND term_stutus='term 3' AND y_id='$yid'") or die(mysql_error());
if (mysql_num_rows($term3)>0) {
while ($term3marks=mysql_fetch_array($term3)) {
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
if (mysql_num_rows($ter)>0 && mysql_num_rows($term2)>0 && mysql_num_rows($term3)>0) {
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
$set=mysql_query("SELECT * FROM setting WHERE s_id='$id' AND c_id='{$caursena['c_id']}' AND
 y_id='$yid'") or die(mysql_error());
if (mysql_num_rows($set)>0) {
while ($fetset=mysql_fetch_array($set,MYSQL_ASSOC)) {
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
if (mysql_num_rows($ter)>0) {
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
if (mysql_num_rows($term2)>0) {
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
if (mysql_num_rows($term3)>0) {
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
if (mysql_num_rows($ter)>0 && mysql_num_rows($term2)>0 && mysql_num_rows($term3)>0) {
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
if (mysql_num_rows($ter)>0) {
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
if (mysql_num_rows($term2)>0) {
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
if (mysql_num_rows($term3)>0) {
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
if (mysql_num_rows($ter)>0 && mysql_num_rows($term2)>0 && mysql_num_rows($term3)) {
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
if (mysql_num_rows($ter)>0) {
$quese=mysql_query("SELECT * FROM percentages WHERE student_id='$id' and term_status='term 1' AND y_id='$yid'");
$che=mysql_fetch_array($quese);
//var_dump($che);
if (mysql_num_rows($quese)>0) {
echo " ";
}else{
$querype=mysql_query("INSERT INTO percentages SET perid=null,student_id='$id',
	percentage='$term1perce',term_status='term 1', y_id='$yid'") or die(mysql_error());
}}
?>
<?php
if (mysql_num_rows($ter)>0) {
//finding the total of the students in one classe
$sup=0;
$pla=mysql_query("SELECT students.*
	FROM students,classes WHERE students.cl_id=classes.cl_id AND classes.cl_id='$clid'");
$pl=1;
while ($plas=mysql_fetch_array($pla)) {
$sup+=$pl;
}$pl++;
}
?>
<?php
if (mysql_num_rows($ter)>0) {
$plac=mysql_query("SELECT * FROM percentages,students WHERE 
	term_status='term 1' AND percentages.student_id=students.s_id AND students.cl_id='$clid' AND y_id='$yid' ORDER BY percentage desc") or die(mysql_error());
$pa=1;
while ($fe=mysql_fetch_array($plac)) {
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
if (mysql_num_rows($term2)>0) {
$quese2=mysql_query("SELECT * FROM percentages WHERE student_id='$id' and term_status='term 2'");
$che=mysql_fetch_array($quese2);
//var_dump($che);
if (mysql_num_rows($quese2)>0) {
echo " ";
}
else{
$querype2=mysql_query("INSERT INTO percentages SET perid=null,student_id='$id',
	percentage='$term2perce',term_status='term 2',y_id='$yid'")or die(mysql_error());
if ($querype2) {
echo "<td colspan='3' align='right'></td>";
}else{
echo "<td colspan='3'></td>";
}
}}
?>


<?php
if (mysql_num_rows($term2)>0) {
//finding the total of the students in one classe
$sup2=0;
$pla2=mysql_query("SELECT students.*
	FROM students,classes WHERE students.cl_id=classes.cl_id AND classes.cl_id='$clid'");
$pl2=1;
while ($plas=mysql_fetch_array($pla2)) {
$sup2+=$pl2;
}$pl2++;
}
?>
<?php
if (mysql_num_rows($term2)>0) {
$plac2=mysql_query("SELECT * FROM percentages,students WHERE 
	term_status='term 2' AND percentages.student_id=students.s_id AND students.cl_id='$clid' AND y_id='$yid' ORDER BY percentage DESC") or die(mysql_error());
$pa2=1;
while ($fe2=mysql_fetch_array($plac2)) {
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
if (mysql_num_rows($term3)>0) {
$quese3=mysql_query("SELECT * FROM percentages WHERE student_id='$id' and term_status='term 3'");
$che=mysql_fetch_array($quese);
//var_dump($che);
if (mysql_num_rows($quese3)>0) {
echo " ";
}
else{
$querype3=mysql_query("INSERT INTO percentages SET perid=null,student_id='$id',
	percentage='$term3perce',term_status='term 3',y_id='$yid'")or die(mysql_error());
}}
?>

<?php
if (mysql_num_rows($term3)>0) {
//finding the total of the students in one classe
$sup3q=0;
$pla3q=mysql_query("SELECT students.*
	FROM students,classes WHERE students.cl_id=classes.cl_id AND classes.cl_id='$clid'");
$pl3q=1;
while ($plasq=mysql_fetch_array($pla3q)) {
$sup3q+=$pl3q;
}$pl3q++;
}
?>
<?php
if (mysql_num_rows($term3)>0) {
$plac3q=mysql_query( $test="SELECT * FROM percentages,students WHERE 
	term_status='term 3' AND percentages.student_id=students.s_id AND students.cl_id='$clid' AND y_id='$yid' ORDER BY percentage DESC") or die(mysql_error());
$pa3q__=1;
while ($fe3q=mysql_fetch_array($plac3q)) {
//var_dump($fe);
if ($fe3q['student_id']==$id) {
break;
}
$pa3q__++;}
?>
<td colspan='3' align='right'><?= $pa3q__." out of ".$sup3q?></td>
<?php
}else{
	echo "<td colspan='3' align='right'></td>";
}
?>
<?php
if (mysql_num_rows($ter)>0 && mysql_num_rows($term2)>0 && mysql_num_rows($term3)>0) {
$queseyear=mysql_query("SELECT * FROM yearperce WHERE student_id='$id' AND ypercentages='$yearperca'");
$cheyear=mysql_fetch_array($queseyear);
//var_dump($che);
if (mysql_num_rows($queseyear)>0) {
echo " ";
}
else{//this is used for insert after empty row found in this year
$querypeyear=mysql_query("INSERT INTO yearperce SET pery_id=null,student_id='$id',
	ypercentages='$yearperca',y_id='$yid'")or die(mysql_error());
//this insert query work properly
if ($querypeyear) {
echo "<td colspan='3' align='right'></td>";
}else{
echo "<td colspan='3'></td>";
}//ending all about insert query and checking
}//ending else for insert query above insert query

$placeyer=mysql_query("SELECT * FROM yearperce,students WHERE 
yearperce.student_id=students.s_id AND students.cl_id='$clid' AND y_id='$yid' ORDER BY ypercentages DESC") or die(mysql_error());
$pyea=1;
while ($feyeap=mysql_fetch_array($placeyer)) {
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
<!--<?php
/*if (mysql_num_rows($term2)>0) {
	$quese2=mysql_query("SELECT * FROM percentages WHERE student_id='1'");
while ($rw2=mysql_fetch_array($quese2)) {
if ($rw2['student_id']=='1') {
continue;
}
}
$querype2=mysql_query("INSERT INTO percentages SET perid=null,student_id='1',
	percentage='$term2perce',term_status='term 2'")or die(mysql_error());
if ($querype2) {
echo "<td colspan='3' align='right'></td>";
}
}else{
	echo "<td colspan='3'></td>";
}
?>
<?php
if (mysql_num_rows($term3)>0) {
	$quese3=mysql_query("SELECT * FROM percentages WHERE student_id='1'");
while ($rw3=mysql_fetch_array($quese3)) {
if ($rw3['student_id']=='1') {
continue;
}
}
$querype3=mysql_query("INSERT INTO percentages SET perid=null,student_id='1',
	percentage='$term3perce',term_status='term 3'")or die(mysql_error());
if ($querype3) {
echo "<td colspan='3' align='right'></td>";
}
}else{
	echo "<td colspan='3'></td>";
}
?>
<?php
if (mysql_num_rows($ter)>0 && mysql_num_rows($term2)>0 && mysql_num_rows($term3)>0) {
echo "<td colspan='3' align='right'>y</td>";
}else{
	echo "<td colspan='3'></td>";
}
?>
<?php
if (mysql_num_rows($set)>0) {
echo "<td></td>";
}else{
	echo "<td align='right'></td>";
}*/
?>-->
<!--<?php 
$ch/*=mysql_query("SELECT * FROM places WHERE student_id='1' AND percentage='$term1perce' AND
 term_id='1' AND cl_id='1'") or die(mysql_error());
if (mysql_num_rows($ch)>0) {
echo "Percentage inserted";
}else{
$insert=mysql_query("INSERT INTO places SET place_id=null,
	student_id='1',percentage='$term1perce',cl_id='1',term_id='1'") or die(mysql_error());
}*/
?>-->
<td></td>
</tr>
<tr height="90">
	<td colspan="17"></td>
</tr>
</table>
<?php
}
?>