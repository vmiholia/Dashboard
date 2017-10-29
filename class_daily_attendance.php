<?php
    $username = "root"; 
    $password = "m9YhAP0DLQRi";   
    $host = "52.26.225.238";
    $database="bitnami_moodle";
date_default_timezone_set('Asia/Kolkata');
    
     $date= date('Y-m-d H:i:s');
     $yesterday=date('Y-m-d H:i:s',strtotime("-1 day"));

    $server = mysql_connect($host, $username, $password);
    $connection = mysql_select_db($database, $server);
    $myquery = "SELECT class AS classs,
                sum(Present) AS `sum__Present`,
                sum(Absent) AS `sum__Absent`,
                sum(Late) AS `sum__Late`,
                sum(Excuse) AS `sum__Excuse`
FROM
  (select cc.name as School_Name,
          c.fullname as class,
          substring_index(from_unixtime(al.timetaken), '  ',1) as dt,
          substring_index(substring_index(from_unixtime(al.timetaken), ' ',2),' ',1) as Date,
          count(CASE
                    WHEN ats.acronym = 'p' then 1
                end) as Present ,
          count(CASE
                    WHEN ats.acronym = 'a' then 1
                END) as Absent,
          count(CASE
                    WHEN ats.acronym = 'L' then 1
                END) as Late,
          count(CASE
                    WHEN ats.acronym = 'e' then 1
                END) as Excuse
   from bitnami_moodle.mdl_course_categories cc
   join bitnami_moodle.mdl_course c on cc.id=c.category
   join bitnami_moodle.mdl_attendance a on a.course=c.id
   join bitnami_moodle.mdl_context ctx on a.course = ctx.instanceid
   join bitnami_moodle.mdl_role_assignments ra on ctx.id = ra.contextid
   join bitnami_moodle.mdl_attendance_log al on al.studentid=ra.userid
   join bitnami_moodle.mdl_user u on u.id = al.studentid
   join bitnami_moodle.mdl_attendance_statuses ats on ats.id = al.statusid
   where cc.id = '16'
     and a.id not in('69',
                     '68',
                     '67',
                     '43',
                     '65')
     and ra.roleid ='5'
   group by c.fullname,
            from_unixtime(al.timetaken)) AS expr_qry
WHERE `Date` >= '".$yesterday."'
  AND `Date` <= '".$date."'
GROUP BY class
ORDER BY `sum__Present` DESC";
    $query = mysql_query($myquery);
    
    if ( ! $query ) {
        echo mysql_error();
        die;
    }
    
    $data = array();
    for ($x = 0; $x < mysql_num_rows($query); $x++) {
        $data[] = mysql_fetch_assoc($query);
    }
    mysql_close($server);
    
    echo json_encode($data);     
     
?>