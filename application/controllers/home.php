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
		$this->load->model('seminar_data');
		$userid = $this->session->userdata('user_id');
		if(empty($userid)){
			$data['fetched_arr']= $this->seminar_data->getseminar();//if not signing
			$this->load->view('home',$data);
		}
		else{	//setting user if already login
			$data['fetched_arr']= $this->seminar_data->getseminar();
			$data['user_id'] = $userid;
			$this->load->view('home',$data);
		}
		
	}
	function filcat(){
		$output = "";
		$input = $this->input->post('query');
		if(!empty($input))
  			{
   		 	$query = $this->input->post('query');
		}
		$this->load->model('seminar_data');
		$data = $this->seminar_data->get_filtercat($query);
  		if($data->num_rows() > 0)
 		 {
 		  foreach($data->result_array() as $value)
 		  {
			$dayname = date('l', strtotime($value['seminar_date']));
            $daynum = date('d', strtotime($value['seminar_date']));
            $mounth = date('m', strtotime($value['seminar_date']));
            $hours =  date('H', strtotime($value['seminar_date']));
            $minute =  date('i', strtotime($value['seminar_date']));
            $month_num =$mounth; 
            $month_name = date("F", mktime(0, 0, 0, $month_num, 10));  
			$sbstr =  substr($dayname,0,3);
			$userid = $this->session->userdata('user_id');
			if(isset($userid)){
				$output .= 
			'<div id="post">
				<a href="'. base_url().'event_detail/'. $value['seminar_id'].'"> ';
					}
				else{
				$output .= 
				'<div id="post">
					<a href="'. base_url().'login/"> ';
				}
				$output .='
						<img src="'.base_url().'asset/pict/banner/'. $value['seminar_banner'].'">
					</a>
				<div id="descbox"> 
					<div id="namaseminar">'.$value['seminar_name'].' </div>
					<div id="dateseminar">'.$sbstr.',&nbsp;'.$daynum.'&nbsp;'.$month_name.',&nbsp;'.$hours.'.'.$minute.'</div>
					<div id="locseminar">'.$value['seminar_held'].'</div>
				</div>
			</div>';
				 }
				 echo $output;
		  }
		  else {
			  $output .= '<div id="namaseminar">You are not lucky &#128532; , keep following us!</div>';
			  echo $output;
		  }
		}
}//end
