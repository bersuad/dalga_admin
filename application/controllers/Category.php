<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MY_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model([
            'Category_model',
        ]);
	}

    public function AddNewCategory()
    {
        if (isset($_POST)) {
            $new_image = $this->validation($_FILES['category_image']['name']);
            $file_name = $config['file_name'] = time().$new_image;
            $config['upload_path'] = './assets/images/uploads';
            $config['allowed_types'] = 'jpg|JPG|png|PNG|jpeg|JEPG';
            $config['max_size'] = '10000000000000000000000';				
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $this->upload->do_upload('category_image');

            if($this->upload->data()){
                $data = $this->upload->data();
            }else{
                echo $this->upload->display_errors(); die();
            }
    
            $name = $this->input->post('name');
            $image = $file_name;

            $category_data = array(
                'category_name'       => $name,
                'category_image'      => $image,
            );
    
            $result = $this->Category_model->insert($category_data);

            if($result){
                $this->session->set_flashdata('message', 'Added Successfully');
            }else{
                $this->session->set_flashdata('warning', 'Something went wrong');
            }
            redirect('/categories');
        }

    }

    public function validation($file_name)
    {
        $file_name = str_replace(' ', '_', $file_name);
        $file_name = str_replace('-', '_', $file_name);
        $file_name = str_replace('/', '_', $file_name);
        $file_name = strtolower($file_name);
        return $file_name;
    }

    public function editCategory($id)
    {
        $new_image      = $this->validation($_FILES['category_image_update']['name']);
        $original_image = $this->input->post('category_image');
        // print_r($new_image);
        // die();
        if ($new_image != '') {
            $file_name = $config['file_name'] = time().$new_image;    
            $config['upload_path'] = './assets/images/uploads';
            $config['allowed_types'] = 'jpg|JPG|png|PNG|jpeg|JEPG';
            $config['max_size'] = '10000000000000000000000';				
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $this->upload->do_upload('category_image_update');
    
            if($this->upload->data()){
                $data = $this->upload->data();
            }else{
                echo $this->upload->display_errors(); die();
            }
        } else {
            $file_name = $this->input->post('category_image');
        }
        

        $name = $this->input->post('name');
        $image = $file_name;

        $category_data = array(
            'category_name'       => $name,
            'category_image'      => $image,
        );

        $result = $this->Category_model->where("category_id", $id)->update($category_data);

        if($result){
            $this->session->set_flashdata('message', 'Updated Successfully');
        }else{
            $this->session->set_flashdata('warning', 'Something went wrong');
        }
        redirect('/categories');
    }

    public function suspendCategory($id)
    {
        $category_data = array(
            'category_status'       => 1,
        );

        $result = $this->Category_model->where("category_id", $id)->update($category_data);

        if($result){
            $this->session->set_flashdata('error', 'Suspended from category');
        }else{
            $this->session->set_flashdata('warning', 'Something went wrong');
        }
        redirect('/categories');
    }

    public function changeStatus()
	{
		$group_id = $this->input->post('id');
		$status	= $this->Category_model->where('category_id', $group_id)->get();
		if($status->category_status == 1)
		{
			$group_status = array(
				'category_status'				=>0,
				'updated_by'		            =>1,
                'updated_date'                  =>date('Y-m-d H:m:s')
			);
			$result = $this->Category_model->where("category_id", $group_id)->update($group_status);
		}else{
			$group_status = array(
				'category_status'				=>1,
				'updated_by'		            =>1,
                'updated_date'                  =>date('Y-m-d H:m:s')
			);
			$result = $this->Category_model->where("category_id", $group_id)->update($group_status);
		}
				
		if ($result) {
			$this->session->set_flashdata('message', '"'.$status->category_name.'" Category Status Changed');
			echo $this->session->flashdata('success');
		} else {
			$this->session->set_flashdata('error', 'something went wrong on updating '.$status->group_name);
			echo $this->session->flashdata('error');
		}

	}

}