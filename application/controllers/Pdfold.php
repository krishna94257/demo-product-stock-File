<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/tcpdf/config/lang/eng.php';

require APPPATH . '/libraries/tcpdf/tcpdf.php';
class MYPDF extends TCPDF {

	//Page header
	public function Header() {
		// Logo
		$image_file = K_PATH_IMAGES.'aadarsh2.png';
		$this->Image($image_file, 10, 10, 51, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		// Set font
		$this->SetFont('helvetica', 'B', 10);
		// Title
		//$this->Cell(0, 15, 'INVOICE', 0, false, 'C', 0, '', 0, false, 'M', 'M');

		$head ='
		<table align="center" border="0" cellpadding="2" cellspacing="4" width="100%";>
			<tr><td  align="center" width="50%" style="max-width:50%;"><br>
				<h2>INVOICE</h2><strong style="text-decoration: underline;">Auth. Distributer :</strong><br>Century Veneers, Alu Decor
		    </td>
			<td align="left" width="50%" style="max-width:50%;"><br>
			R/O:75/2/40, Lasudia Mori,Near lasuria talab Dewas Naka indore 452010<br>Tel:0731-2802830<br>Fax : 0731-40333741<br>Mob : 98931-94830 .7974715050
			</td>
		</tr>
		</table>';
		$this->writeHTML($head, true, false, true, false, '');
		 $style = array('width' => 0.5, 'cap' => 'square', 'join' => 'miter', 'dash' => 0, 'phase' => 0, 'color' => array(0,205,50));
        $this->line(10,35,200,35,$style);

	
	}

	// Page footer
	public function Footer() {
		// Position at 15 mm from bottom
		$this->SetY(-35);
		// Set font
		$this->SetFont('helvetica', 'I', 12);

		$f = '<table class="first" cellpadding="0" cellspacing="2" border="1">
		  <tr><td  align="left" bgcolor="#000000" color="white"><b>&nbsp;Terms & Conditions :<br>
&nbsp;Interest @21% will be charged if bill is not paid with in 8 days.<br>
&nbsp;We are not responsible for any loss, damage or breakage during trnsit<br>
&nbsp;Doods once sold will not be taken back.<br>
&nbsp;subject to Indore jurisdiction. E.&OE </b></td></tr>	  
		 </table>';

			$this->writeHTML($f, true, false, true, false, '');
		// Page number
		$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	}
}

class Pdf extends CI_Controller {



	public function __construct()

 	{

 		parent::__construct();

		$this->load->helper('url');

 		$this->load->model('common_model');

 		$this->load->library('form_validation');

 		$this->load->helper(array('form', 'url'));	

 	}

 	public function generate_pdf1(){

 		$id = $this->uri->segment(3);
 		$customer = $this->common_model->getById("bill_add", array('id' => $id));
 		$cust = $customer;
 		$cust->product_code = json_decode($customer->product_code);
 		$cust->product_name = json_decode($customer->product_name);
 		$cust->quantity = json_decode($customer->quantity);
 		$cust->price = json_decode($customer->price);
 		$cust->total = json_decode($customer->total);
 		$data['customer'] = $cust;
		$this->load->view('product/pdf', $data);
 	}
 	

public function generate_pdf3(){


	$id = $this->uri->segment(3);
	$customer = $this->common_model->getById("bill_add", array('id' => $id));
	$cust = $customer;
	$cust->product_code = json_decode($customer->product_code);
	$cust->product_name = json_decode($customer->product_name);
	$cust->quantity = json_decode($customer->quantity);
	$cust->price = json_decode($customer->price);
	$cust->total = json_decode($customer->total);
	$cust->size = json_decode($customer->size);
	$x = 2;
	$cgst = $customer->gstamt;
	
	 $b = str_replace( ',', '', $customer->gstamt);

	 $cgst1 = (int)$b;

	 $cgst2 = $cgst1/2;

	$customer = $cust;
	$in = str_replace('-', '', preg_replace('/[^A-Za-z0-9\-]/', '', $customer->created)).$customer->id;
	$date = date("jS F, Y", strtotime($customer->created));
	$count = count($customer->product_code);
	if ($count<25) {
		$remain = 25-$count;
	}
	//echo $count; 
	

	//echo "<pre>";print_r($customer);die;

	$logo = $this->common_model->getById("logo", array('id' => '1'));


	//$image_file = K_PATH_IMAGES.'logo_example.jpg';
		//$this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		// Set font
		
	$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

	// set document information
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('Nicola Asuni');
	$pdf->SetTitle('INVOICE');
	$pdf->SetSubject('TCPDF Tutorial');
	$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

	// set default header data
	$pdf->SetHeaderData('');

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

	// ---------------------------------------------------------

	$pdf->SetFont('helvetica', '', 10);
	$pdf->AddPage('P', 'A4');
	   
	$pdf->Ln(48);

	$tbl = '<table align="center" cellpadding="4" cellspacing="4" width="100%" border="0">

	 <tr>
	  <td align="center"><h2>Deals in :</h3></td>
	  <td><img src="'.APPPATH.'/libraries/tcpdf/examples/images/'.$logo->deals1.'" style="width:100px; height: 50px;"></td>
	  <td><img src="'.APPPATH.'/libraries/tcpdf/examples/images/'.$logo->deals2.'" style="width:100px; height: 50px;"></td>
	  <td><img src="'.APPPATH.'/libraries/tcpdf/examples/images/'.$logo->deals3.'" style="width:100px; height: 50px;"></td>
	  <td><img src="'.APPPATH.'/libraries/tcpdf/examples/images/'.$logo->deals4.'" style="width:100px; height: 50px;"></td>
	  <td><img src="'.APPPATH.'/libraries/tcpdf/examples/images/'.$logo->deals5.'" style="width:100px; height: 50px;"></td>
	  <td><img src="'.APPPATH.'/libraries/tcpdf/examples/images/'.$logo->deals6.'" style="width:100px; height: 50px;"></td>
	 </tr>
	</table><table cellspacing="4" cellpadding="4" border="1">
    <tr>
        <td rowspan="4" width="350"><b>  M/s '.$customer->customer_name.',<br>&nbsp;&nbsp;'.$customer->address.'</b>, <br>&nbsp;&nbsp;<b>Contact :</b>&nbsp;'.$customer->customer_number.' </td>
        <td width="270"><b> INVOICE NO. :&nbsp;</b>'.$customer->invoice_no.'</td>        
    </tr>
    <tr>
    	<td><b> GST No. :&nbsp;</b>'.$customer->gst_number.'</td>
    </tr>
    <tr>
    	<td><b> TRANS. :&nbsp;</b>Self</td>
    </tr>
    <tr>
    	<td><b> DATE :&nbsp;</b>'.date("jS F, Y", strtotime($customer->created)).'</td>
    </tr>
</table>';

$pdf->writeHTML($tbl, true, false, false, false, '');




	$html1 = '
		<style>
			h1 {
				color: navy;
				font-family: times;
				font-size: 24pt;
				text-decoration: underline;
			}
			p.first {
				color: #003300;
				font-family: helvetica;
				font-size: 12pt;
			}
			p.first span {
				color: #006600;
				font-style: italic;
			}
			p#second {
				color: rgb(00,63,127);
				font-family: times;
				font-size: 12pt;
				text-align: justify;
			}
			p#second > span {
				background-color: #FFFFAA;
			}
			table.first {
				color: #003300;
				font-family: helvetica;
				font-size: 10pt;
				
			}
			table.test {
				color: #000000;		
				font-family: helvetica;
				font-size: 10pt;
				border-style: solid solid solid solid;
				border-width: 2px 2px 2px 2px;		
				text-align: Left;
				
			}
			td.right {		
				border-right: 1px solid black;		
			}
			td.subtotal {
				border-top: 2px solid black;
				border-right: 1px solid black;
				background-color: #ffffee;
			}
			td.last {
				border-bottom: 1px solid black;
				border-left: 1px solid black;
				border-right: 1px solid black;
				background-color: #ffffee;
			}
			td.grand {
				border-top: 2px solid black;
				border-bottom: 1px solid black;
				border-right: 1px solid black;
				border-left: 1px solid black;		
				background-color: #ffffee;
			}
			td.fright {
				border-top: 2px solid black;
				border-left: 1px solid black;
				border-right: 1px solid black;		
				background-color: #ffffee;
			}
			td.first {
				border-left: 1px solid black;
				border-right: 1px solid black;
				background-color: #ffffee;
			}
			td.second {
				border: 2px dashed green;
			}
			div.test {
				color: #000000;		
				font-family: helvetica;
				font-size: 10pt;
				border-style: solid solid solid solid;
				border-width: 2px 2px 2px 2px;		
				text-align: Left;
			}
			.lowercase {
				text-transform: lowercase;
			}
			.uppercase {
				text-transform: uppercase;
			}
			.capitalize {
				text-transform: capitalize;
			}
		</style>
		<table rowspan="200" class="first" cellpadding="0" cellspacing="0" height="500">
		 <tr>  
		  <td  width="40" align="center" bgcolor="#000000" color="white"><b>S.NO.</b></td>
		  <td width="120" align="center" bgcolor="#000000" color="white"><b>Product Name</b></td>
		  <td width="80" align="center" bgcolor="#000000" color="white"><b>HSN Code</b></td>
		  <td width="80" align="center" bgcolor="#000000" color="white"><b>Code</b></td>
		  <td width="80" align="center" bgcolor="#000000" color="white"><b>Code 2</b></td>
		  <td width="50" align="center" bgcolor="#000000" color="white"><b>Qut.</b></td>
		  <td width="50" align="center" bgcolor="#000000" color="white"><b>Sq. Mt.</b></td>
		  <td width="50" align="center" bgcolor="#000000" color="white"><b>Rate</b></td>
		  <td width="80" align="center" bgcolor="#000000" color="white"><b>Total</b></td>  
		 </tr>
		 <tr>  
		  <td class="first" width="40" align="center"><b></b></td>
		  <td class="first" width="120" align="center"><b></b></td>
		  <td class="first" width="80" align="center"><b></b></td>
		  <td class="first" width="80" align="center"><b></b></td>
		  <td class="first" width="80" align="center"><b></b></td>
		  <td class="first" width="50" align="center"><b></b></td>
		  <td class="first" width="50" align="center"><b></b></td>		  
		  <td class="first" width="50" align="center"><b></b></td>
		  <td class="first" width="80" align="center"><b></b></td>  
		 </tr>'
		 ;

		$html2 ='';
		$j = 1;
		for ($i=0; $i < $count; $i++) {
		 $html2 .= '<tr>  
		  <td class="first" width="40" align="center"><b>'.$j.'</b></td>
		  <td class="first" width="120" align="center"><b>'.$customer->product_name[$i][0].'</b></td>
		  <td class="first" width="80" align="center"><b>'.hsncode($customer->product_code[$i][0]).'</b></td>
		  <td class="first" width="80" align="center"><b>'.productcode($customer->product_code[$i][0]).'</b></td>
		  <td class="first" width="80" align="center"><b>'.productcode2($customer->product_code[$i][0]).'</b></td>
		  <td class="first" width="50" align="center"><b>'.$customer->quantity[$i][0].'</b></td>
		  <td class="first" width="50" align="center"><b>'.$customer->sizevalue[$i][0].'</b></td>
		  
		  <td class="first" width="50" align="center"><b>'.$customer->price[$i][0].'</b></td>
		  <td class="first" width="80" align="center"><b>'.$customer->total[$i][0].'</b></td>  
		 </tr>';
		$j++;
		}
		
		$html3 ='<tr>  
		  <td class="first" width="40" align="center" ><b></b></td>
		  <td class="first" width="120" align="center" ><b></b></td>
		  <td class="first" width="80" align="center" ><b></b></td>
		  <td class="first" width="80" align="center" ><b></b></td>
		  <td class="first" width="80" align="center" ><b></b></td>
		  <td class="first" width="50" align="center" ><b></b></td>
		  <td class="subtotal" width="80" align="left" ><b> subtotal </b></td>
		  <td class="subtotal" width="100" align="right" ><b>'.$customer->subtotal.'&nbsp;&nbsp;&nbsp; </b></td>  
		 </tr>
		 <tr>  
		  <td class="last" width="40" align="center" ><b></b></td>
		  <td class="last" width="120" align="center" ><b></b></td>
		  <td class="last" width="80" align="center" ><b></b></td>
		  <td class="last" width="80" align="center" ><b></b></td>
		  <td class="last" width="80" align="center" ><b></b></td>
		  <td class="last" width="50" align="center" ><b></b></td>
		  <td class="subtotal" width="80" height="" align="left" ><b> Discount </b></td>
		  <td class="subtotal" width="100" height="" align="right" ><b>'.$customer->discountamt.'&nbsp;&nbsp;&nbsp; </b></td>  
		 </tr>
		 <tr>  
		  <td width="450" align="left" ></td>
		  <td class="fright" width="80"  align="left" ><b> Fright </b></td>
		  <td class="fright" width="100" align="right" ><b>'.$customer->fright.'&nbsp;&nbsp;&nbsp; </b></td>  
		 </tr>
		 <tr>  
		  <td width="450" align="left" ></td>  
		  
		  <td class="fright" width="80"  align="left" ><b> CGST</b></td>
		  <td class="fright" width="100" align="right" ><b> '.$cgst2.'&nbsp;&nbsp;&nbsp; </b></td>
		 </tr>
		 <tr>  
		  <td width="450" align="left" ><b>  GSTIN No :</b> 23BRCPS3558P1Z7&nbsp;&nbsp;&nbsp; </td>  
		  
		  <td class="fright" width="80"  align="left" ><b> SGST</b></td>
		  <td class="fright" width="100" align="right" ><b> '.$cgst2.'&nbsp;&nbsp;&nbsp; </b></td>
		 </tr>
		 <tr>  
		  <td width="450" align="left" ><b>  Bank Detail : </b>Bank of India&nbsp; &nbsp; &nbsp; &nbsp; <b>A/C No. :</b> 885320110000044</td>  
		  
		  <td class="fright" width="80"  align="left" ><b> IGST</b></td>
		  <td class="fright" width="100" align="right" ><b> </b></td>
		 </tr>
		 <tr>  
		  <td width="450" align="left" ><b>  IFSC No. :</b>Bkid 0008853 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b> Branch :</b> Dewas Naka, Indore (M.P.)</td>  
		  <td class="grand" width="80"  align="left" ><b> Grand Total </b></td>
		  <td class="grand" width="100" align="right" ><b>'.$customer->grandtotal.'&nbsp;&nbsp;&nbsp; </b></td>  
		 </tr>
		 <tr>  
		  <td></td>  
		 </tr>
		 <tr>  
		  <td width="450"></td>
		  <td width="180" align="left" ><b>  For : </b>'.$logo->shopname.'&nbsp;&nbsp;&nbsp; </td>  
		 </tr>
		 
		 </table>';


		 $pdf->writeHTML($html1.$html2.$html3, true, false, true, false, '');

		 for ($i=0; $i < $remain; $i++) {
		 $html4 = '<table><tr>  
		  <td></td>  
		 </tr></table>';
		$j++;
		}

		$pdf->writeHTML($html4, true, false, true, false, '');


		 // $f = '<table class="first" cellpadding="0" cellspacing="2" border="1">
		 //  <tr><td  align="left" bgcolor="#000000" color="white"><b>&nbsp;'.$logo->footer.'</b></td></tr>	  
		 // </table>';

			// $pdf->writeHTML($f, true, false, true, false, '');

		

	$pdf->Output('example_061.pdf', 'I');

}
public function generate_pdf(){


	$id = $this->uri->segment(3);
	$customer = $this->common_model->getById("bill_add", array('id' => $id));
	$cust = $customer;
	$cust->product_code = json_decode($customer->product_code);
	$cust->product_name = json_decode($customer->product_name);
	$cust->quantity = json_decode($customer->quantity);
	$cust->price = json_decode($customer->price);
	$cust->total = json_decode($customer->total);
	$cust->size = json_decode($customer->size);
	$cust->sizevalue = json_decode($customer->sizevalue);
	$x = 2;
	$cgst = $customer->gstamt;
	
	 $b = str_replace( ',', '', $customer->gstamt);

	 $cgst1 = (int)$b;

	 $cgst2 = $cgst1/2;

	$customer = $cust;
	$in = str_replace('-', '', preg_replace('/[^A-Za-z0-9\-]/', '', $customer->created)).$customer->id;
	$date = date("jS F, Y", strtotime($customer->created));
	$count = count($customer->product_code);
	if ($count<25) {
		$remain = 25-$count;
	}
	

	//echo "<pre>";print_r($customer);die;

	$logo = $this->common_model->getById("logo", array('id' => '1'));


	//$image_file = K_PATH_IMAGES.'logo_example.jpg';
		//$this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		// Set font
		
	$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

	// set document information
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('Nicola Asuni');
	$pdf->SetTitle('INVOICE');
	$pdf->SetSubject('TCPDF Tutorial');
	$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

	// set default header data
	$pdf->SetHeaderData('','','','', array(255,255,255), array(255,255,255));

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

	// ---------------------------------------------------------

	$pdf->SetFont('helvetica', '', 10);
	$pdf->AddPage('P', 'A4');
	   $head ='
		<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%";>
	<tr>
	  
	  <td><img src="'.APPPATH.'/libraries/tcpdf/examples/images/'.$logo->logo.'" style="width:200px; height: 100px;"></td>
	   <td  align="center" width="33.33%" style="max-width:33.33%;">
	  	<h3>INVOICE</h3>
	    <strong style="text-decoration: underline; margin-top: 40px; display: inline-block;"><h3 style="margin: 0;">Auth. Distributer :</h3></strong>Century Veneers, Alu Decor
	  </td>
	  <td align="left" width="33%.33" style="max-width:33.33%;"><br>'.$logo->title.'<br>'.$logo->address.'
	  </td>

	 </tr>
	</table><br><br>

	<table align="center" cellpadding="6" cellspacing="4" width="99%" border="1">

	 <tr>
	  <td><h3>Deals in :</h3></td>
	  <td><img src="'.APPPATH.'/libraries/tcpdf/examples/images/'.$logo->deals1.'" style="width:100px; height: 40px;"></td>
	  <td><img src="'.APPPATH.'/libraries/tcpdf/examples/images/'.$logo->deals2.'" style="width:100px; height: 40px;"></td>
	  <td><img src="'.APPPATH.'/libraries/tcpdf/examples/images/'.$logo->deals3.'" style="width:100px; height: 40px;"></td>
	  <td><img src="'.APPPATH.'/libraries/tcpdf/examples/images/'.$logo->deals4.'" style="width:100px; height: 40px;"></td>
	  <td><img src="'.APPPATH.'/libraries/tcpdf/examples/images/'.$logo->deals5.'" style="width:100px; height: 40px;"></td>
	  <td><img src="'.APPPATH.'/libraries/tcpdf/examples/images/'.$logo->deals6.'" style="width:100px; height: 40px;"></td>
	 </tr>
	</table><br>';
	$pdf->writeHTML($head, true, false, true, false, '');


	$tbl = '
<table cellspacing="4" cellpadding="1" border="1">
    <tr>
        <td rowspan="4" width="350"><b>  M/s '.$customer->customer_name.',<br>&nbsp;&nbsp;'.$customer->address.'</b>, <br>&nbsp;&nbsp;<b>Contact :</b>&nbsp;'.$customer->customer_number.' </td>
        <td width="270"><b> INVOICE NO. :&nbsp;</b>'.$customer->invoice_no.'</td>        
    </tr>
    <tr>
    	<td><b> GST No. :&nbsp;</b>'.$customer->gst_number.'</td>
    </tr>
    <tr>
    	<td><b> TRANS. :&nbsp;</b>Self</td>
    </tr>
    <tr>
    	<td><b> DATE :&nbsp;</b>'.date("jS F, Y", strtotime($customer->created)).'</td>
    </tr>
</table>';

$pdf->writeHTML($tbl, true, false, false, false, '');




	$html1 = '
		<style>
			h1 {
				color: navy;
				font-family: times;
				font-size: 24pt;
				text-decoration: underline;
			}
			p.first {
				color: #003300;
				font-family: helvetica;
				font-size: 12pt;
			}
			p.first span {
				color: #006600;
				font-style: italic;
			}
			p#second {
				color: rgb(00,63,127);
				font-family: times;
				font-size: 12pt;
				text-align: justify;
			}
			p#second > span {
				background-color: #FFFFAA;
			}
			table.first {
				color: #003300;
				font-family: helvetica;
				font-size: 10pt;
				
			}
			table.test {
				color: #000000;		
				font-family: helvetica;
				font-size: 10pt;
				border-style: solid solid solid solid;
				border-width: 2px 2px 2px 2px;		
				text-align: Left;
				
			}
			td.right {		
				border-right: 1px solid black;		
			}
			td.subtotal {
				border-top: 2px solid black;
				border-right: 1px solid black;
				background-color: #ffffee;
			}
			td.last {
				border-bottom: 1px solid black;
				border-left: 1px solid black;
				border-right: 1px solid black;
				background-color: #ffffee;
			}
			td.grand {
				border-top: 2px solid black;
				border-bottom: 1px solid black;
				border-right: 1px solid black;
				border-left: 1px solid black;		
				background-color: #ffffee;
			}
			td.fright {
				border-top: 2px solid black;
				border-left: 1px solid black;
				border-right: 1px solid black;		
				background-color: #ffffee;
			}
			td.first {
				border-left: 1px solid black;
				border-right: 1px solid black;
				background-color: #ffffee;
			}
			td.second {
				border: 2px dashed green;
			}
			div.test {
				color: #000000;		
				font-family: helvetica;
				font-size: 10pt;
				border-style: solid solid solid solid;
				border-width: 2px 2px 2px 2px;		
				text-align: Left;
			}
			.lowercase {
				text-transform: lowercase;
			}
			.uppercase {
				text-transform: uppercase;
			}
			.capitalize {
				text-transform: capitalize;
			}
		</style>
		<table rowspan="200" class="first" cellpadding="0" cellspacing="0" height="500">
		 <tr>  
		  <td  width="40" align="center" bgcolor="#000000" color="white"><b>S.NO.</b></td>
		  <td width="120" align="center" bgcolor="#000000" color="white"><b>Product Name</b></td>
		  <td width="80" align="center" bgcolor="#000000" color="white"><b>HSN Code</b></td>
		  <td width="80" align="center" bgcolor="#000000" color="white"><b>Code</b></td>
		  <td width="80" align="center" bgcolor="#000000" color="white"><b>Code 2</b></td>
		  <td width="50" align="center" bgcolor="#000000" color="white"><b>Qut.</b></td>
		  <td width="50" align="center" bgcolor="#000000" color="white"><b>Sq. Mt.</b></td>
		  <td width="50" align="center" bgcolor="#000000" color="white"><b>Rate</b></td>
		  <td width="80" align="center" bgcolor="#000000" color="white"><b>Total</b></td>  
		 </tr>
		 <tr>  
		  <td class="first" width="40" align="center"><b></b></td>
		  <td class="first" width="120" align="center"><b></b></td>
		  <td class="first" width="80" align="center"><b></b></td>
		  <td class="first" width="80" align="center"><b></b></td>
		  <td class="first" width="80" align="center"><b></b></td>
		  <td class="first" width="50" align="center"><b></b></td>
		  <td class="first" width="50" align="center"><b></b></td>		  
		  <td class="first" width="50" align="center"><b></b></td>
		  <td class="first" width="80" align="center"><b></b></td>  
		 </tr>'
		 ;

		$html2 ='';
		$j = 1;
		for ($i=0; $i < $count; $i++) {
		 $html2 .= '<tr>  
		  <td class="first" width="40" align="center"><b>'.$j.'</b></td>
		  <td class="first" width="120" align="center"><b>'.$customer->product_name[$i][0].'</b></td>
		  <td class="first" width="80" align="center"><b>'.hsncode($customer->product_code[$i][0]).'</b></td>
		  <td class="first" width="80" align="center"><b>'.productcode($customer->product_code[$i][0]).'</b></td>
		  <td class="first" width="80" align="center"><b>'.productcode2($customer->product_code[$i][0]).'</b></td>
		  <td class="first" width="50" align="center"><b>'.$customer->quantity[$i][0].'</b></td>
		  <td class="first" width="50" align="center"><b>'.$customer->sizevalue[$i][0].'</b></td>
		  
		  <td class="first" width="50" align="center"><b>'.$customer->price[$i][0].'</b></td>
		  <td class="first" width="80" align="center"><b>'.$customer->total[$i][0].'</b></td>  
		 </tr>';
		$j++;
		}
		for ($i=0; $i < $remain; $i++) {
		 $html2 .= '<tr>  
		  <td class="first" width="40" align="center"><b></b></td>
		  <td class="first" width="120" align="center"><b></b></td>
		  <td class="first" width="80" align="center"><b></b></td>
		  <td class="first" width="80" align="center"><b></b></td>
		  <td class="first" width="80" align="center"><b></b></td>
		  <td class="first" width="50" align="center"><b></b></td>
		  <td class="first" width="50" align="center"><b></b></td>
		  
		  <td class="first" width="50" align="center"><b></b></td>
		  <td class="first" width="80" align="center"><b></b></td>  
		 </tr>';
		$j++;
		}
		$html3 ='<tr>  
		  <td class="first" width="40" align="center" ><b></b></td>
		  <td class="first" width="120" align="center" ><b></b></td>
		  <td class="first" width="80" align="center" ><b></b></td>
		  <td class="first" width="80" align="center" ><b></b></td>
		  <td class="first" width="80" align="center" ><b></b></td>
		  <td class="first" width="50" align="center" ><b></b></td>
		  <td class="subtotal" width="80" align="left" ><b> subtotal </b></td>
		  <td class="subtotal" width="100" align="right" ><b>'.$customer->subtotal.'&nbsp;&nbsp;&nbsp; </b></td>  
		 </tr>
		 <tr>  
		  <td class="last" width="40" align="center" ><b></b></td>
		  <td class="last" width="120" align="center" ><b></b></td>
		  <td class="last" width="80" align="center" ><b></b></td>
		  <td class="last" width="80" align="center" ><b></b></td>
		  <td class="last" width="80" align="center" ><b></b></td>
		  <td class="last" width="50" align="center" ><b></b></td>
		  <td class="subtotal" width="80" height="" align="left" ><b> Discount </b></td>
		  <td class="subtotal" width="100" height="" align="right" ><b>'.$customer->discountamt.'&nbsp;&nbsp;&nbsp; </b></td>  
		 </tr>
		 <tr>  
		  <td width="450" align="left" ></td>
		  <td class="fright" width="80"  align="left" ><b> Fright </b></td>
		  <td class="fright" width="100" align="right" ><b>'.$customer->fright.'&nbsp;&nbsp;&nbsp; </b></td>  
		 </tr>
		 <tr>  
		  <td width="450" align="left" ></td>  
		  
		  <td class="fright" width="80"  align="left" ><b> CGST</b></td>
		  <td class="fright" width="100" align="right" ><b> '.$cgst2.'&nbsp;&nbsp;&nbsp; </b></td>
		 </tr>
		 <tr>  
		  <td width="450" align="left" ><b>  GSTIN No :</b> 23BRCPS3558P1Z7&nbsp;&nbsp;&nbsp; </td>  
		  
		  <td class="fright" width="80"  align="left" ><b> SGST</b></td>
		  <td class="fright" width="100" align="right" ><b> '.$cgst2.'&nbsp;&nbsp;&nbsp; </b></td>
		 </tr>
		 <tr>  
		  <td width="450" align="left" ><b>  Bank Detail : </b>Bank of India&nbsp; &nbsp; &nbsp; &nbsp; <b>A/C No. :</b> 885320110000044</td>  
		  
		  <td class="fright" width="80"  align="left" ><b> IGST</b></td>
		  <td class="fright" width="100" align="right" ><b> </b></td>
		 </tr>
		 <tr>  
		  <td width="450" align="left" ><b>  IFSC No. :</b>Bkid 0008853 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b> Branch :</b> Dewas Naka, Indore (M.P.)</td>  
		  <td class="grand" width="80"  align="left" ><b> Grand Total </b></td>
		  <td class="grand" width="100" align="right" ><b>'.$customer->grandtotal.'&nbsp;&nbsp;&nbsp; </b></td>  
		 </tr>
		 <tr>  
		  <td></td>  
		 </tr>
		 <tr>  
		  <td width="450"></td>
		  <td width="180" align="left" ><b>  For : </b>'.$logo->shopname.'&nbsp;&nbsp;&nbsp; </td>  
		 </tr>
		 
		 </table>';


		 $pdf->writeHTML($html1.$html2.$html3, true, false, true, false, '');


		 $f = '<table class="first" cellpadding="0" cellspacing="2" border="1">
		  <tr><td  align="left" bgcolor="#000000" color="white"><b>&nbsp;'.$logo->footer.'</b></td></tr>	  
		 </table>';

			$pdf->writeHTML($f, true, false, true, false, '');

		

	$pdf->Output('example_061.pdf', 'I');

}
 	



}

