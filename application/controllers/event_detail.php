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
