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
			foreach ($userdata->result_array() as $value) {
				$daynum = date('d', strtotime($value['payment_created']));
				$mounth = date('m', strtotime($value['payment_created']));
				$year = date('Y', strtotime($value['payment_created']));

				$firstfill = str_replace('','&nbsp;',$value['first_name']);

				echo '  <div id="rightbody3">
				<div id="objright4">
					<div id="desc">
						<div id="namatx">
						'.$value['seminar_name'].'('.$value['seminar_price'].')
						</div>  
						<div id="kettx">
							'.$daynum.'/'.$mounth.'/'.$year.' | '.$value['bill_bank_name'].' | '.$value['bill_name']/*$firstfill.'&nbsp;'.$value['last_name']*/.' | '.$value['bill_number'].' | <a href="'.base_url().'asset/pict/payment/'.$value['payment_id'].'.png" target="_blank"> bukti_tf.png </a>
						</div> 
					</div>
				</div>
				<div id="bota">
					<Button id="app-pay"  value="'.$value['payment_id'].'">Approve</Button>
					<Button id="den-pay" value="'.$value['payment_id'].'">Denied</Button>
				</div>
			</div>';

			   }
			}//first if
		elseif ($par == "app-sem") {
			
			echo "NO PAGE";
			
		}//second if

	}
}