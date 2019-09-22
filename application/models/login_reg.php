<?php 
class login_reg extends CI_Model{
     //input function
	function input_data($data,$table){
    
		$this->db->insert($table,$data);
    }
    //cekdata
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
    
    //show function
    function show_data(){
		return $this->db->get('user');
    }
    //validation function
    
    function can_login($email, $password)  
      {  
           $this->db->where('email', $email);  
           $this->db->where('password', $password);  
           $query = $this->db->get('user');  
           //SELECT * FROM users WHERE username = '$username' AND password = '$password'  
           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;       
           }  
      }  
      //edit function
       function edit($nis){
          $data = array(
            "nama" => $this->input->post('input_nama'),
            "jenis_kelamin" => $this->input->post('input_jeniskelamin'),
            "telp" => $this->input->post('input_telp'),
            "alamat" => $this->input->post('input_alamat')
          );
          
          $this->db->where('nis', $nis);
          $this->db->update('siswa', $data); 
        }
        
       //delete function
     function delete($nis){
          $this->db->where('nis', $nis);
          $this->db->delete('siswa');
        }
      
}


?>
