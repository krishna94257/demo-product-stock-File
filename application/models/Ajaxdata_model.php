<?php
class Ajaxdata_model extends CI_model{

 public function __construct(){

    parent::__construct();
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->database();
 }

public function getajaxdata($countryid,$stateid){


if(!empty($countryid)){
    //Fetch all state data
    $query = $this->db->query("SELECT * FROM states WHERE country_id = '$countryid'  ORDER BY name ASC");
    
    
    //Count total number of rows
    //$rowCount = $query->num_rows;
   $s = $query->result_array();
    //State option list
    if($s){
        echo '<option value="">Select state</option>';
        foreach($s as $row){ 
            echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
        }
    }else{
        echo '<option value="">State not available</option>';
    }
}elseif(!empty($stateid)){
    //Fetch all city data
    $query = $this->db->query("SELECT * FROM cities WHERE state_id = '$stateid'  ORDER BY name ASC");
    
    //Count total number of rows
    //$rowCount = $query->num_rows;
     $c = $query->result_array();
    //City option list
    if($c){
        echo '<option value="">Select city</option>';
        foreach($c as $row){ 
            echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
        }
    }else{
        echo '<option value="">City not available</option>';
    }
}

}
}
