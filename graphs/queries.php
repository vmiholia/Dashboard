<?php
$stmt4 = $auth_user->runQuery("SELECT firstname AS firstname,
       `Admission_No` AS `Admission_No`,
       class AS classs,
                `Status` AS `Status`,
                `Fathers_name` AS `Fathers_name`,
                `Mothers_name` AS `Mothers_name`,
                `Contact_No` AS `Contact_No`
FROM
  (select cc.name as School_Name,
          c.fullname as class,
          u.firstname,
          substring_index(from_unixtime(al.timetaken), '  ',1) as dt,
          substring_index(substring_index(from_unixtime(al.timetaken), ' ',2),' ',1) as Date,
          ats.acronym as Status,
          CASE
              when from_unixtime(al.timetaken) like '2017-09%%%%' then 'September'
              when from_unixtime(al.timetaken) like '2017-08%%%%' then 'August'
              when from_unixtime(al.timetaken) like '2017-10%%%%' then 'October'
          end as month,
          u.address as Address,
          u.phone1 as Contact_No,
          ui.fieldid,
          uf.name as Field,
          ui.data,
          max(case
                  when ui.fieldid = '1' then ui.data
                  else 0
              end) as DOB,
          max(case
                  when ui.fieldid = '2' then ui.data
                  else 0
              end) as Fathers_name,
          max(case
                  when ui.fieldid = '3' then ui.data
                  else 0
              end) as Mothers_name,
          max(case
                  when ui.fieldid = '4' then ui.data
                  else 0
              end) as Admission_No
   from bitnami_moodle.mdl_course_categories cc
   join bitnami_moodle.mdl_course c on cc.id=c.category
   join bitnami_moodle.mdl_attendance a on a.course=c.id
   join bitnami_moodle.mdl_context ctx on a.course = ctx.instanceid
   join bitnami_moodle.mdl_role_assignments ra on ctx.id = ra.contextid
   join bitnami_moodle.mdl_user_info_data ui on ra.userid = ui.userid
   join bitnami_moodle.mdl_user u on ui.userid = u.id
   join bitnami_moodle.mdl_user_info_field uf on uf.id = ui.fieldid
   join bitnami_moodle.mdl_attendance_log al on al.studentid=ra.userid
   and u.id = al.studentid
   join bitnami_moodle.mdl_attendance_statuses ats on ats.id = al.statusid
   where cc.id = '16'
     and a.id not in('69',
                     '68',
                     '67',
                     '43',
                     '65')
     and ra.roleid ='5'
   group by u.firstname, date
   order by date DESC) AS expr_qry
WHERE `DOB` >= '1917-09-18 09:12:42'
  AND `DOB` <= '2017-09-18 09:12:42'
GROUP BY firstname,
         `Admission_No`,
         class,
         `Status`,
         `Fathers_name`,
         `Mothers_name`,
         `Contact_No`
ORDER BY COUNT(*) DESC");
$stmt4->execute(array());
$userRow4=$stmt4->fetchAll(PDO::FETCH_ASSOC);

$stmt5 = $auth_user->runQuery("SELECT `Student_Name` AS `Student_Name`,
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
                           'Class 8 C')) AS expr_qry
GROUP BY `Student_Name`,
         term_name,
         `Subject`
ORDER BY avg__finalgrade DESC");
$stmt5->execute(array());
$userRow5=$stmt5->fetchAll(PDO::FETCH_ASSOC);


$stmt6 = $auth_user->runQuery("SELECT  
  
    distinct(
    CASE

      WHEN fullname LIKE '%%Nursery A'

        THEN 'Nursery A'

      WHEN fullname LIKE '%%Nursery B'

        THEN 'Nursery B'

      WHEN fullname LIKE '%%Nursery C'

        THEN 'Nursery C'
        
 WHEN fullname LIKE '%%KG A'

        THEN 'KG A'

      WHEN fullname LIKE '%%KG B'
       
       THEN 'KG B'

      WHEN fullname LIKE '%%KG C'

        THEN 'KG C'
     

      WHEN fullname LIKE '%%1 A'

        THEN '1 A' 

      WHEN fullname LIKE '%%1 B'

        THEN '1 B'  

      WHEN fullname LIKE '%%1 C'

        THEN '1 C' 

      WHEN fullname LIKE '%%2 A'

        THEN '2 A'

      WHEN fullname LIKE '%%2 B'

        THEN '2 B' 
        
         WHEN fullname LIKE '%%2 C'

        THEN '2 C' 


      WHEN fullname LIKE '%%3 A'

        THEN '3 A'  
        
        WHEN fullname LIKE '%%3 B'

        THEN '3 B'  
        
        WHEN fullname LIKE '%%3 C'

        THEN '3 C'  
        
        WHEN fullname LIKE '%%4 A'

        THEN '4 A'  
        
        WHEN fullname LIKE '%%4 B'

        THEN '4 B'  
        
        WHEN fullname LIKE '%%4 C'

        THEN '4 C'  
        
        WHEN fullname LIKE '%%5 A'

        THEN '5 A'  
        
        WHEN fullname LIKE '%%5 B'

        THEN '5 B'  
        
        WHEN fullname LIKE '%%5 C'

        THEN '5 C'  
        
        WHEN fullname LIKE '%%6 A'

        THEN '6 A'  
        
        WHEN fullname LIKE '%%6 B'

        THEN '6 B'  
        
        WHEN fullname LIKE '%%6 C'

        THEN '6 C'  
        
        WHEN fullname LIKE '%%7 A'

        THEN '7 A'  
        
        WHEN fullname LIKE '%%7 B'

        THEN '7 B'  
        
        WHEN fullname LIKE '%%7 C'

        THEN '7 C' 
        
        WHEN fullname LIKE '%%8 A'

        THEN '8 A' 
        
        WHEN fullname LIKE '%%8 B'

        THEN '8 B' 
        
        WHEN fullname LIKE '%%8 C'

        THEN '8 C' 
        
    END )AS Class
    
from bitnami_moodle.mdl_course_categories cc
join bitnami_moodle.mdl_course c on c.category = cc.id

where  cc.id = '16'  and c.fullname NOT in('Little Flowers' , 
'Class KG B', 'Class KG C', 'Class 1 A', 'Class 1 B', 'Class 1 C'
, 'Class 2 A', 'Class 2 B', 'Class 2 C', 'Class 3 A', 'Class 3 B', 'Class 3 C'
, 'Class 4 A', 'Class 4 B', 'Class 4 C', 'Class 5 A', 'Class 5 B', 'Class 5 C', 'Class 6 A'
, 'Class 6 B', 'Class 6 C', 'Class 7 A', 'Class 7 B', 'Class 7 C', 'Class 8 A', 'Class 8 B'
, 'Class 8 C')   ;
");

$stmt6->execute(array());
$userRow6=$stmt6->fetchAll(PDO::FETCH_ASSOC);

$stmt1s = $auth_user->runQuery("SELECT  
  
    distinct(
    CASE

      WHEN fullname LIKE '%%1 A'

        THEN '1 A' 

      WHEN fullname LIKE '%%1 B'

        THEN '1 B'  

      WHEN fullname LIKE '%%1 C'

        THEN '1 C' 

      WHEN fullname LIKE '%%2 A'

        THEN '2 A'

      WHEN fullname LIKE '%%2 B'

        THEN '2 B' 
        
         WHEN fullname LIKE '%%2 C'

        THEN '2 C' 


      WHEN fullname LIKE '%%3 A'

        THEN '3 A'  
        
        WHEN fullname LIKE '%%3 B'

        THEN '3 B'  
        
        WHEN fullname LIKE '%%3 C'

        THEN '3 C'  
        
        WHEN fullname LIKE '%%4 A'

        THEN '4 A'  
        
        WHEN fullname LIKE '%%4 B'

        THEN '4 B'  
        
        WHEN fullname LIKE '%%4 C'

        THEN '4 C'  
        
        WHEN fullname LIKE '%%5 A'

        THEN '5 A'  
        
        WHEN fullname LIKE '%%5 B'

        THEN '5 B'  
        
        WHEN fullname LIKE '%%5 C'

        THEN '5 C'  
        
        WHEN fullname LIKE '%%6 A'

        THEN '6 A'  
        
        WHEN fullname LIKE '%%6 B'

        THEN '6 B'  
        
        WHEN fullname LIKE '%%6 C'

        THEN '6 C'  
        
        WHEN fullname LIKE '%%7 A'

        THEN '7 A'  
        
        WHEN fullname LIKE '%%7 B'

        THEN '7 B'  
        
        WHEN fullname LIKE '%%7 C'

        THEN '7 C' 
        
        WHEN fullname LIKE '%%8 A'

        THEN '8 A' 
        
        WHEN fullname LIKE '%%8 B'

        THEN '8 B' 
        
        WHEN fullname LIKE '%%8 C'

        THEN '8 C' 
        
    END )AS Class
    
from bitnami_moodle.mdl_course_categories cc
join bitnami_moodle.mdl_course c on c.category = cc.id

where  cc.id = '16'  and c.fullname NOT in('Little Flowers' , 
'Class KG B', 'Class KG C', 'Class 1 A', 'Class 1 B', 'Class 1 C'
, 'Class 2 A', 'Class 2 B', 'Class 2 C', 'Class 3 A', 'Class 3 B', 'Class 3 C'
, 'Class 4 A', 'Class 4 B', 'Class 4 C', 'Class 5 A', 'Class 5 B', 'Class 5 C', 'Class 6 A'
, 'Class 6 B', 'Class 6 C', 'Class 7 A', 'Class 7 B', 'Class 7 C', 'Class 8 A', 'Class 8 B'
, 'Class 8 C')   ;
");

$stmt1s->execute(array());
$userRow1s=$stmt1s->fetchAll(PDO::FETCH_ASSOC);

$stmt7 = $auth_user->runQuery("SELECT firstname AS firstname,
       fullname AS fullname,
       itemname AS itemname,
       avg(finalgrade) AS avg__finalgrade
FROM
  (select cc.name,
          c.fullname,
          ra.roleid,
          u.id,
          u.firstname,
          u.lastname,
          gi.itemname,
          gi.grademax,
          g.finalgrade
   from bitnami_moodle.mdl_course_categories cc
   join bitnami_moodle.mdl_course c on cc.id=c.category
   join bitnami_moodle.mdl_context ctx on c.id = ctx.instanceid
   join bitnami_moodle.mdl_role_assignments ra on ctx.id = ra.contextid
   join bitnami_moodle.mdl_user u on ra.userid = u.id
   join bitnami_moodle.mdl_grade_items gi on gi.courseid=c.id
   join bitnami_moodle.mdl_grade_grades g on g.itemid=gi.id
   and g.userid=u.id
   where cc.id='19'
     and ra.roleid ='5'
     and itemname is not null
     and g.finalgrade > 0) AS expr_qry
GROUP BY fullname,
         itemname
ORDER BY avg__finalgrade DESC");
$stmt7->execute(array());
$userRow7=$stmt7->fetchAll(PDO::FETCH_ASSOC);

//------------------subject performance table ---------------------------
$stmt8= $auth_user->runQuery("SELECT `Student_Name` AS `Student_Name`,
       avg(Marks) AS `avg__Marks`
FROM
  (select cc.name as School_Name,
          c.fullname,
          case
              WHEN fullname LIKE 'Hindi%%%%%%%%' THEN 'Hindi'
              WHEN fullname LIKE 'English%%%%%%%%' THEN 'English'
              WHEN fullname LIKE 'Maths%%%%%%%%' THEN 'Maths'
              WHEN fullname LIKE 'Social Studies%%%%%%%%' THEN 'Social Studies'
              WHEN fullname LIKE 'Sanskrit%%%%%%%%' THEN 'Sanskrit'
              WHEN fullname LIKE 'Science%%%%%%%%' THEN 'Science'
              WHEN fullname LIKE 'EVS%%%%%%%%' THEN 'EVS'
              WHEN fullname LIKE 'GK%%%%%%%%' THEN 'GK'
              WHEN fullname LIKE 'Drawing%%%%%%%%' THEN 'Drawing'
              WHEN fullname LIKE 'Moral Values%%%%%%%%' THEN 'Moral Values'
              WHEN fullname LIKE 'Computer%%%%%%%%' THEN 'Computer'
              ELSE 'NULL'
          END AS Subject,
          CASE
              WHEN fullname LIKE '%%%%%%%%Nursery A' THEN 'Nursery A'
              WHEN fullname LIKE '%%%%%%%%Nursery B' THEN 'Nursery B'
              WHEN fullname LIKE 'Nursery C' THEN 'Nursery C'
              WHEN fullname LIKE '%%%%%%%%KG A' THEN 'KG A'
              WHEN fullname LIKE '%%%%%%%%KG B' THEN 'KG B'
              WHEN fullname LIKE '%%%%%%%%KG C' THEN 'KG C'
              WHEN fullname LIKE '%%%%%%%%1 A' THEN '1 A'
              WHEN fullname LIKE '%%%%%%%%1 B' THEN '1 B'
              WHEN fullname LIKE '%%%%%%%%1 C' THEN '1 C'
              WHEN fullname LIKE '%%%%%%%%2 A' THEN '2 A'
              WHEN fullname LIKE '%%%%%%%%2 B' THEN '2 B'
              WHEN fullname LIKE '%%%%%%%%2 C' THEN '2 C'
              WHEN fullname LIKE '%%%%%%%%3 A' THEN '3 A'
              WHEN fullname LIKE '%%%%%%%%3 B' THEN '3 B'
              WHEN fullname LIKE '%%%%%%%%3 C' THEN '3 C'
              WHEN fullname LIKE '%%%%%%%%4 A' THEN '4 A'
              WHEN fullname LIKE '%%%%%%%%4 B' THEN '4 B'
              WHEN fullname LIKE '%%%%%%%%4 C' THEN '4 C'
              WHEN fullname LIKE '%%%%%%%%5 A' THEN '5 A'
              WHEN fullname LIKE '%%%%%%%%5 B' THEN '5 B'
              WHEN fullname LIKE '%%%%%%%%5 C' THEN '5 C'
              WHEN fullname LIKE '%%%%%%%%6 A' THEN '6 A'
              WHEN fullname LIKE '%%%%%%%%6 B' THEN '6 B'
              WHEN fullname LIKE '%%%%%%%%6 C' THEN '6 C'
              WHEN fullname LIKE '%%%%%%%%7 A' THEN '7 A'
              WHEN fullname LIKE '%%%%%%%%7 B' THEN '7 B'
              WHEN fullname LIKE '%%%%%%%%7 C' THEN '7 C'
              WHEN fullname LIKE '%%%%%%%%8 A' THEN '8 A'
              WHEN fullname LIKE '%%%%%%%%8 B' THEN '8 B'
              WHEN fullname LIKE '%%%%%%%%8 C' THEN '8 C'
          END AS Class,
          CASE
              WHEN gi.itemname like '%%%%PT 1 (Literature)' then 'PT 1'
              when gi.itemname like '%%%%PT 1 (Grammar)' then 'PT 1'
              when gi.itemname like '%%%%PT 2 (Literature)' then 'PT 2'
              when gi.itemname like '%%%%PT 2 (Grammar)' then 'PT 2'
              when gi.itemname like '%%%%PT 3 (Grammar)' then 'PT 3'
              when gi.itemname like '%%%%PT 4 (Grammar)' then 'PT 4'
              when gi.itemname like '%%%%PT 3 (Literature)' then 'PT 3'
              when gi.itemname like '%%%%PT 4 (Literature)' then 'PT 4'
              when gi.itemname = 'PT 1' then 'PT 1'
              when gi.itemname = 'PT 2' then 'PT 2'
              when gi.itemname = 'PT 3' then 'PT 3'
              when gi.itemname = 'PT 4' then 'PT 4'
              when gi.itemname = 'SEA 1' then 'SEA 1'
              when gi.itemname = 'NS 1' then 'NS 1'
              when gi.itemname = 'Half Yearly' then 'Half Yearly'
          END as Term,
          u.firstname as Student_Name,
          gi.itemname as term_name,
          g.rawgrademax as Maximum_Grade,
          g.finalgrade,
          g.finalgrade/g.rawgrademax*100 as Marks
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
                           'Class 8 C')) AS expr_qry
GROUP BY `Student_Name`
ORDER BY `avg__Marks` DESC");
$stmt8->execute(array());
$userRow8=$stmt8->fetchAll(PDO::FETCH_ASSOC);

?>
