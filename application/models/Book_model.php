<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Book_model extends CI_Model
{
	var $table = 'books';
	var $tablep = 'plot';

	// public function __construct()
	// {
	// 	parent::__construct();
	// 	$this->load->database();
	// }

	// public function get_all_books($table) {

	// 	$this->db->from($table);
	// 	$query=$this->db->get();
	// 	return $query->result();
	// }

	

	// public function get_by_id($table,$id){

	// 	$this->db->from($table);
	// 	$this->db->where('book_id',$id);
	// 	$query = $this->db->get();
	// 	return $query->row();
	// }
	// public function book_add($table,$data)	{

	// 	$this->db->insert($table, $data);
	// 	return $this->db->insert_id();
	// }

	// public function book_update($table, $where, $data){

	// 	$this->db->update($table, $data, $where);
	// 	return $this->db->affected_rows();
	// }

	// public function delete_by_id($table,$id)
	// {
	// 	$this->db->where('book_id', $id);
	// 	$this->db->delete($table);
	// }



	// public function plot_add($data)

	// {

	// 	$this->db->insert($this->tablep, $data);

	// 	return $this->db->insert_id();

	// }

	//public function plot_update($where, $data)

	// {

	// 	$this->db->update($this->tablep, $data, $where);

	// 	return $this->db->affected_rows();

	// }
	// public function get_all_plot()

	// {

	// $this->db->from('plot');

	// $query=$this->db->get();

	// return $query->result();

	// }

	// public function get_by_idp($id)

	// {

	// 	$this->db->from($this->tablep);

	// 	$this->db->where('book_id',$id);

	// 	$query = $this->db->get();

	// 	return $query->row();

	// }





}

