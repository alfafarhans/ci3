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
    //show function
    function getseminar()
    {
		$query =  $this->db->get('seminar');
      return $query->result_array();
      
  }

  }//endclass
?>
