<?php

//require_once(APPPATH.'controllers/Auth.php');

class MY_Controller extends CI_Controller {
	function __construct() {
		parent::__construct();
		// error_reporting(0);
		$this->load->library('form_validation','session');
		if(!$this->session->userdata('logged_in') && !(in_array(current_url(), $availabel_pages_without_url )))
		{
			$this->session->set_flashdata('warning', 'Please login first!');
			echo $this->session->flashdata('warning');
			// $this->load->view('index');
			redirect("/");
		}
	}

	/**
	 * For multiple images
	 */
	protected function DO_UPLOAD($uploads) {
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']      = '10000000000000000000000000';
		$config['max_width']     = '1920';
		$config['max_height']    = '1080';
		$config['overwrite']	 = TRUE;
		$config['file_name'] = uniqid(rand());
		$this->load->library('upload', $config);
		if(is_array($uploads)){
			foreach($uploads as $upload){
				$config['upload_path']   = 'uploads/'.$upload['path'].'/';
				$this->upload->initialize($config);
				if ( $_FILES[$upload['image']]['error'] != 4 && $this->upload->do_upload($upload['image'])) {
					$upload_data = $this->upload->data();//Returns array of containing all of the data related to the file you uploaded.
					$file_name[$upload['image']]   = $config['upload_path'].$config['file_name'].$upload_data["file_ext"];
					// $file_name   = array($upload['image'] => $file_name);	
				} 
				else{
					$file_name['error'] = TRUE;
					$file_name[$upload['image']]['error'] = $this->upload->display_errors('* ',' *');
					break;
				}

			}
			if(!isset($file_name['error']))
				$file_name['error'] = FALSE;
			return $file_name;
		}
		return FALSE; 
	}

	protected function save_histories(array $historyVals = null) {
		//load history model
		$this->load->model('misc/histories_model');
		if (!empty($historyVals)) {

			$IsHistorySaved = $this->histories_model->insert(array(
				'history_affected_columns' => $historyVals['affected_columns'],
				'history_previous_value' => $historyVals['old_value'],
				'history_new_value' => $historyVals['new_value'],
				'history_action' => $historyVals['action'],
				'history_changed_by' => $historyVals['user_id'],
				'opportunity_id' => $historyVals['o_id']
			));

			return $IsHistorySaved? true : false ;
		} else {
			return false;
		}
	}

	protected function save_timeline(array $timelineVals = null) {
		//load timeline model
		$this->load->model('misc/timeline_model');
		if (!empty($timelineVals)) {

			$IsTimelineSaved = $this->timeline_model->insert(array(
				'timeline_action' => $timelineVals['action'],
				'timeline_request_id' => $timelineVals['request_id']
			));

			return $IsTimelineSaved? true : false ;
		} else {
			return false;
		}
	}

	protected function pg_array_parse($literal)
	{
		if ($literal == '') return;
		preg_match_all('/(?<=^\{|,)(([^,"{]*)|\s*"((?:[^"\\\\]|\\\\(?:.|[0-9]+|x[0-9a-f]+))*)"\s*)(,|(?<!^\{)(?=\}$))/i', $literal, $matches, PREG_SET_ORDER);
		$values = [];
		foreach ($matches as $match) {
			$values[] = $match[3] != '' ? stripcslashes($match[3]) : (strtolower($match[2]) == 'null' ? null : $match[2]);
		}
		return $values;
	}

	/**
	 * For multiple images
	 */
	protected function upload_single_image($upload) {
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']      = '10000000000000000000000000';
		$config['max_width']     = '1920';
		$config['max_height']    = '1080';
		$config['overwrite']	 = TRUE;
		$config['file_name'] = uniqid(rand());
		$this->load->library('upload', $config);
			$config['upload_path']   = 'uploads/'.$upload['path'].'/';
			$this->upload->initialize($config);
			if ( $_FILES[$upload['image']]['error'] != 4 && $this->upload->do_upload($upload['image'])) {
				$upload_data = $this->upload->data();//Returns array of containing all of the data related to the file you uploaded.
				$file_name[$upload['image']]   = $config['upload_path'].$config['file_name'].$upload_data["file_ext"];
				// $file_name   = array($upload['image'] => $file_name);	
			} 
			else{
				$file_name['error'] = TRUE;
				$file_name[$upload['image']]['error'] = $this->upload->display_errors('* ',' *');
			}
			if(!isset($file_name['error']))
				$file_name['error'] = FALSE;
			return $file_name;
		return FALSE; 
	}

	/**
     * Loading the view
     */
    public function load_view($path, $data = NULL){
        $this->load->view('included/header.php');
        $this->load->view($path, $data);
        $this->load->view('included/footer.php');
    }

	public function get_view($path, $data = NULL){
		$this->load->view($path, $data);
	}

	
}
