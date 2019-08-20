<?php

class Register extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
		$this->load->helper('url');
		$this->load->model('user_model');
		$this->load->library('session');
		$this->load->model('book_model');
    }
    public function index()
    {
		if(isset($_POST('register')))
		{
			
		}
		else
		{
		  $this->load->view('register');
		}
	}
}
?>
