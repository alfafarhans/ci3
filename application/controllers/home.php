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
		$newdate1= "";
		$newdate2= "";
		$output = "";
		$cat = $this->input->post('cat1');
		$price = $this->input->post('price1');
		$date = $this->input->post('date1');
		if( (!empty($cat)) || (!empty($price)) ||(!empty($date)) )
			  {	
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
					$loopd = date("N");
					$newdate1 = $curdate;//min 
					$calcdate = 7 - $loopd;
					$newdate2 = date('Y-m-d', strtotime('+'.$calcdate.' day'));//<= (max) 
				}
				elseif($date == "nextweek"){
					$loopd = date("N");
					$calcdate = 7 - $loopd;
					$newdate1 = date('Y-m-d', strtotime('+'.$calcdate.' day'));//> (min) 
					$newdate2 = date('Y-m-d',strtotime ( '+1 week' , strtotime ( $newdate1 ) ) );//max<=
					
				}
				elseif($date == "thismonth"){
					$newdate1 = $curdate; // min
					$newdate2 = date('Y-m-d', strtotime ('last day of this month') ) ; //<= max
				}
				elseif($date == "nextmonth"){
					$newdate1 = date('Y-m-d', strtotime ('last day of this month') ) ; //> min
					$newdate2 = date('Y-m-d', strtotime ('last day of next month') ) ;//<= max
				}
				$category = $this->input->post('cat1');
		$pricer = $this->input->post('price1');
		$this->load->model('seminar_data');
		$data = $this->seminar_data->get_filtercat($category,$pricer,$newdate1,$newdate2);
		}
		
  		if($data->num_rows() > 0)
 		 {
 		  foreach($data->result_array() as $value)
 		  {
			$dayname = date('D', strtotime($value['seminar_date']));
            $daynum = date('d', strtotime($value['seminar_date']));
            $mounth = date('F', strtotime($value['seminar_date']));
            $hours =  date('H', strtotime($value['seminar_date']));
            $minute =  date('i', strtotime($value['seminar_date']));
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
					<div id="dateseminar">'.$dayname.',&nbsp;'.$daynum.'&nbsp;'.$mounth.',&nbsp;'.$hours.'.'.$minute.'</div>
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
