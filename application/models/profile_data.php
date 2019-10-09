<?php 
class profile_data extends CI_Model{

    function get_userdata($id){
             $this->db->where('user_id', $id);
             return $this->db->get('user');
    }

      }//endclass
?>