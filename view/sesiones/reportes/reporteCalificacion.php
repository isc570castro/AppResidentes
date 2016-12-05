<?php
$noControl=$_REQUEST['noControl'];
$idProyecto=$_REQUEST['idProyecto'];
include "../../../model/conexion.php";
$objConex = new Conexion();
$link = $objConex->conectarse();
  $calificaciones = mysql_query("SELECT * FROM calificaciones where noControl='$noControl';", $link) or die(mysql_error());
   if(mysql_num_rows($calificaciones)<=0){
  echo "<script> 
            alert('No se ha generado una calificación en el alumno'); 
            setTimeout('self.close();',100)
            </script>";
  echo "<script> 
            window.location='../concluir.php?idProyecto=$idProyecto';
          </script>";
  }else{
 $rows2 = mysql_fetch_array($calificaciones);
 $criterio1=$rows2['criterio1'];
 $criterio2=$rows2['criterio2'];
 $criterio3=$rows2['criterio3'];
 $criterio4=$rows2['criterio4'];
 $criterio5=$rows2['criterio5'];
 $criterio6=$rows2['criterio6'];
 $observaciones=$rows2['observaciones'];
 $total=$rows2['total'];
 $sql = mysql_query("SELECT * FROM residente, proyecto, asignaciones WHERE residente.noControl='$noControl' AND residente.noControl=asignaciones.noControl AND proyecto.idProyecto=asignaciones.idProyecto", $link) or die(mysql_error());
 $rows = mysql_fetch_array($sql);
 $nombreResidente=$rows['nombreResidente'];
 $nombreProyecto=$rows['nombreProyecto'];
 $nombreEmpresa=$rows['nombreEmpresa'];
 $carrera=$rows['carrera'];
  $periodo=$rows['periodo'];
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
     <table border="1" cellpadding="2" cellspacing="0">
     <tr style="">
      <td width="15%" rowspan="3" align="center"><img src="../../../src/img/logoitz.png" width="50"></td>
      <td width="55%" rowspan="2" align="center"><b>Nombre del documento: <br>Formato de evaluación</b></td>
      <td width="30%" align="center"><b>Código: ITZ-AC-PO-004-06</b></td>
     </tr>
     <tr style="">
      <td width="30%" align="center"><b>Revision 2</b></td>
     </tr>
     <tr style="">
      <td width="55%" align="center"><b>Referencia a la Norma ISO 9001-2008 7.5.1</b></td>
      <td width="30%" align="center"><b>Pagina 1 de 2</b></td>
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
$pdf->SetFont('helvetica', '', 10);

    $tbl = '
     <table border="0">
     <tr>
      <td width="100%" align="center"><b>Anexo III</b></td>
     </tr>
     <tr>
      <td width="100%" align="center"><b>Formato de evaluación</b><br></td>
     </tr>
     <tr>
    <td width="525"><b>Nombre del Residente: </b>'.$nombreResidente.'</td>
     </tr>
     <tr>
      <td width="250"><b>Número de Control: </b>'.$noControl.'</td>
     </tr>
     <tr>
      <td width="525"><b>Nombre del Proyecto: </b>'.$nombreProyecto.'</td>
     </tr>
       <tr>
      <td width="525"><b>Carrera: </b>'.$carrera.'</td>
     </tr>
     <tr>
      <td width="525"><b>Periodo de realización de la residencia profesional: </b>'.$periodo.'</td>
     </tr>
     <tr><td><br><br></td></tr>
     </table>';
      $pdf->writeHTML($tbl, false, false, false, false, '');
      $pdf->SetFont('helvetica', '', 10);
      $tbl = ' 
      <table border="1">
      <tr>
        <td align="center"><b><br>En qué medida el Residente cumple con lo siguiente:</b><br></td>
      </tr>
      <tr>
     <td colspan="2" width="78%" align="center"><b><br>Criterios a evaluar<br></b></td>
     <td align="center" width="10%"><b>A <br>Valor</b></td>
     <td align="center" width="12%"><b>B <br>Evaluación</b></td>
     </tr>
     <tr>
     <td width="15%" rowspan="8" align="center"><br><br><br><br><br><br><br><br><br><br><br><b>Evaluación <br>por asesor<br> interno</b></td>
      <td width="63%"><br><br>&nbsp;&nbsp;&nbsp;1. Mostró responsabilidad y compromiso en la Residencia Profesional<br></td>
     <td width="10%" align="center"><br><br>5</td>
     <td width="12%" align="center"><br><br><b>'.$criterio1.'</b><br></td>
     </tr>
     <tr>
      <td><br><br>&nbsp;&nbsp;&nbsp;2. Realizó un trabajo innovador en su área de desempeño<br></td>
     <td align="center"><br><br>10</td>
     <td align="center"><br><br><b>'.$criterio2.'</b><br></td>
     </tr>
     <tr>
      <td ><br><br>&nbsp;&nbsp;&nbsp;3. Aplica las competencias para la realización del proyecto</td>
     <td align="center"><br><br>10</td>
     <td align="center"><br><br><b>'.$criterio3.'</b><br></td>
     </tr>
     <tr>
      <td ><br><br>&nbsp;&nbsp;&nbsp;4. Es dedicado y proactivo en los trabajos encomendados</td>
     <td align="center"><br><br>10</td>
     <td align="center"><br><br><b>'.$criterio4.'</b><br></td>
     </tr>
     <tr>
      <td ><br><br>&nbsp;&nbsp;&nbsp;5. Cumple con los objetivos correspondientes al proyecto</td>
     <td align="center"><br><br>10</td>
     <td align="center"><br><br><b>'.$criterio5.'</b><br></td>
     </tr>
     <tr>
      <td ><br><br>&nbsp;&nbsp;&nbsp;6. Entrega en tiempo y forma el informe técnico</td>
     <td align="center"><br><br>5</td>
     <td align="center"><br><br><b>'.$criterio6.'</b><br></td>
     </tr>
     <tr>
      <td align="center" colspan="2"><b><br>Calificación de asesoria interna</br></td>
      <td align="center"><br><br><b>'.$total.'</b><br></td>
     </tr>
     <tr>
      <td align="center" colspan="3"><br><br>NIVEL DE DESEMPEÑO<br></td>
     </tr>
     <tr>
      <td width="100%" height="100px"><br><br><b>Observaciones:</b> '.$observaciones.'</td>
      </tr>
     </table>';

  $pdf->writeHTML($tbl, false, false, false, false, '');
        $tbl = ' 
      <br><br><br><br><br><br><br><br>
      <table border="">
      <tr>
      <td width="100%" align="center">__________________________________________</td>
   
      </tr>
      <tr>
      <td width="100%"  align="center">Nombre y firma del asesor interno</td>
     
      
      </tr>
      </table>
      ';
   $pdf->writeHTML($tbl, false, false, false, false, '');
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
