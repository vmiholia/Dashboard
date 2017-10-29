<?php
session_start();
    $username = "root"; 
    $password = "m9YhAP0DLQRi";   
    $host = "34.212.87.72";
    $database="bitnami_moodle";
    
    $server = mysql_connect($host, $username, $password);
    $connection = mysql_select_db($database, $server);
$username2 = $_SESSION['username'];
    $myquery = "SELECT substring_index(substring_index(from_unixtime(al.timetaken), ' ',2),' ',1) as Date,CASE WHEN ats.acronym like 'P%%'
 then '1' 
 WHEN ats.acronym like 'A%%'
 then '2'  END AS attendance_value from bitnami_moodle.mdl_course_categories cc
join bitnami_moodle.mdl_course c on cc.id=c.category
join bitnami_moodle.mdl_attendance a on a.course=c.id
join bitnami_moodle.mdl_context ctx on a.course = ctx.instanceid 
join bitnami_moodle.mdl_role_assignments ra on ctx.id = ra.contextid
join bitnami_moodle.mdl_attendance_log al on al.studentid=ra.userid 
join bitnami_moodle.mdl_user u on u.id = al.studentid
join bitnami_moodle.mdl_attendance_statuses ats on ats.id = al.statusid
 where u.username='".$username2."' and cc.id = '16' and a.id not in('69','68','67','43', '65') and ra.roleid ='5'
 group by u.firstname, date ORDER by date DESC";
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