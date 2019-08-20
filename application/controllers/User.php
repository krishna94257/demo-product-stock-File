<?php

class User extends CI_Controller {

    public function __construct(){

    parent::__construct();
    $this->load->helper('url');
    $this->load->model('user_model');
   $this->load->model('common_model');
    $this->load->library('session');
    $this->load->library('form_validation');
    $this->load->model('book_model');
    $this->load->model('Ajaxdata_model');

    }

    public function index(){
      if ($_POST) {     
        $user_login=array(
          'user_mobile'=>$this->input->post('mobile'),
          'user_password'=>md5($this->input->post('user_password')),
          
        );

        $data=$this->user_model->login_user($user_login['user_mobile'],$user_login['user_password']);
       // echo($data['user_count']);
       // die();
        if($data)
        {
			//if($data['user_count'] == 1)
			//{
				
              $this->session->set_userdata('user_id',$data['user_id']);
              $this->session->set_userdata('user_email',$data['user_email']);
              $this->session->set_userdata('user_name',$data['user_name']);
              $this->session->set_userdata('user_age',$data['user_age']);
              $this->session->set_userdata('user_mobile',$data['user_mobile']);
              redirect('product');
	        //~ }
	        //~ else
	        //~ {
				//~ $this->session->set_userdata('user_id',$data['user_id']);
				//~ $user_id = $_SESSION['user_id'];
				//~ $set = $this->common_model->set_count($user_id);
				//~ redirect('user/profile');
				//~ 
			//~ } 
          
        }
        else{
          $this->session->set_flashdata('error_msg','Username, password is not correct,Try again.');
          $this->load->view("signin.php");
          //redirect('user');
        }
      }
      else
      {
        $this->load->view("signin.php");
	   }
      
    }
    
    public function register()
    {
	   $data['p']=$this->user_model->get_country();
	   //print_r($data);
	   $this->load->view('register',$data);
	}

    public function register_user(){
		$user=array(
		  'user_name'=>$this->input->post('name'),
		  'user_email'=>$this->input->post('gmail'),
		  'user_password'=>md5($this->input->post('password')),
		  'user_mobile'=>$this->input->post('mobileno'),
		  'user_companyname'=>$this->input->post('companyname'),
		  'user_count' => 0
      );
     // print_r($user);
      

        
        
        
         $mobile_check=$this->user_model->mobile_check($user['user_mobile']);

    if($mobile_check){
		
      $this->user_model->register_user($user);
      $data=$this->user_model->login_user($user['user_mobile'],$user['user_password']);
      if(data)
      {
		      $this->session->set_userdata('user_id',$data['user_id']);
              $this->session->set_userdata('user_email',$data['user_email']);
              $this->session->set_userdata('user_name',$data['user_name']);
              $this->session->set_userdata('user_age',$data['user_age']);
              $this->session->set_userdata('user_mobile',$data['user_mobile']);
              //$this->session->set_flashdata('success_msg', 'Registered successfully.Now login to your account.');
              redirect('user/profile');
      }
    }
    else{
      $this->session->set_flashdata('error_msg', 'Already registered with this mobile number.');
      $this->load->view("login.php");
      }

    }
    
     public function profile(){
		 if ($_POST) {
		//print_r($_FILES);die;	
				   	
		    if(!empty($_FILES['picture']['name'])){	
							
				$config['upload_path']   = './application/libraries/tcpdf/examples/images/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload('picture'))
                {
                   echo $error = $this->upload->display_errors();	
                }else{ 
                    $data = array('upload_data' => $this->upload->data());
                    echo $picture = $data['upload_data']['file_name'];
                    
                    //~ if ($deals1) {
					//~ $this->common_model->update("logo", array('user_id' => $user_id), array('deals1' =>$deals1));
                	//~ }
               }
 			}
 			
 			 if(!empty($_FILES['logo']['name'])){				
				$config['upload_path']   = './application/libraries/tcpdf/examples/images/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload('logo'))
                {
                   echo $error = $this->upload->display_errors();	
                }else{ 
                    $data = array('upload_data' => $this->upload->data());
                    echo $logo = $data['upload_data']['file_name'];
                    //~ if ($deals1) {
					//~ $this->common_model->update("logo", array('user_id' => $user_id), array('deals1' =>$deals1));
                	//~ }
               }
 			}
		if(!empty($this->input->post('newpassword')))
		{ //echo $this->input->post('newpassword');
			//die('hello');
				if((!empty($logo) ) AND (!empty($picture)))
					{
						echo
						$user=array(
						  'user_name'=>$this->input->post('name'),
						  'user_email'=>$this->input->post('email'),
						  'user_mobile'=>$this->input->post('mobileno'),
						  'user_password'=>md5($this->input->post('newpassword')),
						  'user_logo'=>$logo,
						  'user_profilepicture'=>$picture,
						  'user_country'=>$this->input->post('country'),
						  'user_city'=>$this->input->post('city'),
						  'user_state'=>$this->input->post('state'),
						  'user_businesstype'=>$this->input->post('businesstype'),
						  'user_companyname'=>$this->input->post('companyname'),
						  'user_address'=>$this->input->post('address')
					  );
					}
					
					if((empty($logo) ) AND (empty($picture)))
					{
						$user=array(
						  'user_name'=>$this->input->post('name'),
						  'user_email'=>$this->input->post('email'),
						  'user_mobile'=>$this->input->post('mobileno'),
						  'user_password'=>md5($this->input->post('newpassword')),
						  'user_country'=>$this->input->post('country'),
						  'user_city'=>$this->input->post('city'),
						  'user_state'=>$this->input->post('state'),
						  'user_businesstype'=>$this->input->post('businesstype'),
						  'user_companyname'=>$this->input->post('companyname'),
						  'user_address'=>$this->input->post('address')
					  );
					}
				if((empty($logo)) && (!empty($picture)))
					{
						$user=array(
						  'user_name'=>$this->input->post('name'),
						  'user_email'=>$this->input->post('email'),
						  'user_mobile'=>$this->input->post('mobileno'),
						  'user_password'=>md5($this->input->post('newpassword')),
						  'user_profilepicture'=>$picture,
						  'user_country'=>$this->input->post('country'),
						  'user_city'=>$this->input->post('city'),
						  'user_state'=>$this->input->post('state'),
						  'user_businesstype'=>$this->input->post('businesstype'),
						  'user_companyname'=>$this->input->post('companyname'),
						  'user_address'=>$this->input->post('address')
					  );
					}
				if((empty($picture)) && (!empty($logo)) )
					{
						$user=array(
						  'user_name'=>$this->input->post('name'),
						  'user_email'=>$this->input->post('email'),
						  'user_mobile'=>$this->input->post('mobileno'),
						  'user_password'=>md5($this->input->post('newpassword')),
						  'user_logo'=>$logo,
						  'user_country'=>$this->input->post('country'),
						  'user_city'=>$this->input->post('city'),
						  'user_state'=>$this->input->post('state'),
						  'user_businesstype'=>$this->input->post('businesstype'),
						  'user_companyname'=>$this->input->post('companyname'),
						  'user_address'=>$this->input->post('address')
					  );
					}
       }
       else
       {
		 if((!empty($logo) ) && (!empty($picture)))
					{
						echo"b";
						$user=array(
						  'user_name'=>$this->input->post('name'),
						  'user_email'=>$this->input->post('email'),
						  'user_mobile'=>$this->input->post('mobileno'),
						  'user_logo'=>$logo,
						  'user_profilepicture'=>$picture,
						  'user_country'=>$this->input->post('country'),
						  'user_city'=>$this->input->post('city'),
						  'user_state'=>$this->input->post('state'),
						  'user_businesstype'=>$this->input->post('businesstype'),
						  'user_companyname'=>$this->input->post('companyname'),
						  'user_address'=>$this->input->post('address')
					  );
					}
					if((empty($logo) ) && (empty($picture)))
					{
						echo"a";
						$user=array(
						  'user_name'=>$this->input->post('name'),
						  'user_email'=>$this->input->post('email'),
						  'user_mobile'=>$this->input->post('mobileno'),
						  'user_country'=>$this->input->post('country'),
						  'user_city'=>$this->input->post('city'),
						  'user_state'=>$this->input->post('state'),
						  'user_businesstype'=>$this->input->post('businesstype'),
						  'user_companyname'=>$this->input->post('companyname'),
						  'user_address'=>$this->input->post('address')
					  );
					}
				if((empty($logo)) && (!empty($picture)))
					{
						$user=array(
						  'user_name'=>$this->input->post('name'),
						  'user_email'=>$this->input->post('email'),
						  'user_mobile'=>$this->input->post('mobileno'),
						  'user_profilepicture'=>$picture,
						  'user_country'=>$this->input->post('country'),
						  'user_city'=>$this->input->post('city'),
						  'user_state'=>$this->input->post('state'),
						  'user_businesstype'=>$this->input->post('businesstype'),
						  'user_companyname'=>$this->input->post('companyname'),
						  'user_address'=>$this->input->post('address')
					  );
					}
				if((empty($picture)) && (!empty($logo)) )
					{
						$user=array(
						  'user_name'=>$this->input->post('name'),
						  'user_email'=>$this->input->post('email'),
						  'user_mobile'=>$this->input->post('mobileno'),
						  'user_logo'=>$logo,
						  'user_country'=>$this->input->post('country'),
						  'user_city'=>$this->input->post('city'),
						  'user_state'=>$this->input->post('state'),
						  'user_businesstype'=>$this->input->post('businesstype'),
						  'user_companyname'=>$this->input->post('companyname'),
						  'user_address'=>$this->input->post('address')
					  );
					}
		}
		
     // print_r($user);
         $id = $this->input->post('id');
         $e = $user['user_mobile']; 
         $mobile_check=$this->user_model->mobile_check_profile($e,$id);

    
        // $email_check=$this->user_model->email_check_profile($e,$id);

        if($mobile_check){
        $this->user_model->update_user_profile($user,$id);
        $this->session->set_flashdata('success_msg', 'Updated successfully.Now login to your account.');
        redirect('user/profile');
    }
    else{
      $this->session->set_flashdata('error_msg', 'Already registered with this mobile no.');
      redirect('user');
      }
    }
    else
    {
	  
				$id = $_SESSION['user_id'];
			    $data['p']=$this->user_model->get_country();
			    $data['a'] =$this->user_model->user_details($id);
			   // print_r($data['a']);
			    $this->load->view('product/header');
		        $this->load->view('product/profile',$data);
		        $this->load->view('product/footer'); 
	}
   }

    public function login_view(){

      $this->load->view("signin.php");

    }

    function login_user(){
      if ($_POST) {     
        $user_login=array(
          'user_email'=>$this->input->post('user_email'),
          'user_password'=>md5($this->input->post('user_password'))
        );

        $data=$this->user_model->login_user($user_login['user_email'],$user_login['user_password']);
        if($data)
        {
          $this->session->set_userdata('user_id',$data['user_id']);
          $this->session->set_userdata('user_email',$data['user_email']);
          $this->session->set_userdata('user_name',$data['user_name']);
          $this->session->set_userdata('user_age',$data['user_age']);
          $this->session->set_userdata('user_mobile',$data['user_mobile']);
          
          redirect('product');
        }
        else{
          $this->session->set_flashdata('error_msg','Username, password is not correct,Try again.');
          //$this->load->view("login.php");
        }
      }
        $this->load->view("login.php");
      
    }

    function user_profile(){

      $this->load->view('user_profile.php');

    }
    
    public function crop_profile()
    {
	  if(isset($_POST["image"]))
		{
		 $data = $_POST["image"];

		 $image_array_1 = explode(";", $data);

		 $image_array_2 = explode(",", $image_array_1[1]);

		 $data = base64_decode($image_array_2[1]);

		 $imageName = time() . '.png';

		 file_put_contents($imageName, $data);

		 echo '<img src="'.$imageName.'" class="img-thumbnail" />';
		 
		 $config['upload_path']   = './application/libraries/tcpdf/examples/images/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload($imageName))
                {
                   echo $error = $this->upload->display_errors();	
                }else{ 
                    $data = array('upload_data' => $this->upload->data());
                    echo $logo = $data['upload_data']['file_name'];
                     if ($logo) {
					 $this->common_model->update("user", array('id' => $user_id), array('user_logo' =>$logo));
                	 }
               }
		}
	}
	
    public function user_logout(){

      $this->session->sess_destroy();
      redirect('user/login_view', 'refresh');
    }
    
   public function ajaxdata()
   {
      $countryid = $this->input->post('country_id');
      $stateid = $this->input->post('state_id');
       $data=$this->Ajaxdata_model->getajaxdata($countryid,$stateid);
      
   }
   public function userlist() {   
		$user_id = $_SESSION['user_id'];
	   //$data['name'] = $this->common_model->get_username_by_userid($user_id);
		 $data['list']=$this->common_model->all('user');
		 //print_r($data);
		 $this->load->view('product/header');
		 $this->load->view('product/userlist',$data);
		 $this->load->view('product/footer');
		
		
	}
	
	public function delete($user_id){
		$this->common_model->delete_by_user_id("user",$user_id);
		echo json_encode(array("status" => TRUE));
	}
	public function useradd()
	{
		
	   if($_POST)
		  {
		    $data = array(
	                  
	                'user_name'=>$this->input->post('user_name'),
	                'user_mobile'=>$this->input->post('contact'),
	                'user_country'=>$this->input->post('country'),
	            	'user_city'=>$this->input->post('city'),	                
					'user_state'=>$this->input->post('state'),
					'user_password'=>md5($this->input->post('password')),
					'user_companyname'=>$this->input->post('companyname'),
			        );
	            
	             $mobile_check=$this->user_model->mobile_check($data['user_mobile']);

                 if($mobile_check){
                     $this->common_model->add("user", $data);
                      $this->session->set_flashdata('success_msg', 'Registered successfully.Now login to your account.');
                      redirect('user/userlist');
                       }
                else{
                    //$this->session->set_flashdata('error_msg', 'Already registered with this mobile number.');
                    echo'<script>alert("Already registered with this mobile number.")</script>';
                     //redirect('user/userlist');
                     $data['p']=$this->user_model->get_country();
        	$this->load->view('product/header');
		    $this->load->view('product/useradd',$data);
		     $this->load->view('product/footer');
                     }
	            
	           // $this->common_model->add("user", $data);
	           // $this->session->set_flashdata('success', 'Product details has been inserted');
        	  // redirect('user/userlist');
            
        }else{
			 $data['p']=$this->user_model->get_country();
        	$this->load->view('product/header');
		    $this->load->view('product/useradd',$data);
		     $this->load->view('product/footer');
        }
	  
	
	}
	public function useredit()
	{
	  if($_POST)
	  {
		  echo $pid = $this->input->post('id');
	      $data = array(
	                  
	                'user_name'=>$this->input->post('user_name'),
	                'user_mobile'=>$this->input->post('contact'),
	                'user_country'=>$this->input->post('country'),
	            	'user_city'=>$this->input->post('city'),	                
					'user_state'=>$this->input->post('state'),
					'user_companyname'=>$this->input->post('companyname')
			        );
			    $this->common_model->update("user",array('user_id'=>$pid),$data);
	           
        	    redirect('user/userlist');
	  }
	  else
	  {
	     $id = $this->uri->segment(3);
	     $data['p']=$this->user_model->get_country();
	     $data['a'] = $pdf=$this->common_model->get_userby_userId('user',$id);
	     $this->load->view('product/header');
		 $this->load->view('product/useredit',$data);
		 $this->load->view('product/footer');
	  }
	}

  }

?>
