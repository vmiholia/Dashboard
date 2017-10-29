<?php

require_once("session.php");
require_once("class.user.php");
$auth_user = new USER();
$username = $_SESSION['username'];
$stmt = $auth_user->runQuery("SELECT * FROM mdl_user WHERE username=:username");
$stmt->execute(array(":username"=>$username));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

$stmt2 = $auth_user->runQuery("SELECT cc.name,  count(distinct(u.id)) as count
from bitnami_moodle.mdl_course_categories cc
join bitnami_moodle.mdl_course c on cc.id=c.category
join bitnami_moodle.mdl_attendance a on a.course=c.id
join bitnami_moodle.mdl_context ctx on a.course = ctx.instanceid 
join bitnami_moodle.mdl_role_assignments ra on ctx.id = ra.contextid
join bitnami_moodle.mdl_user u on u.id = ra.userid
 where cc.id = '16' and ra.roleid = '5' and c.id not in('632');");
$stmt2->execute(array());
$userRow2=$stmt2->fetch(PDO::FETCH_ASSOC);
$student_count=$userRow2['count'];

$stmt3 = $auth_user->runQuery("SELECT cc.name,  count(distinct(u.id)) as count
from bitnami_moodle.mdl_course_categories cc
join bitnami_moodle.mdl_course c on cc.id=c.category
join bitnami_moodle.mdl_attendance a on a.course=c.id
join bitnami_moodle.mdl_context ctx on a.course = ctx.instanceid 
join bitnami_moodle.mdl_role_assignments ra on ctx.id = ra.contextid
join bitnami_moodle.mdl_user u on u.id = ra.userid
 where cc.id = '16' and ra.roleid = '3';");
$stmt3->execute(array());
$userRow3=$stmt3->fetch(PDO::FETCH_ASSOC);
$teacher_count=$userRow3['count'];

$stmt4 = $auth_user->runQuery("SELECT `Class` AS `Class`,
       `Admission_No` AS `Admission_No`,
       `Student_name` AS `Student_name`,
       `DOB` AS `DOB`,
       `Fathers_name` AS `Fathers_name`,
       `Mothers_name` AS `Mothers_name`,
       `Contact_No` AS `Contact_No`,
       `Address` AS `Address`
FROM
  (select cc.name,
          c.fullname as Class ,
          u.firstname as Student_name,
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
   join bitnami_moodle.mdl_course c on cc.id = c.category
   join bitnami_moodle.mdl_attendance a on a.course = c.id
   join bitnami_moodle.mdl_context ctx on a.course = ctx.instanceid
   join bitnami_moodle.mdl_role_assignments ra on ctx.id = ra.contextid
   join bitnami_moodle.mdl_user_info_data ui on ra.userid = ui.userid
   join bitnami_moodle.mdl_user u on ui.userid = u.id
   join bitnami_moodle.mdl_user_info_field uf on uf.id = ui.fieldid
   where cc.id = '16'
     and ra.roleid = '5'
     and uf.name not in ('clientid',
                         'classn')
     and a.course not in('632')
   group by u.firstname) AS expr_qry
WHERE `DOB` >= '1917-09-16 16:49:45'
  AND `DOB` <= '2017-09-16 16:49:45'
GROUP BY `Class`,
         `Admission_No`,
         `Student_name`,
         `DOB`,
         `Fathers_name`,
         `Mothers_name`,
         `Contact_No`,
         `Address`
ORDER BY COUNT(*) DESC");
$stmt4->execute(array());
$userRow4=$stmt4->fetchAll(PDO::FETCH_ASSOC);

$stmt5 = $auth_user->runQuery("SELECT `Teachername` AS `Teachername`,
       `Class` AS `Class`,
       `Subject` AS `Subject`,
       `Phone` AS `Phone`
FROM
  (SELECT *
   FROM test.lfps_teacher) AS expr_qry
GROUP BY `Teachername`,
         `Class`,
         `Subject`,
         `Phone`
ORDER BY COUNT(*) DESC");
$stmt5->execute(array());
$userRow5=$stmt5->fetchAll(PDO::FETCH_ASSOC);


$stmt6 = $auth_user->runQuery("SELECT fullname AS fullname,
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
$stmt6->execute(array());
$userRow6=$stmt6->fetchAll(PDO::FETCH_ASSOC);


$stmt7 = $auth_user->runQuery("SELECT fullname AS fullname,
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


$stmt8 = $auth_user->runQuery("SELECT itemname AS itemname,
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
GROUP BY itemname
ORDER BY avg__finalgrade DESC");
$stmt8->execute(array());
$userRow8=$stmt8->fetchAll(PDO::FETCH_ASSOC);
//-------------------STUDENT PROFILE--------------------------

$stmt9 = $auth_user->runQuery("SELECT `Class` AS `Class`,
       `Admission_No` AS `Admission_No`,
       `Student_name` AS `Student_name`,
       `DOB` AS `DOB`,
       `Fathers_name` AS `Fathers_name`,
       `Mothers_name` AS `Mothers_name`,
       `Contact_No` AS `Contact_No`,
       `Address` AS `Address`
FROM
  (select cc.name,
          c.fullname as Class ,
          u.firstname as Student_name,
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
   join bitnami_moodle.mdl_course c on cc.id = c.category
   join bitnami_moodle.mdl_attendance a on a.course = c.id
   join bitnami_moodle.mdl_context ctx on a.course = ctx.instanceid
   join bitnami_moodle.mdl_role_assignments ra on ctx.id = ra.contextid
   join bitnami_moodle.mdl_user_info_data ui on ra.userid = ui.userid
   join bitnami_moodle.mdl_user u on ui.userid = u.id
   join bitnami_moodle.mdl_user_info_field uf on uf.id = ui.fieldid
   where cc.id = '16'
     and ra.roleid = '5'
     and u.username='".$username."'

     and uf.name not in ('clientid',
                         'classn')
     and a.course not in('632')
   group by u.firstname) AS expr_qry
WHERE `DOB` >= '1917-09-24 11:14:06'
  AND `DOB` <= '2017-09-24 11:14:06'
GROUP BY `Class`,
         `Admission_No`,
         `Student_name`,
         `DOB`,
         `Fathers_name`,
         `Mothers_name`,
         `Contact_No`,
         `Address`
ORDER BY COUNT(*) DESC");
$stmt9->execute(array());
$userRow9=$stmt9->fetchAll(PDO::FETCH_ASSOC);
//----------------STUDENT DASH TEACHER INFO -----------------------
$stmt10 = $auth_user->runQuery("SELECT `Teachername` AS `Teachername`,
       `Class` AS `Class`,
       `Subject` AS `Subject`,
       `Phone` AS `Phone`
FROM
  (SELECT *
   FROM test.lfps_teacher) AS expr_qry
GROUP BY `Teachername`,
         `Class`,
         `Subject`,
         `Phone`
ORDER BY COUNT(*) DESC");
$stmt10->execute(array());
$userRow10=$stmt10->fetchAll(PDO::FETCH_ASSOC);
//------------------------------TEACHER STUDENT INFO------------------------
$today=date("m-d");
$stmt11 = $auth_user->runQuery("SELECT `Class` AS `Class`,
       `Admission_No` AS `Admission_No`,
       `Student_name` AS `Student_name`,
       `DOB` AS `DOB`,
       `Fathers_name` AS `Fathers_name`,
       `Mothers_name` AS `Mothers_name`,
       `Contact_No` AS `Contact_No`,
       `Address` AS `Address`
FROM
  (select cc.name,
          c.fullname as Class ,
          u.firstname as Student_name,
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
   join bitnami_moodle.mdl_course c on cc.id = c.category
   join bitnami_moodle.mdl_attendance a on a.course = c.id
   join bitnami_moodle.mdl_context ctx on a.course = ctx.instanceid
   join bitnami_moodle.mdl_role_assignments ra on ctx.id = ra.contextid
   join bitnami_moodle.mdl_user_info_data ui on ra.userid = ui.userid
   join bitnami_moodle.mdl_user u on ui.userid = u.id
   join bitnami_moodle.mdl_user_info_field uf on uf.id = ui.fieldid
   where cc.id = '16'
     and ra.roleid = '5'
     and uf.name not in ('clientid',
                         'classn')
     and a.course not in('632')
   group by u.firstname) AS expr_qry
WHERE `DOB` LIKE '%".$today."'
GROUP BY `Class`,
         `Admission_No`,
         `Student_name`,
         `DOB`,
         `Fathers_name`,
         `Mothers_name`,
         `Contact_No`,
         `Address`
ORDER BY COUNT(*) DESC");
$stmt11->execute(array());
$userRow11=$stmt11->fetchAll(PDO::FETCH_ASSOC);


?>