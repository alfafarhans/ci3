<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class profile_admin extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('profile_data');
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
    
	public function Admin($direct = 1)
	{	$userid = $this->session->userdata('user_id');
		$username = $this->session->userdata('user_name');
		if(empty($userid)){//if not signing
			$this->load->view('home');
		}
		else{	//setting user if already login
			$data['user_id'] = $userid;
			$data['username'] = $username;
			$data['state'] = $direct;
			$this->load->view('profile_admin',$data);
		}
	}
	
	function chsts ($para,$adsid){
		if($para == 1){
			$qeury = $this->profile_data->chsts_db($adsid,'Reupload');
		}
		elseif ($para == 2){
			$qeury = $this->profile_data->chsts_db($adsid,'Approve');
		}
		elseif ($para == 2){
			$qeury = $this->profile_data->chsts_db($adsid,'Rejected Event');
		}

		if($qeury){
			redirect('profile_admin/Admin');
		}


	}

	function changepage ($par){
		$userid = $this->session->userdata('user_id');
		
		if($par == "app-pay"){
			$userdata = $this->profile_data->get_alltrx();
			if($userdata){
			foreach ($userdata->result_array() as $value) {
				$daynum = date('d', strtotime($value['payment_created']));
				$mounth = date('m', strtotime($value['payment_created']));
				$year = date('Y', strtotime($value['payment_created']));

				$firstfill = str_replace('','&nbsp;',$value['first_name']);

				echo '  <div id="rightbody3">
				<div id="objright4">
					<div id="desc">
						<div id="namatx">
						'.$value['seminar_name'].' ('.$value['seminar_price'].')
						</div>  
						<div id="kettx">
							'.$daynum.'/'.$mounth.'/'.$year.' | '.$value['bill_bank_name'].' | '.$value['bill_name']/*$firstfill.'&nbsp;'.$value['last_name']*/.' | '.$value['bill_number'].' | <a href="'.base_url().'asset/pict/payment/'.$value['payment_id'].'.png" target="_blank">Open Image</a>
						</div> 
					</div>
				</div>
				<div id="bota">
					<div id="items">
						<a id="app-pay"  href="'.base_url().'profile_admin/appv/'.$value['payment_id'].'">Approve</a>
					</div>
					<div id="items">
						<a id="den-pay" href="'.base_url().'profile_admin/dnnd/'.$value['payment_id'].'">Denied</a>
					</div>
				</div>
			</div>';

			   }
			}
			else{
				echo 'NO ONE REGISTER';
			}
			}//first if
		elseif ($par == "app-sem") {
			
			$userdata = $this->profile_data->get_alltrx_ads($userid);
			if($userdata){
			foreach ($userdata->result_array() as $value) {

			if($value['ads_trx_status'] != "Published"){
				
				$daynum = date('d', strtotime($value['seminar_date']));
				$mounth = date('F', strtotime($value['seminar_date']));
				$year = date('Y', strtotime($value['seminar_date']));

				echo '<div id="rightbody3">
				<div id="objright3">
					<img src="'.base_url().'asset/pict/banner/'.$value['seminar_id'].'.png">
				</div>
				<div id="objright4">
					<div id="desc">
						<div id="namatx">
						'.$value['seminar_name'].'
						</div>  
						<div id="datetx">
						'.$daynum.'&nbsp;'.$mounth.'&nbsp;'.$year.'
						</div> 
						<div id="kettx">
						'.$value['seminar_held'].' 
						</div> 
					</div>';
					
				if($value['ads_trx_status'] == "Review by admin"){
								echo '
								<div id="bota2">
									<a id=""  href="'.base_url().'event_detail/'.$value['seminar_id'].'">Check</a>
								</div>
								<div id="bota2">
									<a id=""  href="'.base_url().'profile_admin/chsts/1/'.$value['ads_id'].'">Reupload</a>
								</div>
								<div id="bota3">
									<a id="app-sem"  href="'.base_url().'profile_admin/chsts/2/'.$value['ads_id'].'">Approve</a>
								</div>
								<div id="bota4">
									<a id="dec-sem"  href="'.base_url().'profile_admin/chsts/3/'.$value['ads_id'].'">Rejected Event</a>
									</div>
							';
							}
				elseif ($value['ads_trx_status'] == "Waiting to Payment") {
							echo'<div id="bota2">
									<a id="cekdetail-sem"  href="#">Waiting user for upload</a>
								
						</div>';
						}
				elseif ($value['ads_trx_status'] == "Payment Confirmation") {
								echo '	<div id="bota3">	
								<a href="'.base_url().'asset/pict/payment/'.$value['payment_id'].'.png" target="_blank">Open Image</a>
								</div>		
								<div id="bota3">
									<a id="app-sem"  href="'.base_url().'profile_admin/chsts_app_ads/'.$value['ads_id'].'">Approve</a>
								</div>
								<div id="bota4">
									<a id="dec-sem"  href="'.base_url().'profile_admin/chsts_dec_ads/'.$value['ads_id'].'">Decline</a>
							
							</div>';
						}
						echo '</div></div>';
					}

				}
			}

			
			
		}/*second if*/

	}
		function appv($p_id=null){
			$userupdate = $this->profile_data->approved($p_id);
			if($userupdate){
				redirect('/profile_admin/Admin');
			}
		}
		function dnnd($p_id=null){
			$userupdate = $this->profile_data->denied($p_id);
			if($userupdate){
				redirect('/profile_admin/Admin');
			}
		}
}//end class