<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Product extends CI_Controller {

	public function __construct()
 	{
 		parent::__construct();
		$this->load->helper('url');
 		$this->load->model('common_model');
 		$this->load->library('form_validation');
 		 $this->load->helper(array('form', 'url')); 

 	// 	$this->user_id = $this->session->userdata('user_id');
		// if(!$this->user_id){
		//   redirect('user/login_view');
		// }
		
 	}
	public function index() {

		$this->load->view('product/index');
	}
	public function productList() {   
		
		$data['list']=$this->common_model->all("product");		
		$this->load->view('product/productlist',$data);
	}
	public function product_add(){

		
		$this->form_validation->set_rules('product_id', 'Product Id', 'trim|required|min_length[3]');
		// $this->form_validation->set_rules('product_name', 'product_name', 'trim|required|min_length[3]');
		// $this->form_validation->set_rules('product_categorie', 'product_categorie', 'trim|required|min_length[3]');
		// $this->form_validation->set_rules('quantity', 'quantity', 'trim|required|min_length[3]');
		// $this->form_validation->set_rules('product_description', 'product_description', 'trim|required|min_length[3]');
		// $this->form_validation->set_rules('online_date', 'online_date', 'trim|required|min_length[3]');
		// $this->form_validation->set_rules('author', 'author', 'trim|required|min_length[3]');
		// $this->form_validation->set_rules('enable_display', 'enable_display', 'trim|required');
		// $this->form_validation->set_rules('comment', 'comment', 'trim|required|min_length[3]');
		// $this->form_validation->set_rules('approuved_by', 'approuved_by', 'trim|required|min_length[3]');
		//$this->form_validation->set_rules('filebutton', 'filebutton', 'trim|required|min_length[3]');
		        
        

        
        if($this->form_validation->run() == FALSE){
        	echo $this->form_validation->run();
        	if ($this->uri->segment(3) !="") {
	            $id = $this->uri->segment(3);
	            $array = array('id' => $id);
	            $data['details']=$this->common_model->getById("product", $array);
	            $this->load->view('product/add_product', $data);
	        }else{
	            $data['details'] = "";
            $this->load->view('product/add_product');
	        }
            
        } elseif (!empty($this->input->post())) {
		    //     	//print_r($_FILES);die;
				  //   if (!empty($_FILES['image']['name'])) {

				
						// $config['upload_path']          = './upload/images';
		    //             $config['allowed_types']        = 'gif|jpg|png';
		    //             // $config['max_size']             = 100;
		    //             // $config['max_width']            = 1024;
		    //             // $config['max_height']           = 768;

		    //             $this->load->library('upload', $config);

		    //             if ( ! $this->upload->do_upload('image'))
		    //             {
		    //                     $error = array('error' => $this->upload->display_errors());

		    //                     $this->load->view('upload_form', $error);
		    //             }
		    //             else
		    //             {
		    //                     $data = array('upload_data' => $this->upload->data());
		    //                     $file_name = $data['upload_data']['file_name'];

		    //                     //$this->load->view('upload_success', $data);
		    //             }
				

		    //     	}
            if ( $this->input->post('id')) {
	            // Create website settings
        		//print_r($_POST);die;

	            $data = array(
	            	'product_id'=>$this->input->post('product_id'),
	            	'product_id2'=>$this->input->post('product_id2'),
					'product_name'=>$this->input->post('product_name'),
					'product_categorie'=>$this->input->post('product_categorie'),
					'quantity'=>$this->input->post('quantity'),
					'price'=>$this->input->post('price'),
					'product_description'=>$this->input->post('product_description'),
					// 'online_date'=>$this->input->post('online_date'),
					// 'author'=>$this->input->post('author'),
					// 'enable_display'=>$this->input->post('enable_display'),
					// 'comment'=>$this->input->post('comment'),
					// 'approuved_by'=>$this->input->post('approuved_by'),
					                	                
	            );
	            if (!empty($file_name)) {	            
	            	$data['image'] = $file_name;
	            }
	            //print_r($data);die;
	            $pid = array('id' =>$this->input->post('id'));
	            
	            $this->common_model->update("product", $pid, $data);
	            $this->session->set_flashdata('success', 'Product details has been updated');
        	}else{
        		//print_r($_POST);die;
	            $data = array(
	                'product_id'=>$this->input->post('product_id'),
	                'product_id2'=>$this->input->post('product_id2'),
					'product_name'=>$this->input->post('product_name'),
					'product_categorie'=>$this->input->post('product_categorie'),
					'quantity'=>$this->input->post('quantity'),
					'price'=>$this->input->post('price'),					
					'product_description'=>$this->input->post('product_description'),
					// 'online_date'=>$this->input->post('online_date'),
					// 'author'=>$this->input->post('author'),
					// 'enable_display'=>$this->input->post('enable_display'),
					// 'comment'=>$this->input->post('comment'),
					// 'approuved_by'=>$this->input->post('approuved_by'),
					// 'image'=> $file_name?$file_name:"",

	            );
	            //print_r($data);die;
	            // Add Activity  
	            $this->common_model->add("product", $data);
	            $this->session->set_flashdata('success', 'Product details has been inserted');
        	}
            //Redirect to Users
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
				//'book_isbn' => $this->input->post('book_isbn'),
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
	}public function delete_bill($id){
		$this->common_model->delete_by_id("bill",$id);
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
			// @unlink($data['full_path']);
			redirect('excel_import');
		}
	}
	public function product_import(){

		$this->load->view('product/product_import');
	}
	public function product_upload() {
		echo "<pre>"; print_r($_FILES);
die;
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

				
				$data_excel[$i - 1]['product_name']   = $sheets['cells'][$i][1];
				$data_excel[$i - 1]['product_id'] = $sheets['cells'][$i][2];// 
				$data_excel[$i - 1]['product_id2'] = $sheets['cells'][$i][3];
				$data_excel[$i - 1]['product_categorie'] = $sheets['cells'][$i][4];
				$data_excel[$i - 1]['quantity'] = $sheets['cells'][$i][5];
				$data_excel[$i - 1]['price'] = $sheets['cells'][$i][6];
				$data_excel[$i - 1]['product_description'] = $sheets['cells'][$i][7];
				$data_excel[$i - 1]['status'] = $sheets['cells'][$i][8];
			}

			$this->db->insert_batch('product', $data_excel);
			// @unlink($data['full_path']);
			redirect('product/productList');
		}
	}
	// public function search(){
	// 	if ($this->input->post('search') != "") {
	// 		$search = $this->input->post('search');
			
	// 	    $data = $this->db->getSearch($search);
	// 	    print_r($data);die;
	// 	}

	// }

	public function bill(){
		$data['list']=$this->common_model->all("bill");
		//print_r($data['list']);die;
		$this->load->view('product/billlist', $data);
	}


	public function search()
	{
		$json = [];


		$this->load->database();

		
		if(!empty($this->input->get("q"))){
			$this->db->like('product_name', $this->input->get("q"));
			$query = $this->db->select('id,product_name as text, price, quantity')
						->limit(10)
						->get("product");
			$json = $query->result();
		}

		
		echo json_encode($json);
	}

	 public function ajaxPro()
    {
        $query = $this->input->get('query');
        $this->db->like('product_name', $query);


        $data = $this->db->select('id,product_name as text')->get("product")->result();


        echo json_encode( $data);
    }


    public function bill_add(){
    

		$this->form_validation->set_rules('product_name', 'Product Id', 'trim|required');
        if($this->form_validation->run() == FALSE){
        	//echo "string";die;
            $this->load->view('product/bill');
	        
           
        }else{		   
           
			$id = $this->input->post('product_name');
			$data = array(
						'product_id'=>$this->input->post('product_id'),
						'product_name'=>$this->input->post('product_name'),
						'customer_name' =>$this->input->post('customer_name'),
						'price'=>$this->input->post('price'),
						'discount'=>$this->input->post('discount'),
						'quantity'=>$this->input->post('quantity'),
						'total'=>$this->input->post('total'),					
						);
			
			$inset_id = $this->common_model->add("bill", $data);
			if (!empty($inset_id)) {

				$record = $this->common_model->getById('product', array('id' => $id));
				$quantity = $record->quantity-$data['quantity'];
				//print_r($quantity);die;
				$upd = $this->common_model->update('product', array('id' => $id), array('quantity' => $quantity));


			}
			$this->session->set_flashdata('success', 'Product details has been inserted');
			redirect('product/bill');
		}
			//Redirect to Users
    }

    public function productiddetails($id) { 
		
       $result = $this->db->where("id",$id)->get("product")->row();
       
       echo json_encode($result);
   	}


	



}
