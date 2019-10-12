<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class profile extends CI_Controller {
	

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
		$this->load->model('profile_data');
		if($par == "profile"){
			$userdata = $this->profile_data->get_userdata($userid);
			foreach ($userdata->result_array() as $value) {
				$firstnamefill = str_replace(" ","&nbsp;",$value['first_name']);
				$name = ucwords($firstnamefill."&nbsp;".$value['last_name']);
				
				if($value['user_gender']){
					$gender = "Laki - Laki" ;
				}
				else{
					$gender = "Perempuan";
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
					<option value="pria" selected>'.$gender.' </option>
					<option value="wanita"> Perempuan </option>
				</select>
			</div>
		</div>

		<div id="row">
			<div id="col-25"> 
				Alamat
			</div>
			<div id="col-75"> 
				<textarea name="alamat" style="height: 200px;" value="Jl KH Noer Ali No.1 Jakasampurna Bekasi Barat"></textarea>
			</div>
		</div>
	</div>
	
	<div id="rightbody2">               
		<div id="objright2">
			<div id="row">
				<div id="col-25"> 
				</div>  
				<div id="col-75"> 
					<input type="submit" id="submit" name="submit" value="Save">
				</div>  
			</div>
		</div>
	</div>
	';
			   }
		}//first if
elseif ($par == "myevent") {
	echo ' 
	<div id="rightbody">
        <div id="objright">
            <h3> My Event </h3> 
            Berikut list seminar yang saya ikuti.
        </div>
	</div>
	<div id="rightbody3">
		<div id="objright3">
			<img src="'.base_url().'asset/pict/banner/Indonesia_Ves_2019_2019_2019-09_12.png">
		</div>
		<div id="objright4">
			<div id="namaseminar">
				Indonesia Ves
			</div>  
			<div id="dateseminar">
				13 Oktober 2019
			</div> 
			<div id="locseminar">
				Jl. Pintu Satu Senayan, RT.1/RW.3, Gelora, Tanahabang, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 10270
			</div>  
			<div id="bota">
				<a href="#"> Cek kode registrasi</a>
			</div>
		</div>
	</div>';
}//second if

elseif ($par == "setting") {
	echo '
	<div id="rightbody">
        <div id="objright">
            <h3> My Event </h3> 
            Berikut list seminar yang saya ikuti.
        </div>
	</div>

	<div id="rightbody2">
		<div id="objright2">
			<div id="row">
				<div id="col-25"> 
					Email
				</div>
				<div id="col-75"> 
					<input type="text" id="email" name="email" value="alfafarhansyarief@yahoo.co.id">
				</div>
			</div>

			<div id="row">
				<div id="col-25"> 
					Password lama
				</div>
				<div id="col-75"> 
					<input type="text" id="passwordl" name="passwordl">
				</div>
			</div>

			<div id="row">
				<div id="col-25"> 
					Password baru
				</div>
				<div id="col-75"> 
					<input type="text" id="passwordb" name="passwordb">
				</div>
			</div>
		</div>
	</div>';
}//third if


	}//end functionchange



}//endpoint
