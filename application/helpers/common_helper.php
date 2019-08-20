<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('idToName'))
{
    function idToName($id)
    {
        $ci=& get_instance();
	    $ci->load->database();
	   	$query = $ci->db->get_where('books',array('book_id'=>$id));	    
	    $row = $query->row();
	    if (!empty($row)) {
	    	return $row->book_title;
	    }else{
	    	return $id;
	    }
	    
    }
}
if ( ! function_exists('idToName1'))
{
    function idToName1($id)
    {
        $ci=& get_instance();
	    $ci->load->database();
	   	$query = $ci->db->get_where('plot',array('book_id'=>$id));	    
	    $row = $query->row();
	    if (!empty($row)) {
	    	return $row->names;
	    }else{
	    	return $id;
	    }
	    
    }
}
if ( ! function_exists('idToName2'))
{
    function idToName2($id)
    {
        $ci=& get_instance();
	    $ci->load->database();
	   	$query = $ci->db->get_where('product',array('id'=> $id));	    
	    $row = $query->row();
	    if (!empty($row)) {
	    	return $row->product_name;
	    }else{
	    	return $id;
	    }	    
    }
}
if ( ! function_exists('countData'))
{
    function countData($table)
    {  
        $ci=& get_instance();
	    $ci->load->database();
	   	$query = $ci->db->get($table);	    
	    $row = $query->num_rows();

	    if (!empty($row)) {
	    	return $row;
	    }else{
	    	return 0;
	    }
	    
    }
}


if ( ! function_exists('countWhere'))
{
    function countWhere($table, $where)
    {  
        $ci=& get_instance();
	    $ci->load->database();
	   	$query = $ci->db->get_where($table, $where);	    
	    $row = $query->num_rows();
	    if (!empty($row)) {
	    	return $row;
	    }else{
	    	return 0;
	    }
	    
    }
}
if ( ! function_exists('idToName4'))
{
    function idToName4($id)
    {
        $ci=& get_instance();
	    $ci->load->database();
	   	$query = $ci->db->get_where('category',array('id'=>$id));	    
	    $row = $query->row();
	    if (!empty($row)) {
	    	return $row->category;
	    }else{
	    	return $id;
	    }
	    
    }
}
if ( ! function_exists('productcode'))
{
    function productcode($id)
    {
        $ci=& get_instance();
	    $ci->load->database();
	   	$query = $ci->db->get_where('product',array('id'=>$id));	    
	    $row = $query->row();
	    if (!empty($row)) {
	    	return $row->product_id;
	    }else{
	    	return "-";
	    }
	    
    }
}
if ( ! function_exists('productcode2'))
{
    function productcode2($id)
    {
        $ci=& get_instance();
	    $ci->load->database();
	   	$query = $ci->db->get_where('product',array('id'=>$id));	    
	    $row = $query->row();
	    if (!empty($row)) {
	    	return $row->product_id2;
	    }else{
	    	return "-";
	    }
	    
    }
}
if ( ! function_exists('hsncode'))
{
    function hsncode($id)
    {
        $ci=& get_instance();
	    $ci->load->database();
	   	$query = $ci->db->get_where('product',array('id'=>$id));	    
	    $row = $query->row();
	    if (!empty($row)) {
	    	return $row->hsn;
	    }else{
	    	return '-';
	    }
	    
    }
}
// if ( ! function_exists('psize'))
// {
//     function psize($id)
//     {
//         $ci=& get_instance();
// 	    $ci->load->database();
// 	   	$query = $ci->db->get_where('category',array('id'=>$id));	    
// 	    $row = $query->row();
// 	    if (!empty($row)) {
// 	    	return $row->category;
// 	    }else{
// 	    	return '-';
// 	    }
	    
//     }
// }