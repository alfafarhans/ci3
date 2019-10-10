<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class my_event extends CI_Controller {
	

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
	public function index()//this should use ID parameter
	{	//http://localhost:8080/ci3/index.php/home
		$this->load->model('profile_data');
		$userid = $this->session->userdata('user_id');
		$username = $this->session->userdata('user_name');
		if(!empty($userid)){//if signing
			$data['user_id'] = $userid;
			$data['username'] = $username;
			$data['userdata'] = $this->profile_data->get_userdata($userid);
			$this->load->view('my_event',$data);
		}
		else{	//setting user if not signing
			redirect('home');
		}
	}

}
