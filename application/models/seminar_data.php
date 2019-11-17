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
    function getcityfilter(){
      $curdate = date('Y-m-d');
      $this->db->select('seminar_city');
      $this->db->where('seminar_date >=', $curdate);
     $this->db->order_by('seminar_city', 'ASC');
      return $this->db->get('seminar');
    }


    function filter($category=null,$city=null, $price=null,$datestart="anydate",$datemax=null, $limit = null, $offset = null ){
      $curdate = date('Y-m-d');
      $this->db->select("*");
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

      if($category != null){
        $toarr = explode(',',$category);
        $arrlength = count($toarr);//arr length start 1
        if($arrlength === 1){
          $this->db->like('seminar_tag',$toarr[0]);
        }
        else if($arrlength > 1){
          $this->db->like('seminar_tag',$toarr[0]);
          for ($i=1; $i<$arrlength; $i++) { 
             $this->db->or_like('seminar_tag',$toarr[$i]);
          }
        }
    }
    if($city != null){
        $toarr1 = explode(',',$city);
        $arrlength1 = count($toarr1);//arr length start 1
        if($arrlength1 === 1){
          $this->db->where('seminar_city',$toarr1[0]);
        }
        else if($arrlength1 > 1){
          $this->db->where('seminar_city',$toarr1[0]);
          for ($i=1; $i<$arrlength1; $i++) { 
            $this->db->or_where('seminar_city',$toarr1[$i]);
          }
        }
    }
    $this->db->order_by('seminar_date', 'ASC');
    return $this->db->get('seminar',$limit,$offset);
    }

    function testfil ($category=null,$city=null){ //for test
      $this->db->select('*');
      if($category != null){
          $toarr = explode(',',$category);
          $arrlength = count($toarr);//arr length start 1
          if($arrlength === 1){
            $this->db->like('seminar_tag',$toarr[0]);
          }
          else if($arrlength > 1){
            $this->db->like('seminar_tag',$toarr[0]);
            for ($i=1; $i<$arrlength; $i++) { 
               $this->db->or_like('seminar_tag',$toarr[$i]);
            }
          }
      }
      
      if($city != null){
          $toarr1 = explode(',',$city);
          $arrlength1 = count($toarr1);//arr length start 1
          if($arrlength1 === 1){
            $this->db->where('seminar_city',$toarr1[0]);
          }
          else if($arrlength1 > 1){
            $this->db->where('seminar_city',$toarr1[0]);
            for ($i=1; $i<$arrlength1; $i++) { 
              $this->db->or_where('seminar_city',$toarr1[$i]);
            }
          }
      }
      $query = $this->db->get('seminar');
      return $query;
    }
    function scan_update($payid){
      $this->db->where('payment_id',$payid);
      $this->db->set('atten_status','Attend On Stage');
      $query = $this->db->update('user_trx');
      if($query){return true;}
      else{return false;}
    }
    function deletetrx($eventid,$userid){
      $this->db->select('payment_id');
      $this->db->where('seminar_id', $eventid);
      $this->db->where('user_id', $userid);
      $query = $this->db->get('user_trx');
      $getval = $query->row();
      $val = $getval->payment_id;
      if($query->num_rows() == 1){
        $this->db->where('user_id', $userid);
        $this->db->where('seminar_id', $eventid);
        $query2 = $this->db->delete('user_trx');
        if($query2){
          $this->db->where('payment_id', $val);
          $query2 = $this->db->delete('payment');
          return true;
        }
      }
    }
    function getqrcode($eventid,$userid){
      $this->db->select('booking_id');
      $this->db->where('user_id', $userid);
      $this->db->where('atten_status', 'Booked');
      $this->db->where('seminar_id', $eventid);
      $query =  $this->db->get('user_trx');
      return $query->row();
    }

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
  /*
  function get_seminar_price($id = null){
    $this->db->SELECT("seminar_price");
    $this->db->from('seminar');
    $this->db->where('seminar_id',$id);
    $query = $this->db->get();
    return $query->row();
  }*/

  function search_user_his($key = null,$u_id){
    $this->db->select("s.seminar_id,s.seminar_name");
    $this->db->from('user_trx t');
    $this->db->where('t.user_id', $u_id);
    $this->db->like('s.seminar_name', $key);
    $this->db->join('seminar s','s.seminar_id = t.seminar_id');
    $this->db->order_by('s.seminar_name', 'ASC');
    return $this->db->get();
  }
  function search_seminar($key = null/*,$type = null*/){
    $curdate = date('Y-m-d');
    $this->db->select("seminar_id,seminar_name");
    $this->db->from("seminar");
    $this->db->where('seminar_date >=', $curdate);
    //if($type === "#result_sem"){
    $this->db->like('seminar_name', $key);
    $this->db->order_by('seminar_name', 'ASC');
    //}
    /*elseif ($type === "#result_loc") {
      $this->db->like('seminar_city', $key);
      $this->db->order_by('seminar_city', 'ASC');
    }*/
    return $this->db->get();
  }
  function userinftrx($seminar_id = null,$user_id = null ){
    $this->db->select("atten_status");
    $this->db->where('seminar_id ',$seminar_id);
    $this->db->where('user_id ',$user_id);
    $query =  $this->db->get('user_trx');
    if($query->num_rows()>0){
      return $query->row();
    }
  }
  function payment_detail ($seminarid=null,$userid=null){
      $this->db->select('seminar_name,seminar_date,seminar_held,seminar_price,payment_id');
      $this->db->from('user_trx');
      $this->db->where('user_trx.user_id', $userid);
      $this->db->where('user_trx.seminar_id', $seminarid);
      $this->db->join('seminar','seminar.seminar_id = user_trx.seminar_id');
      //$this->db->join('city','city.user_id = users.u_id')
      return $this->db->get()->result_array();
     
    }


  }//endclass
?>
