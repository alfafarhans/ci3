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

      function get_alltrx(){
        $this->db->select('seminar_name, seminar_price, payment_created, bill_bank_name, bill_name, first_name, last_name, bill_number, p.payment_id');
        $this->db->from('user_trx t'); 
        $this->db->join('seminar s', 's.seminar_id= t.seminar_id');
        $this->db->join('user u', 'u.user_id= t.user_id');
        $this->db->join('payment p', 'p.payment_id= t.payment_id');
        $this->db->where('t.atten_status','Waiting Confirmation');
        $this->db->order_by('p.payment_created','asc');         
        $query = $this->db->get(); 
        if($query->num_rows() > 0)
        {
            return $query;
        }
        else
        {
            return false;
        }


      }
    


      }//endclass
?>