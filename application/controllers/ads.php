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
	 
	public function user($direct = 1){
		$userid = $this->session->userdata('user_id');
		$username = $this->session->userdata('user_name');
		if(empty($userid)){//if not signing
			$this->load->view('ads');
		}
		else{	//setting user if already login
			$data['state'] = $direct;
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


function changepage ($par){
	$userid = $this->session->userdata('user_id');

	if($par == "profile"){
		echo '<form method="post" action="./ads/insertads" enctype="multipart/form-data" id="myform">    
		<div id="rightbody2">
			<div id="objright2">
				<div id="row">
					<div id="col-25"> 
						Seminar Name
					</div>
					<div id="col-75"> 
						<input type="text" id="semname" name="semname" placeholder="Fill the name of your seminar event" required>
					</div>
				</div>

				<div id="row">
					<div id="col-25"> 
						Seminar Date
					</div>
					<div id="col-75"> 
						<input type="date" id="semdate" name="semdate"  required>
					</div>
				</div>
				
				<div id="row">
					<div id="col-25"> 
						Time Start
					</div>
					<div id="col-75"> 
						<input type="time" id="semtime" name="semtime"  required>
					</div>
				</div>

				<div id="row">
					<div id="col-25"> 
						Seminar Seat
					</div>
					<div id="col-75"> 
						<input type="number" id="semseat" name="semseat" min="50" placeholder="Fill required seat number your event" required>
					</div>
				</div>

				<div id="row">
					<div id="col-25"> 
						Seminar City
					</div>
					<div id="col-75"> 
						<input type="text" id="semcity" name="semcity" placeholder="Enter the city where event held on" required>
					</div>
				</div>

				<div id="row" >
					<div id="col-25"> 
						Seminar Held
					</div>
					<div id="col-75"> 
						<textarea name="semheld" id="semheld" required> Fill seminar held address </textarea>
					</div>
				</div>

				<div id="row" >
					<div id="col-25"> 
						Seminar Description
					</div>
					<div id="col-75"> 
						<textarea name="semdesc" id="semdesc" required> Fill seminar description </textarea>
					</div>
				</div>

				<div id="row" >
					<div id="col-25"> 
						Seminar Tag
					</div>
					<div id="col-75"> 
						<div id="col-30"> 
							<label id="container">Business
								<input type="checkbox" name="category[]" value="business">
								<span id="checkmark"></span>
							</label>
						</div>
						<div id="col-30"> 
							<label id="container">Charity & Causes
								<input type="checkbox" name="category[]" value="charity">
								<span id="checkmark"></span>
							</label>
						</div>
						<div id="col-30"> 
							<label id="container">Family & Education
								<input type="checkbox" name="category[]" value="family">
								<span id="checkmark"></span>
							</label>
						</div>
						<div id="col-30"> 
							<label id="container">Fashion
								<input type="checkbox" name="category[]" value="fashion">
								<span id="checkmark"></span>
							</label>
						</div>
						<div id="col-30"> 
							<label id="container">Film & Media
								<input type="checkbox" name="category[]" value="film">
								<span id="checkmark"></span>
							</label>
						</div>
						<div id="col-30"> 
							<label id="container">Food & Drink
								<input type="checkbox" name="category[]" value="fooddrink">
								<span id="checkmark"></span>
							</label>
						</div>
						<div id="col-30"> 
							<label id="container">Goverment
								<input type="checkbox" name="category[]" value="goverment">
								<span id="checkmark"></span>
							</label>
						</div>
						<div id="col-30"> 
							<label id="container">Health
								<input type="checkbox" name="category[]" value="health">
								<span id="checkmark"></span>
							</label>
						</div>
						<div id="col-30"> 
							<label id="container">Hobbies
								<input type="checkbox" name="category[]" value="hobbies">
								<span id="checkmark"></span>
							</label>
						</div>
						<div id="col-30"> 
							<label id="container">Holiday
								<input type="checkbox" name="category[]" value="holiday">
								<span id="checkmark"></span>
							</label>
						</div>
						<div id="col-30"> 
							<label id="container">Home & Lifefstyle
								<input type="checkbox" name="category[]" value="homelifefstyle">
								<span id="checkmark"></span>
							</label>
						</div>
						<div id="col-30"> 
							<label id="container">Otomotif
								<input type="checkbox" name="category[]" value="otomotif">
								<span id="checkmark"></span>
							</label>
						</div>
						<div id="col-30"> 
							<label id="container">School Activies
								<input type="checkbox" name="category[]" value="schoolactivies">
								<span id="checkmark"></span>
							</label>
						</div>
						<div id="col-30"> 
							<label id="container">Science & Tech
								<input type="checkbox" name="category[]" value="sciencetech">
								<span id="checkmark"></span>
							</label>
						</div>
						<div id="col-30"> 
							<label id="container">Spiritually
								<input type="checkbox" name="category[]" value="spiritually">
								<span id="checkmark"></span>
							</label>
						</div>
						<div id="col-30"> 
							<label id="container">Sport & Fitness
								<input type="checkbox" name="category[]" value="sportfitness">
								<span id="checkmark"></span>
							</label>
						</div>
						<div id="col-30"> 
							<label id="container">Travel & Outdoor
								<input type="checkbox" name="category[]" value="traveloutdoor">
								<span id="checkmark"></span>
							</label>
						</div>
					</div>
				</div>

				<div id="row">
					<div id="col-25"> 
						Seminar Price
					</div>
					<div id="col-75"> 
						<input type="number" id="semprice" name="semprice" placeholder="How much your seminar event costs" required>
					</div>
				</div>

				<div id="row">
					<div id="col-25"> 
						Seminar Dresscode
					</div>
					<div id="col-75"> 
						<input type="text" id="semdress" name="semdress" placeholder="Specify your seminar event dresscode" required>
					</div>
				</div>

				<div id="row">
					<div id="col-25"> 
						Banner or Poster
					</div>
					<div id="col-75"> 
						<input type="file" name="semban" id="semban">
					</div>
				</div>

				<div id="row">
					<div id="col-25"> 
						Certificate Temp
					</div>
					<div id="col-75"> 
						<input type="file" name="semcert" id="semcert">
					</div>
				</div>

				<div id="row">
					<div id="col-25"> 
					</div>  
					<div id="col-75"> 
						<input type="submit" id="chpass" onClick= "#" name="submit" value="Submit My Seminar Event">
					</div>  
				</div>

			</div>
		</div>
	</form>';
		}//first if
	elseif ($par == "myeventads") {
		
		echo 'TEST' ;
		
	}//second if

}




}//endtag

?>