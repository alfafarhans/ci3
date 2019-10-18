<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class payment extends CI_Controller {
	function __construct(){
		parent::__construct();		
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
	public function confirmation(){
		$userid = $this->session->userdata('user_id');
		if(!empty($userid)){
		$username = $this->session->userdata('user_name');
		$data['user_id'] = $userid;
		$data['username'] = $username;
		$this->load->view('payment',$data);
		}
		else{
			redirect('home');
		}
		



    }
}
?>