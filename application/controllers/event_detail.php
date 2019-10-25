<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class event_detail extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('seminar_data');
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
	 function scan($p_id=null){
		 $userid = $this->session->userdata('user_id');
		if( (!empty($userid)) && ($userid == 7320006) ){
			$query = $this->seminar_data->scan_update($p_id);
			if($query){
				echo 'SUKSES';
			}
			else {
				echo 'gagal';
			}
		}
		else {
			redirect('login');
		}
	 }

	 
	 function cancle($s_id=null,$userid=null,$page=0){
		$delete = $this->seminar_data->deletetrx($s_id,$userid);
		if(($delete) && ($page == 0)){
			redirect('event_detail/'.$s_id);
		}
		else if(($delete) && ($page == 1)){
			redirect('profile/myprofile/2');
		}
	 }
	 function renderqr($s_id=null,$userid=null){
		$this->load->library('Ciqrcode');
		$rev_qrcode = $this->seminar_data->getqrcode($s_id,$userid);
		//var_dump($rev_qrcode);
		if ( !empty($rev_qrcode->booking_id) ){
			QRcode::png(
				base_url().'event_detail/scan/'.$rev_qrcode->booking_id.$userid,
				$outfile = false,
				$level = QR_ECLEVEL_H,
				$size = 5,
				$margin = 1
			);
		}
		else{
			return false;
		}
	}
	public function detail($s_id=null)//this should use ID parameter
	{	//http://localhost:8080/ci3/index.php/home
	
		$data['seminar']= $this->seminar_data->get_seminar_detail($s_id);
	//	$checkuser = $this->seminar_data->userinftrx($s_id);
		$userid = $this->session->userdata('user_id');//session user
		$username = $this->session->userdata('user_name');//lastname
		$userstatus = $this->seminar_data->userinftrx($s_id,$userid);
		$data['user_id'] = $userid;
		$data['username'] = $username;
		if(empty($userstatus->atten_status)){
			$data['registered'] = "";
		}
		else{	
			$data['registered'] = $userstatus->atten_status;
		}
		
		$this->load->view('event_detail',$data);
	}

	function applyevent($eventid = null,$userid = null){
		
	$cekuser = $this->seminar_data->cekseminar_user($eventid,$userid);
	if($cekuser){
		//$data_price = $this->seminar_data->get_seminar_price($eventid);
		$this->load->helper('string');
	do {
		$bookid =  random_string('nozero', 6);
		$resbook = $this->seminar_data->cekbooking($bookid);
		if ($resbook){
			$reservedid = $bookid;
		}
	} while ($resbook == false);


		if($resbook){
			$curdate = date('Y-m-d'); 
			
			$data1 = array(
					'payment_id' => $reservedid.$userid,
					//'seminar_price' => $data_price->seminar_price,
					'payment_created' =>  $curdate);
			$data2 = array(
						'booking_id' => $reservedid,
						'user_id' => $userid,
						'seminar_id' => $eventid,
						'payment_id' => $reservedid.$userid,
						'atten_status' => 'Waiting Payment' );

				$this->seminar_data->input_data($data1,'payment');
				$this->seminar_data->input_data($data2,'user_trx');
				$msg = "THANK YOU !!!";
				//redirect('home');
		}	
		else{
			echo "EROR INSERT";
		}
	}
	else{
		$msg = "You already registered";
	}	
		echo json_encode(
			array(
				'msg' => $msg
			   )
			);

	}

}
