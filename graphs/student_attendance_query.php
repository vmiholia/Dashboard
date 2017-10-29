<?php
$username = "root"; 
$password = "m9YhAP0DLQRi";   
$host = "52.26.225.238";
$database="bitnami_moodle";

$date= date('Y-m-d H:i:s');
$yesterday=date('Y-m-d H:i:s',strtotime("-1 day"));

$server = mysql_connect($host, $username, $password);
$connection = mysql_select_db($database, $server);

if(isset($_GET['classes']))
{
  $classes=$_GET['classes'];
  $date=$_GET['dates'];
  $status=$_GET['status'];
  $myquery = "SELECT firstname AS firstname,
       `Admission_No` AS `Admission_No`,
       class AS class,
                `Status` AS `Status`,
                `Fathers_name` AS `Fathers_name`,
                `Mothers_name` AS `Mothers_name`,
                `Contact_No` AS `Contact_No`,
                `Date` AS `Date`
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
WHERE `DOB` >= '1917-10-02 08:45:48'
  AND `DOB` <= '2017-10-02 08:45:48'
  AND (Date = '".$date."')";
if($classes=='All' && $status=='All'){
    
}
else if($classes!='All' && $status=='All')
{
    $myquery=$myquery." AND (class = 'Class ".$classes."')";
}
else if($status!='All' && $classes=='All'){

    $myquery=$myquery." AND (Status = '".$status."')";

}
else if($status!='All' && $classes!='All')
{
    $myquery=$myquery." AND (class = 'Class ".$classes."') and ( Status = '".$status."')";
}
$myquery=$myquery."  GROUP BY firstname,
         `Admission_No`,
         class,
         `Status`,
         `Fathers_name`,
         `Mothers_name`,
         `Contact_No`,
         `Date`
ORDER BY COUNT(*) DESC";
}

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