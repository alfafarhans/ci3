<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('seminar_data');
		$this->load->library('pagination');
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
	public function index()
	{	//http://localhost:8080/ci3/index.php/home
		$userid = $this->session->userdata('user_id');
		$username = $this->session->userdata('user_name');
		if(empty($userid)){//if not signing
			$this->load->view('home');
		}
		else{	//setting user if already login
			$data['user_id'] = $userid;
			$data['username'] = $username;
			$this->load->view('home',$data);
		}
		
	}
	function fillter_query($from = 0){
		$newdate1= "";
		$newdate2= "";
		$output = "";
		$price = $this->input->post('price1');
		$date = $this->input->post('date1');
		//$location = $this->input->post('loc1');
		if( (!empty($price)) ||(!empty($date))  ){	
				 $curdate = date('Y-m-d'); 
				if($date == "today"){
					$newdate1 = $curdate;
				}
				elseif($date == "tomorrow"){
					$newdate1 = date('Y-m-d', strtotime(' +1 day'));
				}
				elseif($date == "thisweekend"){
					//this weekend
					$loopd = date("N");
					if ($loopd == 6) { // ifsaturday
						$newdate1 = $curdate;
						$newdate2 = date('Y-m-d', strtotime(' +1 day'));
					}
					elseif ($loopd == 7 ) { // if sunday
						$newdate1 = $curdate;
					}
					else { 
					//currentdate - targetdate  = add next date
					$calcdate = 6 - $loopd;
					$newdate1 = date('Y-m-d', strtotime('+'.$calcdate.' day'));//this
					$calcdate ++;
					$newdate2 = date('Y-m-d', strtotime('+'.$calcdate.' day'));//and this
					}

				}
				elseif($date == "thisweek"){
					$newdate1 = $curdate;//min 
					$newdate2 = date('Y-m-d',strtotime ( '+1 week' , strtotime ( $newdate1 ) ) );//max<=
				}
				elseif($date == "nextweek"){
					$loopd = date("N"); //1-7 mon = 1 sun =7
					$calcdate = 8 - $loopd;
					$newdate1 = date('Y-m-d', strtotime('+'.$calcdate.' day'));//> (min) 
					$newdate2 = date('Y-m-d',strtotime ( '+1 week' , strtotime ( $newdate1 ) ) );//max<=	
				}
				elseif($date == "thismonth"){
					$newdate1 = $curdate; // min
					$newdate2 = date('Y-m-d', strtotime ('first day of next month') ) ; //<= max
				}
				elseif($date == "nextmonth"){
					$newdate1 = date('Y-m-d', strtotime ('first day of next month') ) ; //> min
					$newdate2 = date('Y-m-d', strtotime ('last day of next month') ) ;//<= max
				}
				else{
					$newdate1 = "anydate";
				}
					$varcat = $this->input->post('varcat');
					$varcity = $this->input->post('varcity');
					$strfil1 =  str_replace("-"," ",$varcity);
					$strfil2 = ucwords($strfil1);
					$pricer = $this->input->post('price1');
					$data = $this->seminar_data->filter($varcat,$strfil2,$pricer,$newdate1,$newdate2);
					$config['total_rows'] = $data->num_rows();
					$config['per_page'] = 6;
					$this->pagination->initialize($config);	
							if($from < $config['total_rows'] ){
								$start = $from;
							}
							else{
								$start = $config['total_rows'];
							}	
					$datanew = $this->seminar_data->filter($varcat,$strfil2,$pricer,$newdate1,$newdate2,$config['per_page'],$start);
		}
  		if($datanew->num_rows() > 0)
 		 {
 		  foreach($datanew->result_array() as $value)
 		  {
			$dayname = date('D', strtotime($value['seminar_date']));
            $daynum = date('d', strtotime($value['seminar_date']));
            $mounth = date('F', strtotime($value['seminar_date']));
           // $hours =  date('H', strtotime($value['seminar_date']));
			//$minute =  date('i', strtotime($value['seminar_date']));
			
				$output .= 
			'<div id="post">
				<a href="'. base_url().'event_detail/'. $value['seminar_id'].'"> ';
				$output .='
					<div id="img">
						<img src="'.base_url().'asset/pict/banner/'. $value['seminar_banner'].'">
					</div>
				<div id="descbox"> 
					<div id="namaseminar">'.$value['seminar_name'].' </div>
					<div id="dateseminar">'.$dayname.',&nbsp;'.$daynum.'&nbsp;'.$mounth.'</div>
					<div id="locseminar">'.ucwords($value['seminar_city']).'</div>
				</div>
				</a>
			</div>';
			$status = true;
				 }
		  }
		  else {
			$status = false;
		  }
		  echo json_encode(
			array(
				'output' => $output,
				'status' => $status
			   )
			);
		}
	function search (){
		$output="";
		$datasearch = $this->input->post('datasearch');
		//$type = $this->input->post('type');
		//var_dump($datasearch);
		//	var_dump($type);
	$result = $this->seminar_data->search_seminar($datasearch /*,$type*/);
		//if($type === "#result_sem"){
			if($result->num_rows() > 0)
 		 	{
				foreach ($result->result_array() as $value) {
				$output .='<a href="'. base_url().'event_detail/'. $value['seminar_id'].'" >'.$value['seminar_name'].' </a>';
				
			}
		}
	//}
	/*elseif($type === "#result_loc"){
		$param = "";
		if($result->num_rows() > 0){
		  foreach ($result->result_array() as $value) {
			if($param != $value['seminar_city']){
				$param = $value['seminar_city'];
				$output .='<a href="javascript:void(0);" id ="'.$value['seminar_city'].'" onClick = "changevalloc(this)">'.ucwords($value['seminar_city']).'</a>';//'. base_url().'home/getloc/'. $value['seminar_city'].'
			}
		}

  		}
	}*/
	echo $output;
		}
		
	
}//end
