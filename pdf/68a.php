<?php
$username = "root"; 
$password = "m9YhAP0DLQRi";   
$host = "52.26.225.238";
$database="bitnami_moodle";
$Class=$_GET['Class'];//"4 A"; 
echo $Class;
$Admission_No=$_GET['Adm_No'];
echo $Admission_No;
$count=1;
//ini_set('max_execution_time', 3000);

if(substr($Class,0,1)=='6' ||substr($Class,0,1)=='7' || substr($Class,0,1)=='8')	
{
}
else {
	header("location: ../graphs/overall_performance.php");

}


$server = mysql_connect($host, $username, $password);
$connection = mysql_select_db($database, $server);

require('http://34.237.224.144/Dashboard/fpdf/fpdf.php');

class PDF extends FPDF{

function BuildTable($count,$basic_info,$other_info,$marks,$marks2,$Admission_No,$class) {
	$q2="select ROLLNO,attendance,Discipline,Work_Education,Art_Education,Health_and_Physical_Education,Remarks,Participation_in from LFPS68FINALD WHERE Class='".$class."' AND admno='".$Admission_No."'";

$r2= mysql_query($q2);
if (false === $r2) {
  echo mysql_error();
}
$ro1=mysql_fetch_array($r2);
        //Colors, line width and bold font
		$pageWidth = 205;
		$pageHeight = 277;
		$margin =4;
		
		$this->Rect( $margin-1, $margin-1 , $pageWidth - $margin +2 , $pageHeight+2 - $margin);
		$this->Rect( $margin, $margin , $pageWidth - $margin , $pageHeight - $margin);
		$image1 = "logo.jpeg"; 	$image2="image.jpg";

		$this->SetTextColor(0,0,0);
		$this->SetFont('Times','B',14);
		$this->Image($image1,8,8,23.78);
		
		$this->Cell(0,6,'LITTLE FLOWERS PUBLIC SCHOOL',0,1,'C');
		$this->SetFont('Times','B',11);
		$this->Cell(0,6,'Vijay Park (Near C-11), Yamuna Vihar, Delhi-110053  ',0,1,'C');
		$this->Cell(0,6,'Telephone: 011-22919858, 011-22919242',0,1,'C');
		
		$this->Cell(0,6,'Website : www.lfpsyv.in, Email: yvlfps@gmail.com ',0,1,'C');
		$this->SetDrawColor(0, 0, 255);
		$this->SetLineWidth(.2);
		$this->SetMargins(4,0,4);
		$this->SetTextColor(0);
		$this->SetFillColor(255);
		$this->SetDrawColor(0,0,0);
		$this->SetLineWidth(.3);
		$this->SetFont('','B',12);
		$today = date("F j, Y");
		$this->Cell(1,1,'',0,1,'L',1);
		$this->SetFillColor(120);
		$this->Cell(201,8,'TERM 1 PROGRESS REPORT - SESSION 2017-2018','LTBR',1,'C',1);

$this->SetFont('Helvetica','B',9);


		$this->SetFillColor(255);
		$this->Cell(36,8,'Student Name :','LT',0,'L',1);
		$this->Cell(55,8,$basic_info[0],'T',0,'L',1);
		$this->Cell(26,8,'Adm No. :','T',0,'L',1);
		$this->Cell(30,8,$basic_info[6],'T',0,'T',1);
		$this->Cell(25,8,'Class :','T',0,'L',1);
		$this->Cell(28,8,$basic_info[4],'T',1,'RT',1);
		
		$this->Cell(36,8,"Father's Name :",'L',0,'L',1);
		$this->Cell(55,8,$basic_info[1],0,0,'L',1);
		$this->Cell(26,8,'Date Of Birth :',0,0,'L',1);
		$string=$basic_info[3];
		$year=substr($string,0,4);
		$month=substr($string,5,2);
		$date=substr($string,8,2);
		$ans=$date.'-'.$month.'-'.$year;
		
		$this->Cell(30,8,$ans,0,0,'L',1);	
		$this->Cell(25,8,'Section :',0,0,'L',1);
		$this->Cell(28,8,$basic_info[5],0,1,'TR',1);

		$this->Cell(36,8,"Mother's Name :",'L',0,'L',1);
		$this->Cell(55,8,$basic_info[2],0,0,'L',1);
		$this->Cell(26,8,'Roll No. :',0,0,'L',1);
		$this->Cell(30,8,$ro1["ROLLNO"],0,0,'L',1);		
		$this->Cell(25,8,'Attendance :',0,0,'L',1);
		$this->Cell(28,8,$ro1["attendance"],0,1,"L",1);

		$this->SetFontSize(10);

		$this->Cell(40,8,'Scholastic Areas:','LTR',0,'C',1);
		$this->Cell(161,8,'TERM I','LTBR',1,'C',1);

		$this->SetFontSize(9.5);

		$this->Cell(40,5,'Sub Name','LTR',0,'C',1);
		$this->Cell(27,5,'Periodic Test','LTR',0,'C',1);
		$this->Cell(27,5,'Note Book','LTR',0,'C',1);
		$this->Cell(27,5,'Sub Enrichment','LTR',0,'C',1);
		$this->Cell(27,5,'Mid Term Exam','TLR',0,'C',1);
		$this->Cell(27,5,'Marks Obtained','TLR',0,'C',1);
		$this->Cell(26,5,'Grade','LTR',1,'C',1);
		$this->SetFontSize(9);
		$this->Cell(40,3,'','LR',0,'C',1);

		$this->Cell(27,3,'(10)','LBR',0,'C',1);
		$this->Cell(27,3,'(5)','LBR',0,'C',1);
		$this->Cell(27,3,'(5)','LBR',0,'C',1);
		$this->Cell(27,3,'(80)','LBR',0,'C',1);
		$this->Cell(27,3,'(100)','LBR',0,'C',1);
		$this->Cell(26,3,'','LBR',1,'C',1);

		$q3 = "select * from  LFPSREPORTCARD68GS WHERE Class='".$class."' AND Subject = 'English' AND Adm_No='".$Admission_No."'  order by Student_Name;";

$r3 = mysql_query($q3);
if (false === $r3) {
  echo mysql_error();
}
$row1=mysql_fetch_array($r3);

$q4 = "select * from  LFPSREPORTCARD68GS WHERE Class='".$class."' AND Subject = 'Hindi' AND Adm_No='".$Admission_No."'  order by Student_Name;";

$r4 = mysql_query($q4);
if (false === $r4) {
  echo mysql_error();
}
$row2=mysql_fetch_array($r4);

$q5 = "select * from  LFPSREPORTCARD68GS WHERE Class='".$class."' AND Subject = 'Maths' AND Adm_No='".$Admission_No."'  order by Student_Name;";

$r5 = mysql_query($q5);
if (false === $r5) {
  echo mysql_error();
}
$row3=mysql_fetch_array($r5);

$q6 = "select * from  LFPSREPORTCARD68GS WHERE Class='".$class."' AND Subject = 'Sanskrit' AND Adm_No='".$Admission_No."'  order by Student_Name;";

$r6 = mysql_query($q6);
if (false === $r6) {
  echo mysql_error();
}
$row4=mysql_fetch_array($r6);

$q7 = "select * from  LFPSREPORTCARD68GS WHERE Class='".$class."' AND Subject = 'Science' AND Adm_No='".$Admission_No."'  order by Student_Name;";

$r7 = mysql_query($q7);
if (false === $r7) {
  echo mysql_error();
}
$row5=mysql_fetch_array($r7);

$q8 = "select * from  LFPSREPORTCARD68GS WHERE Class='".$class."' AND Subject = 'Social Studies' AND Adm_No='".$Admission_No."'  order by Student_Name;";

$r8 = mysql_query($q8);
if (false === $r8) {
  echo mysql_error();
}
$row6=mysql_fetch_array($r8);

$q9 = "select * from  LFPSREPORTCARD68GS WHERE Class='".$class."' AND Subject = 'GK' AND Adm_No='".$Admission_No."'  order by Student_Name;";

$r9 = mysql_query($q9);
if (false === $r9) {
  echo mysql_error();
}
$row7=mysql_fetch_array($r9);

$q10 = "select * from  LFPSREPORTCARD68GS WHERE Class='".$class."' AND Subject = 'Drawing' AND Adm_No='".$Admission_No."'  order by Student_Name;";

$r10 = mysql_query($q10);
if (false === $r10) {
  echo mysql_error();
}
$row8=mysql_fetch_array($r10);

$q11 = "select * from  LFPSREPORTCARD68GS WHERE Class='".$class."' AND Subject = 'Computer' AND Adm_No='".$Admission_No."'  order by Student_Name;";

$r11 = mysql_query($q11);
if (false === $r11) {
  echo mysql_error();
}
$row9=mysql_fetch_array($r11);

if($row1["GRADE"]=='E(Needs Improvement)')
$row1["GRADE"]='E';
if($row2["GRADE"]=='E(Needs Improvement)')
$row2["GRADE"]='E';
if($row3["GRADE"]=='E(Needs Improvement)')
$row3["GRADE"]='E';
if($row4["GRADE"]=='E(Needs Improvement)')
$row4["GRADE"]='E';
if($row5["GRADE"]=='E(Needs Improvement)')
$row5["GRADE"]='E';
if($row6["GRADE"]=='E(Needs Improvement)')
$row6["GRADE"]='E';
if($row7["GRADE"]=='E(Needs Improvement)')
$row7["GRADE"]='E';
if($row8["GRADE"]=='E(Needs Improvement)')
$row8["GRADE"]='E';
if($row9["GRADE"]=='E(Needs Improvement)')
$row9["GRADE"]='E';

$this->SetFontSize(10);
		
	$this->Cell(40,6,'ENGLISH','LTBR',0,'C',1);
		$this->Cell(27,6,round($row1["PT"]),'LTBR',0,'C',1);
		$this->Cell(27,6,round($row1["NS_1"]),'LBTR',0,'C',1);
		$this->Cell(27,6,round($row1["SEA_1"]),'LBTR',0,'C',1);
		$this->Cell(27,6,round($row1["Half_Yearly"]),'LBTR',0,'C',1);
		$this->Cell(27,6,$row1["PT"]+$row1["NS_1"]+$row1["SEA_1"]+$row1["Half_Yearly"],'LBTR',0,'C',1);
		$this->Cell(26,6,$row1["GRADE"],'LBTR',1,'C',1);

		$this->Cell(40,6,'HINDI','LTBR',0,'C',1);
		$this->Cell(27,6,round($row2["PT"]),'LTBR',0,'C',1);
		$this->Cell(27,6,round($row2["NS_1"]),'LBTR',0,'C',1);
		$this->Cell(27,6,round($row2["SEA_1"]),'LBTR',0,'C',1);
		$this->Cell(27,6,round($row2["Half_Yearly"]),'LBTR',0,'C',1);
		$this->Cell(27,6,$row2["PT"]+$row2["NS_1"]+$row2["SEA_1"]+$row2["Half_Yearly"],'LBTR',0,'C',1);
		$this->Cell(26,6,$row2["GRADE"],'LBTR',1,'C',1);

		$this->Cell(40,6,'MATHEMATICS','LTBR',0,'C',1);
		$this->Cell(27,6,round($row3["PT"]),'LTBR',0,'C',1);
		$this->Cell(27,6,round($row3["NS_1"]),'LBTR',0,'C',1);
		$this->Cell(27,6,round($row3["SEA_1"]),'LBTR',0,'C',1);
		$this->Cell(27,6,round($row3["Half_Yearly"]),'LBTR',0,'C',1);
		$this->Cell(27,6,$row3["PT"]+$row3["NS_1"]+$row3["SEA_1"]+$row3["Half_Yearly"],'LBTR',0,'C',1);
		$this->Cell(26,6,$row3["GRADE"],'LBTR',1,'C',1);

		$this->Cell(40,6,'SANSKRIT','LTBR',0,'C',1);
		$this->Cell(27,6,round($row4["PT"]),'LTBR',0,'C',1);
		$this->Cell(27,6,round($row4["NS_1"]),'LBTR',0,'C',1);
		$this->Cell(27,6,round($row4["SEA_1"]),'LBTR',0,'C',1);
		$this->Cell(27,6,round($row4["Half_Yearly"]),'LBTR',0,'C',1);
		$this->Cell(27,6,$row4["PT"]+$row4["NS_1"]+$row4["SEA_1"]+$row4["Half_Yearly"],'LBTR',0,'C',1);
		$this->Cell(26,6,$row4["GRADE"],'LBTR',1,'C',1);


		$this->Cell(40,6,'SCIENCE','LTBR',0,'C',1);
		$this->Cell(27,6,round($row5["PT"]),'LTBR',0,'C',1);
		$this->Cell(27,6,round($row5["NS_1"]),'LBTR',0,'C',1);
		$this->Cell(27,6,round($row5["SEA_1"]),'LBTR',0,'C',1);
		$this->Cell(27,6,round($row5["Half_Yearly"]),'LBTR',0,'C',1);
		$this->Cell(27,6,$row5["PT"]+$row5["NS_1"]+$row5["SEA_1"]+$row5["Half_Yearly"],'LBTR',0,'C',1);
		$this->Cell(26,6,$row5["GRADE"],'LBTR',1,'C',1);
	
	
		$this->Cell(40,6,'SOCIAL SCIENCE','LTBR',0,'C',1);
		$this->Cell(27,6,round($row6["PT"]),'LTBR',0,'C',1);
		$this->Cell(27,6,round($row6["NS_1"]),'LBTR',0,'C',1);
		$this->Cell(27,6,round($row6["SEA_1"]),'LBTR',0,'C',1);
		$this->Cell(27,6,round($row6["Half_Yearly"]),'LBTR',0,'C',1);
		$this->Cell(27,6,$row6["PT"]+$row6["NS_1"]+$row6["SEA_1"]+$row6["Half_Yearly"],'LBTR',0,'C',1);
		$this->Cell(26,6,$row6["GRADE"],'LBTR',1,'C',1);

		$this->Cell(201,6,'','LTBR',1,'C',1);
		
		
		$this->Cell(165,8,'Scholastic Areas :  ','LBTR',0,'C',1);
		$this->Cell(36,8,'Grade','BLTR',1,'C',1);

		$this->Cell(165,6,'GK','LBTR',0,'L',1);
		$this->Cell(36,6,$row7["GRADE"],'BLTR',1,'C',1);

		$this->Cell(165,6,'DRAWING','LBTR',0,'L',1);
		$this->Cell(36,6,$row8["GRADE"],'BLTR',1,'C',1);

		$this->Cell(165,6,'COMPUTER','LBTR',0,'L',1);
		$this->Cell(36,6,$row9["GRADE"],'BLTR',1,'C',1);
		
		$this->Cell(201,6,'','LTBR',1,'C',1);
		
		
		$this->Cell(165,8,'Co-Scholastic Areas : Term-I [on a 3-point(A-C)Grading Scale]  ','LBTR',0,'C',1);
		$this->Cell(36,8,'Grade','BLTR',1,'C',1);
		
		$this->Cell(165,6,'Work Education or Pre-vocational Education','LBTR',0,'L',1);
			$this->Cell(36,6,$ro1["Work_Education"],'BLTR',1,'C',1);

			$this->Cell(165,6,'Art Education','LBTR',0,'L',1);
			$this->Cell(36,6,$ro1["Art_Education"],'BLTR',1,'C',1);

			$this->Cell(165,6,'Health and Physical Education','LBTR',0,'L',1);
			$this->Cell(36,6,$ro1["Health_and_Physical_Education"],'BLTR',1,'C',1);
			
			
			$this->Cell(165,8,'Discipline : Term-I [on a 3-point(A-C)Grading Scale]  ','LBTR',0,'C',1);
			$this->Cell(36,8,'','BLTR',1,'C',1);
			
			$this->Cell(165,6,'Discipline','LBTR',0,'L',1);
			$this->Cell(36,6,$ro1["Discipline"],'BLTR',1,'C',1);
			
			$this->SetMargins(6,0,6);
			$this->ln(4);
			$this->Cell(195,12,'Participation in:'.$ro1["Participation_in"],'LTBR',1,'L',1);
			$this->ln(4);
			$this->Cell(195,12,'Remarks :'.$ro1["Remarks"],'LTBR',1,'L',1);

			$this->Cell(63,8,'Date : '.$today,'T',0,'L',1);
			$this->ln(30);
			$this->Cell(85,8,"Teacher's Sign ",0,0,'L',1);
			$this->Cell(85,8,"Parent's Sign",0,0,'L',1);
			$this->Cell(10,8,"Headmistress",0,0,'L',1);
		}
	}
	

/*
	$pdf = new PDF();
	$pdf->AliasNbPages();

//$pdf->Image('header.jpg');

	
	$stmt4 = ("SELECT `Class` AS `Class`,
		`Admission_No` AS `Admission_No`,
		`Student_name` AS `Student_name`,
		`DOB` AS `DOB`,
		`Fathers_name` AS `Fathers_name`,
		`Mothers_name` AS `Mothers_name`,
		`Contact_No` AS `Contact_No`,
		`Address` AS `Address`,
		`uid` AS `uid`
		FROM
		(select cc.name,
			c.fullname as Class ,
			u.firstname as Student_name,
			u.address as Address,
			u.phone1 as Contact_No,
			ui.fieldid,
			uf.name as Field,
			u.id as uid,
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
group by c.fullname,u.firstname) AS expr_qry
WHERE `DOB` >= '1917-09-16 16:49:45'
AND `DOB` <= '2017-09-16 16:49:45'
And `Class` = 'Class ".$Class."'
GROUP BY `Class`,
`Admission_No`,
`Student_name`,
`DOB`,
`Fathers_name`,
`Mothers_name`,
`Contact_No`,
`Address`
ORDER BY COUNT(*) DESC");
//echo $Class;
$basic = mysql_query($stmt4);
if (false === $basic) {
	echo mysql_error();
}
$cname=$_GET['Class'];//"4 A";
$Class=$cname;
$zip = new ZipArchive();
$zip_name = $cname.".zip"; // Zip name

	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$row = mysql_fetch_array($basic);
	$Student_name=strtoupper($row['Student_name']);
	$Fathers_name=strtoupper($row['Fathers_name']);
	$Mothers_name=strtoupper($row['Mothers_name']);
	$Class_no=substr($row['Class'],6,2);
	$Section=substr($row['Class'],-1,1);
	$DOB=$row['DOB'];
	$uid=$row['uid'];
	//$Admission_No=$row['Admission_No'];
	$basic_info=array($Student_name,$Fathers_name,$Mothers_name,$DOB,$Class_no,$Section,$Admission_No);
	include('queries.php');

	$pdf->BuildTable($count,$basic_info,$other_info,$marks,$marks2,$Admission_No,$Class);

	$name=$Student_name.".pdf";
	$cname=$Class.$Section;
	$pdf->Output('files/'.$name,"F");
	$myfile2 = fopen('files/'.$name, "r") or die("Unable to open file!");
	fclose($myfile2);
	$pdf->Output();
*/
?>
