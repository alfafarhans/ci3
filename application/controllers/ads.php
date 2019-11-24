<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ads extends CI_Controller {
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
	 
	public function index(){
		$userid = $this->session->userdata('user_id');
		$username = $this->session->userdata('user_name');
		if(empty($userid)){//if not signing
			$this->load->view('ads');
		}
		else{	//setting user if already login
			$data['user_id'] = $userid;
			$data['username'] = $username;
			$this->load->view('ads',$data);
		}


	}
	function insertads(){
		$semname = $this->input->post('semname');
		$semdate = $this->input->post('semdate');
		$semtime = $this->input->post('semtime');
		$semseat = $this->input->post('semseat');
		$semcity = $this->input->post('semcity');
		$semheld = $this->input->post('semheld');
		$semdesc = $this->input->post('semdesc');
		$category = implode(',' , $this->input->post('category'));
		$semprice = $this->input->post('semprice');
		$semdress = $this->input->post('semdress');
		
		$combinedDT = date('Y-m-d H:i:s', strtotime("$semdate $semtime"));//time

		$this->load->helper('string');
		do {
			$bookid =  random_string('nozero', 5);
			$resbook = $this->seminar_data->cekseminarid($bookid);
			if ($resbook){
				$reservedid = $bookid;
			}
		} while ($resbook == false);

		$data = array(
			'seminar_id' => $reservedid,
			'seminar_name' => $semname,
			'seminar_date' => $combinedDT,
			'seminar_city' => $semcity,
			'seminar_held' => $semheld,
			'seminar_seat' => $semseat,
			'seminar_desc' => $semdesc,
			'seminar_tag' => $category,
			'seminar_price' => $semprice,
			'seminar_drcode' => $semdress
			);
		
		$inssts = $this->seminar_data->insert_sem_db($data,'seminar');
			
	}

	private function up_pict($s_id,$type) { //do upload file after insert
		if($type == 1){
			$item = 'semban';
			$urli = 'banner';
		}
		else if($type == 2){
			$item = 'semcert';
			$urli = 'sert_template';
		}
		$config['upload_path']          = './asset/pict/temporary/';
		$config['allowed_types']        = 'jpg|png|jpeg';
		$config['file_name']            = $s_id.'.png'; //this
		$config['overwrite']			= true;
		$config['max_size']             = 0; // 1MB
		$this->load->library('upload', $config);
		if ($this->upload->do_upload($item)) { //this
		$gbr = $this->upload->data();
		$config['image_library']='gd2';
		$config['source_image']='./asset/pict/temporary/'.$gbr['file_name'];
		$config['create_thumb']= FALSE;
		$config['maintain_ratio']= FALSE;
		$config['quality']= '100%';
		$config['new_image']= './asset/pict/'.$urli.'/'.$gbr['file_name']; //this
		$this->load->library('image_lib', $config);
		$resizex =$this->image_lib->resize();	
		if($resizex){
				unlink('./asset/pict/temporary/'.$gbr['file_name']);
				return true;
				}
		}
		else{
			$error = $this->upload->display_errors();
			echo $error;
		}
}


}//endtag

?>