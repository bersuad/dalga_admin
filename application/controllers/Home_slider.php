<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_slider extends MY_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model([
            'Gallery_model',
            'Home_slide_model'
        ]);
	}

    public function AddNewSlider()
    {
        // print_r($_POST); die();
        if (isset($_POST)) {
            $new_image = $this->validation($_FILES['home_image']['name']);
            $file_name = $config['file_name'] = time().$new_image;
            $config['upload_path'] = './assets/images/uploads';
            $config['allowed_types'] = 'jpg|JPG|png|PNG|jpeg|JEPG';
            $config['max_size'] = '10000000000000000000000';				
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $this->upload->do_upload('home_image');

            if($this->upload->data()){
                $data = $this->upload->data();
            }else{
                echo $this->upload->display_errors(); die();
            }
    
            $title = $this->input->post('slider_title');
            $message = $this->input->post('slider_message');
            $link_title = $this->input->post('slider_link_title');
            $link = $this->input->post('slider_link');
            $image = $file_name;

            $home_data = array(
                'home_title'       => $title,
                'home_message'     => $message,
                'home_link_title'  => $link_title,
                'home_link'        => $link,
                'home_image'       => $image,
            );
    
            $result = $this->Home_slide_model->insert($home_data);

            if($result){
                $this->session->set_flashdata('message', 'Added Successfully');
            }else{
                $this->session->set_flashdata('warning', 'Something went wrong');
            }
            redirect('/home-page-image');
        }else{
          
            $this->session->set_flashdata('warning', 'Please fill the forms');
            redirect('/home-page-image');
        }

    }

    public function validation($file_name)
    {
        $file_name = str_replace(' ', '_', $file_name);
        $file_name = str_replace('-', '_', $file_name);
        $file_name = str_replace('/', '_', $file_name);
        $file_name = str_replace('(', '', $file_name);
        $file_name = str_replace(')', '', $file_name);
        $file_name = strtolower($file_name);
        return $file_name;
    }


    public function EditSlider($id)
    {
        if ($_FILES['edited_image']['name'] != '') {
            $new_image = $this->validation($_FILES['edited_image']['name']);
            $file_name = $config['file_name'] = time().$new_image;
            $config['upload_path'] = './assets/images/uploads';
            $config['allowed_types'] = 'jpg|JPG|png|PNG|jpeg|JEPG';
            $config['max_size'] = '10000000000000000000000';				
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $this->upload->do_upload('edited_image');
            
        }else{
            $file_name = $this->input->post('old_image');
        }

        $title = $this->input->post('slider_title');
        $message = $this->input->post('slider_message');
        $link_title = $this->input->post('slider_link_title');
        $link = $this->input->post('slider_link');
        $image = $file_name;

        $updated_home_data = array(
            'home_title'       => $title,
            'home_message'     => $message,
            'home_link_title'  => $link_title,
            'home_link'        => $link,
            'home_image'       => $image,
        );

        $result = $this->Home_slide_model->where("home_id", $id)->update($updated_home_data);

        if($result){
            $this->session->set_flashdata('message', $title.' updated Successfully');
        }else{
            $this->session->set_flashdata('warning', 'Something went wrong');
        }
        redirect('/home-page-image');
    }

    public function suspendHomepage()
    {
        $id = $this->input->post('id');
        $status = $this->Home_slide_model->where("home_id", $id)->get();
        
        if($status->home_status == 1)
        {
            $changed = 0;
            $message = 'message';
        }else {
            $changed = 1;
            $message = 'error';
        }
        $suspendHome = array(
            'home_status'       => $changed,
        );

        $result = $this->Home_slide_model->where("home_id", $id)->update($suspendHome);

        if($result){
            $this->session->set_flashdata($message, 'Status changed!');
        }else{
            $this->session->set_flashdata('warning', 'Something went wrong');
        }
        return;
    }

    public function removeHomepage($id)
    {
        $suspendHome = array(
            'home_status'       => 1,
        );

        $result = $this->Home_slide_model->where("home_id", $id)->update($suspendHome);

        if($result){
            $this->session->set_flashdata('error', 'Suspended from category');
        }else{
            $this->session->set_flashdata('warning', 'Something went wrong');
        }
        redirect('/home-page-image');
    }

    public function addNewGallery()
    {
        if ($_FILES['gallery_image']['name'] != '') {
            $new_image = $this->validation($_FILES['gallery_image']['name']);
            $file_name = $config['file_name'] = time().$new_image;
            $config['upload_path'] = './assets/images/uploads';
            $config['allowed_types'] = 'jpg|JPG|png|PNG|jpeg|JEPG';
            $config['max_size'] = '10000000000000000000000';				
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $this->upload->do_upload('gallery_image');
            
        }else{
            $this->session->set_flashdata('warning', 'Please check your image');
        }

        
        $gallery_data = array(
            'gallery_image'    => $file_name,
        );
        
        $result = $this->Gallery_model->insert($gallery_data);

        if($result){
            $this->session->set_flashdata('message', 'Uploaded to gallery!');
        }else{
            $this->session->set_flashdata('warning', 'Something went wrong!');
        }
        redirect('/gallery');
    }

    public function editGalleryImage($id)
    {
        if ($_FILES['edited_gallery_image']['name'] != '') {
            $new_image = $this->validation($_FILES['edited_gallery_image']['name']);
            $file_name = $config['file_name'] = time().$new_image;
            $config['upload_path'] = './assets/images/uploads';
            $config['allowed_types'] = 'jpg|JPG|png|PNG|jpeg|JEPG';
            $config['max_size'] = '10000000000000000000000';				
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $this->upload->do_upload('edited_gallery_image');
            
        }else{
            $file_name = $this->input->post('old_gallery_image');
        }
        
        
        
        $updated_home_data = array(
            'gallery_image'    => $file_name,
        );
        
        $result = $this->Gallery_model->where("gallery_image_id", $id)->update($updated_home_data);
        
        if($result){
            $this->session->set_flashdata('message', 'updated Successfully');
        }else{
            $this->session->set_flashdata('warning', 'Something went wrong');
        }
        redirect('/gallery');
    }

    public function removegalleryImage($id)
    {
        

        $result = $this->Gallery_model->where("gallery_image_id", $id)->delete();

        if($result){
            $this->session->set_flashdata('error', 'Deleted from gallery');
        }else{
            $this->session->set_flashdata('warning', 'Something went wrong');
        }
        redirect('/gallery');
    }

}