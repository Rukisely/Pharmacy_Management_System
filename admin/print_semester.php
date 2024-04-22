<?php
$page_title = 'TRIPLE G-DLDM | Sales Report';

  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);
?>
<?php 
$results = '';
require('fpdf/fpdf.php'); 

  

class PDF extends FPDF { 

  
    // Page header 

    function Header() { 

          

        // Add logo to page 
      $this->SetFont('Arial','B',13); 
      $this->Cell(11); 
      $this->Cell(5,2,'ST. FRANCIS UNIVERCITY COLLEGE OF HEALTH AND ALLIED SCIENCES','C' );
      $this->Ln(6); 

      $this->SetFont('Arial','',10); 
      $this->Cell(5,10,'ST. FRANCIS UNIVERCITY COLLEGE OF HEALTH AND ALLIED SCIENCES,','C' );
      $this->Ln(5); 
      $this->Cell(5,10,'P.O.BOX 175, Ifakara - TANZANIA,','C' );
      $this->Ln(5); 
      $this->Cell(5,10,'Web : www.sfuchas.ac.tz,','C' );
      $this->Ln(5); 
      $this->Cell(5,10,'Email : principles@sfuchas.ac.tz,','C' );
      $this->Ln(5); 
      $this->Cell(5,10,'Hot line : +(255) 23-2931-568,','C' );
      $this->Ln(5); 
      $this->Cell(5,10,'Fox : +(255) 23-2931-569','C' );
      // Set font family to Arial bold  

      $this->SetFont('Arial','',10); 

        


      // Header 
        
      $format ="d-M-Y";
      $CDT =date($format);
      

      // Move to the right 
      $this->Image('images/SFUCHAS-LOGO-NO-BG.png',170,15,35,); 
      $this->Ln(10); 

      $this->SetFont('Arial','',18); 

      $this->Cell(70);  
      $this->Cell(5,10,'Semester Exam Timetable','C' ); 

          

        // Line break 

        $this->Ln(20); 

    } 

  

    // Page footer 

    function Footer() { 

          

        // Position at 1.5 cm from bottom 

        $this->SetY(-15); 

          

        // Arial italic 8 

        $this->SetFont('Arial','I',8); 

          

        // Page number 

        $this->Cell(0,10,'Page ' .  

            $this->PageNo(),0,0,'C'); 

    } 
} 

  
// Instantiation of FPDF class 

$pdf = new PDF(); 

  
// Define alias for number of pages 

$pdf->AddPage(); 

$width_cell=array(20,25,20);
$pdf->SetFont('Arial','B',10); 

$pdf->Line(10, 49, 205, 49); 

$pdf->SetFillColor(235,236,236); 
 
$pdf->Cell($width_cell[0],10,'Date ',1, 0,'C',true); 
$pdf->Cell($width_cell[1],10,'Date ',1, 0,'C',true);   
$pdf->Cell($width_cell[2],10,'course',1, 1,'C',true);   

$pdf->SetFont('Arial','',10); 
$Fill=false;
if($results):
  foreach($results as $result):          
$pdf->Cell($width_cell[0],10,remove_junk(ucfirst($result['name'])),1, 0,'C',$Fill); 
$pdf->Cell($width_cell[1],10,remove_junk(ucfirst($result['name'])),1, 0,'C',$Fill);   
$pdf->Cell($width_cell[1],10,remove_junk(ucfirst($result['name'])),1, 1,'C',$Fill); 
endforeach;
     endif;

$format ="d-M-Y";
$CDT =date($format);


$pdf->Output($CDT.''.'_Sales_report'.'.pdf','D'); 

  
?> 
