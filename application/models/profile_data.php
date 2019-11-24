<?php 
class profile_data extends CI_Model{

  

  function get_cer ($seminarid=null,$userid=null){
    $this->db->select('u.first_name,u.last_name,t.booking_id,s.seminar_name,s.seminar_id,s.cert_coord');
    $this->db->from('user_trx t');
    $this->db->where('t.user_id', $userid);
    $this->db->where('t.seminar_id', $seminarid);
    $this->db->join('seminar s','s.seminar_id = t.seminar_id');
    $this->db->join('user u','u.user_id = t.user_id');
    //$this->db->join('city','city.user_id = users.u_id')
    return $this->db->get()->result_array();
   
  }

    function get_userdata($id){
      $this->db->where('user_id', $id);
      return $this->db->get('user');
    }
   function get_seminar_history($userid=null){
    $this->db->select("s.seminar_id,s.seminar_name,s.seminar_date,s.seminar_banner,s.seminar_held, t.atten_status");
    $this->db->from('user_trx t');
    $this->db->where('t.user_id', $userid);
    $this->db->join('seminar s','s.seminar_id = t.seminar_id');
    $this->db->order_by('s.seminar_date', 'ASC');
    return $this->db->get();
   }
   function u_not_a($userid=null,$s_id=null){
    $data = array('atten_status' => 'Missing Attendance');
    $this->db->where('user_id',$userid);
    $this->db->where('seminar_id',$s_id);
    $this->db->update('user_trx',$data);
    return true ;
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

      function approved($p_id){
        $this->db->select('s.seminar_price');
        $this->db->from('user_trx t'); 
        $this->db->join('seminar s', 's.seminar_id= t.seminar_id');
        $this->db->join('payment p', 'p.payment_id= t.payment_id');
        $this->db->where('t.payment_id',$p_id);   
        $this->db->where('t.atten_status', 'Waiting Confirmation');    
        $query = $this->db->get(); 
        $result = $query -> row();
        if($query->num_rows() == 1)
        { $this->db->set('user_paid',$result->seminar_price);
          $this->db->where('payment_id',$p_id); 
          $updater1 = $this->db->update('payment');

          $this->db->set('atten_status','Booked');
          $this->db->where('payment_id',$p_id); 
          $updater2 = $this->db->update('user_trx');
          if(($updater1) && ($updater2) ){
            return true;
          }
          else {
            return false;
          }
          
        }
        else
        {
            return false;
        }
      }

      function denied($p_id){
        $this->db->set('atten_status','Reupload');
        $this->db->where('payment_id',$p_id);
        $updater = $this->db->update('user_trx');

        if($updater){
          return true;
        }
        else {
          return false;
        }
        
      }
    


      }//endclass
?>