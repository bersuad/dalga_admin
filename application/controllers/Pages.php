<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model([
            'Category_model',
			'Messages_model',
			'Home_slide_model',
			'Gallery_model',
			'Location_model',
			'Partners_model',
			'Visitors_model',
			'System_users_model',
			'Item_model',
			'Item_visitors_model',
			'Order_model'
        ]);
	}

	public function index()
	{
		parent::load_view('pages/login');
	}

	public function orders()
	{
		$data['orders'] = $this->Order_model->order_by('order_id', 'DESC')->get_all();
		$this->data = $data;
		parent::load_view('pages/orders', $this->data);
	}

	public function dashboard()
	{
		parent::load_view('pages/index');
	}

	public function items()
	{
		$this->Item_visitors_model->join('item_visitors', 'items.item_id = item_visitors.item_visitor_id');
		$data['items'] 	= 	$this->Item_model->order_by('created_date', 'DESC')->get_all();
		$sql ="SELECT *, 
		    		(SELECT COUNT(distinct item_visitors_ip) 
		    		FROM item_visitors 
		    		WHERE item_visitors.visitor_item_id = items.item_id) 
		    		as visitor 
		    		FROM items
					INNER JOIN category ON category.category_id = items.item_category
		    		ORDER BY items.item_id desc ";
		
		$data['items'] 	= $this->Item_model->sql($sql);

		$this->data = $data;
		parent::load_view('pages/items', $this->data);
	}

	public function category()
	{
		$data['category_list'] = $this->Category_model->order_by('category_id', 'DESC')->get_all();
		$this->data = $data;
		parent::load_view('pages/category', $data);
	}

	public function contactMessage()
	{
		$data['contact_messages'] = $this->Messages_model->where('message_status', 0)->order_by('view', 'ASC')->get_all();
		$this->data = $data;
		parent::load_view('pages/inbox', $data);
	}

	public function home_page()
	{
		$data['home_slides'] = $this->Home_slide_model->order_by('created_date', 'DESC')->get_all();
		$this->data = $data;
		parent::load_view('pages/home_slide', $data);
	}

	public function gallery()
	{
		$data['gallery_image'] = $this->Gallery_model->order_by('gallery_created_at', 'DESC')->get_all();
		$this->data = $data;
		parent::load_view('pages/gallery', $this->data);
	}

	public function location()
	{
		$data['location_list'] = $this->Location_model->order_by('created_at', 'DESC')->get_all();
		$this->data = $data;
		parent::load_view('pages/location', $this->data);
	}

	public function partners()
	{
		$data['partners'] = $this->Partners_model->order_by('created_date', 'DESC')->get_all();
		$this->data = $data;
		parent::load_view('pages/partners', $this->data);
	}

	public function visitors()
	{
		$query ="
			SELECT
			COUNT(distinct visitor_ip) 
			as web_visitor
			FROM visitors 
			ORDER BY visitor_ip desc
		";       
		$data['total_visitors'] = $this->Visitors_model->sql($query);
		$this->data = $data;

		parent::load_view('pages/page_visitors', $this->data);
	}

	public function system_users_list()
	{
		$data['users'] = $this->System_users_model->order_by('created_date', 'DESC')->get_all();
		$this->data = $data;
		parent::load_view('pages/system_users', $this->data);
	}

	public function removeOrder($id)
	{
		$result = $this->Order_model->where("order_id", $id)->delete();
		if($result){
            $this->session->set_flashdata('error', 'You have removed message from "'.$name.'"');
        }else{
            $this->session->set_flashdata('warning', 'Something went wrong');
        }
        redirect('/orders');
	}

}
