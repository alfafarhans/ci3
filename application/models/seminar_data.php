<?php 
class seminar_data extends CI_Model{
    /*cekdata
  function cekemail($value){
    $this->db->query("SELECT email FROM user");
    $this->db->where('email',$value);
    $query = $this->db->get('user');
         if($query->num_rows()>0){
               return false;
             }
           else{
                return true;
               }
      }
    */
    function cekseminar_user($eventid,$userid){
      $this->db->where('user_id', $userid);
      $this->db->where('seminar_id', $eventid);
      $query =  $this->db->get('user_trx');
      if($query->num_rows()>0){
        return false;
      }
      else{
        return true;
      }
}

    function input_data($data,$table){
    
      $this->db->insert($table,$data);
      }
      
    function cekbooking($number){
      $this->db->where('booking_id ',$number);
      $query =  $this->db->get('user_trx');
      if($query->num_rows()>0){
        return false;
      }
      else{
        return true;
      }
      
    }
    function getseminar()
    {
    $curdate = date('Y-m-d');
    $this->db->where('seminar_date >=', $curdate);
		$query =  $this->db->get('seminar');
    return $query->result_array();
  }

  function get_seminar_detail($id=null){
    $this->db->where('seminar_id',$id);
    $query = $this->db->get('seminar');
    return $query->result_array();
  }
  function get_seminar_price($id = null){
    $this->db->SELECT("seminar_price");
    $this->db->from('seminar');
    $this->db->where('seminar_id',$id);
    $query = $this->db->get();
    return $query->row();
  }


  function get_filtercat($cat=null,$price=null,$datestart="anydate",$datemax=null)
  {
    $curdate = date('Y-m-d');
   // var_dump($cat);
  //  var_dump($price);
   // var_dump($datestart);
    //var_dump($datemax);

   $this->db->select("*");
    $this->db->from("seminar");

    if (!empty($datemax)) {
      $this->db->where('seminar_date >= ',$datestart);
      $this->db->where('seminar_date <=',$datemax);
    }
    elseif($datestart == "anydate"){
      $this->db->where('seminar_date >=', $curdate);
    }
    elseif(!empty($datestart)){
      $this->db->where('DATE(seminar_date)',$datestart);
    }
    if (!empty($price)) {
      if($price == "free"){
        $this->db->where('seminar_price', 0);
      }
      else{
        $this->db->where('seminar_price >', 0);
      }
    }
    
    if(!empty($cat)){
      $this->db->like('seminar_tag', $cat);
      }
      $this->db->order_by('seminar_date', 'ASC');
  return $this->db->get();
  }

  function search_seminar($key = nulld, $type = null){
    $curdate = date('Y-m-d');
    $this->db->select("seminar_id,seminar_name,seminar_city");
    $this->db->from("seminar");
    $this->db->where('seminar_date >=', $curdate);
    if($type === "#result_sem"){
      $this->db->like('seminar_name', $key);}
    elseif ($type === "#result_loc") {
      $this->db->like('seminar_city', $key);
    }
    $this->db->order_by('seminar_date', 'ASC');
    return $this->db->get();
  }



  }//endclass
?>
