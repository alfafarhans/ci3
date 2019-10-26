<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class profile_admin extends CI_Controller {
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
    
	public function Admin($direct = 1)
	{	$userid = $this->session->userdata('user_id');
		$username = $this->session->userdata('user_name');
		if(empty($userid)){//if not signing
			$this->load->view('home');
		}
		else{	//setting user if already login
			$data['user_id'] = $userid;
			$data['username'] = $username;
			$data['state'] = $direct;
			$this->load->view('profile_admin',$data);
		}
	}
	
	function changepage ($par){
		$userid = $this->session->userdata('user_id');
		
		if($par == "app-pay"){
			$userdata = $this->profile_data->get_alltrx($userid);
			if($userdata){
			foreach ($userdata->result_array() as $value) {
				$daynum = date('d', strtotime($value['payment_created']));
				$mounth = date('m', strtotime($value['payment_created']));
				$year = date('Y', strtotime($value['payment_created']));

				$firstfill = str_replace('','&nbsp;',$value['first_name']);

				echo '  <div id="rightbody3">
				<div id="objright4">
					<div id="desc">
						<div id="namatx">
						'.$value['seminar_name'].' ('.$value['seminar_price'].')
						</div>  
						<div id="kettx">
							'.$daynum.'/'.$mounth.'/'.$year.' | '.$value['bill_bank_name'].' | '.$value['bill_name']/*$firstfill.'&nbsp;'.$value['last_name']*/.' | '.$value['bill_number'].' | <a href="'.base_url().'asset/pict/payment/'.$value['payment_id'].'.png" target="_blank"> bukti_tf.png </a>
						</div> 
					</div>
				</div>
				<div id="bota">
					<div id="items">
						<a id="app-pay"  href="'.base_url().'profile_admin/appv/'.$value['payment_id'].'">Approve</a>
					</div>
					<div id="items">
						<a id="den-pay" href="'.base_url().'profile_admin/dnnd/'.$value['payment_id'].'">Denied</a>
					</div>
				</div>
			</div>';

			   }
			}
			else{
				echo 'NO ONE REGISTER';
			}
			}//first if
		elseif ($par == "app-sem") {
			
			echo '<div id="rightbody3">
				<div id="objright3">
					<img src="'.base_url().'asset/pict/banner/Indonesia_Ves_2019_2019_2019-09_12.png">
				</div>
				<div id="objright4">
					<div id="desc">
						<div id="namatx">
							Indonesia Ves 2019 
						</div>  
						<div id="datetx">
							30 October 2019
						</div> 
						<div id="kettx">
							Jl. Pintu Satu Senayan, RT.1/RW.3, Gelora, Tanahabang, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 10270 
						</div> 
					</div>

					<div id="bota2">
						<a id="cekdetail-sem"  href="#">Cek</a>
					</div>
					<div id="bota3">
						<a id="app-sem"  href="#">Approve</a>
					</div>
					<div id="bota4">
						<a id="dec-sem"  href="#">Decline</a>
					</div>
				</div>
				
			';
			
		}//second if

	}
		function appv($p_id=null){
			$userupdate = $this->profile_data->approved($p_id);
			if($userupdate){
				redirect('/profile_admin/Admin');
			}
		}
		function dnnd($p_id=null){
			$userupdate = $this->profile_data->denied($p_id);
			if($userupdate){
				redirect('/profile_admin/Admin');
			}
		}
}//end class