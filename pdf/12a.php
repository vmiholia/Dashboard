<?php
require('..\fpdf\fpdf.php');
$username = "root"; 
$password = "m9YhAP0DLQRi";   
$host = "52.26.225.238";
$database="bitnami_moodle";
$Class=$_GET['Class'];
$Admission_No=$_GET['Adm_No'];
//"4 A";s
$server = mysql_connect($host, $username, $password);
$connection = mysql_select_db($database, $server);
ini_set('max_execution_time', 3000);
//echo "i am here";
class PDF extends FPDF{
	function Header()
	{
		
	}
	function Footer(){
		
  //  $this->SetFont('Arial','I',8);
    //Page number
   // $this->Cell(0,16,'Page '.$this->PageNo().'/{nb}',0,0,'R');

	}
	function BuildTable($count,$basic_info,$other_info,$marks,$marks2,$Admission_No,$class) {

$q2="select rn,Attendance from bitnami_moodle.attnd WHERE Class='".$class."' AND admno='".$Admission_No."'";

$r2= mysql_query($q2);
if (false === $r2) {
  echo mysql_error();
}
$ro1=mysql_fetch_array($r2);


$qa="select feedback from gr12 WHERE admno='".$Admission_No."'";
$ra= mysql_query($qa);
if (false === $ra) {
  echo mysql_error();
}
$roa=mysql_fetch_array($ra);

$qb="select feedback from sp12 WHERE admno='".$Admission_No."'";
$rb= mysql_query($qb);
if (false === $rb) {
  echo mysql_error();
}
$rob=mysql_fetch_array($rb);

		
		$pageWidth = 205;
		$pageHeight = 277;
		
		$image1 = "logo.jpeg";
		$image2="boy.png";

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
		$this->SetFillColor(180);
		$this->ln(5);
		$this->Cell(201,8,'SCHOOL BASED EVALUATION - SESSION 2017-2018','LTBR',1,'C',1);
		$this->SetFont('Times','B',9);
		$this->SetFillColor(255);
		$this->SetTextColor(0);

		$this->Cell(30,8,'Student Name :','T',0,'L',1);
		$this->Cell(55,8,$basic_info[0],'T',0,'L',1);
		$this->Cell(26,8,'Adm No. :','T',0,'L',1);
		$this->Cell(35,8,$basic_info[6],'T',0,'T',1);
		$this->Cell(25,8,'Class :','T',0,'L',1);
		$this->Cell(30,8,$basic_info[4],'T',1,'RT',1);
		
		$this->Cell(30,8,"Father's Name :",'',0,'L',1);
		$this->Cell(55,8,$basic_info[1],0,0,'L',1);
		$this->Cell(26,8,'Date Of Birth :',0,0,'L',1);
		$string=$basic_info[3];
		$year=substr($string,0,4);
		$month=substr($string,5,2);
		$date=substr($string,8,2);
		$ans=$date.'-'.$month.'-'.$year;
		$this->Cell(35,8,$ans,0,0,'L',1);		
		$this->Cell(25,8,'Section :',0,0,'L',1);
		$this->Cell(34,8,$basic_info[5],0,1,'TR',1);

		$this->Cell(30,8,"Mother's Name :",'',0,'L',1);
		$this->Cell(55,8,$basic_info[2],0,0,'L',1);
		$this->Cell(26,8,'Roll No. :',0,0,'L',1);
		$this->Cell(35,8,$ro1["rn"],0,0,'L',1);		
		$this->Cell(25,8,'Attendance :',0,0,'L',1);
		$this->Cell(34,8,$ro1["Attendance"],0,1,"L",1);
$this->ln(5);
		$this->SetFont('','B',12);
		$this->SetFillColor(80);
		$this->SetTextColor(255);
		$this->Cell(201,7,'EVALUATION 1','LTBR',1,'C',1);
		$this->Cell(103,7,'ENGLISH','LTBR',0,'L',1);
		$this->Cell(49,7,'PT-I','LTBR',0,'C',1);
		$this->Cell(49,7,'PT-II','LTBR',1,'C',1);
		$this->SetFont('','B',10);
		$this->SetFillColor(255);
		$this->SetTextColor(0);

//itemname 

$query1="select * from little12 WHERE Class='".$class."' AND Subject = 'English' AND admno='".$Admission_No."'  AND description='READING SKILLS - PRONUNCIATION & FLUENCY' order by Student_Name;";
$query2="select * from little12 WHERE Class='".$class."' AND Subject = 'English' AND admno='".$Admission_No."'  AND  description='READING SKILLS - COMPREHENSION' Order by Student_Name;";
$query3="select * from little12 WHERE Class='".$class."' AND Subject = 'English' AND admno='".$Admission_No."'  AND  description='WRITING SKILLS - LITERATURE' order by Student_Name;";
$query4="select * from little12 WHERE Class='".$class."' AND Subject = 'English' AND admno='".$Admission_No."'  AND  description='WRITING SKILLS - GRAMMAR' order by Student_Name;";
$query5="select * from little12 WHERE Class='".$class."' AND Subject = 'English' AND admno='".$Admission_No."'  AND  description='WRITING SKILLS - DICTIONARY/VOCABULARY' order by Student_Name;";
$query6="select * from little12 WHERE Class='".$class."' AND Subject = 'English' AND admno='".$Admission_No."'  AND  description='WRITING SKILLS - HAND WRITING & ASSIGNMENTS' order by Student_Name;";
$query7="select * from little12 WHERE Class='".$class."' AND Subject = 'English' AND admno='".$Admission_No."'  AND  description='SPEAKING SKILLS - RECITATION/STORY TELLING'  order by Student_Name;";
$query8="select * from little12 WHERE Class='".$class."' AND Subject = 'English' AND admno='".$Admission_No."'  AND  description='SPEAKING SKILLS - CONVERSATION'  order by Student_Name;";
$query9="select * from little12 WHERE Class='".$class."' AND Subject = 'English' AND admno='".$Admission_No."'  AND  description='LISTENING SKILLS - COMPREHENSION' order by Student_Name;";


$query10="select * from little12 WHERE Class='".$class."' AND Subject = 'Hindi' AND admno='".$Admission_No."'  AND  description='READING SKILLS - PRONUNCIATION & FLUENCY' order by Student_Name;";
$query11="select * from little12 WHERE Class='".$class."' AND Subject = 'Hindi' AND admno='".$Admission_No."'  AND  description='READING SKILLS - COMPREHENSION' Order by Student_Name;";
$query12="select * from little12 WHERE Class='".$class."' AND Subject = 'Hindi' AND admno='".$Admission_No."'  AND  description='WRITING SKILLS - LITERATURE' order by Student_Name;";
$query13="select * from little12 WHERE Class='".$class."' AND Subject = 'Hindi' AND admno='".$Admission_No."'  AND  description='WRITING SKILLS - GRAMMAR' order by Student_Name;";
$query14="select * from little12 WHERE Class='".$class."' AND Subject = 'Hindi' AND admno='".$Admission_No."'  AND  description='WRITING SKILLS - DICTIONARY/VOCABULARY' order by Student_Name;";
$query15="select * from little12 WHERE Class='".$class."' AND Subject = 'Hindi' AND admno='".$Admission_No."'  AND  description='WRITING SKILLS - HAND WRITING & ASSIGNMENTS' order by Student_Name;";
$query16="select * from little12 WHERE Class='".$class."' AND Subject = 'Hindi' AND admno='".$Admission_No."'  AND  description='SPEAKING SKILLS - RECITATION/STORY TELLING'  order by Student_Name;";
$query17="select * from little12 WHERE Class='".$class."' AND Subject = 'Hindi' AND admno='".$Admission_No."'  AND  description='SPEAKING SKILLS - CONVERSATION'  order by Student_Name;";
$query18="select * from little12 WHERE Class='".$class."' AND Subject = 'Hindi' AND admno='".$Admission_No."'  AND  description='LISTENING SKILLS - COMPREHENSION'  order by Student_Name;";


$query19="select * from little12 WHERE Class='".$class."' AND Subject = 'Maths' AND admno='".$Admission_No."'  AND  description='CONCEPT'  order by Student_Name;";
$query20="select * from little12 WHERE Class='".$class."' AND Subject = 'Maths' AND admno='".$Admission_No."'  AND  description='ACTIVITY'  order by Student_Name;";
$query21="select * from little12 WHERE Class='".$class."' AND Subject = 'Maths' AND admno='".$Admission_No."'  AND  description='TABLE' order by Student_Name;";
$query22="select * from little12 WHERE Class='".$class."' AND Subject = 'Maths' AND admno='".$Admission_No."'  AND  description='CLASS & HOME ASSIGNMENTS' order by Student_Name;";



$query23="select * from little12 WHERE Class='".$class."' AND Subject = 'Other Subjects' AND admno='".$Admission_No."'  AND  description='EVS'  order by Student_Name;";
$query24="select * from little12 WHERE Class='".$class."' AND Subject = 'Other Subjects' AND admno='".$Admission_No."'  AND  description='Activity/Project'  order by Student_Name;";
$query25="select * from little12 WHERE Class='".$class."' AND Subject = 'Other Subjects' AND admno='".$Admission_No."'  AND  description='GK'  order by Student_Name;";
$query26="select * from little12 WHERE Class='".$class."' AND Subject = 'Other Subjects' AND admno='".$Admission_No."'  AND  description='Computer'  order by Student_Name;";
$query27="select * from little12 WHERE Class='".$class."' AND Subject = 'Other Subjects' AND admno='".$Admission_No."'  AND  description='Drawing'  order by Student_Name;";
$query28="select * from little12 WHERE Class='".$class."' AND Subject = 'Other Subjects' AND admno='".$Admission_No."'  AND  description='Value Education'  order by Student_Name;";

$query29="select * from little12 WHERE Class='".$class."' AND Subject = 'Class' AND admno='".$Admission_No."'  AND  description='MUSIC/DANCE'  order by Student_Name;";
$query30="select * from little12 WHERE Class='".$class."' AND Subject = 'Class' AND admno='".$Admission_No."'  AND  description='ART & CRAFT'  order by Student_Name;";
$query31="select * from little12 WHERE Class='".$class."' AND Subject = 'Class' AND admno='".$Admission_No."'  AND  description='SPORTS'  order by Student_Name;";


$query32="select * from little12 WHERE Class='".$class."' AND name = 'Personal and Social Traits' AND admno='".$Admission_No."'  AND  description='COURTEOUSNESS'  order by Student_Name;";
$query33="select * from little12 WHERE Class='".$class."' AND name = 'Personal and Social Traits' AND admno='".$Admission_No."'  AND description='CONFIDENCE'  order by Student_Name;";
$query34="select * from little12 WHERE Class='".$class."' AND name = 'Personal and Social Traits' AND admno='".$Admission_No."'  AND  description='CARE OF BELONGINGS'  order by Student_Name;";
$query35="select * from little12 WHERE Class='".$class."' AND name = 'Personal and Social Traits' AND admno='".$Admission_No."'  AND  description='NEATNESS'  order by Student_Name;";
$query36="select * from little12 WHERE Class='".$class."' AND name = 'Personal and Social Traits'  AND admno='".$Admission_No."'  AND description='REGULARITY(Attendance)'  order by Student_Name;";
$query37="select * from little12 WHERE Class='".$class."' AND name = 'Personal and Social Traits' AND admno='".$Admission_No."'  AND  description='SHARING & CARING'  order by Student_Name;";
$query38="select * from little12 WHERE Class='".$class."' AND name = 'Personal and Social Traits' AND admno='".$Admission_No."'  AND  description='CARE OF OTHERS PROPERTY'  order by Student_Name;";
$query39="select * from little12 WHERE Class='".$class."' AND name = 'Personal and Social Traits' AND admno='".$Admission_No."'  AND description='DISCIPLINE'  order by Student_Name;";


$basic1 = mysql_query($query1);

if (false === $basic1) {
  echo mysql_error();
}

$basic2 = mysql_query($query2);

if (false === $basic2) {
  echo mysql_error();
}

$basic3= mysql_query($query3);

if (false === $basic3) {
  echo mysql_error();
}

$basic4 = mysql_query($query4);

if (false === $basic4) {
  echo mysql_error();
}

$basic5 = mysql_query($query5);

if (false === $basic5) {
  echo mysql_error();
}


$basic6 = mysql_query($query6);

if (false === $basic6) {
  echo mysql_error();
}

$basic7 = mysql_query($query7);

if (false === $basic7) {
  echo mysql_error();
}

$basic8 = mysql_query($query8);

if (false === $basic8) {
  echo mysql_error();
}

$basic9 = mysql_query($query9);

if (false === $basic9) {
  echo mysql_error();
}


$basic10 = mysql_query($query10);

if (false === $basic10) {
  echo mysql_error();
}

$basic11 = mysql_query($query11);

if (false === $basic11) {
  echo mysql_error();
}

$basic12= mysql_query($query12);

if (false === $basic12) {
  echo mysql_error();
}

$basic13 = mysql_query($query13);

if (false === $basic13) {
  echo mysql_error();
}

$basic14 = mysql_query($query14);

if (false === $basic14) {
  echo mysql_error();
}


$basic15 = mysql_query($query15);

if (false === $basic15) {
  echo mysql_error();
}

$basic16 = mysql_query($query16);

if (false === $basic16) {
  echo mysql_error();
}

$basic17 = mysql_query($query17);

if (false === $basic17) {
  echo mysql_error();
}

$basic18 = mysql_query($query18);

if (false === $basic18) {
  echo mysql_error();
}


$basic19 = mysql_query($query19);

if (false === $basic19) {
  echo mysql_error();
}

$basic20 = mysql_query($query20);

if (false === $basic20) {
  echo mysql_error();
}

$basic21= mysql_query($query21);

if (false === $basic21) {
  echo mysql_error();
}

$basic22 = mysql_query($query22);

if (false === $basic22) {
  echo mysql_error();
}

$basic23 = mysql_query($query23);

if (false === $basic23) {
  echo mysql_error();
}


$basic24 = mysql_query($query24);

if (false === $basic24) {
  echo mysql_error();
}

$basic25 = mysql_query($query25);

if (false === $basic25) {
  echo mysql_error();
}

$basic26 = mysql_query($query26);

if (false === $basic26) {
  echo mysql_error();
}

$basic27 = mysql_query($query27);

if (false === $basic27) {
  echo mysql_error();
}


$basic28 = mysql_query($query28);

if (false === $basic28) {
  echo mysql_error();
}

$basic29 = mysql_query($query29);

if (false === $basic29) {
  echo mysql_error();
}

$basic30= mysql_query($query30);

if (false === $basic30) {
  echo mysql_error();
}

$basic31 = mysql_query($query31);

if (false === $basic31) {
  echo mysql_error();
}

$basic32 = mysql_query($query32);

if (false === $basic32) {
  echo mysql_error();
}


$basic33 = mysql_query($query33);

if (false === $basic33) {
  echo mysql_error();
}

$basic34 = mysql_query($query34);

if (false === $basic34) {
  echo mysql_error();
}

$basic35 = mysql_query($query35);

if (false === $basic35) {
  echo mysql_error();
}

$basic36 = mysql_query($query36);

if (false === $basic36) {
  echo mysql_error();
}


$basic37 = mysql_query($query37);

if (false === $basic37) {
  echo mysql_error();
}

$basic38 = mysql_query($query38);

if (false === $basic38) {
  echo mysql_error();
}

$basic39 = mysql_query($query39);

if (false === $basic39) {
  echo mysql_error();
}

$row1=mysql_fetch_array($basic1);
$row2=mysql_fetch_array($basic2);
$row3=mysql_fetch_array($basic3);
$row4=mysql_fetch_array($basic4);
$row5=mysql_fetch_array($basic5);
$row6=mysql_fetch_array($basic6);
$row7=mysql_fetch_array($basic7);
$row8=mysql_fetch_array($basic8);
$row9=mysql_fetch_array($basic9);
$row10=mysql_fetch_array($basic10);
$row11=mysql_fetch_array($basic11);
$row12=mysql_fetch_array($basic12);
$row13=mysql_fetch_array($basic13);
$row14=mysql_fetch_array($basic14);
$row15=mysql_fetch_array($basic15);
$row16=mysql_fetch_array($basic16);
$row17=mysql_fetch_array($basic17);
$row18=mysql_fetch_array($basic18);
$row19=mysql_fetch_array($basic19);
$row20=mysql_fetch_array($basic20);
$row21=mysql_fetch_array($basic21);
$row22=mysql_fetch_array($basic22);
$row23=mysql_fetch_array($basic23);
$row24=mysql_fetch_array($basic24);
$row25=mysql_fetch_array($basic25);
$row26=mysql_fetch_array($basic26);
$row27=mysql_fetch_array($basic27);
$row28=mysql_fetch_array($basic28);
$row29=mysql_fetch_array($basic29);
$row30=mysql_fetch_array($basic30);
$row31=mysql_fetch_array($basic31);
$row32=mysql_fetch_array($basic32);
$row33=mysql_fetch_array($basic33);
$row34=mysql_fetch_array($basic34);
$row35=mysql_fetch_array($basic35);
$row36=mysql_fetch_array($basic36);
$row37=mysql_fetch_array($basic37);
$row38=mysql_fetch_array($basic38);
$row39=mysql_fetch_array($basic39);

$this->SetFontSize(10);

		$this->Cell(201,6,'READING SKILLS','LTBR',1,'L',1);
		$this->Cell(103,5,'PRONUNCIATION & FLUENCY','LTR',0,'L',1);
		$this->Cell(49,5,$row1["PT_1GRADE"],'LTR',0,'C',1);
		$this->Cell(49,5,$row1["PT_2GRADE"],'LTR',1,'C',1);
		$this->Cell(103,5,'COMPREHENSION','LBR',0,'L',1);
		$this->Cell(49,5,$row2["PT_1GRADE"],'LTR',0,'C',1);
		$this->Cell(49,5,$row2["PT_2GRADE"],'LTR',1,'C',1);

		$this->Cell(201,6,'WRITING SKILLS','LTBR',1,'L',1);
		$this->Cell(103,5,'LITERATURE','LTR',0,'L',1);
		$this->Cell(49,5,$row3["PT_1GRADE"],'LTR',0,'C',1);
		$this->Cell(49,5,$row3["PT_2GRADE"],'LTR',1,'C',1);
		$this->Cell(103,5,'GRAMMAR','LR',0,'L',1);
		$this->Cell(49,5,$row4["PT_1GRADE"],'LTR',0,'C',1);
		$this->Cell(49,5,$row4["PT_2GRADE"],'LTR',1,'C',1);
		$this->Cell(103,5,'DICTIONARY/VOCABULARY','LR',0,'L',1);
		$this->Cell(49,5,$row5["PT_1GRADE"],'LTR',0,'C',1);
		$this->Cell(49,5,$row5["PT_2GRADE"],'LTR',1,'C',1);
		$this->Cell(103,5,'HAND WRITING & ASSIGNMENTS','LBR',0,'L',1);
		$this->Cell(49,5,$row6["PT_1GRADE"],'LTR',0,'C',1);
		$this->Cell(49,5,$row6["PT_2GRADE"],'LTR',1,'C',1);


		$this->Cell(201,6,'SPEAKING SKILLS','LTBR',1,'L',1);
		$this->Cell(103,5,'RECITATION/STORY TELLING','LTR',0,'L',1);
		$this->Cell(49,5,$row7["PT_1GRADE"],'LTR',0,'C',1);
		$this->Cell(49,5,$row7["PT_2GRADE"],'LTR',1,'C',1);
		$this->Cell(103,5,'CONVERSATION','LBR',0,'L',1);
		$this->Cell(49,5,$row8["PT_1GRADE"],'LTR',0,'C',1);
		$this->Cell(49,5,$row8["PT_2GRADE"],'LTR',1,'C',1);
		

$this->Cell(201,6,'LISTENING SKILLS','LTBR',1,'L',1);
		
		$this->Cell(103,5,'COMPREHENSION','LBTR',0,'L',1);
		$this->Cell(49,5,$row9["PT_1GRADE"],'LTR',0,'C',1);
		$this->Cell(49,5,$row9["PT_2GRADE"],'LTR',1,'C',1);
		
$this->SetFont('','B',12);
		$this->SetFillColor(80);
		$this->SetTextColor(255);
		$this->Cell(103,7,'HINDI','LTBR',0,'L',1);
		$this->Cell(49,7,'PT-I','LTBR',0,'C',1);
		$this->Cell(49,7,'PT-II','LTBR',1,'C',1);
		$this->SetFont('','B',10);
		$this->SetFillColor(255);
		$this->SetTextColor(0);

		$this->Cell(201,6,'READING SKILLS','LTBR',1,'L',1);
		$this->Cell(103,5,'PRONUNCIATION & FLUENCY','LTR',0,'L',1);
		$this->Cell(49,5,$row10["PT_1GRADE"],'LTR',0,'C',1);
		$this->Cell(49,5,$row10["PT_2GRADE"],'LTR',1,'C',1);
		$this->Cell(103,5,'COMPREHENSION','LBR',0,'L',1);
		$this->Cell(49,5,$row11["PT_1GRADE"],'LTR',0,'C',1);
		$this->Cell(49,5,$row11["PT_2GRADE"],'LTR',1,'C',1);

		$this->Cell(201,6,'WRITING SKILLS','LTBR',1,'L',1);
		$this->Cell(103,5,'LITERATURE','LTR',0,'L',1);
	    $this->Cell(49,5,$row12["PT_1GRADE"],'LTR',0,'C',1);
		$this->Cell(49,5,$row12["PT_2GRADE"],'LTR',1,'C',1);
		$this->Cell(103,5,'GRAMMAR','LR',0,'L',1);
		$this->Cell(49,5,$row13["PT_1GRADE"],'LTR',0,'C',1);
		$this->Cell(49,5,$row13["PT_2GRADE"],'LTR',1,'C',1);
		$this->Cell(103,5,'DICTIONARY/VOCABULARY','LR',0,'L',1);
	    $this->Cell(49,5,$row14["PT_1GRADE"],'LTR',0,'C',1);
		$this->Cell(49,5,$row14["PT_2GRADE"],'LTR',1,'C',1);
		$this->Cell(103,5,'HAND WRITING & ASSIGNMENTS','LBR',0,'L',1);
		$this->Cell(49,5,$row15["PT_1GRADE"],'LTR',0,'C',1);
		$this->Cell(49,5,$row15["PT_2GRADE"],'LTR',1,'C',1);


		$this->Cell(201,6,'SPEAKING SKILLS','LTBR',1,'L',1);
		$this->Cell(103,5,'RECITATION/STORY TELLING','LTR',0,'L',1);
	    $this->Cell(49,5,$row16["PT_1GRADE"],'LTR',0,'C',1);
		$this->Cell(49,5,$row16["PT_2GRADE"],'LTR',1,'C',1);
		$this->Cell(103,5,'CONVERSATION','LBR',0,'L',1);
		$this->Cell(49,5,$row17["PT_1GRADE"],'LTR',0,'C',1);
		$this->Cell(49,5,$row17["PT_2GRADE"],'LTR',1,'C',1);
		

$this->Cell(201,6,'LISTENING SKILLS','LTBR',1,'L',1);
		
		$this->Cell(103,5,'COMPREHENSION','LBTR',0,'L',1);
	    $this->Cell(49,5,$row18["PT_1GRADE"],'LTR',0,'C',1);
		$this->Cell(49,5,$row18["PT_2GRADE"],'LTR',1,'C',1);

		$this->SetFont('','B',12);
		$this->SetFillColor(80);
		$this->SetTextColor(255);
		$this->Cell(103,7,'MATHS','LTBR',0,'L',1);
		$this->Cell(49,7,'PT-I','LTBR',0,'C',1);
		$this->Cell(49,7,'PT-II','LTBR',1,'C',1);
			$this->SetFont('','B',10);
		$this->SetFillColor(255);
		$this->SetTextColor(0);

		$this->Cell(201,6,'ASPECTS','LTBR',1,'L',1);
		$this->Cell(103,5,'CONCEPT','LTR',0,'L',1);
		$this->Cell(49,5,$row19["PT_1GRADE"],'LTR',0,'C',1);
		$this->Cell(49,5,$row19["PT_2GRADE"],'LTR',1,'C',1);
		$this->Cell(103,5,'ACTIVITY','LR',0,'L',1);
		$this->Cell(49,5,$row20["PT_1GRADE"],'LTR',0,'C',1);
		$this->Cell(49,5,$row20["PT_2GRADE"],'LTR',1,'C',1);
		$this->Cell(103,5,'TABLE/MENTAL ACTIVITY','LR',0,'L',1);
		$this->Cell(49,5,$row21["PT_1GRADE"],'LTR',0,'C',1);
		$this->Cell(49,5,$row21["PT_2GRADE"],'LTR',1,'C',1);
		$this->Cell(103,5,'CLASS & HOME ASSIGNMENTS','LBR',0,'L',1);
		$this->Cell(49,5,$row22["PT_1GRADE"],'LTBR',0,'C',1);
		$this->Cell(49,5,$row22["PT_2GRADE"],'LTBR',1,'C',1);

		$this->ln(15);
		$this->Cell(201,5,'',0,1,'L',1);
		$pageWidth = 205;
		$pageHeight = 277;
		$margin =3;
		
		$this->Rect( $margin+1, $margin+2 , $pageWidth - $margin -1 , $pageHeight - $margin);
		
		$this->Cell(103,6,'NAME : '.$basic_info[0],'LBRT',0,'L',1);
		$this->Cell(49,6,'CLASS : '.$class,'LTBR',0,'L',1);
		$this->Cell(49,6,'ROLLNO. : '.$ro1["rn"],'TLBR',1,'L',1);

		$this->SetFont('','B',12);
		$this->SetFillColor(80);
		$this->SetTextColor(255);
		$this->Cell(103,8,'','LTBR',0,'C',1);
		$this->Cell(98,8,'EVALUATION - I','LTBR',1,'C',1);
		$this->Cell(103,6,'OTHER SUBJECTS','LTBR',0,'L',1);
		$this->Cell(49,6,'PT-I','LTBR',0,'C',1);
		$this->Cell(49,6,'PT-II','LTBR',1,'C',1);

		$this->SetFont('','B',12);
		$this->SetFillColor(255);
		$this->SetTextColor(0);
		$this->Cell(201,6,'Aspects','LTBR',1,'L',1);
		$this->SetFont('','B',10);
		$this->Cell(103,6,'EVS','LTBR',0,'L',1);
		$this->Cell(49,5,$row23["PT_1GRADE"],'LTR',0,'C',1);
		$this->Cell(49,5,$row23["PT_2GRADE"],'LTR',1,'C',1);
$this->Cell(103,6,'ACTIVITY PROJECT','LTBR',0,'L',1);
		$this->Cell(49,5,$row24["PT_1GRADE"],'LTR',0,'C',1);
		$this->Cell(49,5,$row24["PT_2GRADE"],'LTR',1,'C',1);
		$this->Cell(103,6,'GK','LR',0,'L',1);
		$this->Cell(49,5,$row25["PT_1GRADE"],'LTR',0,'C',1);
		$this->Cell(49,5,$row25["PT_2GRADE"],'LTR',1,'C',1);
	 	$this->Cell(103,6,'COMPUTER','LR',0,'L',1);
	    $this->Cell(49,5,$row26["PT_1GRADE"],'LTR',0,'C',1);
		$this->Cell(49,5,$row26["PT_2GRADE"],'LTR',1,'C',1);
		$this->Cell(103,6,'DRAWING','LR',0,'L',1);
		$this->Cell(49,5,$row27["PT_1GRADE"],'LTR',0,'C',1);
		$this->Cell(49,5,$row27["PT_2GRADE"],'LTR',1,'C',1);
		$this->Cell(103,6,'VALUE EDUCATION','LBR',0,'L',1);
		$this->Cell(49,5,$row28["VALUE1"],'LTR',0,'C',1);
		$this->Cell(49,5,$row28["VALUE2"],'LTR',1,'C',1);		
$this->SetFont('','B',12);
		$this->SetFillColor(120);
		$this->SetTextColor(255);
		$this->Cell(103,8,'CO-CURRICULAR ACTIVITIES','LTBR',0,'C',1);
		$this->Cell(98,8,'EVALUATION - I','LTBR',1,'C',1);
		
		$this->SetFont('','B',9);
		$this->SetFillColor(255);
		$this->SetTextColor(0);
		$this->Cell(103,6,'MUSIC/DANCE','LTBR',0,'L',1);
		$this->Cell(98,6,$row29["remark"],'LTBR',1,'C',1);
		$this->Cell(103,6,'ART & CRAFT','LTBR',0,'L',1);
		$this->Cell(98,6,$row30["remark"],'LTBR',1,'C',1);
		$this->Cell(103,6,'SPORTS','LTBR',0,'L',1);
		$this->Cell(98,6,$row31["remark"],'LTBR',1,'C',1);

		$this->SetFont('','B',12);
		$this->SetFillColor(120);
		$this->SetTextColor(255);
		$this->Cell(103,8,'CO-CURRICULAR ACTIVITIES','LTBR',0,'C',1);
		$this->Cell(98,8,'EVALUATION - I','LTBR',1,'C',1);

		$this->SetFont('','B',9);
		$this->SetFillColor(255);
		$this->SetTextColor(0);
		$this->Cell(201,6,'PERSONAL AND SOCIAL TRAITS','LTBR',1,'L',1);
		$this->Cell(103,6,'COURTEOUSNESS','LTR',0,'L',1);
		$this->Cell(98,6,$row32["Evaluation"],'LTR',1,'C',1);
		$this->Cell(103,6,'CONFIDENCE','LR',0,'L',1);
		$this->Cell(98,6,$row33["Evaluation"],'LR',1,'C',1);
		$this->Cell(103,6,'CARE OF BELONGINGS','LR',0,'L',1);
		$this->Cell(98,6,$row34["Evaluation"],'LR',1,'C',1);

		$this->Cell(103,6,'NEATNESS','LR',0,'L',1);
		$this->Cell(98,6,$row35["Evaluation"],'LR',1,'C',1);
		$this->Cell(103,6,'REGULARITY(Attendance)','LR',0,'L',1);
		$this->Cell(98,6,$row36["Evaluation"],'LR',1,'C',1);
		$this->Cell(103,6,'SHARING & CARING','LR',0,'L',1);
		$this->Cell(98,6,$row37["Evaluation"],'LR',1,'C',1);
		$this->Cell(103,6,'CARE OF OTHERS PROPERTY','LR',0,'L',1);
		$this->Cell(98,6,$row38["Evaluation"],'LR',1,'C',1);
		$this->Cell(103,6,'DISCIPLINE','LR',0,'L',1);
		$this->Cell(98,6,$row39["Evaluation"],'LBR',1,'C',1);
		
		$this->SetFont('','B',12);
		$this->SetFillColor(120);
		$this->SetTextColor(255);
		$this->Cell(201,8,'SPECIFIC PARTICIPATION','LTBR',1,'C',1);

		$this->SetFont('','B',9);
		$this->SetFillColor(255);
		$this->SetTextColor(0);
		$this->Cell(201,8,'EVALUATION 1','LTBR',1,'L',1);
		$this->Cell(201,26,$rob["feedback"],'LBTR',1,'C',1);

		$this->SetFont('','B',12);
		$this->SetFillColor(120);
		$this->SetTextColor(255);
		$this->Cell(201,8,'GENERAL REMARKS','LTBR',1,'C',1);

		$this->SetFont('','B',9);
		$this->SetFillColor(255);
		$this->SetTextColor(0);
		$this->Cell(201,8,'EVALUATION 1','LTBR',1,'L',1);
		$this->Cell(201,26,$roa["feedback"],'LBTR',1,'C',1);


		$this->Cell(63,8,'Date : '.$today,'LT',0,'L',1);
		
	
		$this->ln(29);
		$this->Cell(70,8,"Teacher's Sign ",'L',0,'L',1);
		$this->Cell(105,8,"Parent's Sign",0,0,'L',1);
		$this->Cell(14,8,"Headmistress",0,0,'L',1);
			    	
		    }
		}
	


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

$count=1;

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
	//$zip->open($zip_name,  ZipArchive::CREATE);
	//$zip->addFile("files/".$name, $name);
	fclose($myfile2);
	$pdf->Output();
	
 //$zip->close();

//echo $file_contents;

?>
