<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Auth Controller
 *
 * @category        Controller
 * @package         CodeIgniter
 * @subpackage      Controller
 *
 * @author         	Besufekade Adane
 */
class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model([
			'System_users_model'
        ]);
	}

	public function index()
	{
        $this->load->view('pages/login');
	}

    public function login()
	{
		$user_name 	= $this->input->post('user_name'); 
		$password	= md5($this->input->post('password'));
		
		$where 	= 	array( 'user_name' => $user_name, 'password' => $password);
		$user 	= 	$this->System_users_model->where($where)->get();
		
		if($user){
			
			if($user->user_status == 0)
			{
				$user_data = array(
					'user_id'   	=> $user->system_user_id,
					'user_name' 	=> $user->user_name,
                    'full_name' 	=> $user->full_name,
					'logged_in' 	=> true,
				);				

				$this->session->set_userdata($user_data);
				$this->session->set_flashdata('message', 'Welcome '.$user->system_username);

				redirect('/dashboard');
			}else{
				$this->session->set_flashdata('warning', 'Blocked account, Please contact the Admin.');
				echo $this->session->flashdata('warning');
				redirect('/');
			}
		}else{
			$this->session->set_flashdata('error', 'Wrong user name or password, Please try again!');
			redirect('/');
		}

	}

	public function logout()
	{
		$this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('user_name');

        redirect('/');
	}

}