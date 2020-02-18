<?php
session_start();
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;

 //require "PHPMailer-master\src\PHPMailer.php";
 //require "PHPMailer-master\src\Exception.php";
 //require ".\PHPMailer-master\src\PHPMailer.php";
 //require ".\PHPMailer-master\src\Exception.php";
require $_SERVER['DOCUMENT_ROOT'] . '/peelportal/PHPMailer-master/src/PHPMailer.php';
require $_SERVER['DOCUMENT_ROOT'] . '/peelportal/PHPMailer-master/src/Exception.php';
require $_SERVER['DOCUMENT_ROOT'] . '/peelportal/FPDF/fpdf.php';

// class PDF extends FPDF
// {
// // Page header
// // function Header()
// // {
// //     // Logo
// //     $this->Image($_SERVER['DOCUMENT_ROOT'].'/peelportal/images/logo.gif',10,6,30);
// //     // Arial bold 15
// //     $this->SetFont('Arial','B',15);
// //     // Move to the right
// //     $this->Cell(80);
// //     // Title
// //     $this->Cell(30,10,'Title',1,0,'C');
// //     // Line break
// //     $this->Ln(20);
// // }

// // Page footer
// function Footer()
// {
//     // Position at 1.5 cm from bottom
//     $this->SetY(-15);
//     // Arial italic 8
//     $this->SetFont('Arial','',8);
//     // Page number
//     $this->Cell(0,10,'firstclassplanners.ca',0,0,'C');
// }
// }

echo print_r($_SESSION);

$pdf = new FPDF();
$pdf->AddPage();
$pdf->Image($_SERVER['DOCUMENT_ROOT'].'/peelportal/images/logo.gif',10,6,30);
$pdf->Image($_SERVER['DOCUMENT_ROOT'].'/peelportal/images/peellogo.jpg',170,6,30);
$pdf->SetFont('helvetica','',10);
$pdf->SetY(20);
$pdf->MultiCell(80,5,"1-800-883-0705\nfirstclassplanners.ca");
$pdf->SetFont('Arial','B',16);
$pdf->SetY(15);
$pdf->SetX(160);
$pdf->Cell(40,20,'Order for ' .$_SESSION["school"],0, 0, "R");
$pdf->Ln();
$pdf->SetFont('helvetica','',10);
$pdf->Cell(190,7,'School Details', 1, 2);
$pdf->SetFont('helvetica', '', 10);
$y = $pdf->GetY();
$pdf->MultiCell(95,8,'Ordered By : ' .$_SESSION['name']."\nAddress : ".$_SESSION['Address'],"LRB", 1);
$x = $pdf->GetX();
$pdf->SetXY($x + 95, $y);
$pdf->MultiCell(95,8,'Date Ordered : ' .date("Y/m/d") ."\nEmail : ".$_SESSION['email'],"LRB", 1);
$pdf->Ln();
$pdf->SetFont('helvetica','',10);
$pdf->Cell(190,7,'Order Items', 1, 2);
$pdf->SetFillColor(128,128,128);
// $pdf->Cell(42,10,"Cover",1,0,'C',1);
// $pdf->Cell(31,10,"Type",1,0,'C',1);
// $pdf->Cell(42,10,"Extras",1,0,'C',1);
// $pdf->Cell(21,10,"Price",1,0,'C',1);
// $pdf->Cell(22,10,"Quantity",1,0,'C',1);
// $pdf->Cell(32,10,"Total",1,1,'C',1);
$pdf->Cell(30,10,"Quantity",1,0,'C',1);
$pdf->Cell(100,10,"Description",1,0,'C',1);
$pdf->Cell(30,10,"Unit Price",1,0,'C',1);
$pdf->Cell(30,10,"Amount",1,1,'C',1);
$pdf->SetFillColor(255,255,255);
$pdf->SetFont('helvetica', '', 10);

$totalCost = 0;

foreach ($_SESSION['cart'] as $key => $planner) {
  switch ($planner['cover']) {
    case 'reach':
      $cover = "Reach";
      break;
    case 'journey':
      $cover = "Journey";
      break;
    case 'believe':
      $cover = "Believe";
      break;
    case 'discover':
      $cover = "Explore";
      break;
    case 'achieve':
      $cover = "Dream";
      break;
    case 'geography':
      $cover = "Geography";
      break;
    case 'stream':
      $cover = "Stream";
      break;
    case 'reading':
      $cover = "Reading";
      break;
    case 'activities':
      $cover = "Activities";
      break;
    case 'doIt':
      $cover = "Do It";
      break;
    case 'influence':
      $cover = "Influence";
      break;
    case 'kind':
      $cover = "Be Kind";
      break;
    case 'influenceFrench':
      $cover = "Influence French";
      break;
    case 'discoverFrench';
      $cover = "Discover French";
      break;
    case 'custom':
      $cover = "Custom";
      break;
  }
  $extras = "";
  $pgs = "N/A";
  $ruler = "N/A";
  $pocket = "N/A";
  if ($planner['ruler'] == "yes") {
    $ruler = "Snap in Ruler\n";
    //echo "- Snap in Ruler <br>";
  }
  if ($planner['pocket'] == "yes") {
    $pocket = "Plastic Pocket\n";
    //echo "- Plastic Pocket <br>";
  }
  if ($planner['pgs'] == 1) {
    $pgs = "8 Add. School Pages";
    //echo "- 8 Additional School Pages";
  } else if ($planner['pgs'] == 2) {
    $pgs = "16 Add. School Pages";
    //echo "- 16 Additional School Pages";
  } else if ($planner['pgs'] == 3) {
    $pgs = "8 Add. School Pages";
    //echo "- 8 Additional School Pages";
  } else if ($planner['pgs'] == 4) {
    $pgs = "16 Add. School Pages";
    //echo "- 16 Additional School Pages";
  } else if ($planner['pgs'] == 5) {
    $pgs = "24 Add. School Pages";
    //echo "- 24 Additional School Pages";
  } else if ($planner['pgs'] == 6) {
    $pgs = "32 Add. School Pages";
    //echo "- 32 Additional School Pages";
  }
 // $pdf->Cell(32,15,$cover,1,0,'C',1);
  $X = $pdf->GetX();
  $pdf->Cell(30,6,$planner['quantity'],"LR",0,'C',1);
  $pdf->CellFitScale(100,6,$planner['lang'] . ' ' . $planner['size'] . ' ' . $planner['age'],"LR",0,'L',1);
  if($planner['age'] == "hand"){
    $pdf->CellFitScale(30,6,"1.75","LR",0,'R',1);
  }else{
    $pdf->CellFitScale(30,6,"3.94","LR",0,'R',1);
  }
  if ($cover == 'Custom'){
    $pdf->Cell(30,6, $planner['total']-275,"LR",2,'R',1);
  }else{
    $pdf->Cell(30,6, $planner['total'],"LR",2,'R',1);
  }
  

  $pdf->SetX($X);
  $pdf->Cell(30,6,$planner['quantity'],"LR",0,'C',1);
  $pdf->CellFitScale(100,6,$cover ." Cover","LR",0,'L',1);
  if($cover == 'Custom'){
    $pdf->CellFitScale(30,6,"275.00","LR",0,'R',1);
    $pdf->CellFitScale(30,6,"275.00","LR",2,'R',1);
  }else{
    $pdf->CellFitScale(30,6,"0.00","LR",0,'R',1);
    $pdf->CellFitScale(30,6,"0.00","LR",2,'R',1);
  }
  

  $pdf->SetX($X);
  if($ruler != "N/A"){
    $pdf->Cell(30,6,$planner['quantity'],"LR",0,'C',1);
    $pdf->CellFitScale(100,6,"Snap in Ruler","LR",0,'L',1);
    $pdf->CellFitScale(30,6,"0.25","LR",0,'R',1);
    $pdf->CellFitScale(30,6, number_format (0.25*$planner['quantity'] , $decimals = 2  ),"LR",2,'R',1);
  }

  $pdf->SetX($X);
  if($pocket != "N/A"){
    $pdf->Cell(30,6,$planner['quantity'],"LR",0,'C',1);
    $pdf->CellFitScale(100,6,"Plastic Pocket","LR",0,'L',1);
    $pdf->CellFitScale(30,6,"0.65","LR",0,'R',1);
    $pdf->CellFitScale(30,6, number_format (0.65*$planner['quantity'] , $decimals = 2),"LR",2,'R',1);
  }

  $pdf->SetX($X);
  if($pgs != "N/A"){
    $pdf->Cell(30,6,$planner['quantity'],"LR",0,'C',1);
    if($planner['pgs'] == 1){
      $pdf->CellFitScale(100,6,"8 Additional School Pages","LR",0,'L',1);
      $pdf->CellFitScale(30,6,"0.40","LR",0,'R',1);
      $pdf->CellFitScale(30,6, number_format (0.40*$planner['quantity'] , $decimals = 2),"LR",2,'R',1);
    }else if ($planner['pgs'] == 2){
      $pdf->CellFitScale(100,6,"16 Additional School Pages","LR",0,'L',1);
      $pdf->CellFitScale(30,6,"0.60","LR",0,'R',1);
      $pdf->CellFitScale(30,6, number_format (0.60*$planner['quantity'] , $decimals = 2),"LR",2,'R',1);
    }else if ($planner['pgs'] == 3){
      $pdf->CellFitScale(100,6,"8 Additional School Pages","LR",0,'L',1);
      $pdf->CellFitScale(30,6,"0.20","LR",0,'R',1);
      $pdf->CellFitScale(30,6, number_format (0.20*$planner['quantity'] , $decimals = 2),"LR",2,'R',1);
    }else if ($planner['pgs'] == 4){
      $pdf->CellFitScale(100,6,"16 Additional School Pages","LR",0,'L',1);
      $pdf->CellFitScale(30,6,"0.25","LR",0,'R',1);
      $pdf->CellFitScale(30,6, number_format (0.25*$planner['quantity'] , $decimals = 2),"LR",2,'R',1);
    }else if ($planner['pgs'] == 5){
      $pdf->CellFitScale(100,6,"24 Additional School Pages","LR",0,'L',1);
      $pdf->CellFitScale(30,6,"0.30","LR",0,'R',1);
      $pdf->CellFitScale(30,6, number_format (0.30*$planner['quantity'] , $decimals = 2),"LR",2,'R',1);
    }else if ($planner['pgs']){
      $pdf->CellFitScale(100,6,"32 Additional School Pages","LR",0,'L',1);
      $pdf->CellFitScale(30,6,"0.35","LR",0,'R',1);
      $pdf->CellFitScale(30,6, number_format (0.35*$planner['quantity'] , $decimals = 2),"LR",2,'R',1);
    }
  }
    $pdf->SetX($X);
    $pdf->Cell(30,6,"","LR",0,'C',1);
    $pdf->CellFitScale(100,6,"","LR",0,'L',1);
    $pdf->CellFitScale(30,6,"","LR",0,'R',1);
    $pdf->CellFitScale(30,6, "","LR",2,'R',1);
    $pdf->SetX($X);

// $current_y = $pdf->GetY();
// $current_x = $pdf->GetX();
// //$pdf->MultiCell(42,5,$ruler."\n".$pocket ."\n" ."$pgs","LRB", 1);
// $pdf->Cell(42,5,$ruler, 1,0,'C',1);
// $pdf->Ln();
// $pdf->SetX($current_x);
// $pdf->Cell(42,5,$pocket, 1,0,'C',1);
// $pdf->Ln();
// $pdf->SetX($current_x);
// $pdf->Cell(42,5,$pgs, 1,0,'C',1);
// $pdf->SetXY($current_x + 42, $current_y);
// $pdf->Cell(21,15,"$" .$planner['total'] / $planner['quantity'],1,0,'C',1);
// $pdf->Cell(22,15,$planner['quantity'],1,0,'C',1);
// $pdf->Cell(32,15,"$" .$planner['total'],1,1,'C',1);
$totalCost = $totalCost + $planner['total'];
}
$pdf->SetX($X);
$pdf->Cell(30,6,"","T",0,'C',1);
$pdf->CellFitScale(100,6,"","T",0,'L',1);
$pdf->CellFitScale(30,6,"","T",0,'R',1);
$pdf->CellFitScale(30,6, "","T",0,'R',1);
$pdf->SetX($X);
$pdf->Cell(160, 10, '',"T",0,'C',1);
$pdf->SetFillColor(0,148,197);
$pdf->SetTextColor(255,255,255);
$pdf->Cell(30,10,"$".$totalCost,1,2,'C',1);
$pdf->SetTextColor(0,0,0);

$pdf->SetX(0);
$pdf->Cell(0, 8, "This is not an invoice", 0, 2, 'C');
$pdf->Cell(0, 8, "Agendas will be delivered to the school the last week of August", 0, 2, 'C');
$pdf->Cell(0, 8, "School Pages need to be submitted to peelplannerorders@firstclassplanners.ca by May 21, 2020", 0, 2, 'C');
$pdf->Cell(0, 8, "School Page template can be found at firstclassplanners.ca/submit-page.php", 0, 2, 'C');

// // Select Arial italic 8
// $pdf->SetFont('Arial','I',8);
// // Print centered page number
// $pdf->Cell(0,10,'firstclassplanners.ca',0,0,'C');
$pdf->Output($_SERVER['DOCUMENT_ROOT'] ."/peelportal/pdfs/" .$_SESSION["email"] ."-order.pdf", "F");

$mail = new PHPMailer;
$mail->isHTML(true);
$mail->setFrom('No-Reply@firstclassplanners.ca', 'Order Confirmation');
$mail->addAddress($_SESSION['email']);
$mail->addAttachment($_SERVER['DOCUMENT_ROOT'] ."/peelportal/pdfs/" .$_SESSION["email"] ."-order.pdf");
$mail->Subject  = $_SESSION["school"]. " Order Confirmation";
$mail->Body     = "Attached you will find your First Class Planners order confirmation.";
 if(!$mail->send()) {
   echo 'Message was not sent.';
   echo 'Mailer error: ' . $mail->ErrorInfo;
 } else {
   //echo 'Message has been sent.';
   //echo "email: " .$_SESSION['email'];
 }
?>


<html>
  <head>
    <link
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"
      integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <div class="jumbotron text-center" style="height: 100%;">
      <h1 class="display-3">Thank You!</h1>
      <p class="lead">
        <strong>Please check your email</strong> for an order confirmation. An invoice will be sent to your school at a later date.
      </p>
      <hr />
    </div>
  </body>
</html>
