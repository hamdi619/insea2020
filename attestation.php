<?php
include 'includes/session.php';



if(!isset($_SESSION['user'])){
	header('location: index.php');
}




require_once('tcpdf\tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 001');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');



// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));



$sex=$user['sex'];
if ($sex==1) {
	$gender="male";
};
if ($sex==0) {
	$gender="Female";
};

$cycle=$user['cycle'];
if ($cycle==1) {
	$cycle="Cycle ingénieurs d'Etat";
};
if ($cycle==2) {
	$cycle="Cycle Master";
};
if ($cycle==3) {
	$cycle="Cycle Doctorat";
}


$html="this is an inscription certificate of student : ".ucfirst($user['firstname'])." ".ucfirst($user['lastname']).'<br><br>';
$html.="Name arabe : ".$user['firstname_ar']." ".$user['lastname_ar'].'<br><br>';
$html.="gender : ".$gender."<br><br>";
$html.="Email : ".$user['email'].'<br><br>';
$html.="phone : ".$user['phone'].'<br><br>';
$html.="Address : ".$user['adress'].'<br><br>';
$html.="Email : ".$cycle.'<br><br>';




// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('example_001.pdf', 'I'); 