<?php
$username = "root"; 
$password = "m9YhAP0DLQRi";   
$host = "52.26.225.238";
$database="bitnami_moodle";

$server = mysql_connect($host, $username, $password);
$connection = mysql_select_db($database, $server);
$English=array(0,0,0,0);
$Maths=array(0,0,0,0);
$Science=array(0,0,0,0);
$Hindi=array(0,0,0,0);
$SS=array(0,0,0,0);
$GK=array(0,0,0,0);
$EVS=array(0,0,0,0);
$Sanskrit=array(0,0,0,0);
$Sanskrit2=array('NULL');
$Drawing=array('NULL');
$English2=array('NULL');
$EVS2=array('NULL');
$Maths2=array('NULL');
$Science2=array('NULL');
$Hindi2=array('NULL');
$SS2=array('NULL');
$GK2=array('NULL');
$Drawing2=array('NULL');
$PHE=array('NULL');
$Remarks=array('NULL');
$Work_Education=array('NULL');
$Participation=array('NULL');
$Art_Education=array('NULL');
$Computers=array('NULL');
$Discipline=array('NULL');
// $q1 = "SELECT cc.name as School_Name,
//           c.fullname,
//           case
//               WHEN fullname LIKE 'Hindi%%%%' THEN 'Hindi'
//               WHEN fullname LIKE 'English%%%%' THEN 'English'
//               WHEN fullname LIKE 'Maths%%%%' THEN 'Maths'
//               WHEN fullname LIKE 'Social Studies%%%%' THEN 'Social Studies'
//               WHEN fullname LIKE 'Sanskrit%%%%' THEN 'Sanskrit'
//               WHEN fullname LIKE 'Science%%%%' THEN 'Science'
//               WHEN fullname LIKE 'EVS%%%%' THEN 'EVS'
//               WHEN fullname LIKE 'GK%%%%' THEN 'GK'
//               WHEN fullname LIKE 'Drawing%%%%' THEN 'Drawing'
//               WHEN fullname LIKE 'Moral Values%%%%' THEN 'Moral Values'
//               WHEN fullname LIKE 'Computer%%%%' THEN 'Computer'
//               ELSE 'NULL'
//           END AS Subject,
//           CASE
//               WHEN fullname LIKE '%%%%Nursery A' THEN 'Nursery A'
//               WHEN fullname LIKE '%%%%Nursery B' THEN 'Nursery B'
//               WHEN fullname LIKE 'Nursery C' THEN 'Nursery C'
//               WHEN fullname LIKE '%%%%KG A' THEN 'KG A'
//               WHEN fullname LIKE '%%%%KG B' THEN 'KG B'
//               WHEN fullname LIKE '%%%%KG C' THEN 'KG C'
//               WHEN fullname LIKE '%%%%1 A' THEN '1 A'
//               WHEN fullname LIKE '%%%%1 B' THEN '1 B'
//               WHEN fullname LIKE '%%%%1 C' THEN '1 C'
//               WHEN fullname LIKE '%%%%2 A' THEN '2 A'
//               WHEN fullname LIKE '%%%%2 B' THEN '2 B'
//               WHEN fullname LIKE '%%%%2 C' THEN '2 C'
//               WHEN fullname LIKE '%%%%3 A' THEN '3 A'
//               WHEN fullname LIKE '%%%%3 B' THEN '3 B'
//               WHEN fullname LIKE '%%%%3 C' THEN '3 C'
//               WHEN fullname LIKE '%%%%4 A' THEN '4 A'
//               WHEN fullname LIKE '%%%%4 B' THEN '4 B'
//               WHEN fullname LIKE '%%%%4 C' THEN '4 C'
//               WHEN fullname LIKE '%%%%5 A' THEN '5 A'
//               WHEN fullname LIKE '%%%%5 B' THEN '5 B'
//               WHEN fullname LIKE '%%%%5 C' THEN '5 C'
//               WHEN fullname LIKE '%%%%6 A' THEN '6 A'
//               WHEN fullname LIKE '%%%%6 B' THEN '6 B'
//               WHEN fullname LIKE '%%%%6 C' THEN '6 C'
//               WHEN fullname LIKE '%%%%7 A' THEN '7 A'
//               WHEN fullname LIKE '%%%%7 B' THEN '7 B'
//               WHEN fullname LIKE '%%%%7 C' THEN '7 C'
//               WHEN fullname LIKE '%%%%8 A' THEN '8 A'
//               WHEN fullname LIKE '%%%%8 B' THEN '8 B'
//               WHEN fullname LIKE '%%%%8 C' THEN '8 C'
//           END AS Class,
//           u.firstname as Student_Name,u.id,
//           gi.itemname as term_name,
          
//           case
//           when gi.itemname like 'PT%%' then '10'
//           when gi.itemname = 'SEA 1' then '5'
//           when gi.itemname ='NS 1' then '5'
//           when gi.itemname = 'Half Yearly' then '80'
//           else '0'
//           end as Total_marks,
        
// case when gi.itemname like 'PT%%' then max(round(g.finalgrade /2))  
// when gi.itemname = 'SEA 1' then round(g.finalgrade)
// when gi.itemname = 'NS 1' then round(g.finalgrade)
// when gi.itemname = 'Half Yearly' then round(g.finalgrade)
//  end as Max_Grade,

// case when gi.itemname like 'PT%%' then max(round(g.finalgrade/2)*100/10 )
// when gi.itemname = 'SEA 1' then round(g.finalgrade)*100/g.rawgrademax
// when gi.itemname = 'NS 1' then round(g.finalgrade)*100/g.rawgrademax
// when gi.itemname = 'Half Yearly' then round(g.finalgrade)*100/g.rawgrademax
//  end AS Percentage
          
//    from bitnami_moodle.mdl_course_categories cc
//    join bitnami_moodle.mdl_course c on c.category = cc.id
//    JOIN bitnami_moodle.mdl_assign ag on ag.course = c.id
//    join bitnami_moodle.mdl_context ctx on ctx.instanceid = c.id
//    join bitnami_moodle.mdl_role_assignments ra on ra.contextid = ctx.id
//    join bitnami_moodle.mdl_user u on u.id = ra.userid
//    join bitnami_moodle.mdl_grade_items gi on gi.courseid = c.id
//    join bitnami_moodle.mdl_grade_grades g on g.userid = u.id
//    and gi.id = g.itemid
//    where cc.id = '16'
//      and ra.roleid ='5'
//      and gi.itemname = ag.name
//      and c.id NOT in('631',
//                      '632')
//                      and u.firstname ='".$Student_name."' and u.id = '".$uid."'
          
//      and c.fullname NOT in('Little Flowers',
//                            'Class KG B',
//                            'Class KG C',
//                            'Class 1 A',
//                            'Class 1 B',
//                            'Class 1 C',
//                            'Class 2 A',
//                            'Class 2 B',
//                            'Class 2 C',
//                            'Class 3 A',
//                            'Class 3 B',
//                            'Class 3 C',
//                            'Class 4 A',
//                            'Class 4 B',
//                            'Class 4 C',
//                            'Class 5 A',
//                            'Class 5 B',
//                            'Class 5 C',
//                            'Class 6 A',
//                            'Class 6 B',
//                            'Class 6 C',
//                            'Class 7 A',
//                            'Class 7 B',
//                            'Class 7 C',
//                            'Class 8 A',
//                            'Class 8 B',
//                            'Class 8 C') group by u.firstname,c.fullname order by c.fullname";
// $r1 = mysql_query($q1);
// if (false === $r1) 
// {
//  echo mysql_error();
// }

// // while($row = mysql_fetch_array($r1))
// // {
// //   echo $row['Remarks'];
// //   echo $row['Class'];
// // } 
$q2 = "SELECT * from ND3
where fullname = 'Class 3'";
$r2 = mysql_query($q2);
if (false === $r2) 
{
  echo mysql_error();
}
while($row = mysql_fetch_array($r2))
{
  if($row['Term_Name']=="Participation In")
  {
    $Participation[0]=$row['feedback'];
  }
  if($row['Term_Name']=="Remarks")
  {
    $Remarks[0]=$row['feedback'];
  }
  if($row['Term_Name']=="Work Education")
  {
    $Work_Education[0]=$row['GRADE'];
  }
  if($row['Term_Name']=="Art Education")
  {
    $Art_Education[0]=$row['GRADE'];
  }
  if($row['Term_Name']=="Health & Physical Education")
  {
    $PHE[0]=$row['GRADE'];
  }


} 
$other_info=array($Participation,$Remarks,$Work_Education,$Art_Education,$PHE);
//----------------------other info ends ----------------------//
//---------------------------------------------//

$q3 = "SELECT cc.name as School_Name,
c.fullname,
case
WHEN fullname LIKE 'Hindi%%%%' THEN 'Hindi'
WHEN fullname LIKE 'English%%%%' THEN 'English'
WHEN fullname LIKE 'Maths%%%%' THEN 'Maths'
WHEN fullname LIKE 'Social Studies%%%%' THEN 'Social Studies'
WHEN fullname LIKE 'Sanskrit%%%%' THEN 'Sanskrit'
WHEN fullname LIKE 'Science%%%%' THEN 'Science'
WHEN fullname LIKE 'EVS%%%%' THEN 'EVS'
WHEN fullname LIKE 'GK%%%%' THEN 'GK'
WHEN fullname LIKE 'Drawing%%%%' THEN 'Drawing'
WHEN fullname LIKE 'Moral Values%%%%' THEN 'Moral Values'
WHEN fullname LIKE 'Computer%%%%' THEN 'Computer'
ELSE 'NULL'
END AS Subject,
CASE
WHEN fullname LIKE '%%%%Nursery A' THEN 'Nursery A'
WHEN fullname LIKE '%%%%Nursery B' THEN 'Nursery B'
WHEN fullname LIKE 'Nursery C' THEN 'Nursery C'
WHEN fullname LIKE '%%%%KG A' THEN 'KG A'
WHEN fullname LIKE '%%%%KG B' THEN 'KG B'
WHEN fullname LIKE '%%%%KG C' THEN 'KG C'
WHEN fullname LIKE '%%%%1 A' THEN '1 A'
WHEN fullname LIKE '%%%%1 B' THEN '1 B'
WHEN fullname LIKE '%%%%1 C' THEN '1 C'
WHEN fullname LIKE '%%%%2 A' THEN '2 A'
WHEN fullname LIKE '%%%%2 B' THEN '2 B'
WHEN fullname LIKE '%%%%2 C' THEN '2 C'
WHEN fullname LIKE '%%%%3 A' THEN '3 A'
WHEN fullname LIKE '%%%%3 B' THEN '3 B'
WHEN fullname LIKE '%%%%3 C' THEN '3 C'
WHEN fullname LIKE '%%%%4 A' THEN '4 A'
WHEN fullname LIKE '%%%%4 B' THEN '4 B'
WHEN fullname LIKE '%%%%4 C' THEN '4 C'
WHEN fullname LIKE '%%%%5 A' THEN '5 A'
WHEN fullname LIKE '%%%%5 B' THEN '5 B'
WHEN fullname LIKE '%%%%5 C' THEN '5 C'
WHEN fullname LIKE '%%%%6 A' THEN '6 A'
WHEN fullname LIKE '%%%%6 B' THEN '6 B'
WHEN fullname LIKE '%%%%6 C' THEN '6 C'
WHEN fullname LIKE '%%%%7 A' THEN '7 A'
WHEN fullname LIKE '%%%%7 B' THEN '7 B'
WHEN fullname LIKE '%%%%7 C' THEN '7 C'
WHEN fullname LIKE '%%%%8 A' THEN '8 A'
WHEN fullname LIKE '%%%%8 B' THEN '8 B'
WHEN fullname LIKE '%%%%8 C' THEN '8 C'
END AS Class,
u.firstname as Student_Name,
gi.itemname as term_name,

case
when gi.itemname like 'PT%%' then '10'
when gi.itemname = 'SEA 1' then '5'
when gi.itemname ='NS 1' then '5'
when gi.itemname = 'Half Yearly' then '80'
else '0'
  end as Total_marks,

case when gi.itemname like 'PT%%' then max(round(g.finalgrade /2))  
when gi.itemname = 'SEA 1' then round(g.finalgrade)
when gi.itemname = 'NS 1' then round(g.finalgrade)
when gi.itemname = 'Half Yearly' then round(g.finalgrade)
end as Max_Grade,

case when gi.itemname like 'PT%%' then max(round(g.finalgrade/2)*100/10 )
when gi.itemname = 'SEA 1' then round(g.finalgrade)*100/g.rawgrademax
when gi.itemname = 'NS 1' then round(g.finalgrade)*100/g.rawgrademax
when gi.itemname = 'Half Yearly' then round(g.finalgrade)*100/g.rawgrademax
end AS Percentage

from bitnami_moodle.mdl_course_categories cc
join bitnami_moodle.mdl_course c on c.category = cc.id
JOIN bitnami_moodle.mdl_assign ag on ag.course = c.id
join bitnami_moodle.mdl_context ctx on ctx.instanceid = c.id
join bitnami_moodle.mdl_role_assignments ra on ra.contextid = ctx.id
join bitnami_moodle.mdl_user u on u.id = ra.userid
join bitnami_moodle.mdl_grade_items gi on gi.courseid = c.id
join bitnami_moodle.mdl_grade_grades g on g.userid = u.id
and gi.id = g.itemid
where cc.id = '16'
and ra.roleid ='5'
and gi.itemname = ag.name
and c.id NOT in('631',
 '632') 
and u.firstname ='".$Student_name."' and u.id = '".$uid."'

and c.fullname NOT in('Little Flowers',
 'Class KG B',
 'Class KG C',
 'Class 1 A',
 'Class 1 B',
 'Class 1 C',
 'Class 2 A',
 'Class 2 B',
 'Class 2 C',
 'Class 3 A',
 'Class 3 B',
 'Class 3 C',
 'Class 4 A',
 'Class 4 B',
 'Class 4 C',
 'Class 5 A',
 'Class 5 B',
 'Class 5 C',
 'Class 6 A',
 'Class 6 B',
 'Class 6 C',
 'Class 7 A',
 'Class 7 B',
 'Class 7 C',
 'Class 8 A',
 'Class 8 B',
 'Class 8 C') group by u.firstname,c.fullname order by c.fullname";
$r3 = mysql_query($q3);
if (false === $r3) {
  echo mysql_error();
}
while($row = mysql_fetch_array($r3))
{
  // echo $row['term_name'];
  // echo $row['Subject'];
  if($row['Subject']=='English'){
    if($row['term_name']=='PT 1')
    {
      $English[0]=$row['Max_Grade'];
    }
    else if($row['term_name']=='NS 1')
    {
      $English[1]=$row['Max_Grade'];

    }
    else if($row['term_name']=='SEA 1')
    {
      $English[2]=$row['Max_Grade'];

    }
    else if($row['term_name']=='Half Yearly')
    {
      $English[3]=$row['Max_Grade'];
    }
  }
  else if($row['Subject']=='Maths'){
    if($row['term_name']=='PT 1')
    {
      $Maths[0]=$row['Max_Grade'];
    }
    else if($row['term_name']=='NS 1')
    {
      $Maths[1]=$row['Max_Grade'];

    }
    else if($row['term_name']=='SEA 1')
    {
      $Maths[2]=$row['Max_Grade'];

    }
    else if($row['term_name']=='Half Yearly')
    {
      $Maths[3]=$row['Max_Grade'];
    }
  }
  else if($row['Subject']=='Sanskrit'){
    if($row['term_name']=='PT 1')
    {
      $Sanskrit[0]=$row['Max_Grade'];
    }
    else if($row['term_name']=='NS 1')
    {
      $Sanskrit[1]=$row['Max_Grade'];

    }
    else if($row['term_name']=='SEA 1')
    {
      $Sanskrit[2]=$row['Max_Grade'];

    }
    else if($row['term_name']=='Half Yearly')
    {
      $Sanskrit[3]=$row['Max_Grade'];
    }
  }
  else if($row['Subject']=='Hindi'){
    if($row['term_name']=='PT 1')
    {
      $Hindi[0]=$row['Max_Grade'];
    }
    else if($row['term_name']=='NS 1')
    {
      $Hindi[1]=$row['Max_Grade'];

    }
    else if($row['term_name']=='SEA 1')
    {
      $Hindi[2]=$row['Max_Grade'];

    }
    else if($row['term_name']=='Half Yearly')
    {
      $Hindi[3]=$row['Max_Grade'];
    }
  }
  else if($row['Subject']=='Science'){
    if($row['term_name']=='PT 1')
    {
      $Science[0]=$row['Max_Grade'];
    }
    else if($row['term_name']=='NS 1')
    {
      $Science[1]=$row['Max_Grade'];

    }
    else if($row['term_name']=='SEA 1')
    {
      $Science[2]=$row['Max_Grade'];

    }
    else if($row['term_name']=='Half Yearly')
    {
      $Science[3]=$row['Max_Grade'];
    }  
  }
  else if($row['Subject']=='Social Science'){
    if($row['term_name']=='PT 1')
    {
      $SS[0]=$row['Max_Grade'];
    }
    else if($row['term_name']=='NS 1')
    {
      $SS[1]=$row['Max_Grade'];

    }
    else if($row['term_name']=='SEA 1')
    {
      $SS[2]=$row['Max_Grade'];

    }
    else if($row['term_name']=='Half Yearly')
    {
      $SS[3]=$row['Max_Grade'];
    }
  }
  else if($row['Subject']=='EVS'){
    if($row['term_name']=='PT 1')
    {
      $EVS[0]=$row['Max_Grade'];
    }
    else if($row['term_name']=='NS 1')
    {
      $EVS[1]=$row['Max_Grade'];

    }
    else if($row['term_name']=='SEA 1')
    {
      $EVS[2]=$row['Max_Grade'];

    }
    else if($row['term_name']=='Half Yearly')
    {
      $EVS[3]=$row['Max_Grade'];
    }
  }
  }
//echo $row['Subject'];
// echo $row['Max_Grade'];
// echo $row['Subject'];
// echo $row['Marks_obtained'];

// While($row = mysql_fetch_array($r3)) {
//   echo $row['Student_Name'];
//   echo $row['Class'];
//   echo $row['Subject'];
//   echo 
//   echo $row['Max_Grade'];
//   echo $row['Percentage'];
//   echo $row['term_name'];  
//   echo "\n\n";
//   }

$q4 = "SELECT Student_Name,id,
    Class,subject,
  sum(Total_marks) as Max_marks,
    SUM(Max_grade) as Marks_obtained, 
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
    RC5
    where id = '".$uid."'
GROUP BY Student_Name,Subject,class
ORDER BY Class,subject";
$r4 = mysql_query($q4);
if (false === $r4) {
  echo mysql_error();
}
// build the data array from the database records.
While($row = mysql_fetch_array($r4)) {
  if($row['subject']=='English'){
    $English2[0]=$row['GRADE'];
  }
  else if($row['subject']=='Maths'){
    $Maths2[0]=$row['GRADE'];
  }
  else if($row['subject']=='Hindi'){
    $Hindi2[0]=$row['GRADE'];
  }
  else if($row['subject']=='Science'){
   $Science2[0]=$row['GRADE'];
  }
  else if($row['subject']=='Social Science'){
    $SS2[0]=$row['GRADE'];
  }
  else if($row['subject']=='GK'){
    $GK2[0]=$row['GRADE'];
  }
  else if($row['subject']=='Drawing'){
    $Drawing2[0]=$row['GRADE'];
  }
  else if($row['subject']=='EVS'){
    $EVS2[0]=$row['GRADE'];
  }
   
  // echo $row['Student_Name'];
  // echo $row['Class'];
  // echo $row['subject'];
  // echo $row['Max_marks'];
  // echo $row['Marks_obtained'];
  // echo $row['percentage'];
  // echo $row['GRADE'];
  // echo "<br>";
}
$marks=array($English,$Hindi,$Maths,$Science,$SS,$Sanskrit,$EVS);
$marks2=array($English2,$Hindi2,$Maths2,$Science2,$SS2,$Sanskrit2,$EVS2,$Drawing2,$GK2,$Computers,$Discipline);

?>