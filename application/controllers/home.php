<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

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
	public function index()
	{	//http://localhost:8080/ci3/index.php/home
		$userid = $this->session->userdata('user_id');
		if(empty($userid)){
			$this->load->view('home');
		}
		else{	//setting user if already login
			$data['user_id'] = $userid;
			$this->load->view('home',$data);
		}
		
	}
	 function signed($user_id)
	{	//http://localhost:8080/ci3/index.php/home/dashboard_signed
		$data['test'] = $user_id;
		$this->load->view('test',$data);
	}

}
