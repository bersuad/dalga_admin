<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Address extends MY_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model([
            'Location_model',
        ]);
	}

    public function AddNewLocation()
    {
        $city           = $this->input->post('city');
        $branch_name    = $this->input->post('branch_name');
        $location       = $this->input->post('location');
        $phone_no       = $this->input->post('phone');
        $phone          = json_encode($phone_no);
        

        $location_data = array(
            'location'          => $city,
            'name'              => $branch_name,
            'specific_name'     => $location,
            'phone_no'          => $phone,
        );
        
        $result = $this->Location_model->insert($location_data);

        if($result){
            $this->session->set_flashdata('message', 'Added Successfully');
        }else{
            $this->session->set_flashdata('warning', 'Something went wrong');
        }

        redirect('/location');
    }

    public function editLocation($id)
    {
        
        $city           = $this->input->post('city');
        $branch_name    = $this->input->post('branch_name');
        $location       = $this->input->post('location');
        $phone_no       = $this->input->post('phone');
        $phone          = json_encode($phone_no);
        

        $location_data = array(
            'location'          => $city,
            'name'              => $branch_name,
            'specific_name'     => $location,
            'phone_no'          => $phone,
        );

        $result = $this->Location_model->where("location_id", $id)->update($location_data);

        if($result){
            $this->session->set_flashdata('message', 'Updated Successfully');
        }else{
            $this->session->set_flashdata('warning', 'Something went wrong');
        }

        redirect('/location');
    }

    public function delete_address($id)
	{
		$result=$this->Location_model->delete($id);
		
        if($result){
            $this->session->set_flashdata('message', 'Address Removed');
        }else{
            $this->session->set_flashdata('warning', 'Something went wrong');
        }

        redirect('/location');
	}
}