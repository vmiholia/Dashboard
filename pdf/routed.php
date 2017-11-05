<?php
$username = "root"; 
$password = "m9YhAP0DLQRi";   
$host = "52.26.225.238";
$database="bitnami_moodle";
$Class=$_GET['Class'];//"4 A";s
$server = mysql_connect($host, $username, $password);
$connection = mysql_select_db($database, $server);

$Adm_No=$_POST["adm"];
//echo $Adm_No;
$q2="select Class from bitnami_moodle.attnd WHERE admno='".$Adm_No."'";

$r2= mysql_query($q2);
if (false === $r2) {
  echo mysql_error();
}
$ro1=mysql_fetch_array($r2);
$class=$ro1["Class"];

if((substr($class,0,1) == '1')||(substr($class,0,1) == '2' ))
	header("location:12a.php?Class=$class&Adm_No=$Adm_No");
else if((substr($class,0,1) == '3')||(substr($class,0,1) == '4' ) )
	header("location:35a.php?Class=$class&Adm_No=$Adm_No");
else if((substr($class,0,1) == '6')||(substr($class,0,1) == '7' )||(substr($class,0,1) == '8'))
	header("location:68a.php?Class=$class&Adm_No=$Adm_No");
else if((substr($class,0,1) == '5'))
	header("location:5a.php?Class=$class&Adm_No=$Adm_No");


?>
