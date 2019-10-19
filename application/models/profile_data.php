<?php 
class profile_data extends CI_Model{

    function get_userdata($id){
      $this->db->where('user_id', $id);
      return $this->db->get('user');
    }
   function get_seminar_history($userid=null){
    $this->db->select('*');
    $this->db->from('user_trx');
    $this->db->where('user_id', $userid);
    $this->db->join('seminar','seminar.seminar_id = user_trx.seminar_id');
    //$this->db->join('city','city.user_id = users.u_id')
    $this->db->order_by('seminar_date', 'ASC');
    return $this->db->get();
   }

   function update_data($data,$table,$colomn,$key){
    $this->db->where($colomn,$key);
    $this->db->update($table,$data);
    return true ;
    }

    function update_password($data,$table,$email,$olddata){
      $this->db->where('email',$email);
      $this->db->where('password',$olddata);
      $this->db->update($table,$data);
      return true;
      }
    


      }//endclass
?>