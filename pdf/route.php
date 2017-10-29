
<?php
/*
function sanket()
{
$username = "root"; 
$password = "m9YhAP0DLQRi";   
$host = "34.212.87.72";
$database="bitnami_moodle";
$server = mysql_connect($host, $username, $password);
$connection = mysql_select_db($database, $server);
require('..\fpdf\fpdf.php');

class PDF extends FPDF{
	function Header()
	{
		
	}
	function Footer(){


	}
	function BuildTable($count,$basic_info,$other_info,$marks,$marks2) {
        //Colors, line width and bold font
		$pageWidth = 205;
		$pageHeight = 277;
		$margin =4;
		
		$this->Rect( $margin-1, $margin-1 , $pageWidth - $margin +2 , $pageHeight+2 - $margin);
		$this->Rect( $margin, $margin , $pageWidth - $margin , $pageHeight - $margin);
		$image1 = "logo.PNG";
		$image2="download.jpg";

		$this->SetTextColor(0,0,0);
		$this->SetFont('Times','B',14);
		$this->Image($image1,8,8,23.78);
		if($count!=1){

			$this->ln(10);
		}
		$this->Cell(0,6,'LITTLE FLOWER PUBLIC SR. SECONDARY SCHOOL',0,1,'C');
		$this->SetFont('Times','B',11);
		$this->Cell(0,6,'An English Medium School Recognised by Delhi Admin, Affliated to C.B.S.E.',0,1,'C');
		$this->Cell(0,6,'Vijay Park (Near C-11), Yamuna Vihar, Delhi-110053  ',0,1,'C');
		$this->Cell(0,6,'Telephone: 011-22919858, 011-22919242',0,1,'C');
		$this->Image($image2,175,8,23.78);
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
		$this->SetFont('Times','B',9);
		$this->SetFillColor(255);
		$this->Cell(36,8,'Student Name                   : ','LT',0,'L',1);
		$this->Cell(55,8,$basic_info[0],'T',0,'L',1);
		$this->Cell(26,8,'Adm No.              :','T',0,'L',1);
		$this->Cell(30,8,$basic_info[6],'T',0,'T',1);
		$this->Cell(25,8,'Class               :','T',0,'L',1);
		$this->Cell(28,8,$basic_info[4],'T',1,'RT',1);
		
		$this->Cell(36,8,"Father's Name                  : ",'L',0,'L',1);
		$this->Cell(55,8,$basic_info[1],0,0,'L',1);
		$this->Cell(26,8,'Date Of Birth      :',0,0,'L',1);
		$this->Cell(30,8,$basic_info[3],0,0,'L',1);		
		$this->Cell(25,8,'Section            :',0,0,'L',1);
		$this->Cell(28,8,$basic_info[5],0,1,'TR',1);

		$this->Cell(36,8,"Mother's Name                 : ",'L',0,'L',1);
		$this->Cell(55,8,$basic_info[2],0,0,'L',1);
		$this->Cell(26,8,'Roll No.                :',0,0,'L',1);
		$this->Cell(30,8,'/',0,0,'L',1);		
		$this->Cell(25,8,'Attendance     :',0,0,'L',1);
		$this->Cell(28,8,'/',0,1,"L",1);

		$this->Cell(40,8,'Scholastic Areas:','LTR',0,'C',1);
		$this->Cell(161,8,'TERM I','LTBR',1,'C',1);

		

		$this->Cell(40,5,'Sub Name','LTR',0,'C',1);

		$this->Cell(27,5,'Periodic Test','LTR',0,'C',1);
		$this->Cell(27,5,'Note Book','LTR',0,'C',1);
		$this->Cell(27,5,'Sub Enrichment','LTR',0,'C',1);
		$this->Cell(27,5,'Mid Term Exam','TLR',0,'C',1);
		$this->Cell(27,5,'Marks Obtained','TLR',0,'C',1);
		$this->Cell(26,5,'Grade','LTR',1,'C',1);
		
		$this->Cell(40,3,'','LR',0,'C',1);

		$this->Cell(27,3,'(10)','LBR',0,'C',1);
		$this->Cell(27,3,'(5)','LBR',0,'C',1);
		$this->Cell(27,3,'(5)','LBR',0,'C',1);
		$this->Cell(27,3,'(80)','LBR',0,'C',1);
		$this->Cell(27,3,'(100)','LBR',0,'C',1);
		$this->Cell(26,3,'','LBR',1,'C',1);
		
		$mo=(round($marks[0][0])+round($marks[0][1])+round($marks[0][2])+round($marks[0][3]));

		$this->Cell(40,6,'ENGLISH','LTBR',0,'C',1);
		$this->Cell(27,6,round($marks[0][0]),'LTBR',0,'C',1);
		$this->Cell(27,6,round($marks[0][1]),'LBTR',0,'C',1);
		$this->Cell(27,6,round($marks[0][2]),'LBTR',0,'C',1);
		$this->Cell(27,6,round($marks[0][3]),'LBTR',0,'C',1);
		$this->Cell(27,6,$mo,'LBTR',0,'C',1);
		$this->Cell(26,6,$marks2[0][0],'LBTR',1,'C',1);

		$mo=(round($marks[1][0])+round($marks[1][1])+round($marks[1][2])+round($marks[1][3]));
		
		$this->Cell(40,6,'HINDI','LTBR',0,'C',1);
		$this->Cell(27,6,round($marks[1][0]),'LTBR',0,'C',1);
		$this->Cell(27,6,round($marks[1][1]),'LBTR',0,'C',1);
		$this->Cell(27,6,round($marks[1][2]),'LBTR',0,'C',1);
		$this->Cell(27,6,round($marks[1][3]),'LBTR',0,'C',1);
		$this->Cell(27,6,$mo,'LBTR',0,'C',1);
		$this->Cell(26,6,$marks2[1][0],'LBTR',1,'C',1);

		$mo=(round($marks[2][0])+round($marks[2][1])+round($marks[2][2])+round($marks[2][3]));

		$this->Cell(40,6,'MATHEMATICS','LTBR',0,'C',1);
		$this->Cell(27,6,round($marks[2][0]),'LTBR',0,'C',1);
		$this->Cell(27,6,round($marks[2][1]),'LBTR',0,'C',1);
		$this->Cell(27,6,round($marks[2][2]),'LBTR',0,'C',1);
		$this->Cell(27,6,round($marks[2][3]),'LBTR',0,'C',1);
		$this->Cell(27,6,$mo,'LBTR',0,'C',1);
		$this->Cell(26,6,$marks2[2][0],'LBTR',1,'C',1);

		
		
		$mo=(round($marks[6][0])+round($marks[6][1])+round($marks[6][2])+round($marks[6][3]));
		$this->Cell(40,6,'EVS','LTBR',0,'C',1);
		$this->Cell(27,6,round($marks[6][0]),'LTBR',0,'C',1);
		$this->Cell(27,6,round($marks[6][1]),'LBTR',0,'C',1);
		$this->Cell(27,6,round($marks[6][2]),'LBTR',0,'C',1);
		$this->Cell(27,6,round($marks[6][3]),'LBTR',0,'C',1);
		$this->Cell(27,6,$mo,'LBTR',0,'C',1);
		$this->Cell(26,6,$marks2[6][0],'LBTR',1,'C',1);

		$this->Cell(201,6,'','LTBR',1,'C',1);
		
		
		$this->Cell(165,8,'Scholastic Areas :  ','LBTR',0,'C',1);
		$this->Cell(36,8,'Grade','BLTR',1,'C',1);

		$this->Cell(165,6,'GK','LBTR',0,'L',1);
		$this->Cell(36,6,$marks2[7][0],'BLTR',1,'C',1);

		$this->Cell(165,6,'DRAWING','LBTR',0,'L',1);
		$this->Cell(36,6,$marks2[6][0],'BLTR',1,'C',1);

		$this->Cell(165,6,'COMPUTER','LBTR',0,'L',1);
		$this->Cell(36,6,$marks2[8][0],'BLTR',1,'C',1);
		
		$this->Cell(201,6,'','LTBR',1,'C',1);
		
		
		$this->Cell(165,8,'Co-Scholastic Areas:Term-I[on a 3-point(A-C)Grading Scale]  ','LBTR',0,'C',1);
		$this->Cell(36,8,'Grade','BLTR',1,'C',1);
		
		$this->Cell(165,6,'Work Education(or Pre-vocational Education','LBTR',0,'L',1);
			$this->Cell(36,6,strip_tags($other_info[2][0]),'BLTR',1,'C',1);

			$this->Cell(165,6,'Art Education','LBTR',0,'L',1);
			$this->Cell(36,6,strip_tags($other_info[3][0]),'BLTR',1,'C',1);

			$this->Cell(165,6,'Health and Physical Education','LBTR',0,'L',1);
			$this->Cell(36,6,strip_tags($other_info[4][0]),'BLTR',1,'C',1);
			
			
			$this->Cell(165,8,'Discipline:Term-I[on a 3-point(A-C)Grading Scale]  ','LBTR',0,'C',1);
			$this->Cell(36,8,'Grade','BLTR',1,'C',1);
			
			$this->Cell(165,6,'Discipline','LBTR',0,'L',1);
			$this->Cell(36,6,$marks2[9][0],'BLTR',1,'C',1);
			
			$this->SetMargins(6,0,6);
			$this->ln(4);
			$this->Cell(195,12,'Participation in:'.strip_tags($other_info[0][0]),'LTBR',1,'L',1);
			$this->ln(4);
			$this->Cell(195,12,'Remarks :'.strip_tags($other_info[1][0]),'LTBR',1,'L',1);

			$this->Cell(63,8,'Date : '.$today,'T',0,'L',1);
			$this->ln(20);
			$this->Cell(76,8,"Class Teacher'Sign ",0,0,'L',1);
			$this->Cell(105,8,"Parent's Sign",0,0,'L',1);
			$this->Cell(14,8,"Principle",0,0,'L',1);
		}
	}

	$pdf = new PDF();
	$pdf->AliasNbPages();

	$Class='All Class';
	
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
GROUP BY  c.fullname,u.firstname) AS expr_qry
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
ORDER BY COUNT(*) DESC
"
);
//echo $Class;
$basic = mysql_query($stmt4);
if (false === $basic) {
	echo mysql_error();
}

$cname=$Class;
$Class=$cname;
$zip = new ZipArchive();
$zip_name = $cname.".zip"; // Zip name
$count=1;

While($row = mysql_fetch_array($basic)) {
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$Student_name=strtoupper($row['Student_name']);
	$Fathers_name=strtoupper($row['Fathers_name']);
	$Mothers_name=strtoupper($row['Mothers_name']);
	$Class_no=substr($row['Class'],6,2);
	$Section=substr($row['Class'],-1,1);
	$DOB=$row['DOB'];
	$uid=$row['uid'];
	$sanket=$row['Class'];
	$Admission_No=$row['Admission_No'];
	$basic_info=array($Student_name,$Fathers_name,$Mothers_name,$DOB,$Class_no,$Section,$Admission_No);
	include('queries.php');

	$pdf->BuildTable($count,$basic_info,$other_info,$marks,$marks2);

	$name=$Student_name."-".$Admission_No.".pdf";
	$cname=$Class.$Section;
	$pdf->Output('files/'.$name,"F");
	$myfile2 = fopen('files/'.$name, "r") or die("Unable to open file!");
	
	  if($Class_no=='1 '||$Class_no=='2 '||$Class_no=='3 '||$Class_no=='4 '||$Class_no=='5 '||$Class_no=='6 '||$Class_no=='7 '||$Class_no=='8 ')
	  {
	  $zip->open($zip_name,  ZipArchive::CREATE);
	  $zip->addFile("files/".$name, "$sanket/$name");
	  }
    	
}
	//$pdf->Output();	
 $zip->close();
 header("Content-type: application/zip"); 
 header("Content-Disposition: attachment; filename=$zip_name"); 
 header("Pragma: no-cache"); 
 header("Expires: 0"); 
 readfile("$zip_name","files/");
//echo $file_contents;
}
*/

?>

<?php
$class=$_POST['classes'];
ini_set('max_execution_time', 3000);
if((substr($class,0,1) == '1')||(substr($class,0,1) == '2' ))
	header("location:12.php?Class=".$class);
else if((substr($class,0,1) == '3')||(substr($class,0,1) == '4' ) )
	header("location:35.php?Class=".$class);
else if((substr($class,0,1) == '6')||(substr($class,0,1) == '7' )||(substr($class,0,1) == '8'))
	header("location:68.php?Class=".$class);
else if((substr($class,0,1) == '5'))
	header("location:5.php?Class=".$class);
/*else 
{
    sanket();
}*/
?>