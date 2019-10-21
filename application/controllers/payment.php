<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class payment extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('profile_data');	
		$this->load->model('seminar_data');	
	}
	/**
	 * Index Page for this controller.
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
	public function confirmation($seminar_id=null,$user_id=null){ //confirmpage
		$userid = $this->session->userdata('user_id');
		if( (!empty($userid))  &&  ($user_id == $userid)  ){
		$username = $this->session->userdata('user_name');
		$data['user_id'] = $userid;
		$data['username'] = $username;
		$data['s_id'] = $seminar_id;
		$data['seminar']= $this->seminar_data->payment_detail($seminar_id,$user_id);
		$this->load->view('payment',$data);
		}
		else{
			redirect('home');
		}

	}
	function updata($payment_id,$s_id){
		$userid = $this->session->userdata('user_id');
		if(!empty($userid)){
		$billname = $this->input->post('billname');  
		$billbank = $this->input->post('billbank');	//err
		$norek = $this->input->post('norek');	
		$data = array(
			'bill_name' => $billname,
			'bill_bank_name' => $billbank,
			'bill_number' => $norek,
			'paid_date' => date('Y-m-d'));
			$updating = $this->profile_data->update_data($data,'payment','payment_id' ,$payment_id);
			$this -> up_pict($payment_id);
			if($updating){
				$data1 = array('atten_status' => "Waiting Confirmation");
				$updater = $this->profile_data->update_data($data1,'user_trx','payment_id' ,$payment_id);
				if($updater){
					redirect('event_detail/'.$s_id.'');
				}

			}

			
		}
		
	}

	private function up_pict($pay_id) {
				$config['upload_path']          = './asset/pict/payment/';
				$config['allowed_types']        = 'jpg|png|jpeg';
				$config['file_name']            = $pay_id.'.png';
				$config['overwrite']			= true;
				$config['max_size']             = 2048; // 1MB
				// $config['max_width']            = 1024;
				// $config['max_height']           = 768;
				$this->load->library('upload', $config);
				
				if ($this->upload->do_upload('buktiimg')) {
					return true;
				}
				else{
					$error = $this->upload->display_errors();

					echo $error;
				}
		}
	
}//endclass
?>