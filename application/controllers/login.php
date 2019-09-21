<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('login_reg');
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
	public function index(){
		$this->load->view('login');
	}
	 function login_val(){
		//http://localhost:8080/ci3/index.php/login/login_val
			$this->load->library('form_validation');  
           $this->form_validation->set_rules('email', 'Email', 'required');  
           $this->form_validation->set_rules('password', 'Password', 'required');  
           if($this->form_validation->run())  
           {  
                //true  
                $username = $this->input->post('email');  
                $password = $this->input->post('password');  
                //model function   
                if($this->login_reg->can_login($username, $password))  
				{  	
					//setsession *here
					//http://localhost:8080/ci3/index.php/home/dashboard_signed
					 redirect(base_url() . 'index.php/home');
                }  
                else  
                {  
                     //$this->session->set_flashdata('error', 'Invalid Username and Password');  
                     redirect(base_url() . 'index.php/login');  
                }  
           }  
           else  
           {  
                //false  
                $this->index();  
           }  
		
	}
	function logout(){
		http://localhost:8080/ci3/index.php/login/logout
		$this->load->view('home');
	}

}
