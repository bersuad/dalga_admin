<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends MY_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model([
            'Item_model',
            'Item_image_model',
            'Category_model',
            'Item_visitors_model'
        ]);
	}

    public function addNewItem()
    {
        $data['categories'] = $this->Category_model->order_by('created_date', 'DESC')->get_all();
		$this->data = $data;
        parent::load_view('pages/addNewItem', $data);
    }

    private function name_validation($file_name)
    {
        $file_name = str_replace(' ', '_', $file_name);
        $file_name = str_replace('-', '_', $file_name);
        $file_name = str_replace('/', '_', $file_name);
        $file_name = str_replace('(', '_', $file_name);
        $file_name = str_replace(')', '_', $file_name);
        $file_name = strtolower($file_name);
        return $file_name;
    }

    public function newProduct()
    {

        if (isset($_POST)) {
            $filesCount = count($_FILES['item_image']['name']); 
            $new_image_array = array();
            for($i = 0; $i < $filesCount; $i++){ 

                $_FILES['file']['name']     = $this->name_validation($_FILES['item_image']['name'][$i]); 
                $_FILES['file']['type']     = $_FILES['item_image']['type'][$i]; 
                $_FILES['file']['tmp_name'] = $_FILES['item_image']['tmp_name'][$i]; 
                $_FILES['file']['error']    = $_FILES['item_image']['error'][$i]; 
                $_FILES['file']['size']     = $_FILES['item_image']['size'][$i]; 
                $_FILES['file']['max_size'] = '10000000000000000000000'[$i];
                $new_name = $_FILES['file']['name'];
                
                $uploadPath = './assets/images/uploads'; 
                $config['upload_path'] = $uploadPath; 
                $config['allowed_types'] = 'jpg|jpeg|png|gif'; 
                array_push($new_image_array, $new_name);

                $this->load->library('upload', $config); 
                $this->upload->initialize($config); 
                
                if($this->upload->do_upload('file')){ 
                    $fileData = $this->upload->data(); 
                    $uploadData[$i]['file_name'] = $fileData['file_name']; 
                }else{ 
                    echo "<br/>";
                    echo $this->upload->display_errors('', '');
                    echo "<br/>";
                } 
            } 

        }

        $filesCountColor = count($_FILES['item_color']['name']); 
        $new_color_image_array = array();
        for($i = 0; $i < $filesCountColor; $i++){ 

            $_FILES['file']['name']     = $this->name_validation($_FILES['item_color']['name'][$i]); 
            $_FILES['file']['type']     = $_FILES['item_color']['type'][$i]; 
            $_FILES['file']['tmp_name'] = $_FILES['item_color']['tmp_name'][$i]; 
            $_FILES['file']['error']    = $_FILES['item_color']['error'][$i]; 
            $_FILES['file']['size']     = $_FILES['item_color']['size'][$i]; 
            $_FILES['file']['max_size'] = '10000000000000000000000'[$i];
            $new_name = $_FILES['file']['name'];
            
            $uploadPath = './assets/images/uploads'; 
            $config['upload_path'] = $uploadPath; 
            $config['allowed_types'] = 'jpg|jpeg|png|gif'; 
            array_push($new_color_image_array, $new_name);

            $this->load->library('upload', $config); 
            $this->upload->initialize($config); 
            
            if($this->upload->do_upload('file')){ 
                $fileData = $this->upload->data(); 
                $uploadData[$i]['file_name'] = $fileData['file_name']; 
            }else{ 
                echo "<br/>";
                echo $this->upload->display_errors('', '');
                echo "<br/>";
            } 
        }
        
        $name           = $this->input->post('item_name');
        $price          = $this->input->post('item_price');
        $qun            = $this->input->post('item_qun');
        $category       = $this->input->post('category');
        $old_price      = $this->input->post('item_old_price');
        $desc           = $this->input->post('item_description');
        $info           = $this->input->post('item_info');
        $color          = json_encode($new_color_image_array);
        $size           = $this->input->post('item_size');
        $item_image     = json_encode($new_image_array);
        

        $item_data = array(
            'item_name'             => $name,
            'item_image'            => $item_image,
            'item_price'            => $price,
            'item_size'             => $size,
            'item_colors'           => $color,
            'item_description'      => $desc,
            'item_old_price'        => $old_price,
            'item_category'         => $category,
            'item_additional_info'  => $info,
            'qun'                   => $qun,
        );

        $result = $this->Item_model->insert($item_data);

        if($result){
            $this->session->set_flashdata('message', 'Added Successfully');
        }else{
            $this->session->set_flashdata('warning', 'Something went wrong');
        }

        redirect('/items');
    }

    public function editItem($id)
    {
        $data['categories'] = $this->Category_model->order_by('created_date', 'DESC')->get_all();

        $this->Category_model->join('category', 'category.category_id = items.item_category');
		$data['items'] 	= 	$this->Item_model->where('item_id', $id)->order_by('item_id', 'ASC')->get();
		$this->data = $data;
        parent::load_view('pages/editItem', $data);
    }

    public function editProductItem($id)
    {        
        $new_image_array = array();
        if (isset($_POST)) {
            $item_image = $_FILES['item_image'];
            $filesCount = count($_FILES['item_image']['name']); 
            for($i = 0; $i < $filesCount; $i++){ 
                if(empty($_FILES['item_image']['name'][$i])){
                    $old_image_array          = $this->input->post('old_item_image')[$i];
                    array_push($new_image_array, $old_image_array);
                    continue;
                }else{
                    $_FILES['file']['name']     = $this->name_validation($_FILES['item_image']['name'][$i]); 
                    $_FILES['file']['type']     = $_FILES['item_image']['type'][$i]; 
                    $_FILES['file']['tmp_name'] = $_FILES['item_image']['tmp_name'][$i]; 
                    $_FILES['file']['error']    = $_FILES['item_image']['error'][$i]; 
                    $_FILES['file']['size']     = $_FILES['item_image']['size'][$i]; 
                    $_FILES['file']['max_size'] = '10000000000000000000000'[$i];
                    $new_name = $_FILES['file']['name'];
                    
                    $uploadPath = './assets/images/uploads'; 
                    $config['upload_path'] = $uploadPath; 
                    $config['allowed_types'] = 'jpg|jpeg|png|gif'; 
                    array_push($new_image_array, $new_name);
    
                    $this->load->library('upload', $config); 
                    $this->upload->initialize($config); 
                    
                    if($this->upload->do_upload('file')){ 
                        $fileData = $this->upload->data(); 
                        $uploadData[$i]['file_name'] = $fileData['file_name']; 
                    }else{ 
                        echo "<br/>";
                        echo $this->upload->display_errors('', '');
                        echo "<br/>";
                    }
                }
            }

            $filesCountColor = count($_FILES['item_color']['name']); 
            $new_color_image_array = array();
            for($i = 0; $i < $filesCountColor; $i++){ 
                if(empty($_FILES['item_color']['name'][$i])){
                    $old_image_array          = $this->input->post('old_color_image')[$i];
                    array_push($new_color_image_array, $old_image_array);
                    continue;
                }else{
                    $_FILES['file']['name']     = $this->name_validation($_FILES['item_color']['name'][$i]); 
                    $_FILES['file']['type']     = $_FILES['item_color']['type'][$i]; 
                    $_FILES['file']['tmp_name'] = $_FILES['item_color']['tmp_name'][$i]; 
                    $_FILES['file']['error']    = $_FILES['item_color']['error'][$i]; 
                    $_FILES['file']['size']     = $_FILES['item_color']['size'][$i]; 
                    $_FILES['file']['max_size'] = '10000000000000000000000'[$i];
                    $new_name = $_FILES['file']['name'];
                    
                    $uploadPath = './assets/images/uploads'; 
                    $config['upload_path'] = $uploadPath; 
                    $config['allowed_types'] = 'jpg|jpeg|png|gif'; 
                    array_push($new_color_image_array, $new_name);

                    $this->load->library('upload', $config); 
                    $this->upload->initialize($config); 
                    
                    if($this->upload->do_upload('file')){ 
                        $fileData = $this->upload->data(); 
                        $uploadData[$i]['file_name'] = $fileData['file_name']; 
                    }else{ 
                        echo "<br/>";
                        echo $this->upload->display_errors('', '');
                        echo "<br/>";
                    } 
                }
            }
            $name           = $this->input->post('item_name');
            $price          = $this->input->post('item_price');
            $qun            = $this->input->post('item_qun');
            $category       = $this->input->post('category');
            $old_price      = $this->input->post('item_old_price');
            $desc           = $this->input->post('item_description');
            $info           = $this->input->post('item_info');
            $color          = json_encode($new_color_image_array);
            $size           = $this->input->post('item_size');
            $item_image     = json_encode($new_image_array);
            
    
            $item_data = array(
                'item_name'             => $name,
                'item_image'            => $item_image,
                'item_price'            => $price,
                'item_size'             => $size,
                'item_colors'           => $color,
                'item_description'      => $desc,
                'item_old_price'        => $old_price,
                'item_category'         => $category,
                'item_additional_info'  => $info,
                'qun'                   => $qun,
            );
            $result = $this->Item_model->where("item_id", $id)->update($item_data);
        }else{
            $result = '';
        }


        if($result){
            $this->session->set_flashdata('message', 'Updated Successfully');
        }else{
            $this->session->set_flashdata('warning', 'Something went wrong');
        }

        redirect('/items');
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


    public function changeStatus()
	{
		$item_id = $this->input->post('id');
		$status	= $this->Item_model->where('item_id', $item_id)->get();
		if($status->status == 1)
		{
			$item_status = array(
				'status'        				=>0,
                'updated_date'                  =>date('Y-m-d H:m:s')
			);
		}else{
			$item_status = array(
				'status'		        		=>1,
                'updated_date'                  =>date('Y-m-d H:m:s')
			);
		}
        $result = $this->Item_model->where("item_id", $item_id)->update($item_status);
				
		if ($result) {
			$this->session->set_flashdata('message', '"'.$status->item_name.'" Category Status Changed');
			echo $this->session->flashdata('success');
		} else {
			$this->session->set_flashdata('error', 'something went wrong on updating '.$status->item_name);
			echo $this->session->flashdata('error');
		}

	}

}