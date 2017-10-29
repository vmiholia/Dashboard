<?php

$username = "root"; 
$password = "m9YhAP0DLQRi";   
$host = "52.26.225.238";
$database="bitnami_moodle";

$server = mysql_connect($host, $username, $password);
$connection = mysql_select_db($database, $server);

if(isset($_GET['classes']))
{  
  $classes=$_GET['classes'];
  $Student_Name=$_GET['student'];
  $myquery = "SELECT `Student_Name` AS `Student_Name`,
       term_name AS term_name,
       `Subject` AS `Subject`,
       avg(finalgrade) AS avg__finalgrade
FROM
  (select cc.name as School_Name,
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
          g.rawgrademax as Maximum_Grade,
          g.finalgrade
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
                           'Class 8 C')) AS expr_qry";

if($classes=='All' && $Student_Name=='All'){
    
}
else if($classes!='All' && $Student_Name=='All')
{
    $myquery=$myquery." where (Class = '".$classes."')";
}
else if($Student_Name!='All' && $classes=='All'){
    $myquery=$myquery." where (Student_Name = '".$Student_Name."')";

}
else if($Student_Name!='All' && $classes!='All')
{
    $myquery=$myquery." where (Class = '".$classes."') and ( Student_Name = '".$Student_Name."')";
}

$myquery=$myquery." GROUP BY `Student_Name`,
         term_name,
         `Subject`
ORDER BY Student_Name,term_name,avg__finalgrade DESC
";

$query = mysql_query($myquery);
if ( ! $query ) 
{
  echo mysql_error();
  die;
}

$data = array();
for ($x = 0; $x < mysql_num_rows($query); $x++) 
{
  $data[] = mysql_fetch_assoc($query);
}
mysql_close($server);
echo json_encode($data);
} 
?>
