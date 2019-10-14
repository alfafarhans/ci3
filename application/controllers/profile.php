<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class profile extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('profile_data');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function myprofile($direct = 1)//this should use ID parameter
	{	//http://localhost:8080/ci3/index.php/home
		$userid = $this->session->userdata('user_id');
		$username = $this->session->userdata('user_name');
		if(!empty($userid)){//if signing
			$data['user_id'] = $userid;
			$data['username'] = $username;
			$data['state'] = $direct;
			$this->load->view('profile',$data);
		}
		else{	//setting user if not signing
			redirect('home');
		}
	}
	function changepage ($par){
		$userid = $this->session->userdata('user_id');
		
		if($par == "profile"){
			$userdata = $this->profile_data->get_userdata($userid);
			foreach ($userdata->result_array() as $value) {
				$firstnamefill = str_replace(" ","&nbsp;",$value['first_name']);
				$name = ucwords($firstnamefill."&nbsp;".$value['last_name']);
				
				if($value['user_gender'] == 1 ){
					$gender = "Laki - Laki" ;
				}
				elseif ($value['user_gender'] == 0){
					$gender = "Perempuan";
				}
				else{
					$gender = " ";
				}

				
	   echo '
	<div id="rightbody">
		<div id="objright">
			<h3> Profile </h3> 
			Silahkan lengkapi data diri anda. Data diri anda di perlukan untuk keperluan administrasi aktifitas seminar yang anda ikuti. 
		</div>
	</div>
	<div id="rightbody2">
		<div id="objright2">
			<div id="row">
				<div id="col-25"> 
					Profile Picture
				</div>
			<div id="avatar"> 
				<img id="icon" src="'.base_url().'asset/pict/profile/'.$userid.'.png"> 
			</div>
			<div id="upload"> 
				<input type="file" name="profilepic">
			</div>
		</div>

		<div id="row">
			<div id="col-25"> 
				Nama 
			</div>
			<div id="col-75"> 
				<input type="text" id="firstname" name="firstname" value='.$name.'>
			</div>
		</div>

		<div id="row">
			<div id="col-25"> 
			Tanggal Lahir
			</div>
			<div id="col-75"> 
				<input type="date" id="email" name="tanggallahir" value ='.$value['date_born'].'>
			</div>
		</div>

		<div id="row">
			<div id="col-25"> 
				Jenis Kelamin
			</div>
			<div id="col-75"> 
				<select name="sex" >
					<option value="" selected>'.$gender.'</option>
					<option value="1">Laki - Laki</option>
					<option value="0">Perempuan</option>
				</select>
			</div>
		</div>

		<div id="row">
			<div id="col-25"> 
				No Handphone 
			</div>
			<div id="col-75"> 
				<input type="text" id="nohp" name="nohp">
			</div>
		</div>

		<div id="row">
			<div id="col-25"> 
				Alamat
			</div>
			<div id="col-75"> 
				<textarea name="alamat" style="height: 200px;" >'.$value['user_address'].'</textarea>
			</div>
		</div>
	</div>
	
	<div id="rightbody2">               
		<div id="objright2">
			<div id="row">
				<div id="col-25"> 
				</div>  
				<div id="col-75"> 
					<input type="submit" id="chprofile" name="submit" value="Save">
				</div>  
			</div>
		</div>
	</div>
	';
			   }
		}//first if
elseif ($par == "myevent") {
	$userdata = $this->profile_data->get_seminar_history($userid);
	echo'	<div id="rightbody">
	<div id="objright">
		<h3> My Event </h3> 
		Berikut list seminar yang saya ikuti.
	</div>
</div>';
			foreach ($userdata->result_array() as $value) {
	echo '
	<div id="rightbody3">
		<div id="objright3">
			<img src="'.base_url().'asset/pict/banner/'.$value['seminar_banner'].'">
		</div>
		<div id="objright4">
			<div id="namaseminar">
			'.$value['seminar_name'].'
			</div>  
			<div id="dateseminar">
			'.$value['seminar_date'].'
			</div> 
			<div id="locseminar">
			'.$value['seminar_held'].'</div>  
			<div id="bota">
				<a href="#"> Cek kode registrasi</a>
			</div>
		</div>
	</div>';
			}
}//second if

elseif ($par == "setting") {
	
	$userdata = $this->profile_data->get_userdata($userid);
	foreach ($userdata->result_array() as $value) {
	echo '
	<div id="rightbody">
        <div id="objright">
		<h3> Settings </h3> 
		Konfigurasikan akun anda,
		lakukan pergantian password rentang waktu tertentu.
        </div>
	</div>
	<div id="rightbody2">
		<div id="objright2">
			<div id="row">
				<div id="col-25"> 
					Email
				</div>
				<div id="col-75"> 
					<input type="text" id="email" name="email" value="'.$value['email'].'">
				</div>
			</div>

			<div id="row">
				<div id="col-25"> 
					Old Password
				</div>
				<div id="col-75"> 
					<input type="text" placeholder="Fill old your cute secret code" id="passwordl" name="passwordl">
				</div>
			</div>

			<div id="row">
				<div id="col-25"> 
					New Password
				</div>
				<div id="col-75"> 
					<input type="text" placeholder="Change with the cute one" id="passwordb" name="passwordb">
				</div>
			</div>
		
			<div id="row">
				<div id="col-25"> 
				</div>  
				<div id="col-75"> 
					<input type="submit" id="chpass" name="submit" value="Save">
				</div>  
			</div>
		</div>
	</div>';
	}
}//third if


	}//end functionchange



}//endpoint
