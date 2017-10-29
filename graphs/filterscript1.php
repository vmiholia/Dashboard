<?php

$username = "root"; 
$password = "m9YhAP0DLQRi";   
$host = "52.26.225.238";
$database="bitnami_moodle";

$server = mysql_connect($host, $username, $password);
$connection = mysql_select_db($database, $server);
if(isset($_GET['classes']))
{
	$classs = $_GET['classes'];
	$myquery ="SELECT 
		distinct(u.firstname) as Student_Name,u.id
		from bitnami_moodle.mdl_course_categories cc
		join bitnami_moodle.mdl_course c on c.category = cc.id
		join bitnami_moodle.mdl_context ctx on  ctx.instanceid = c.id
		join bitnami_moodle.mdl_role_assignments ra on  ra.contextid = ctx.id
		join bitnami_moodle.mdl_user u on  u.id = ra.userid

		where  cc.id = '16' AND ra.roleid = '5' and c.fullname LIKE '%%".$classs."' and c.fullname NOT in('Little Flowers' , 
			'Class KG B', 'Class KG C', 'Class 1 A', 'Class 1 B', 'Class 1 C'
			, 'Class 2 A', 'Class 2 B', 'Class 2 C', 'Class 3 A', 'Class 3 B', 'Class 3 C'
			, 'Class 4 A', 'Class 4 B', 'Class 4 C', 'Class 5 A', 'Class 5 B', 'Class 5 C', 'Class 6 A'
			, 'Class 6 B', 'Class 6 C', 'Class 7 A', 'Class 7 B', 'Class 7 C', 'Class 8 A', 'Class 8 B'
			, 'Class 8 C')";
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
}
?>