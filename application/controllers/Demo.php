<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/tcpdf/config/lang/eng.php';

require APPPATH . '/libraries/tcpdf/tcpdf.php';

class Demo extends CI_Controller {



	public function __construct()

 	{

 		parent::__construct();

		$this->load->helper('url');

 		$this->load->model('common_model');

 		$this->load->library('form_validation');

 		$this->load->helper(array('form', 'url'));	

 	}



	//Page header
	public function Header() {
		// Logo
		$image_file = K_PATH_IMAGES.'logo_example.jpg';
		$this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		// Set font
		$this->SetFont('helvetica', 'B', 20);
		// Title
		$this->Cell(0, 15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
	}

	// Page footer
	public function Footer() {
		// Position at 15 mm from bottom
		$this->SetY(-15);
		// Set font
		$this->SetFont('helvetica', 'I', 8);
		// Page number
		$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
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
	
	$auth = '<b>Auth. Distributer :';
	//echo "<pre>";print_r($customer);die;

	$logo = $this->common_model->getById("logo", array('id' => '1'));

		// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 003');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
$head = '   
			Auth. Distributer :
		Century Veneers, Alu Decor	
	  '.$logo->title.''.$logo->address.'
	  ';
// set default header data
$pdf->SetHeaderData($logo->logo, 50, '              INVOICE', $head);

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

// set font
$pdf->SetFont('times', 'BI', 12);

// add a page
$pdf->AddPage();

// set some text to print
// $txt = <<<EOD
// TCPDF Example 003

// Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.
// EOD;

// // print a block of text using Write()
// $pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_003.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+


		

	}
 	



}

