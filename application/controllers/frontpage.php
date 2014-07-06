<?php if (!defined('BASEPATH')) die();
class Frontpage extends Main_Controller {

   public function index($page='',$id)
	{
		$id = $id;
		//parse_url($_SERVER['REQUEST_URI']);;
		if (empty($id)) {
			$id = 1;
			
		}
		
		$to = $id*10 + 1;
		$from = $to-10;
		
		
		
		//print_r($from);
		//exit;
		$male = 0;
		$female = 0;
		$fbdata = array();
		for ($i = $from; $i < $to; $i++) {
			$url = 'http://graph.facebook.com/' . $i;
			$data = $this->get_content($url);
			$data = json_decode($data);

			if (!empty($data -> error)) {
				$fbdata[$i] = 'left_facebook';
				//echo $i . ". seems to have deleted account or left facebook<br>";

			} else {
				if ($data->gender == 'male') {
					$male = $male+1;
					
				}if( $data->gender == 'female'){
					$female == $female+1;
					
				}
				//lets get the profile picture
				$fbdata[$i]['username'] = $data->username;
				$pic_url = 'http://graph.facebook.com/'.$data->username.'/picture';
				$pic = $this->get_content($pic_url);
				
				$fbdata[$i]['name'] = $data->name;
				$fbdata[$i]['gender'] = $data->gender;
				
				
				$fbdata[$i]['pic'] = $pic;
				
				
				//echo $i . "." . $data -> name . "<br>Link to profile: http://facebook.com/".$data->username."<br>";

			}

		}
	  
	$fb = array();
	$fb['male'] = $male;
	$fb['female'] = $female;
	$fb['people'] = $fbdata;
	$fb['id'] = $id;
	  
      $this->load->view('include/header');
	  // $this->view->fbdata = $fbdata;
	  // $this->view->male = $male;
	  // $this->view->female = $female;
      $this->load->view('frontpage',$fb);
      $this->load->view('include/footer');
	}
	
	
	
	function get_content($URL) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_URL, $URL);
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}
   
}

/* End of file frontpage.php */
/* Location: ./application/controllers/frontpage.php */
