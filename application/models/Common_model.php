<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Common_model extends CI_Model
{
	// var $tab = 'books';
	// var $tabl= 'plot';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function getById($table,$id){

		$this->db->from($table);
		$this->db->where($id);
		$query = $this->db->get();
		return $query->row();
	}
	public function getByuserId($table,$user_id){

		$this->db->from($table);
		$this->db->where('user_id',$user_id);
		$query = $this->db->get();
		//print_r( $query->row());
		return $query->row();
	}
	public function get_By_pdf_Id($table,$user_id){

		$this->db->from($table);
		$this->db->where('user_id',$user_id);
		$query = $this->db->get();
		//print_r( $query->row());
		return $query->result_array();
	}
	public function getpdflist($table,$user_id){

		$this->db->from($table);
		$this->db->where('user_id',$user_id);
		$query = $this->db->get();
	    //print_r($this->db->last_query());
		return $query->result();
		//print_r($r);
	}
	public function pdf_edit($table,$id){

		$this->db->from($table);
		$this->db->where('user_id',$user_id);
		$query = $this->db->get();
	    //print_r($this->db->last_query());
		return $query->result_array();
		//print_r($r);
	}
	public function getBypdfId($table,$user_id){

		$this->db->from($table);
		$this->db->where('user_id',$user_id);
	   $query = $this->db->get();
	   return  $query->result();
		 //return $query->result_array();
	    //print_r($this->db->last_query());
		//$r =  $query->result();
		//print_r($r);
	}
	public function getQutById($table,$id){

		$this->db->from($table);
		$this->db->where($id);
		$query = $this->db->get();
		$result = $query->row();
		return $result->quantity;
	}
	public function add($table,$data)	{

		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}

	public function update($table, $where, $data){

		$this->db->update($table, $data, $where);
		//$this->db->set($data);
       //$this->db->where($where);
        //$this->db->update($table,$data);		
		return $this->db->affected_rows();
		//print_r($this->db->last_query());
	}
	
	public function update_deals($table, $where, $data){
         if($where == '')
         {
		   return $this->db->insert($table, $data);
		 }
		$this->db->update($table, $data, $where);
		return $this->db->affected_rows();
	}
	
    public function all($table) {

		$this->db->from($table);
		$query=$this->db->get();
		return $query->result();
	}
	public function get_all()
	{
	   
	}
	public function get_product_by_userid($user_id){
        $this->db->where('user_id',$user_id);
		$this->db->from('product');
		$query=$this->db->get();
		return $query->result();
	}
	public function get_userby_userId($table,$id)
	{
	  $this->db->from($table);
		$this->db->where('user_id',$id);
		$query = $this->db->get();
	    //print_r($this->db->last_query());
		return $query->result_array();
	}
	public function get_username_by_userid($user_id)
	{
	  $this->db->where('user_id',$user_id);
	  $this->db->from('user');
	  $query=$this->db->get();
	  return $query->result();
	}
	public function get_user_by_userid($user_id){
        $this->db->where('user_id',$user_id);
         $this->db->where('user_type',1);
		$this->db->from('user');
		$query=$this->db->get();
		return $query->result_array();
	}
	public function pdf_edit_byid($table,$id)
	{
	  $this->db->from($table);
		$this->db->where('id',$id);
		$query = $this->db->get();
	    //print_r($this->db->last_query());
		return $query->result_array();
	}
	public function get_category_by_userid($user_id){
        $this->db->where('user_id',$user_id);
		$this->db->from('category');
		$query=$this->db->get();
		return $query->result();
	}
	public function allByCon($table, $con) {

		$this->db->from($table);
		$this->db->where($con);
		$query=$this->db->get();
		return $query->result();
	}
	public function delete_by_id($table,$id)
	{
		$this->db->where('id', $id);
		$this->db->delete($table);
	}
	public function delete_by_user_id($table,$user_id)
	{
		$this->db->where('user_id', $user_id);
		$this->db->delete($table);
	}
	public function update_by_id($table,$id)
	{
		$this->db->update($table, array('status' => 0), array('id' => $id));
		return $this->db->affected_rows();
	}
	public function getSearch($searchBook) {
	    // if(empty($searchBook))
	    //    return array();

	    $result = $this->db->like('product_id', $searchBook)
	             ->or_like('product_name', $searchBook)            
	             ->get('product');

	    return $result->result();
	} 

	public function getData($id){

		$this->db->select('bill.*, product.product_name, product.id, product.product_id, product.product_id2');
		$this->db->from('bill');
		$this->db->join('product', 'bill.product_name = product.id');
		$this->db->where('bill.id',$id);		
		$result = $this->db->get();
		$data= $result->row();
		return $data;
	}
	public function productdetails($id){

		$this->db->select('bill.*, product.product_name, product.id, product.product_id, product.product_id2');
		$this->db->from('bill');
		$this->db->join('product', 'bill.product_name = product.id');
		$this->db->where('bill.id',$id);		
		$result = $this->db->get();
		$data= $result->row();
		return $data;
	}




}

