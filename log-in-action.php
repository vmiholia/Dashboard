<?php
$username = "root"; 
$password = "m9YhAP0DLQRi";   
$host = "52.26.225.238";
$database="bitnami_moodle";
$server = mysql_connect($host, $username, $password);
$connection = mysql_select_db($database, $server);
$username=$_POST["username"];
$pass=$_POST["password"];
$q2="select Admission_No,password from info WHERE username='".$username."'";
$r2= mysql_query($q2);
if (false === $r2) {
  echo "Wrong username!";
}
else
{
$ro1=mysql_fetch_array($r2);
$pass1=$ro1["password"];
if (!(password_verify($pass,$pass1)))
echo "Wrong Password !";
else
{    
	$admno=$ro1["Admission_No"];
	include ("../pdf/routed-1.php?adm=$admno");
}
}

?>