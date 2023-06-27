<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Partners extends MY_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model([
            'Partners_model',
        ]);
	}
    public function addNewPartners()
    {
        if ($_FILES['partners_image']['name'] != '') {
            $new_image = $this->validation($_FILES['partners_image']['name']);
            $file_name = $config['file_name'] = time().$new_image;
            $config['upload_path'] = './assets/images/uploads';
            $config['allowed_types'] = 'jpg|JPG|png|PNG|jpeg|JEPG';
            $config['max_size'] = '10000000000000000000000';				
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $this->upload->do_upload('partners_image');
            
        }else{
            $this->session->set_flashdata('warning', 'Please check your image');
        }

        
        $partners_data = array(
            'partners_logo'    => $file_name,
        );
        
        $result = $this->Partners_model->insert($partners_data);

        if($result){
            $this->session->set_flashdata('message', 'Uploaded to gallery!');
        }else{
            $this->session->set_flashdata('warning', 'Something went wrong!');
        }
        redirect('/partners');
    }

    public function editPartnersImage($id)
    {
        if ($_FILES['edited_partners_image']['name'] != '') {
            $new_image = $this->validation($_FILES['edited_partners_image']['name']);
            $file_name = $config['file_name'] = time().$new_image;
            $config['upload_path'] = './assets/images/uploads';
            $config['allowed_types'] = 'jpg|JPG|png|PNG|jpeg|JEPG';
            $config['max_size'] = '10000000000000000000000';				
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $this->upload->do_upload('edited_partners_image');
            
        }else{
            $file_name = $this->input->post('old_partners_image');
        }
        
        
        // print_r($id); die();
        $updated_partners_data = array(
            'partners_logo'    => $file_name,
        );
        
        $result = $this->Partners_model->where("partners_id", $id)->update($updated_partners_data);
        if($result){
            $this->session->set_flashdata('message', 'updated Successfully');
        }else{
            $this->session->set_flashdata('warning', 'Something went wrong');
        }
        redirect('/partners');
    }

    public function removePartners($id)
    {
        

        $result = $this->Partners_model->where("partners_id", $id)->delete();

        if($result){
            $this->session->set_flashdata('error', 'Deleted from gallery');
        }else{
            $this->session->set_flashdata('warning', 'Something went wrong');
        }
        redirect('/partners');
    }

    public function validation($file_name)
    {
        $file_name = str_replace(' ', '_', $file_name);
        $file_name = str_replace('-', '_', $file_name);
        $file_name = str_replace('/', '_', $file_name);
        $file_name = strtolower($file_name);
        return $file_name;
    }


}