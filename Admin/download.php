<?php

// Include the main TCPDF library (search for installation path).
require_once('tcpdf/tcpdf.php');

;
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator('CodeXV');
$pdf->SetAuthor('CodeXV');
$pdf->SetTitle('Kartu Peserta');
$pdf->SetSubject('Id QR Code');
$pdf->SetKeywords('CodeXV');

// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING);

// set header and footer fonts
//$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
//$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, 4, PDF_MARGIN_RIGHT);
//$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
//$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, 0);
//$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
//$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 11);

// add a page

$pdf->AddPage('P', 'A4');

// writeHTML($html, $ln=true, $fill=false, $reseth=false, $cell=false, $align='')
// writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)
include '../koneksi.php';
$id = $_GET['id'];
$nama_a = mysqli_query($con,"SELECT nama FROM data_peserta WHERE idPes = '$id'");
$data_a = mysqli_fetch_array($nama_a);
      

// create some HTML content

$html = '<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Data Peserta</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
  <script src="main.js"></script>
</head>

<body>
    <table border="1" style="padding: 16px;">
      <tr>
        <td colspan="2" align="center" style="font-size: 30px;"> KARTU PESERTA </td>
      </tr>
      <tr>
        <td align="center"><img src="codexv.png" alt="" width="100px"><br><br>CodeXV</td>  
        <td align="center"><img src="wimnus.png" alt="" width="100px"><br>WIMNUS</td>  
      </tr>
      <tr>
        <td colspan="2" align="center">
          <img src="http://localhost/peserta/Admin/qr.php?id='.$id.'" alt="" width="150px"><br><br>
          <span style="font-size:20px;">'.$data_a[0].'</span>
        </td>
      </tr>
    </table>
</body>

</html>';


// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');



// reset pointer to the last page
$pdf->lastPage();
ob_end_clean();
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Print a table


//Close and output PDF document
$pdf->Output('CodeXV_'.$data_a[0].'.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
