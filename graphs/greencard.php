<?php
$username = "root"; 
$password = "m9YhAP0DLQRi";   
$host = "52.26.225.238";
$database="bitnami_moodle";
$server = mysql_connect($host, $username, $password);
$connection = mysql_select_db($database, $server);

function one($class)
{
  $output = '';

/*$query1="select * from LF12M WHERE Class='".$class."' AND Subject = 'English' description1="READING SKILLS" AND description2="PRONUNCIATION & FLUENCY" order by Student_Name;";
$query1="select * from LF12M WHERE Class='".$class."' AND Subject = 'English' description1="READING SKILLS" AND description2="COMPREHENSION" Order by Student_Name;";
$query1="select * from LF12M WHERE Class='".$class."' AND Subject = 'English' description1="WRITING SKILLS" AND description2="LITERATURE" order by Student_Name;";
$query1="select * from LF12M WHERE Class='".$class."' AND Subject = 'English' description1="WRITING SKILLS" AND description2="GRAMMAR" order by Student_Name;";
$query1="select * from LF12M WHERE Class='".$class."' AND Subject = 'English' description1="WRITING SKILLS" AND description2="DICTIONARY" order by Student_Name;";
$query1="select * from LF12M WHERE Class='".$class."' AND Subject = 'English' description1="WRITING SKILLS" AND description2="HAND WRITING & ASSIGNMENTS" order by Student_Name;";
$query1="select * from LF12M WHERE Class='".$class."' AND Subject = 'English' description1="SPEAKING SKILLS" AND description2="RECITAION/STORY TELLING" order by Student_Name;";
$query1="select * from LF12M WHERE Class='".$class."' AND Subject = 'English' description1="SPEAKING SKILLS" AND description2="CONVERSATION" order by Student_Name;";
$query1="select * from LF12M WHERE Class='".$class."' AND Subject = 'English' description1="LISTENING SKILLS" AND description2="COMPREHENSION" order by Student_Name;";
$query1="select * from LF12M WHERE Class='".$class."' AND Subject = 'English' description1="LISTENING SKILLS" AND description2="PRONUNCIATION & FLUENCY" order by Student_Name;";

$query1="select * from LF12M WHERE Class='".$class."' AND Subject = 'Hindi' description1='READING SKILLS' AND description2='PRONUNCIATION & FLUENCY' order by Student_Name;";
$query1="select * from LF12M WHERE Class='".$class."' AND Subject = 'Hindi' description1='READING SKILLS' AND description2='COMPREHENSION' Order by Student_Name;";
$query1="select * from LF12M WHERE Class='".$class."' AND Subject = 'Hindi' description1='WRITING SKILLS' AND description2='LITERATURE' order by Student_Name;";
$query1="select * from LF12M WHERE Class='".$class."' AND Subject = 'Hindi' description1='WRITING SKILLS' AND description2='GRAMMAR' order by Student_Name;";
$query1="select * from LF12M WHERE Class='".$class."' AND Subject = 'Hindi' description1='WRITING SKILLS' AND description2='DICTIONARY' order by Student_Name;";
$query1="select * from LF12M WHERE Class='".$class."' AND Subject = 'Hindi' description1='WRITING SKILLS' AND 
description2='HAND WRITING & ASSIGNMENTS' order by Student_Name;";
$query1="select * from LF12M WHERE Class='".$class."' AND Subject = 'Hindi' description1='SPEAKING SKILLS' AND description2='RECITAION/STORY TELLING' order by Student_Name;";
$query1="select * from LF12M WHERE Class='".$class."' AND Subject = 'Hindi' description1='SPEAKING SKILLS' AND description2='CONVERSATION' order by Student_Name;";
$query1="select * from LF12M WHERE Class='".$class."' AND Subject = 'Hindi' description1='LISTENING SKILLS' AND description2='COMPREHENSION' order by Student_Name;";

$query1="select * from LF12M WHERE Class='".$class."' AND Subject = 'Maths' description1='SPEAKING SKILLS' AND description2='CONVERSATION' order by Student_Name;";
$query1="select * from LF12M WHERE Class='".$class."' AND Subject = 'Maths' description1='LISTENING SKILLS' AND description2='COMPREHENSION' order by Student_Name;";




$query2="select * from LF12M WHERE Class='".$class."' AND Subject = 'Hindi' order by Student_Name ;";
$query3="select * from LF12M WHERE Class='".$class."' AND Subject = 'Maths' order by Student_Name ;";
$query4="select * from LF12M WHERE Class='".$class."' AND Subject = 'EVS' order by Student_Name ;";
$query5="select * from LF12M WHERE Class='".$class."' AND Subject = 'GK' order by Student_Name;";
$query6="select * from LF12M WHERE Class='".$class."' AND Subject = 'Drawing' order by Student_Name ;";
$query7="select * from LF12M WHERE Class='".$class."' AND Subject = 'Computer' order by Student_Name ;";*/


$output .='
<table class="table" bordered="1">
<thead>
<tr>
<th>S.No.</th>
<th>Ad.No.</th>
<th>Student Name</th>

<th colspan="4">ENGLISH READING SKILL</th>
<th colspan="8">ENGLISH WRITING SKILL</th>
<th colspan="4">ENGLISH SPEAKING SKILL</th>
<th colspan="2">LISTENING SKILL</th>

<th colspan="4">HINDI READING SKILL</th>
<th colspan="8">HINDI WRITING SKILL</th>
<th colspan="4">SKILLS</th>
<th colspan="2">LISTENING</th>

<th colspan="8">MATHEMATICS</th>

<th colspan="4">EVS</th>

<th colspan="6"></th>
</tr>
<tr>
   <th></th>
   <th></th>
   <th></th>
   <th colspan="2">PRONUNCIATION & FLUENCY</th>
   <th colspan="2">COMPREHENSION</th>
   <th colspan="2">LITERATURE</th>
   <th colspan="2">GRAMMAR</th>
   <th colspan="2">DICTATION/VOCABULARY</th>
   <th colspan="2">HAND WRITING & ASSIGNMENT</th>
  
   <th colspan="2">RECITAION/STORY TELLING</th>
   <th colspan="2">CONVERSATION</th>
   <th colspan="2">COMPREHENSION</th>
   <th colspan="2">PRONUNCIATION & FLUENCY</th>
   <th colspan="2">COMPREHENSION</th>
   <th colspan="2">LITERATURE</th>
   <th colspan="2">GRAMMAR</th>
   <th colspan="2">DICTATION/VOCABULARY</th>
   <th colspan="2">HAND WRITING & ASSIGNMENTS</th>
   <th colspan="2">"RECITATION/STORY TELLING</th>
   <th colspan="2">CONVERSATION</th>
   <th colspan="2">COMPREHENSION</th>
   <th colspan="2">CONCEPT (W)</th>
   <th colspan="2">ACTIVITY</th>
   <th colspan="2">TABLE/MENTAL ABILITY</th>
   <th colspan="2">CLASS & HOME ASSIGNMENTS </th>
   <th colspan="2">E.V.S.</th>
   <th colspan="2">ACTIVITY/PROJECT </th>
   <th colspan="2">G.K.</th>
   <th colspan="2">COMP </th>
   <th colspan="2">DRAWING</th>
</tr>

<tr>
<th></th>
<th></th>
<th></th>

<th>10.0</th>
<th>G</th>

<th>10.0</th>
<th>G</th>

<th>20.0</th>
<th>G</th>

<th>20.0</th>
<th>G</th>

<th>10.0</th>
<th>G</th>

<th>10.0</th>
<th>G</th>


<th>10.0</th>
<th>G</th>


<th>10.0</th>
<th>G</th>


<th>10.0</th>
<th>G</th>


<th>10.0</th>
<th>G</th>


<th>10.0</th>
<th>G</th>


<th>20.0</th>
<th>G</th>


<th>20.0</th>
<th>G</th>



<th>10.0</th>
<th>G</th>


<th>10.0</th>
<th>G</th>


<th>10.0</th>
<th>G</th>


<th>10.0</th>
<th>G</th>


<th>10.0</th>
<th>G</th>


<th>20.0</th>
<th>G</th>


<th>10.0</th>
<th>G</th>


<th>10.0</th>
<th>G</th>


<th>10.0</th>
<th>G</th>

<th>20.0</th>
<th>G</th>


<th>10.0</th>
<th>G</th>


<th>20.0</th>
<th>G</th>


<th>20.0</th>
<th>G</th>


<th>20.0</th>
<th>G</th>
</tr>

</thead>
';





$output .='</table>';
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=greencard.xls");
echo $output;
}

function two($class)
{
$query="select ROLLNO,attendance from LFPS35FINAL WHERE Class='".$class."' AND Subject = 'English' order by Student_Name;";
$basic = mysql_query($query);
if (false === $basic) {
  echo mysql_error();
}


$query1="select * from LFPSREPORTCARD35GS WHERE Class='".$class."' AND Subject = 'English' order by Student_Name;";
$query2="select * from LFPSREPORTCARD35GS WHERE Class='".$class."' AND Subject = 'Hindi' order by Student_Name ;";
$query3="select * from LFPSREPORTCARD35GS WHERE Class='".$class."' AND Subject = 'Maths' order by Student_Name ;";
$query4="select * from LFPSREPORTCARD35GS WHERE Class='".$class."' AND Subject = 'EVS' order by Student_Name ;";
$query5="select * from LFPSREPORTCARD35GS WHERE Class='".$class."' AND Subject = 'GK' order by Student_Name;";
$query6="select * from LFPSREPORTCARD35GS WHERE Class='".$class."' AND Subject = 'Drawing' order by Student_Name ;";
$query7="select * from LFPSREPORTCARD35GS WHERE Class='".$class."' AND Subject = 'Computer' order by Student_Name ;";



$output = '';
$output .='
<table class="table" bordered="1">
<tbody>
<tr>
<th>RollNo</th>
<th colspan="0">ADMNO</th>
<th colspan="0">NAME</th>
<th colspan="6">ENGLISH</th>
<th colspan="6">HINDI</th>
<th colspan="6">MATHS</th>
<th colspan="6">EVS</th>
<th colspan="2">GK</th>
<th colspan="2">DRAWING</th>
<th colspan="2">COMPUTER</th>
<th>Attendance</th>
</tr>

<tr>
   <th></th>
   <th></th>
   <th></th>
   <th>PT(10)</th>
   <th>NS1(5)</th>
   <th>SEA1(5)</th>
   <th>HY(60)</th>
   <th>TOT(80)</th>
   <th>G</th>

    <th>PT(10)</th>
   <th>NS1(5)</th>
   <th>SEA1(5)</th>
   <th>HY(60)</th>
   <th>TOT(80)</th>
   <th>G</th>

    <th>PT(10)</th>
   <th>NS1(5)</th>
   <th>SEA1(5)</th>
   <th>HY(60)</th>
   <th>TOT(80)</th>
   <th>G</th>

    <th>PT(10)</th>
   <th>NS1(5)</th>
   <th>SEA1(5)</th>
   <th>HY(60)</th>
   <th>TOT(80)</th>
   <th>G</th>

   <th>M(40)</th>
   <th>G</th>

   <th>M(50)</th>
   <th>G</th>

   <th>M(60)</th>
   <th>G</th>
   <th></th>
</tr>

</tbody>
';

$basic1 = mysql_query($query1);

if (false === $basic1) {
  echo mysql_error();
}

$basic2 = mysql_query($query2);

if (false === $basic2) {
  echo mysql_error();
}

$basic3= mysql_query($query3);

if (false === $basic3) {
  echo mysql_error();
}

$basic4 = mysql_query($query4);

if (false === $basic4) {
  echo mysql_error();
}

$basic5 = mysql_query($query5);

if (false === $basic5) {
  echo mysql_error();
}


$basic6 = mysql_query($query6);

if (false === $basic6) {
  echo mysql_error();
}

$basic7 = mysql_query($query7);

if (false === $basic7) {
  echo mysql_error();
}

$sanket=0;
while($sanket<=60)
{
$row=mysql_fetch_array($basic);
$row1=mysql_fetch_array($basic1);
$row2=mysql_fetch_array($basic2);
$row3=mysql_fetch_array($basic3);
$row4=mysql_fetch_array($basic4);
$row5=mysql_fetch_array($basic5);
$row6=mysql_fetch_array($basic6);
$row7=mysql_fetch_array($basic7);
if($row1["GRADE"]=='E(Needs Improvement)')
$row1["GRADE"]='E';
if($row2["GRADE"]=='E(Needs Improvement)')
$row2["GRADE"]='E';
if($row3["GRADE"]=='E(Needs Improvement)')
$row3["GRADE"]='E';
if($row4["GRADE"]=='E(Needs Improvement)')
$row4["GRADE"]='E';
if($row5["GRADE"]=='E(Needs Improvement)')
$row5["GRADE"]='E';
if($row6["GRADE"]=='E(Needs Improvement)')
$row6["GRADE"]='E';
if($row7["GRADE"]=='E(Needs Improvement)')
$row7["GRADE"]='E';

  $output .= '
<tr>
<th>'.$row["ROLLNO"].'</th>

<th>'.$row1["Adm_No"].'</th>
<th>'.$row1["Student_name"].'</th>
<th>'.$row1["PT"].'</th>
<th> '.$row1["NS_1"].'</th>
<th> '.$row1["SEA_1"].'</th>
<th> '.$row1["Half_Yearly"].'</th>
<th> '.$row1["MARKS_OBTAINED"].'</th>
<th> '.$row1["GRADE"].'</th>

<th>'.$row2["PT"].'</th>
<th> '.$row2["NS_1"].'</th>
<th> '.$row2["SEA_1"].'</th>
<th> '.$row2["Half_Yearly"].'</th>
<th> '.$row2["MARKS_OBTAINED"].'</th>
<th> '.$row2["GRADE"].'</th>

<th>'.$row3["PT"].'</th>
<th> '.$row3["NS_1"].'</th>
<th> '.$row3["SEA_1"].'</th>
<th> '.$row3["Half_Yearly"].'</th>
<th> '.$row3["MARKS_OBTAINED"].'</th>
<th> '.$row3["GRADE"].'</th>

<th>'.$row4["PT"].'</th>
<th> '.$row4["NS_1"].'</th>
<th> '.$row4["SEA_1"].'</th>
<th> '.$row4["Half_Yearly"].'</th>
<th> '.$row4["MARKS_OBTAINED"].'</th>
<th> '.$row4["GRADE"].'</th>

<th> '.$row5["MARKS_OBTAINED"].'</th>
<th> '.$row5["GRADE"].'</th>

<th> '.$row6["MARKS_OBTAINED"].'</th>
<th> '.$row6["GRADE"].'</th>

<th> '.$row7["MARKS_OBTAINED"].'</th>
<th> '.$row7["GRADE"].'</th>

<th>'.$row["attendance"].'</th>

</tr>
';  
$sanket++;
}

$output .='</table>';
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename='".$class."'.xls");
echo $output;
}

function three($class)
{

//select count(distinct(ID))as count from GREENGRADEALL where Class='".$class."';
$query="select ROLLNO,attendance from LFPS68FINALD WHERE Class='".$class."' AND Subject = 'English' order by Student_Name;";
$basic = mysql_query($query);
if (false === $basic) {
  echo mysql_error();
}


$query1="select Adm_No,Student_Name,PT_1*2 as PT_1,PT_2*2 as PT_2,PT,NS_1,SEA_1,Half_Yearly,MARKS_OBTAINED,GRADE from LFPSREPORTCARD68GS WHERE Class='".$class."' AND Subject = 'English' order by Student_Name;";
$query2="select Adm_No,Student_Name,PT_1*2 as PT_1,PT_2*2 as PT_2,PT,NS_1,SEA_1,Half_Yearly,MARKS_OBTAINED,GRADE from LFPSREPORTCARD68GS WHERE Class='".$class."' AND Subject = 'Hindi' order by Student_Name ;";
$query3="select Adm_No,Student_Name,PT_1*2 as PT_1,PT_2*2 as PT_2,PT,NS_1,SEA_1,Half_Yearly,MARKS_OBTAINED,GRADE from LFPSREPORTCARD68GS WHERE Class='".$class."' AND Subject = 'Maths' order by Student_Name ;";
$query4="select Adm_No,Student_Name,PT_1*2 as PT_1,PT_2*2 as PT_2,PT,NS_1,SEA_1,Half_Yearly,MARKS_OBTAINED,GRADE from LFPSREPORTCARD68GS WHERE Class='".$class."' AND Subject = 'Sanskrit' order by Student_Name ;";
$query5="select Adm_No,Student_Name,PT_1*2 as PT_1,PT_2*2 as PT_2,PT,NS_1,SEA_1,Half_Yearly,MARKS_OBTAINED,GRADE from LFPSREPORTCARD68GS WHERE Class='".$class."' AND Subject = 'Science' order by Student_Name ;";
$query6="select Adm_No,Student_Name,PT_1*2 as PT_1,PT_2*2 as PT_2,PT,NS_1,SEA_1,Half_Yearly,MARKS_OBTAINED,GRADE from LFPSREPORTCARD68GS WHERE Class='".$class."' AND Subject = 'Social Studies' order by Student_Name ;";
$query7="select Adm_No,Student_Name,PT_1*2 as PT_1,PT_2*2 as PT_2,PT,NS_1,SEA_1,Half_Yearly,MARKS_OBTAINED,GRADE from LFPSREPORTCARD68GS WHERE Class='".$class."' AND Subject = 'GK' order by Student_Name;";
$query8="select Adm_No,Student_Name,PT_1*2 as PT_1,PT_2*2 as PT_2,PT,NS_1,SEA_1,Half_Yearly,MARKS_OBTAINED,GRADE from LFPSREPORTCARD68GS WHERE Class='".$class."' AND Subject = 'Drawing' order by Student_Name ;";
$query9="select Adm_No,Student_Name,PT_1*2 as PT_1,PT_2*2 as PT_2,PT,NS_1,SEA_1,Half_Yearly,MARKS_OBTAINED,GRADE from LFPSREPORTCARD68GS WHERE Class='".$class."' AND Subject = 'Computer' order by Student_Name ;";


$output = '';
$output .='
<table class="table" bordered="1">
<thead>
<tr>
<th>Roll No</th>
<th >ADMNO</th>
<th >NAME</th>
<th colspan="8">ENGLISH</th>
<th colspan="8">HINDI</th>
<th colspan="8">MATHS</th>
<th colspan="8">SANSKRIT</th>
<th colspan="8">SCIENCE</th>
<th colspan="8">SOCIAL SCIENCE</th>
<th colspan="2">GK</th>
<th colspan="2">DRAWING</th>
<th colspan="2">COMPUTER</th>
<th>Attendance</th>

</tr>

<tr>
   <th></th>
   <th></th>
   <th></th>

   <th>PT1(20)</th>
   <th>PT2(20)</th>
   <th>PT(10)</th>
   <th>NS1</th>
   <th>SEA1</th>
   <th>HY(80)</th>
   <th>TOT(100)</th>
   <th>G</th>

    <th>PT1(20)</th>
    <th>PT2(20)</th>
    <th>PT(10)</th>
   <th>NS1</th>
   <th>SEA1</th>
   <th>HY(80)</th>
   <th>TOT(100)</th>
   <th>G</th>

   <th>PT1(20)</th>
    <th>PT2(20)</th>
    <th>PT(10)</th>
   <th>NS1</th>
   <th>SEA1</th>
   <th>HY(80)</th>
   <th>TOT(100)</th>
   <th>G</th>

    <th>PT1(20)</th>
    <th>PT2(20)</th>
    <th>PT(10)</th>
    <th>NS1</th>
   <th>SEA1</th>
   <th>HY(80)</th>
   <th>TOT(100)</th>
   <th>G</th>

    <th>PT1(20)</th>
    <th>PT2(20)</th>
    <th>PT(10)</th>
   <th>NS1</th>
   <th>SEA1</th>
   <th>HY(80)</th>
   <th>TOT(100)</th>
   <th>G</th>

   <th>PT1(20)</th>
    <th>PT2(20)</th>
    <th>PT(10)</th>
   <th>NS1</th>
   <th>SEA1</th>
   <th>HY(80)</th>
   <th>TOT(100)</th>
   <th>G</th>

   <th>M(40)</th>
   <th>G</th>

   <th>M(50)</th>
   <th>G</th>

   <th>M(60)</th>
   <th>G</th>
   <th></th>

</tr>

</thead>
';

$basic1 = mysql_query($query1);

if (false === $basic1) {
  echo mysql_error();
}

$basic2 = mysql_query($query2);

if (false === $basic2) {
  echo mysql_error();
}

$basic3= mysql_query($query3);

if (false === $basic3) {
  echo mysql_error();
}

$basic4 = mysql_query($query4);

if (false === $basic4) {
  echo mysql_error();
}

$basic5 = mysql_query($query5);

if (false === $basic5) {
  echo mysql_error();
}


$basic6 = mysql_query($query6);

if (false === $basic6) {
  echo mysql_error();
}

$basic7 = mysql_query($query7);

if (false === $basic7) {
  echo mysql_error();
}

$basic8 = mysql_query($query8);

if (false === $basic8) {
  echo mysql_error();
}

$basic9 = mysql_query($query9);

if (false === $basic9) {
  echo mysql_error();
}
$sanket=0;
while($sanket<=60)
{
$row=mysql_fetch_array($basic);
$row1=mysql_fetch_array($basic1);
$row2=mysql_fetch_array($basic2);
$row3=mysql_fetch_array($basic3);
$row4=mysql_fetch_array($basic4);
$row5=mysql_fetch_array($basic5);
$row6=mysql_fetch_array($basic6);
$row7=mysql_fetch_array($basic7);
$row8=mysql_fetch_array($basic8);
$row9=mysql_fetch_array($basic9);
if($row1["GRADE"]=='E(Needs Improvement)')
$row1["GRADE"]='E';
if($row2["GRADE"]=='E(Needs Improvement)')
$row2["GRADE"]='E';
if($row3["GRADE"]=='E(Needs Improvement)')
$row3["GRADE"]='E';
if($row4["GRADE"]=='E(Needs Improvement)')
$row4["GRADE"]='E';
if($row5["GRADE"]=='E(Needs Improvement)')
$row5["GRADE"]='E';
if($row6["GRADE"]=='E(Needs Improvement)')
$row6["GRADE"]='E';
if($row7["GRADE"]=='E(Needs Improvement)')
$row7["GRADE"]='E';
if($row8["GRADE"]=='E(Needs Improvement)')
$row8["GRADE"]='E';
if($row9["GRADE"]=='E(Needs Improvement)')
$row9["GRADE"]='E';

  $output .= '
<tr>
<th>'.$row["ROLLNO"].'</th>
<th>'.$row1["Adm_No"].'</th>
<th>'.$row1["Student_Name"].'</th>
<th> '.$row1["PT_1"].'</th>
<th>'.$row1["PT_2"].'</th>
<th>'.$row1["PT"].'</th>
<th> '.$row1["NS_1"].'</th>
<th> '.$row1["SEA_1"].'</th>
<th> '.$row1["Half_Yearly"].'</th>
<th> '.$row1["MARKS_OBTAINED"].'</th>
<th> '.$row1["GRADE"].'</th>

<th> '.$row2["PT_1"].'</th>
<th>'.$row2["PT_2"].'</th>
<th>'.$row2["PT"].'</th>
<th> '.$row2["NS_1"].'</th>
<th> '.$row2["SEA_1"].'</th>
<th> '.$row2["Half_Yearly"].'</th>
<th> '.$row2["MARKS_OBTAINED"].'</th>
<th> '.$row2["GRADE"].'</th>

<th> '.$row3["PT_1"].'</th>
<th>'.$row3["PT_2"].'</th>
<th>'.$row3["PT"].'</th>
<th> '.$row3["NS_1"].'</th>
<th> '.$row3["SEA_1"].'</th>
<th> '.$row3["Half_Yearly"].'</th>
<th> '.$row3["MARKS_OBTAINED"].'</th>
<th> '.$row3["GRADE"].'</th>

<th> '.$row4["PT_1"].'</th>
<th>'.$row4["PT_2"].'</th>
<th>'.$row4["PT"].'</th>
<th> '.$row4["NS_1"].'</th>
<th> '.$row4["SEA_1"].'</th>
<th> '.$row4["Half_Yearly"].'</th>
<th> '.$row4["MARKS_OBTAINED"].'</th>
<th> '.$row4["GRADE"].'</th>

<th> '.$row5["PT_1"].'</th>
<th>'.$row5["PT_2"].'</th>
<th>'.$row5["PT"].'</th>
<th> '.$row5["NS_1"].'</th>
<th> '.$row5["SEA_1"].'</th>
<th> '.$row5["Half_Yearly"].'</th>
<th> '.$row5["MARKS_OBTAINED"].'</th>
<th> '.$row5["GRADE"].'</th>

<th> '.$row6["PT_1"].'</th>
<th>'.$row6["PT_2"].'</th>
<th>'.$row6["PT"].'</th>
<th> '.$row6["NS_1"].'</th>
<th> '.$row6["SEA_1"].'</th>
<th> '.$row6["Half_Yearly"].'</th>
<th> '.$row6["MARKS_OBTAINED"].'</th>
<th> '.$row6["GRADE"].'</th>

<th> '.$row7["MARKS_OBTAINED"].'</th>
<th> '.$row7["GRADE"].'</th>

<th> '.$row8["MARKS_OBTAINED"].'</th>
<th> '.$row8["GRADE"].'</th>

<th> '.$row9["MARKS_OBTAINED"].'</th>
<th> '.$row9["GRADE"].'</th>

<th>'.$row["attendance"].'</th>

</tr>
';  
$sanket++;
}


$output .='</table>';
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename='".$class."'.xls");
echo $output;
}
?>

<?php
$class=$_POST['classes'];
if((substr($class,0,1) == '1')||(substr($class,0,1) == '2' ))
  one($class);
else if((substr($class,0,1) == '3')||(substr($class,0,1) == '4'||(substr($class,0,1) == '5')))
  two($class);
else
  three($class);
?>