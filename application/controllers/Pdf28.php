<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/tcpdf/config/lang/eng.php';

require APPPATH . '/libraries/tcpdf/tcpdf.php';

class Pdf extends CI_Controller {



	public function __construct()

 	{

 		parent::__construct();

		$this->load->helper('url');

 		$this->load->model('common_model');

 		$this->load->library('form_validation');

 		$this->load->helper(array('form', 'url'));	

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
 		$data['customer'] = $cust;
		$this->load->view('product/pdf', $data);
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
 		$customer = $cust;
 		$in = str_replace('-', '', preg_replace('/[^A-Za-z0-9\-]/', '', $customer->created)).$customer->id;
 		$date = date("jS F, Y", strtotime($customer->created));
		//$this->load->view('product/pdf', $data);
 		$count = count($customer->product_code);

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 061');
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
	$html = <<<EOF
	<!-- EXAMPLE OF CSS STYLE -->

	<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="padding-bottom: 5px;
padding-top: 5px;">
<tr><br><br>
  
  <td><img src="http://www.opulenceinfotech.com/demo/newproduct/application/libraries/tcpdf/examples/images/aadarsh.png" style="width:200px; height: 100px;"></td>
   <td  align="center" width="33.33%" style="max-width:33.33%;">
  	<h3>INVOICE</h3>
    <strong style="text-decoration: underline; margin-top: 40px; display: inline-block;"><h3 style="margin: 0;">Auth. Distributer :</h3></strong>Century Veneers, wintuff Plywood
  </td>
  <td align="left" width='33%.33' style='max-width:33.33%;'><br><br>R/O:75/2/40, Lasudia Mori, Dewas Naka indore 452010 Tel:0731-491033<br>Fax : 0731-40333741<br>Mob : 98931-94830<br>Email:aadarshdsiv@gmail.com 
  </td>

 </tr>
</table><br><br><br>

<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="padding-bottom: 5px;
padding-top: 5px;">
<tr>
  <td><h3>Deals in :</h3></td>
  <td><img src="http://www.opulenceinfotech.com/demo/newproduct/application/libraries/tcpdf/examples/images/win.jpg" style="width:100px; height: 40px;"></td>
  <td><img src="http://www.opulenceinfotech.com/demo/newproduct/application/libraries/tcpdf/examples/images/century.png" style="width:100px; height: 40px;"></td>
  <td><img src="http://www.opulenceinfotech.com/demo/newproduct/application/libraries/tcpdf/examples/images/fevicol.jpeg" style="width:100px; height: 40px;"></td>
  <td><img src="http://www.opulenceinfotech.com/demo/newproduct/application/libraries/tcpdf/examples/images/euro.png" style="width:100px; height: 40px;"></td>
  <td><img src="http://www.opulenceinfotech.com/demo/newproduct/application/libraries/tcpdf/examples/images/royal.png" style="width:100px; height: 40px;"></td>
  <td><img src="http://www.opulenceinfotech.com/demo/newproduct/application/libraries/tcpdf/examples/images/violam.png" style="width:100px; height: 40px;"></td>
 </tr>
</table><br><br><br>


EOF;
$pdf->writeHTML($html, true, false, true, false, '');



//print_r($htm);die;

// print_r($product_name);
// print_r($product_code);
// print_r($product_code2);
// print_r($quantity);
// print_r($price);
// print_r($total);

$html1 ="<style>
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
		color: #000000;
		font-family: helvetica;
		font-size: 8pt;
		border-left: 3px solid red;
		border-right: 3px solid #FF00FF;
		border-top: 3px solid green;
		border-bottom: 3px solid blue;
		background-color: #ccffcc;
	}
	td {
		border: 2px solid blue;
		background-color: #ffffee;
	}
	td.second {
		border: 2px dashed green;
	}
	div.test {
		color: #CC0000;
		background-color: #FFFF66;
		font-family: helvetica;
		font-size: 10pt;
		border-style: solid solid solid solid;
		border-width: 2px 2px 2px 2px;
		border-color: green #FF00FF blue red;
		text-align: center;
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
<table align='center' border='1px solid black' cellpadding='1' cellspacing='6' width='100%'>
<tr>
  <td>
  		<table style='width:100%'>
	    	<tr><td style='height: 28px;'><b>M/s </b><span>$customer->customer_name</span></td></tr>
	        <tr><td style='height: 28px;'><b>Contact :</b><span>$customer->customer_number.</span></td></tr>
	        <tr><td style='height: 28px;'><b>Party GSTIN No :</b><span>$customer->gst_number</span></td></tr>
  		</table>
  </td>
  <td style='border:1px solid #000; border-radius:0px 10px 0px 0px; width:30%;padding:10px 15px;float:right; box-sizing: border-box; height: 110px;'>
	  <table style='width:100%'>
	    	<tr style='height: 40px;'>
	        <td ><b>Invoice No. :</b><span> $in</span></td>        
	        </tr>
	        <tr style='height: 40px;'>        
	        <td><b>Date :</b><span> $date</span></td>
	        </tr>
	        <tr style='height: 40px;'><td><b>Trans : </b><span> Self</span></td></tr>
	  	</table>
  </td>
 </tr>
</table>
<table align='center' border='0' cellpadding='10' cellspacing='1' width='100%' style='margin-top: 5px;     border-bottom: 1px solid;'>
<tr bgcolor='#000000' style='color: #fff; margin-top: 4px; margin-bottom: 4px; padding: 8px 0; width: 100%; ' align='center'>
<td ><b>S.No.</b></td>
<td><b>Description of Goods</b></td>
<td><b>HSN Code</b></td>
<td><b>Code</b></td>
<td><b>Qty.</b></td>
<td><b>Sq. Mt.</b></td>
<td><b>Rate</b></td>
<td><b>Amount</b></td>
</tr>".

$html2 ='';
$j = 1;
for ($i=0; $i < $count; $i++) {
	
$html2 .= "<tr align='center'>
<td style='border-right:1px solid;'>".$j."</td>
<td style='border-left:1px solid; border-right:1px solid;'>".$customer->product_name[$i][0]."</td>
<td style='border-right:1px solid;'>".productcode($customer->product_code[$i][0])."</td>
<td style='border-right:1px solid;'>".productcode2($customer->product_code[$i][0])."</td>
<td style='border-right:1px solid;'>".$customer->quantity[$i][0]."</td>
<td style='border-right:1px solid;'>-</td>
<td style='border-right:1px solid;'>".$customer->price[$i][0]."</td>
<td style='border-right:1px solid;'>".$customer->total[$i][0]."</td>
</tr>
";

$j++;
}

$html3 ="<tr align='center' style='height:100px;'>
<td style='border-left:1px solid; border-right:1px solid;'></td>
<td style='border-right:1px solid;'></td>
<td style='border-right:1px solid;'></td>
<td style='border-right:1px solid;'></td>
<td style='border-right:1px solid;'></td>
<td style='border-right:1px solid;'></td>
<td style='border-right:1px solid;'></td>
<td style='border-right:1px solid;'></td>
</tr>
</table>

<table align='center' cellpadding='10' cellspacing='0' width='100%' >
  <tr>
    <td width='63%' style='padding: 0;'>
      <table>
        <tr>
          <td><b>GSTIN - 23BRCPS3558P1Z7</b><br></td>
        </tr>
        <tr>
          <td><span>Bank Detail : Bank of India</span></td>          
        </tr>
        <tr>          
          <td><span>A/C No. 885320110000044</span></td>          
        </tr>
        <tr>          
          <td><span>IFSC No. : Bkid 0008853</span></td>
        </tr>
        <tr>          
          
          <td><span>Branch : Dewas Naka, Indore (M.P.)</span></td>
        </tr>
        <tr>
          <td><b>Rs. in Words</b> <span>Two Thousand Five Hundred Twenty only </span></td>
        </tr>
      </table>   
    </td>
    <td width='30.4%' style='padding: 0;'>
    	<table width='100%' cellpadding='0' cellspacing='0' style='margin-top: -73px; background:#fff'>
        <tr>
          <td>
            <table  cellpadding='4' border='1' cellspacing='0' width='100%'>
              <tr>
                <td width='33%'>Sub Total</td>
                <td width='33%'>$customer->subtotal</td>
              </tr>
              <tr>
                <td>Discount</td>
                <td>$customer->discountamt</td>
              </tr>
              <tr>
                <td>Fright</td>
                <td>$customer->fright</td>
              </tr>              
              <tr>
                <td>GST</td>
                <td>$customer->gstamt</td>
              </tr>
              <tr>
                <td>G.TOTAL</td>
                <td>$customer->grandtotal</td>
              </tr>
            </table>    
          </td>
    		</tr>
     	</table>       
    </td>
  </tr>
</table>
";

	$pdf->writeHTML($html1.$html2.$html3, true, false, true, false, '');


	$pdf->Output('example_061.pdf', 'I');

 	}
 	



}

