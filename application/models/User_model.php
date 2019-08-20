<?php
class User_model extends CI_model{



public function register_user($user){


$this->db->insert('user', $user);

}

public function login_user($mobile,$pass){

  $this->db->select('*');
  $this->db->from('user');
  $this->db->where('user_mobile',$mobile);
  $this->db->where('user_password',$pass);

  if($query=$this->db->get())
  {
      return $query->row_array();
  }
  else{
    return false;
  }


}
public function email_check($email){

  $this->db->select('*');
  $this->db->from('user');
  $this->db->where('user_email',$email);
  $query=$this->db->get();

  if($query->num_rows()>0){
    return false;
  }else{
    return true;
  }

}

public function mobile_check($mobile){

  $this->db->select('*');
  $this->db->from('user');
  $this->db->where('user_mobile',$mobile);
  $query=$this->db->get();

  if($query->num_rows()>0){
    return false;
  }else{
    return true;
  }

}

public function email_check_profile($e,$id){

  $this->db->select('*');
  $this->db->from('user');
  $this->db->where('user_email',$e);
  $this->db->where('user_id!=',$id);
  $query=$this->db->get();

  if($query->num_rows()>0){
    return false;
  }else{
    return true;
  }

}
public function mobile_check_profile($e,$id){

  $this->db->select('*');
  $this->db->from('user');
  $this->db->where('user_mobile',$e);
  $this->db->where('user_id!=',$id);
  $query=$this->db->get();

  if($query->num_rows()>0){
    return false;
  }else{
    return true;
  }

}

public function get_country(){
	 $this->db->select('*');
     $this->db->from('countries');
     $query=$this->db->get();
     //print_r($this->db->last_query());
     return $query->result_array();

}

public function user_details($id){
	 $this->db->select('*');
     $this->db->from('user');
     $this->db->where('user_id',$id);
     $query=$this->db->get();
     //print_r($this->db->last_query());
     return $query->result_array();

}

public function update_user($id){
	 $this->db->where('user_id',$id);
     return $this->db->update('user',array('user_count' => 1));
     //$query=$this->db->get();
     //print_r($this->db->last_query());
     //return $query->result_array();

}

public function update_user_profile($user,$id){
	 $this->db->where('user_id',$id);
     return $this->db->update('user',$user);
     //$query=$this->db->get();
     //print_r($this->db->last_query());
     //return $query->result_array();

}

}


?>
