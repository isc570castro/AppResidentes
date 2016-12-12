<?php
$idProyecto=$_GET['idProyecto'];
include "../../../model/conexion.php";
$objConex = new Conexion();
$link = $objConex->conectarse();
  $sql = mysql_query("SELECT * FROM sesiones WHERE idProyecto='$idProyecto'", $link) or die(mysql_error());  
 
   if(mysql_num_rows($sql)<=0){
  echo "<script> 
            alert('No se encontraron registros!!') 
            setTimeout('self.close();',100)
            </script>";
  }else{
 require_once('../../../src/tcpdf/tcpdf.php');
// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

	//Page header
	public function Header() {
		// Logo
		/*$image_file ='../../src/img/logoitz.png';
		$this->Image($image_file, 10, 10, 15, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		// Set font*/
		$this->SetFont('', 'B', 10);
		    $tbl = '
     <table border="0" cellpadding="2" cellspacing="0">
     <tr style="">
      <td width="15%" rowspan="3" align="center"><img src="../../../src/img/logoitz.png" width="50"></td>
      <td width="55%" rowspan="2" align="center"><b>Nombre del documento: <br>Reporte de asesorías</b></td>
      <td width="30%" align="center"><b>Código: ITZ-AC-PO-004-07</b></td>
     </tr>
     <tr style="">
      <td width="30%" align="center"><b>Revision 2</b></td>
     </tr>
     <tr style="">
      <td width="55%" align="center"><b>Referencia a la Norma ISO 9001-2008 5.5.1</b></td>
      <td width="30%" align="center"><b>Pagina 1 de 1</b></td>
     </tr>
     </table>';
		// Title
		$this->writeHTML($tbl, false, false, false, false, '');
	}

	// Page footer
	public function Footer() {
		// Position at 15 mm from bottom
		$this->SetY(-15);
		// Set font
		$this->SetFont('helvetica', '', 9);
		// Page number
		//$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'L', 0, '', 0, false, 'T', 'M');
		$this->Cell(0, 10, 'ITZ-AC-PO-004-07', 0, false, 'L', 0, '', 0, false, 'T', 'M');
		$this->Cell(0, 10, 'Rev. 2', 0, false, 'R', 0, '', 0, false, 'T', 'M');
	}
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
/*$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 003');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');*/

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

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

// add a page
$pdf->AddPage();
//$pdf->Ln(5);

$dia=date('d');
$mes=date('m');
$ano=date('o');
$pdf->SetFont('helvetica', '', 11);

    $tbl = '
     <table border="1">
     <tr>
     <td width="10%" align="center"><b>No. Sesion</b></td>
     <td width="20%" align="center"><b>Fecha</b></td>
     <td width="20%" align="center"><b>Hora</b></td>
     <td width="25%" align="center"><b>Avances</b></td>
     <td width="25%" align="center"><b>Observaciones</b></td>
     </tr>
     </table>';
     $pdf->writeHTML($tbl, false, false, false, false, '');

     while ($rows = mysql_fetch_array($sql)){
      $noSesion= $rows['noSesion'];
      $fecha= $rows['fecha'];
      $hora= $rows['hora'];
      $avances= $rows['avances']; 
      $observaciones= $rows['observaciones'];
      $tbl = '
     <table border="1">
     <tr>
     <td width="10%" align="center">'.$noSesion.'</td>
     <td width="20%" align="center">'.$fecha.'</td>
     <td width="20%" align="center">'.$hora.'</td>
     <td width="25%" align="center">'.$avances.'</td>
     <td width="25%" align="center">'.$observaciones.'</td>
     </tr>
     </table>';
  $pdf->writeHTML($tbl, false, false, false, false, '');
}
  /*c

// ---------------------------------------------------------
// set font
$pdf->SetFont('times', 'BI', 12);

// add a page
$pdf->AddPage();

// set some text to print
$txt = <<<EOD
TCPDF Example 003

Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.
EOD;

// print a block of text using Write()
$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);
// ---------------------------------------------------------
*/
//Close and output PDF document
$pdf->Output('ReporteSesiones.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
}
