<?php
    $username = "root"; 
    $password = "m9YhAP0DLQRi";   
   $host = "52.26.225.238";
    $database="bitnami_moodle";
    
    $server = mysql_connect($host, $username, $password);
    $connection = mysql_select_db($database, $server);
    $myquery = "SELECT fullname AS fullname,
       firstname AS firstname,
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
WHERE (itemname = 'endterm')
GROUP BY fullname,
         firstname
ORDER BY avg__finalgrade DESC
";
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