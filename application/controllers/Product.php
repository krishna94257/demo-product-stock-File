<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Product extends CI_Controller {

	public function __construct()
 	{
 		parent::__construct();
		$this->load->helper('url');
 		$this->load->model('common_model');
 		$this->load->library('form_validation');
 		$this->load->helper(array('form','url')); 


 		$this->user_id = $this->session->userdata('user_id');
		if(!$this->user_id){
		  redirect('user/login_view');
		}
		 error_reporting(E_ALL ^ E_NOTICE);
         ini_set('display_errors', 0);
		
 	}
	public function index(){

        $user_id = $_SESSION['user_id'];
        $check=$this->common_model->get_user_by_userid($user_id);
			//if(!$check)
			//{
			$data['list']=$this->common_model->allByCon("bill_add", array('status' => 1,'user_id' => $user_id));
			$user = $this->common_model->get_user_by_userid($user_id);
			if($user)
			{
			 $this->load->view('product/header');
			$this->load->view('product/dashboard', $data);
			$this->load->view('product/footer');
			}
			else
			{
				
			$this->load->view('product/header');
			$this->load->view('product/index', $data);
			$this->load->view('product/footer');
		   }
	   // }
	    //~ else
	    //~ {
		  //~ $this->load->view('product/header');
		  //~ $this->load->view('product/index', $data);
		  //~ $this->load->view('product/footer');
		//~ }
	}
	public function profile() {
        $this->load->view('product/header');
		$this->load->view('product/footer');
   }
	public function productList() {   
		$user_id = $_SESSION['user_id'];
		
		$data=$this->common_model->get_user_by_userid($user_id);
		if($data)
		{
			 //$data['name'] = $this->common_model->get_username_by_userid($user_id);
			 $data['list']=$this->common_model->all('product');
			 
		     $this->load->view('product/header');
             $this->load->view('product/productlist',$data);
		     $this->load->view('product/footer');
		}
		else
		{
			$data['list']=$this->common_model->get_product_by_userid($user_id);	
		     $this->load->view('product/header');
             $this->load->view('product/productlist',$data);
		     $this->load->view('product/footer');
		}
		
	}
	public function product_add(){

		 $user_id = $_SESSION['user_id'];
		$this->form_validation->set_rules('product_id', 'Product Id', 'trim|required|min_length[2]');
		$this->form_validation->set_rules('product_name', 'Product Name', 'trim|required|min_length[2]');
		// if (!$this->input->post('id')) {
		// 	$this->form_validation->set_rules('product_id', 'Code', 'trim|required|min_length[2]|is_unique[product.product_id]');
		// }
		$this->form_validation->set_rules('product_categorie', 'Product Categorie', 'trim|required');
		$this->form_validation->set_rules('quantity', 'Quantity', 'trim|required'); 
        
        if($this->form_validation->run() == FALSE){
        	$data['category']=$this->common_model->get_category_by_userid($user_id);

        	if ($this->uri->segment(3) !="") {
	            $id = $this->uri->segment(3);
	            $array = array('id' => $id,'user_id' => $user_id);
	           
	            $data['details']=$this->common_model->getById("product", $array);
	            $this->load->view('product/header');
	            $this->load->view('product/add_product', $data);
	            $this->load->view('product/footer');
	        }else{
 	            $data['details'] = "";
	            $this->load->view('product/header');
            	$this->load->view('product/add_product', $data);
            	$this->load->view('product/footer');
	        }
            
        } elseif (!empty($this->input->post())) {
		      $user_id = $_SESSION['user_id'];
		     
            if ( $this->input->post('id')) {
	            
	            $data = array(
	                 'user_id'=>$user_id,
	            	'product_id'=>$this->input->post('product_id'),
	            	'product_id2'=>$this->input->post('product_id2'),
	            	'hsn'=>$this->input->post('hsn'),
					'product_name'=>$this->input->post('product_name'),
					'product_categorie'=>$this->input->post('product_categorie'),
					'quantity'=>$this->input->post('quantity'),
					'price'=>$this->input->post('price'),
					'product_description'=>$this->input->post('product_description')        
	            );	           
	        
	            $pid = array('id' =>$this->input->post('id'));
	            
	            $this->common_model->update("product", $pid, $data);
	            $this->session->set_flashdata('success', 'Product details has been updated');
        	}else{

	            $data = array(
	                  'user_id'=>$user_id,
	                'product_id'=>$this->input->post('product_id'),
	                'product_id2'=>$this->input->post('product_id2'),
	            	'hsn'=>$this->input->post('hsn'),	                
					'product_name'=>$this->input->post('product_name'),
					'product_categorie'=>$this->input->post('product_categorie'),
					'quantity'=>$this->input->post('quantity'),
					'price'=>$this->input->post('price'),					
					'product_description'=>$this->input->post('product_description'),
					
	            );
	            
	            $this->common_model->add("product", $data);
	            $this->session->set_flashdata('success', 'Product details has been inserted');
        	}
            
            redirect('product/productList');
        
        }else{
        	$this->load->view("product/add_product");
        }
    }	
	public function ajax_edit($id){
		$data = $this->book_model->get_by_id("books", $id);
		echo json_encode($data);
	}
	public function product_update(){
		$data = array(
				
				'book_title' => $this->input->post('book_title'),
				'book_author' => $this->input->post('book_author'),
				'book_category' => $this->input->post('book_category'),
			);
		$this->book_model->book_update("books", array('book_id' => $this->input->post('book_id')), $data);
		echo json_encode(array("status" => TRUE));
	}
	public function delete($id){
		$this->common_model->delete_by_id("product",$id);
		echo json_encode(array("status" => TRUE));
	}
	public function deletepdf($id){
		$this->common_model->delete_by_id("pdf",$id);
		echo json_encode(array("status" => TRUE));
	}
	public function delete_bill($id){
		$this->common_model->update_by_id("bill_add",$id);
		echo json_encode(array("status" => TRUE));
	}
	public function plotlist($id){ 
		
       $result = $this->db->where("names",$id)->get("plot")->result();
       
       echo json_encode($result);
   	}
   	public function excel_import(){

		$data['num_rows'] = $this->db->get('tb_import')->num_rows();
		$this->load->view('excel_import', $data);
	}
	public function import_data(){
		
		$config = array(
			'upload_path'   => FCPATH.'upload/',
			'allowed_types' => 'xls|csv'
		);
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('file')) {
			$data = $this->upload->data();
			@chmod($data['full_path'], 0777);

			$this->load->library('Spreadsheet_Excel_Reader');
			$this->spreadsheet_excel_reader->setOutputEncoding('CP1251');

			$this->spreadsheet_excel_reader->read($data['full_path']);
			$sheets = $this->spreadsheet_excel_reader->sheets[0];
			error_reporting(0);

			$data_excel = array();
			for ($i = 2; $i <= $sheets['numRows']; $i++) {
				if ($sheets['cells'][$i][1] == '') break;

				$data_excel[$i - 1]['name']    = $sheets['cells'][$i][1];
				$data_excel[$i - 1]['phone']   = $sheets['cells'][$i][2];
				$data_excel[$i - 1]['address'] = $sheets['cells'][$i][3];
			}

			$this->db->insert_batch('tb_import', $data_excel);
			
			redirect('excel_import');
		}
	}
	public function product_import(){
	    $this->load->view('product/header');
		$this->load->view('product/product_import');
		$this->load->view('product/footer');
	}
	public function product_upload() {
      
		$config = array(
			'upload_path'   => FCPATH.'upload/',
			'allowed_types' => 'xls|csv'
		);
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('file')) {
			//echo"a";
			$data = $this->upload->data();
			@chmod($data['full_path'], 0777);
              $user_id = $_SESSION['user_id'];
			$this->load->library('Spreadsheet_Excel_Reader');
			$this->spreadsheet_excel_reader->setOutputEncoding('CP1251');

			$this->spreadsheet_excel_reader->read($data['full_path']);
			$sheets = $this->spreadsheet_excel_reader->sheets[0];
			error_reporting(0);

			$data_excel = array();
			for ($i = 2; $i <= $sheets['numRows']; $i++) {
				if ($sheets['cells'][$i][1] == '') break;

				$data_excel[$i - 1]['user_id'] = $user_id;
				$data_excel[$i - 1]['product_name']   = $sheets['cells'][$i][1];
				$data_excel[$i - 1]['product_id'] = $sheets['cells'][$i][2];// 
				$data_excel[$i - 1]['product_id2'] = $sheets['cells'][$i][3];
				$data_excel[$i - 1]['product_categorie'] = $sheets['cells'][$i][4];
				$data_excel[$i - 1]['quantity'] = $sheets['cells'][$i][5];
				$data_excel[$i - 1]['price'] = $sheets['cells'][$i][6];
				$data_excel[$i - 1]['product_description'] = $sheets['cells'][$i][7];
				$data_excel[$i - 1]['status'] = 1;
			}

			$this->db->insert_batch('product', $data_excel);			
			redirect('product/productList');
		}
		else {
               echo $error = $this->upload->display_errors();
            }
	}
	public function bill(){
		echo $user_id = $_SESSION['user_id'];
		$data=$this->common_model->get_user_by_userid($user_id);
		print_r($data);
		
		if($data)
		{
		$data['list']= array_reverse($this->common_model->all('bill_add'));
		$this->load->view('product/header');
		$this->load->view('product/billlist', $data);
		$this->load->view('product/footer');
		}
		else
		{
		$data['list']= array_reverse($this->common_model->allByCon("bill_add", array('status' => 1,'user_id' => $user_id)));
		$this->load->view('product/header');
		$this->load->view('product/billlist', $data);
		$this->load->view('product/footer');
	    }
	}
	// public function search1(){
	// 	$json = [];
	// 	$this->load->database();		
	// 	if(!empty($this->input->get("q"))){
	// 		$this->db->like('product_name', $this->input->get("q"));
	// 	}	
	// 	$query = $this->db->select('id,product_name as text, price, quantity,product_id,product_id2')
	// 					//->limit(10)
	// 					->where(array("quantity >" => 0))
	// 					->get("product");
	// 		$json = $query->result();
	// 		print_r($json);die;

	// 	echo json_encode($json);
	// }
	//~ public function search(){
		//~ $user_id = $_SESSION['user_id']; 
		//~ $json = [];
		//~ $this->load->database();		
		//~ if(!empty($this->input->get("q"))){
			//~ $this->db->like('product.product_name', $this->input->get("q"));
		//~ }	
		//~ $this->db->select('category.category, category.size, category.id, product.product_name as text, product.id, product.product_id, product.product_id2, product.price, product.product_categorie');
		//~ $this->db->from('product');
		//~ //$this->db->where(array('product.user_id' => $user_id));
		//~ $this->db->join('category', 'category.id = product.product_categorie');
		//~ $result = $this->db->get();
		//~ //print_r($this->db->last_query());
		//~ print_r($query);
		//~ $json = $result->result();			
			//~ for ($i=0; $i < count($json); $i++) { 
				//~ $json[$i]->text = $json[$i]->text.' - '.$json[$i]->product_id.' - '.$json[$i]->product_id2.' - '.$json[$i]->category;
			//~ }			
		//~ //echo json_encode($json);
	//~ }
	
	public function search(){
		$user_id = $_SESSION['user_id'];
		$json = [];
		$this->load->database();		
		if(!empty($this->input->get("q"))){
			$this->db->like('product.product_name', $this->input->get("q"));
		}	
		$this->db->select('category.category, category.size, category.id, product.product_name as text, product.id, product.product_id, product.product_id2, product.price, product.product_categorie');
		$this->db->from('product');
		//$this->db->where(array('product.user_id' => $user_id));
		$this->db->join('category', 'category.id = product.product_categorie');
		$this->db->where(array('product.user_id' => $user_id));
		$result = $this->db->get();
		$json = $result->result();			
			for ($i=0; $i < count($json); $i++) { 
				$json[$i]->text = $json[$i]->text.' - '.$json[$i]->product_id.' - '.$json[$i]->product_id2.' - '.$json[$i]->category;
			}			
		echo json_encode($json);
	}
	// public function searchold(){
	// 	$json = [];
	// 	$this->load->database();		
	// 	if(!empty($this->input->get("q"))){
	// 		$this->db->like('product_name', $this->input->get("q"));
	// 	}	
	// 	$query = $this->db->select('id,product_name as text, price, quantity,product_id,product_id2')
	// 					//->limit(10)
	// 					->where(array("quantity >" => 0))
	// 					->get("product");
	// 		$json = $query->result();			
	// 		for ($i=0; $i < count($json); $i++) { 
	// 			$json[$i]->text = $json[$i]->text.'-'.$json[$i]->product_id.'-'.$json[$i]->product_id2.'-'.$json[$i]->;
	// 		}			
	// 	echo json_encode($json);
	// }
	public function ajaxPro(){
        $query = $this->input->get('query');
        $this->db->like('product_name', $query);
        $data = $this->db->select('id,product_name as text')->get("product")->result();
        echo json_encode( $data);
    }
    public function bill_add(){    
                    $user_id = $_SESSION['user_id'];
		$this->form_validation->set_rules('customer_name', 'Product Id', 'trim|required');
        if($this->form_validation->run() == FALSE){
        	//$data['custo']=$this->common_model->all("customer");
        	//print_r( $data);die;

        	if ($this->uri->segment(3) !="") {
	            $id = $this->uri->segment(3);
	            $array = array('user_id' => $User_id);
	            $data['details']=$this->common_model->getById("bill", $user_id);
	            $this->load->view('product/header');
	            $this->load->view('product/bill', $data);
	            $this->load->view('product/footer');

	        }else{
	            $data['details'] = "";
	            $this->load->view('product/header');
            	$this->load->view('product/bill', $user_id);
            	$this->load->view('product/footer');
	        }
				                   
        }else{

           if(isset($_POST)){
		    if ($_POST['cusid'] == 0) {
		           		$customer = array(					
							'name' =>ucfirst($this->input->post('customer_name')),
							'contect' =>$this->input->post('customer_number'),
							'gstno' =>$this->input->post('gst_number'),
							'address' =>$this->input->post('address'),
						);
		             $inset_id = $this->common_model->add("customer",$customer);
		    }
		    $inputs = $_POST; 
		    for ($i=0; $i < count($inputs['product_code']); $i++) { 
		    	$productid = $inputs['product_code'][$i][0];
		    	$productqut = $inputs['quantity'][$i][0];	
		    	$availableQut = $this->common_model->getQutById("product", array('user_id' => $user_id));	
		    	$qunt = $availableQut-$productqut;
		    	$u = $this->common_model->update("product", array('id' => $productid), array('quantity' => $qunt));
		    }
		     
            $data = array(
					'user_id'    => $user_id,
					'invoice_no' =>$this->input->post('invoice_no'),
					'billdate' =>  $this->input->post('date'),
					'trans' =>  $this->input->post('trans'),
					'customer_name' =>ucfirst($this->input->post('customer_name')),
					'customer_number' =>$this->input->post('customer_number'),
					'gst_number' =>$this->input->post('gst_number'),
					'address' =>$this->input->post('address'),
					'product_code'=>json_encode($this->input->post('product_code')),
					'product_name'=>json_encode($this->input->post('product_name')),
					'quantity'=>json_encode($this->input->post('quantity')),
					'price'=>json_encode($this->input->post('price')),
					'size'=>json_encode($this->input->post('size')),
					'sizevalue'=>json_encode($this->input->post('sizevalue')),					
					'total'=>json_encode($this->input->post('total')),
					'subtotal'=>$this->input->post('subtotal'),
					'discount'=>$this->input->post('discount'),
					'discountamt'=>$this->input->post('discountamt'),
					'gst'=>$this->input->post('gst'),
					'gstamt'=>number_format($this->input->post('gstamt'),2),
					'fright'=>$this->input->post('fright'),
					'grandtotal'=>number_format($this->input->post('grandtotal'),2)
				);
            	//print_r($data['trans']);die;
             $inset_id = $this->common_model->add("bill_add",$data);
             if($inset_id){
            $this->session->set_flashdata('success', 'Product details has been inserted');
			 redirect(site_url('product/bill_add'));
               

             }
            
           }
          
		}			
    }
    // public function productiddetails($id){
    //    $result = $this->db->where("id",$id)->get("product")->row();       
    //    echo json_encode($result);
   	// }
   	public function productiddetails($id){


   		$this->db->select('category.category, category.size, category.id, product.*, product.product_name, product.id, product.product_id, product.product_id2, product.price');
		$this->db->from('product');
		$this->db->join('category', 'category.id = product.product_categorie');
		$this->db->where('product.id',$id);		
		$result = $this->db->get();
		$data= $result->row();
		//return $data;



       //$result = $this->common_model->productdetails();	      
       echo json_encode($data);
   	}
   	public function category_list(){

		$user_id = $_SESSION['user_id'];
		
		$data=$this->common_model->get_user_by_userid($user_id);
		if($data)
		{
			$data['list']=$this->common_model->all('category');	
			$this->load->view('product/header');
			$this->load->view('product/category_list',$data);
			$this->load->view('product/footer');
	    }
	    else
	    {
			 $data['list']=$this->common_model->get_category_by_userid($user_id);	
			$this->load->view('product/header');
			$this->load->view('product/category_list',$data);
			$this->load->view('product/footer');
		}	                          			
    }
    public function category_add(){
		$user_id = $_SESSION['user_id'];
		$data = array(	
		       	'user_id' =>$user_id,		
				'category' => $this->input->post('category'),				
				'size' => $this->input->post('size')				
			);
		$insert = $this->common_model->add("category", $data);
		echo json_encode(array("status" => TRUE));
	}
	public function category_get($id){	
		$whr = array('id' => $id);
		$data = $this->common_model->getById("category", $whr);
		echo json_encode($data);
	}
	public function category_update(){
		$data = array(
		        
				'category' => $this->input->post('category'),
				'size' => $this->input->post('size')
			);
		$this->common_model->update("category", array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}
	public function category_delete($id){
		$this->common_model->delete_by_id("category",$id);
		echo json_encode(array("status" => TRUE));
	}
	public function logo(){
		$error['error'] = "";
		if (!empty($_FILES)) {			    	
		    if (!empty($_FILES['file-2']['name'])) {				
				$config['upload_path']   = './application/libraries/tcpdf/examples/images/';
                $config['allowed_types'] = 'gif|jpg|png';
                $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload('file-2'))
                {
                   $error['error'] = $this->upload->display_errors();	
                }else{ 
                    $data = array('upload_data' => $this->upload->data());
                    $file_name = $data['upload_data']['file_name'];
                    if ($file_name) {
					$this->common_model->update("logo", array('id' => 1), array('logo' =>$file_name));
                	}     
            	}
 			}
		}
		$this->load->view('product/header');
		$this->load->view('product/logo', $error);
		$this->load->view('product/footer');
	}
	public function deals(){
		$error['error'] = "";
		$user_id = $_SESSION['user_id'];
		if (!empty($_FILES)) {
		//print_r($_FILES);die;	
				    	
		    if(!empty($_FILES['deals1']['name'])){				
				$config['upload_path']   = './application/libraries/tcpdf/examples/images/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload('deals1'))
                {
                   echo $error = $this->upload->display_errors();	
                }else{ 
                    $data = array('upload_data' => $this->upload->data());
                    $deals1 = $data['upload_data']['file_name'];
                    //~ if ($deals1) {
					//~ $this->common_model->update("logo", array('user_id' => $user_id), array('deals1' =>$deals1));
                	//~ }
               }
 			}
 			if (!empty($_FILES['deals2']['name'])) {				
				$config['upload_path']   = './application/libraries/tcpdf/examples/images/';
                $config['allowed_types'] = 'gif|jpg|png';
                $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload('deals2'))
                {
                   $error['error'] = $this->upload->display_errors();	
                }else{ 
                    $data = array('upload_data' => $this->upload->data());
                    $deals2 = $data['upload_data']['file_name'];
                    //~ if ($deals2) {
					//~ $this->common_model->update("logo", array('user_id' => $user_id), array('deals2' =>$deals2));
                	//~ }     
            	}
 			}
 			if (!empty($_FILES['deals3']['name'])) {				
				$config['upload_path']   = './application/libraries/tcpdf/examples/images/';
                $config['allowed_types'] = 'gif|jpg|png';
                $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload('deals3'))
                {
                   $error['error'] = $this->upload->display_errors();	
                }else{ 
                    $data = array('upload_data' => $this->upload->data());
                    $deals3 = $data['upload_data']['file_name'];
                    //~ if ($deals3) {
					//~ $this->common_model->update("logo", array('user_id' => $user_id), array('deals3' =>$deals3));
                	//~ }     
            	}
 			}
 			if (!empty($_FILES['deals4']['name'])) {				
				$config['upload_path']   = './application/libraries/tcpdf/examples/images/';
                $config['allowed_types'] = 'gif|jpg|png';
                $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload('deals4'))
                {
                   $error['error'] = $this->upload->display_errors();	
                }else{ 
                    $data = array('upload_data' => $this->upload->data());
                    $deals4 = $data['upload_data']['file_name'];
                    //~ if ($deals4) {
					//~ $this->common_model->update("logo", array('user_id' => $user_id), array('deals4' =>$deals4));
                	//~ }     
            	}
 			}
 			if (!empty($_FILES['deals4']['name'])) {				
				$config['upload_path']   = './application/libraries/tcpdf/examples/images/';
                $config['allowed_types'] = 'gif|jpg|png';
                $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload('deals4'))
                {
                   $error['error'] = $this->upload->display_errors();	
                }else{ 
                    $data = array('upload_data' => $this->upload->data());
                    $deals4 = $data['upload_data']['file_name'];
                    //~ if ($deals4) {
					//~ $this->common_model->update("logo", array('user_id' => $user_id), array('deals4' =>$deals4));
                	//~ }     
            	}
 			}
 			if (!empty($_FILES['deals5']['name'])) {				
				$config['upload_path']   = './application/libraries/tcpdf/examples/images/';
                $config['allowed_types'] = 'gif|jpg|png';
                $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload('deals5'))
                {
                   $error['error'] = $this->upload->display_errors();	
                }else{ 
                    $data = array('upload_data' => $this->upload->data());
                    $deals5 = $data['upload_data']['file_name'];
                    //~ if ($deals5) {
					//~ $this->common_model->update("logo", array('user_id' => $user_id), array('deals5' =>$deals5));
                	//~ }     
            	}
 			}
 			if (!empty($_FILES['deals6']['name'])) {				
				$config['upload_path']   = './application/libraries/tcpdf/examples/images/';
                $config['allowed_types'] = 'gif|jpg|png';
                $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload('deals6'))
                {
                   $error['error'] = $this->upload->display_errors();	
                }else{ 
                    $data = array('upload_data' => $this->upload->data());
                    $deals6 = $data['upload_data']['file_name'];
                    //~ if ($deals6) {
					//~ $this->common_model->update("logo", array('user_id' => $user_id), array('deals6' =>$deals6));
                	//~ }     
            	}
 			}
 			    $query = $this->db->get_where('logo', array('user_id' => $user_id));
 			    $r = $query->result_array();
		     if(!$r)
		     {  
				 
				 $data = array(
		          'user_id' =>$user_id,
		         'deals1' =>$deals1,
		         'deals2' =>$deals2,
		         'deals3' =>$deals3,
		         'deals4' =>$deals4,
		         'deals5' =>$deals5,
		         'deals6' =>$deals6,
		        ); 
		      $insert = $this->common_model->add("logo", $data);  
		    }
		     else
		     {
				
				 $data = array(
		         
		         'deals1' =>$deals1,
		         'deals2' =>$deals2,
		         'deals3' =>$deals3,
		         'deals4' =>$deals4,
		         'deals5' =>$deals5,
		         'deals6' =>$deals6,
		        );
			   $this->common_model->update("logo", array('user_id' => $user_id),$data);
			 }
		}
		
		$this->load->view('product/header');
		$this->load->view('product/deals', $error);
	    $this->load->view('product/footer');
	   
	}

	public function title(){

		if ( $this->input->post('id')) {
            
            $data = array(
            	'title'=>$this->input->post('title'),
            	'address'=>$this->input->post('address'),
				'footer'=>$this->input->post('footer')   
            );	           
        
            $pid = array('id' =>$this->input->post('id'));
            
			//print_r($data);die;
            $this->common_model->update("logo", $pid, $data);
            $this->session->set_flashdata('success', 'Product details has been updated');
    	}
		
		$data['details'] = $this->common_model->getById('logo', array('id' => 1));

		$this->load->view('product/header');
		$this->load->view('product/title', $data);
		$this->load->view('product/footer');
	}
	public function logout(){
	    $user_data = $this->session->all_userdata();
	        foreach ($user_data as $key => $value) {
	            if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
	                $this->session->unset_userdata($key);
	            }
	        }
	    $this->session->sess_destroy();
	    redirect('user');
	}
	public function product_more() {   
		
		$data['list']=$this->common_model->allByCon("product", array('quantity >' => 99));	
		$this->load->view('product/header');
		$this->load->view('product/productlist',$data);
		$this->load->view('product/footer');
	}
	public function product_less() {   
		
		$data['list']=$this->common_model->allByCon("product", array('quantity <' => 11));	
		$this->load->view('product/header');
		$this->load->view('product/productlist',$data);
		$this->load->view('product/footer');
	}
	public function customerdetails($id){
       $result = $this->db->where("name",$id)->get("customer")->row();       
       echo json_encode($result);
   	}
     
    public function pdf()
    {
		$user_id = $_SESSION['user_id'];
		if($_POST)
		{
			 
		     $pdf=$this->common_model->getByuserId('pdf',$user_id);
		     if(empty($pdf))
		     {
			  $data = array(
							'address' => $this->input->post('address'),
							'telephone' => $this->input->post('telephone'),
							'gstin_no' => $this->input->post('gstinno'),
							'bank_detail' => $this->input->post('bankdetail'),
							'ac_no' => $this->input->post('acno'),
							'ifsc_no' => $this->input->post('ifscno'),
							'branch' => $this->input->post('branch'),
							'terms' => $this->input->post('terms'),
							'user_id'=>$user_id,
							'auth_distributor' => $this->input->post('auth'),
						  ); 
			  $this->common_model->add('pdf', $data);  
			  redirect('product/pdf');
	       }
	       else
	       {
		        //~ echo'<script>alert("Already entered your pdf setting")</script>';
		        //~ $this->load->view('product/header');
		       //~ $this->load->view('product/pdf_add');
		        //~ $this->load->view('product/footer');
		       //$this->session->set_flashdata('error_msg','Username, password is not correct,Try again.');
              // redirect('product/pdf');
              
              $data = array(
							'address' => $this->input->post('address'),
							'telephone' => $this->input->post('telephone'),
							'gstin_no' => $this->input->post('gstinno'),
							'bank_detail' => $this->input->post('bankdetail'),
							'ac_no' => $this->input->post('acno'),
							'ifsc_no' => $this->input->post('ifscno'),
							'branch' => $this->input->post('branch'),
							'terms' => $this->input->post('terms'),
							'user_id'=>$user_id,
							'auth_distributor' => $this->input->post('auth'),
						  ); 
			  $pid = $this->input->post('id');
			  $where = array('id'=>$pid);		  
			  $this->common_model->update('pdf',$where,$data);  
			  redirect('product/pdf');
		    }
	    }
		else
		{
		   $data['a'] =$this->common_model-> get_By_pdf_Id('pdf',$user_id);
		  // print_r($data);
		   if(empty($data['a']))
		   {
			  $this->load->view('product/header');
			  $this->load->view('product/pdf_add',$data);
			  $this->load->view('product/footer');
	      }
	      else
	      {
		     $this->load->view('product/header');
			 $this->load->view('product/pdfedit',$data);
			 $this->load->view('product/footer');
		  }
      }
	} 
    public function pdfList() {   
		$user_id = $_SESSION['user_id'];
		
		$data=$this->common_model->get_user_by_userid($user_id);
		if($data)
		{
			
			 //$data['name'] = $this->common_model->get_username_by_userid($user_id);
			 $data['list']=$this->common_model->all('pdf');
			 //print_r($data);
		     $this->load->view('product/header');
             $this->load->view('product/pdflist',$data);
		     $this->load->view('product/footer');
		}
		else
		{
			//echo"a";
			$data['list']=$this->common_model->getpdflist('pdf',$user_id);	
			//print_r($data);
		     $this->load->view('product/header');
             $this->load->view('product/pdflist',$data);
		     $this->load->view('product/footer');
		}
		
	}
	public function pdfedit()
	{
		 $id = $this->uri->segment(3);
		//echo $id = $this->input->get($book->id);
      $user_id = $_SESSION['user_id'];
	  if($_POST)
	  {  
               $data = array(
	               
	            	'address'=>$this->input->post('address'),
	            	'telephone'=>$this->input->post('telephone'),
	            	'gstin_no'=>$this->input->post('gstinno'),
					'bank_detail'=>$this->input->post('bankdetail'),
					'ac_no'=>$this->input->post('acno'),
					'ifsc_no'=>$this->input->post('ifscno'),
					'branch'=>$this->input->post('branch'),
					'auth_distributor'=>$this->input->post('auth'),
					'terms'=>$this->input->post('terms')     
	            );	           
	        
	            $pid = array('id' =>$this->input->post('id'));
	           // $this->input->post('id');
	           $this->common_model->update("pdf", $pid, $data);
	            $this->session->set_flashdata('success', 'Product details has been updated');
	            redirect('product/pdfList');
         
    }
    else
    {
		
		     $data['p']=$this->common_model->pdf_edit_byid('pdf',$id);	
		     $this->load->view('product/header');
             $this->load->view('product/pdfedit',$data);
		     $this->load->view('product/footer');
		}

}
}
