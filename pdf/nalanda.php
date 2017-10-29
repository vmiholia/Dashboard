<?php
require('..\fpdf\fpdf.php');
//connect database
//$host="localhost"; // Host name 
//$username="root"; // Mysql username 
//$password=""; // Mysql password 
//$db_name="online_portal"; // Database name 
//mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
//mysql_select_db("$db_name")or die("cannot select DB");


class PDF extends FPDF{
	function Header()
	{
		$pageWidth = 205;
		$pageHeight = 277;
		$margin =4;
		
		$this->Rect( $margin-1, $margin-1 , $pageWidth - $margin +2 , $pageHeight+2 - $margin);
		$this->Rect( $margin, $margin , $pageWidth - $margin , $pageHeight - $margin);
		$image1 = "logo.PNG";

		$this->SetTextColor(0,0,0);
		$this->SetFont('Times','B',14);
		$this->Image($image1,8,8,23.78);
		$this->Cell(0,6,'NALANDA PUBLIC SCHOOL',0,1,'C');
		$this->SetFont('Times','B',11);
		$this->Cell(0,6,'An English Medium School Recognised by Delhi Admin, Affliated to C.B.S.E.',0,1,'C');
		$this->Cell(0,6,'Shivaji Park, Shahdara, Delhi 110032, Ph. : 22325108,22328328',0,1,'C');
		$this->Image($image1,175,8,23.78);
		$this->Cell(0,6,'Website : www.lfpsdelhi.com, Email : lfps_sp@yahoo.com,lfpsss12@gmail.com',0,1,'C');
		$this->SetDrawColor(0, 0, 255);
		$this->SetLineWidth(.2);
	}
	function Footer(){
		
  //  $this->SetFont('Arial','I',8);
    //Page number
   // $this->Cell(0,16,'Page '.$this->PageNo().'/{nb}',0,0,'R');

	}
	function BuildTable($marks,$marks2,$other_info,$basic_info) {
        //Colors, line width and bold font
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
		$this->Cell(36,8,'Student Name     : ','LT',0,'L',1);
		$this->Cell(49,8,$basic_info[0],'T',0,'L',1);
		$this->Cell(23,8,'Adm No.              :','T',0,'L',1);
		$this->Cell(30,8,'14536','T',0,'T',1);
		$this->Cell(25,8,'Class               :','T',0,'L',1);
		$this->Cell(34,8,$basic_info[1],'T',1,'RT',1);
		
		$this->Cell(36,8,"Father's Name     : ",'L',0,'L',1);
		$this->Cell(49,8,'SUSHIL KUMAR SHARMA',0,0,'L',1);
		$this->Cell(23,8,'Date Of Birth      :',0,0,'L',1);
		$this->Cell(30,8,'16-09-2004',0,0,'L',1);		
		$this->Cell(25,8,'Section            :',0,0,'L',1);
		$this->Cell(34,8,'A',0,1,'TR',1);

		$this->Cell(36,8,"Mother's Name     : ",'L',0,'L',1);
		$this->Cell(49,8,'RENU SHARMA',0,0,'L',1);
		$this->Cell(23,8,'Roll No.                :',0,0,'L',1);
		$this->Cell(30,8,'546',0,0,'L',1);		
		$this->Cell(25,8,'Attendance     :',0,0,'L',1);
		$this->Cell(34,8,'/',0,1,"L",1);

		$this->Cell(40,8,'Scholastic Areas:','LTR',0,'C',1);
		$this->Cell(161,8,'TERM I','LTBR',1,'C',1);

		$this->Cell(40,2,'','LTR',0,'C',1);

		$this->Cell(23,2,'','LTR',0,'C',1);
		$this->Cell(23,2,'','LTR',0,'C',1);
		$this->Cell(23,2,'','LTR',0,'C',1);
		$this->Cell(23,2,'','LTR',0,'C',1);
		$this->Cell(23,2,'','LTR',0,'C',1);
		$this->Cell(23,2,'','LTR',0,'C',1);
		$this->Cell(23,2,'','LTR',1,'C',1);

		$this->Cell(40,3,'Sub Name','LR',0,'C',1);

		$this->Cell(23,3,'UT 1','LR',0,'C',1);
		$this->Cell(23,3,'UT 2','LR',0,'C',1);
		$this->Cell(23,3,'UT 3','LR',0,'C',1);
		$this->Cell(23,3,'UT 4','LR',0,'C',1);
		$this->Cell(23,3,'Half Yearly','LR',0,'C',1);
		$this->Cell(23,3,'Marks Obtained','LR',0,'C',1);
		$this->Cell(23,3,'Grade','LR',1,'C',1);
		
		$this->Cell(40,3,'','LBR',0,'C',1);

		$this->Cell(23,3,'(20)','LBR',0,'C',1);
		$this->Cell(23,3,'(20)','LBR',0,'C',1);
		$this->Cell(23,3,'(20)','LBR',0,'C',1);
		$this->Cell(23,3,'(20)','LBR',0,'C',1);
		$this->Cell(23,3,'(80)','LBR',0,'C',1);
		$this->Cell(23,3,'(160)','LBR',0,'C',1);
		$this->Cell(23,3,'','LBR',1,'C',1);
		
		$this->Cell(40,2,'','LBR',0,'C',1);

		$this->Cell(23,2,'','LBR',0,'C',1);
		$this->Cell(23,2,'','LBR',0,'C',1);
		$this->Cell(23,2,'','LBR',0,'C',1);
		$this->Cell(23,2,'','LBR',0,'C',1);
		$this->Cell(23,2,'','LBR',0,'C',1);
		$this->Cell(23,2,'','LBR',0,'C',1);
		$this->Cell(23,2,'','LBR',1,'C',1);


		$this->Cell(40,6,'ENGLISH','LTBR',0,'C',1);
		$this->Cell(23,6,round($marks2[0][2]),'LTBR',0,'C',1);
		$this->Cell(23,6,round($marks2[0][3]),'LBTR',0,'C',1);
		$this->Cell(23,6,round($marks2[0][4]),'LBTR',0,'C',1);
		$this->Cell(23,6,round($marks2[0][5]),'LBTR',0,'C',1);
		$this->Cell(23,6,round($marks2[0][1]),'LBTR',0,'C',1);
		$this->Cell(23,6,round($marks[0][1]),'LBTR',0,'C',1);
		$this->Cell(23,6,$marks[0][3],'LBTR',1,'C',1);


		$this->Cell(40,6,'HINDI','LTBR',0,'C',1);
		$this->Cell(23,6,round($marks2[1][2]),'LTBR',0,'C',1);
		$this->Cell(23,6,round($marks2[1][3]),'LBTR',0,'C',1);
		$this->Cell(23,6,round($marks2[1][4]),'LBTR',0,'C',1);
		$this->Cell(23,6,round($marks2[1][5]),'LBTR',0,'C',1);
		$this->Cell(23,6,round($marks2[1][1]),'LBTR',0,'C',1);
		$this->Cell(23,6,round($marks[1][1]),'LBTR',0,'C',1);
		$this->Cell(23,6,$marks[1][3],'LBTR',1,'C',1);

		$this->Cell(40,6,'MATHEMATICS','LTBR',0,'C',1);
		$this->Cell(23,6,round($marks2[2][2]),'LTBR',0,'C',1);
		$this->Cell(23,6,round($marks2[2][3]),'LBTR',0,'C',1);
		$this->Cell(23,6,round($marks2[2][4]),'LBTR',0,'C',1);
		$this->Cell(23,6,round($marks2[2][5]),'LBTR',0,'C',1);
		$this->Cell(23,6,round($marks2[2][1]),'LBTR',0,'C',1);
		$this->Cell(23,6,round($marks[2][1]),'LBTR',0,'C',1);
		$this->Cell(23,6,$marks[2][3],'LBTR',1,'C',1);

		$this->Cell(40,6,'SCIENCE','LTBR',0,'C',1);
		$this->Cell(23,6,round($marks2[3][2]),'LTBR',0,'C',1);
		$this->Cell(23,6,round($marks2[3][3]),'LBTR',0,'C',1);
		$this->Cell(23,6,round($marks2[3][4]),'LBTR',0,'C',1);
		$this->Cell(23,6,round($marks2[3][5]),'LBTR',0,'C',1);
		$this->Cell(23,6,round($marks2[3][1]),'LBTR',0,'C',1);
		$this->Cell(23,6,round($marks[3][1]),'LBTR',0,'C',1);
		$this->Cell(23,6,$marks[3][3],'LBTR',1,'C',1);

		$this->Cell(40,6,'SOCIAL SCIENCE','LTBR',0,'C',1);
		$this->Cell(23,6,round($marks2[4][2]),'LTBR',0,'C',1);
		$this->Cell(23,6,round($marks2[4][3]),'LBTR',0,'C',1);
		$this->Cell(23,6,round($marks2[4][4]),'LBTR',0,'C',1);
		$this->Cell(23,6,round($marks2[4][5]),'LBTR',0,'C',1);
		$this->Cell(23,6,round($marks2[4][1]),'LBTR',0,'C',1);
		$this->Cell(23,6,round($marks[4][1]),'LBTR',0,'C',1);
		$this->Cell(23,6,$marks[4][3],'LBTR',1,'C',1);
		

		$this->Cell(201,6,'','LTBR',1,'C',1);
		
		
		$this->Cell(165,8,'Scholastic Areas :  ','LBTR',0,'C',1);
		$this->Cell(36,8,'Grade','BLTR',1,'C',1);

		$this->Cell(165,6,'GK','LBTR',0,'L',1);
		$this->Cell(36,6,$marks[5][3],'BLTR',1,'C',1);

		$this->Cell(165,6,'DRAWING','LBTR',0,'L',1);
		$this->Cell(36,6,$marks[5][3],'BLTR',1,'C',1);

		$this->Cell(165,6,'COMPUTER','LBTR',0,'L',1);
		$this->Cell(36,6,$marks[6][3],'BLTR',1,'C',1);
		
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
		$this->Cell(36,6,'A2','BLTR',1,'C',1);
		
		$this->SetMargins(6,0,6);
		$this->ln(4);
		$this->Cell(195,12,'Participation in: '.strip_tags($other_info[0][0]) ,'LTBR',1,'L',1);
		$this->ln(4);
		$this->Cell(195,12,'Remarks :'.strip_tags($other_info[1][0]),'LTBR',1,'L',1);

		$this->Cell(63,8,'Date : '.$today,'T',0,'L',1);
		$this->ln(35);
		$this->Cell(76,8,"Class Teacher'Sign ",0,0,'L',1);
		$this->Cell(105,8,"Parent's Sign",0,0,'L',1);
		$this->Cell(14,8,"Principle",0,0,'L',1);
			    	
		    }
		}
	

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

//$pdf->Image('header.jpg');

$pdf->SetFont('Arial','BU',12);
include("nalanda_queries.php");	




$pdf->BuildTable($marks,$marks2,$other_info,$basic_info);
$pdf->Output();
?>
