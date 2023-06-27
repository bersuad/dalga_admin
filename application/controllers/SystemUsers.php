<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SystemUsers extends MY_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model([
            'System_users_model',
        ]);
	}

    public function AddNewUser()
    {
        $full_name      = $this->input->post('full_name');
        $user_name      = $this->input->post('user_name');
        $password       = md5($this->input->post('password'));        

        $admin_data = array(
            'full_name'    => $full_name,
            'user_name'    => $user_name,
            'password'     => $password,            
        );
        
        $result = $this->System_users_model->insert($admin_data);

        if($result){
            $this->session->set_flashdata('message', 'Added Successfully');
        }else{
            $this->session->set_flashdata('warning', 'Something went wrong');
        }

        redirect('/new-admin');
    }

    public function editUser($id)
    {
        $full_name      = $this->input->post('full_name');
        $user_name      = $this->input->post('user_name');
        $password       = md5($this->input->post('password'));
        

        if(!empty($password))
        {
            $admin_data = array(
                'full_name'    => $full_name,
                'user_name'    => $user_name,
                'password'     => $password,            
            );
        }else{
            $admin_data = array(
                'full_name'    => $full_name,
                'user_name'    => $user_name,
            );
        }


        $result = $this->System_users_model->where("system_user_id", $id)->update($admin_data);

        if($result){
            $this->session->set_flashdata('message', 'Updated Successfully');
        }else{
            $this->session->set_flashdata('warning', 'Something went wrong');
        }

        redirect('/new-admin');
    }

    public function suspendUser()
    {
        $id      = $this->input->post('id');
        $user_status	= $this->System_users_model->where('system_user_id', $id)->get();
        if($user_status->status == 1)
		{
			$user_data = array(
                'status'       => 0,
            );
		}else{
			$user_data = array(
                'status'       => 1,
            );
		}

        $result = $this->System_users_model->where("system_user_id", $id)->update($user_data);

        if($result){
            $this->session->set_flashdata('error', 'Suspended from category');
        }else{
            $this->session->set_flashdata('warning', 'Something went wrong');
        }
        
        redirect('/new-admin');
    }
}