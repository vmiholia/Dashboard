<?php
$username = "root"; 
$password = "m9YhAP0DLQRi";   
$host = "34.212.87.72";
$database="bitnami_moodle";
date_default_timezone_set('Asia/Kolkata');

$date= date('Y-m-d H:i:s');
$yesterday=date('Y-m-d H:i:s',strtotime("-1 day"));
$Class="3 B";
$server = mysql_connect($host, $username, $password);
$connection = mysql_select_db($database, $server);

$q1 = " SELECT  
    Student_Name,
    Class,Subject,
	sum(Max_Marks) as Max_marks,
    SUM(Marks_obtained) as Marks_obtained,	
    AVG(Percentage) as percentage,
    CASE
        WHEN (AVG(Percentage)) > 90 THEN 'A1'
        WHEN
            (AVG(Percentage)) <= 90
                AND (AVG(Percentage)) > 80
        THEN
            'A2'
        WHEN
            (AVG(Percentage)) <= 80
                AND (AVG(Percentage)) > 70
        THEN
            'B1'
        WHEN
            (avg(Percentage)) <= 70
                AND (avg(Percentage)) > 60
        THEN
            'B2'
		WHEN
            (avg(Percentage)) <= 60
                AND (avg(Percentage)) > 50
        THEN
            'C1'
        WHEN
            (avg(Percentage)) <= 50
                AND (avg(Percentage)) > 40
        THEN
            'C2'
         
        WHEN
            (avg(Percentage)) <= 40
                AND (avg(Percentage)) >= 33
        THEN
            'D' 
            
        ELSE 'E(Needs Improvement)'
    END AS GRADE
    
    
FROM
   ND3
GROUP BY Student_Name,Subject,class
ORDER BY Class";
$r1 = mysql_query($q1);
if (false === $r1) 
{
	echo mysql_error();
}
$English=array();
$Maths=array();
$Science=array();
$Hindi=array();
$SS=array();
$GK=array();
$Drawing=array();
$English2=array();
$Maths2=array();
$Science2=array();
$Hindi2=array();
$SS2=array();
$GK2=array();
$Drawing2=array();
$PHE=array();
$Remarks=array();
$Work_Education=array();
$Participation=array();
$Art_Education=array();
$Computers=array();

while($row = mysql_fetch_array($r1))
{
 if($row['Subject']=='English'){
    array_push($English,$row['Max_marks'],$row['Marks_obtained'],$row['percentage'],$row['GRADE']);
  }
  else if($row['Subject']=='Maths'){
    array_push($Maths,$row['Max_marks'],$row['Marks_obtained'],$row['percentage'],$row['GRADE']);
  }
  else if($row['Subject']=='Hindi'){
    array_push($Hindi,$row['Max_marks'],$row['Marks_obtained'],$row['percentage'],$row['GRADE']);
  }
  else if($row['Subject']=='Science'){
    array_push($Science,$row['Max_marks'],$row['Marks_obtained'],$row['percentage'],$row['GRADE']);
  }
  else if($row['Subject']=='Social Science'){
    array_push($SS,$row['Max_marks'],$row['Marks_obtained'],$row['percentage'],$row['GRADE']);
  }
  else if($row['Subject']=='GK'){
    array_push($GK,$row['Max_marks'],$row['Marks_obtained'],$row['percentage'],$row['GRADE']);
  }
  else if($row['Subject']=='Drawing'){
    array_push($Drawing,$row['Max_marks'],$row['Marks_obtained'],$row['percentage'],$row['GRADE']);
  }
  else if($row['Subject']=='Computer'){
    array_push($Computers,$row['Max_marks'],$row['Marks_obtained'],$row['percentage'],$row['GRADE']);
  }
}
$q2 = "SELECT * from ND3
where fullname = 'Class 3'";
$r2 = mysql_query($q2);
if (false === $r2) 
{
  echo mysql_error();
}
// while($row = mysql_fetch_array($r2))
// {
// echo $row['Term_Name'];
// echo $row['feedback'];
// }
while($row = mysql_fetch_array($r2))
{
  if($row['Term_Name']=="Participation In")
  {
    array_push($Participation,$row['feedback']);
  }
  if($row['Term_Name']=="Remarks")
  {
    array_push($Remarks,$row['feedback']);
  }
  if($row['Term_Name']=="Work Education")
  {
    array_push($Work_Education,$row['GRADE']);
  }
  if($row['Term_Name']=="Art Education")
  {
    array_push($Art_Education,$row['GRADE']);
  }
  if($row['Term_Name']=="Health & Physical Education")
  {
    array_push($PHE,$row['GRADE']);
  }

} 
$other_info=array($Participation,$Remarks,$Work_Education,$Art_Education,$PHE);

$q3 = "SELECT cc.name,
          c.fullname,
           case
              WHEN fullname LIKE 'Hindi%%%%' THEN 'Hindi'
              WHEN fullname LIKE 'English%%%%' THEN 'English'
              WHEN fullname LIKE 'Maths%%%%' THEN 'Maths'
              WHEN fullname LIKE 'Social SCience%%%%' THEN 'Social Science'
              WHEN fullname LIKE 'Sanskrit%%%%' THEN 'Sanskrit'
              WHEN fullname LIKE 'Science%%%%' THEN 'Science'
              WHEN fullname LIKE 'EVS%%%%' THEN 'EVS'
              WHEN fullname LIKE 'General Knowledge%%%%' THEN 'GK'
              WHEN fullname LIKE 'Drawing%%%%' THEN 'Drawing'
              WHEN fullname LIKE 'Moral Values%%%%' THEN 'Moral Values'
              WHEN fullname LIKE 'Computer%%%%' THEN 'Computer'
               WHEN fullname LIKE 'Yoga%%%%' THEN 'Yoga'
              ELSE 'NULL'
          END AS Subject,
          CASE
              WHEN fullname LIKE '%%%%Class 1' THEN '1'
              WHEN fullname LIKE '%%%%Class 2' THEN '2'
              WHEN fullname LIKE '%%%%Class 3' THEN '3'
              WHEN fullname LIKE '%%%%Class 4' THEN '4'
              WHEN fullname LIKE '%%%%Class 5' THEN '5'
              WHEN fullname LIKE '%%%%Class 6' THEN '6'
              WHEN fullname LIKE '%%%%Class 7' THEN '7'
              WHEN fullname LIKE '%%%%Class 8' THEN '8'
               WHEN fullname LIKE '%%%%KG' THEN 'KG'    
                WHEN fullname LIKE '%%%%Nursery' THEN 'Nursery'
          END AS Class,
	
          u.id,
          u.firstname as Student_Name,
          gi.itemname as Term_Name,
          g.rawgrademax as Max_marks,
          g.finalgrade as Marks_obtained,g.feedback,
          g.finalgrade*100/g.rawgrademax as Percentage,
          case 
when g.finalgrade = '1'
            then 'C'
             when g.finalgrade = '2'
            then 'B'
             when g.finalgrade= '3'
            then 'A'
            
    END AS GRADE
   from bitnami_moodle.mdl_course_categories cc
   join bitnami_moodle.mdl_course c on cc.id=c.category
   join bitnami_moodle.mdl_context ctx on c.id = ctx.instanceid
   join bitnami_moodle.mdl_role_assignments ra on ctx.id = ra.contextid
   join bitnami_moodle.mdl_user u on ra.userid = u.id
   join bitnami_moodle.mdl_grade_items gi on gi.courseid=c.id
   join bitnami_moodle.mdl_grade_grades g on g.itemid=gi.id
   and g.userid=u.id
   where cc.id='9'
     and ra.roleid ='5' and u.id = '3641' and itemname is not null ORDER by Subject,Term_Name";
$r3 = mysql_query($q3);
if (false === $r3) 
{
  echo mysql_error();
}
while($row = mysql_fetch_array($r3))
{
  if($row['Subject']=='English'){
    array_push($English2,$row['Marks_obtained']);
  }
  else if($row['Subject']=='Maths'){
    array_push($Maths2,$row['Marks_obtained']);
  }
  else if($row['Subject']=='Hindi'){
    array_push($Hindi2,$row['Marks_obtained']);
  }
  else if($row['Subject']=='Science'){
   array_push($Science2,$row['Marks_obtained']);
  }
  else if($row['Subject']=='Social Science'){
    array_push($SS2,$row['Marks_obtained']);
  }
  else if($row['Subject']=='GK'){
    array_push($GK2,$row['Marks_obtained']);
  }
  else if($row['Subject']=='Drawing'){
    array_push($Drawing2,$row['Marks_obtained']);
  }
  
$Student_Name=$row['Student_Name'];
$Class=$row['Class'];  
// echo $row['Term_Name'];
// echo $row['Subject'];
// echo $row['Marks_obtained'];
}

$q4 = " SELECT  
    Student_Name,
    Class
FROM
   ND3
GROUP BY Student_Name
ORDER BY Class";
$r4 = mysql_query($q4);
if (false === $r4) 
{
	echo mysql_error();
}


$basic_info=array($Student_Name,$Class);
$marks=array($English,$Hindi,$Maths,$Science,$SS,$Drawing,$GK,$Computers);
$marks2=array($English2,$Hindi2,$Maths2,$Science2,$SS2,$Drawing2,$GK2);
foreach ($marks2 as $key) {
	foreach ($key as $value) {
		//echo $value;
	}
}
?>