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
		$seminar['seminar']= $this->seminar_data->get_seminar_detail($s_id);
		$this->load->view('event_detail',$seminar);
	}

}
