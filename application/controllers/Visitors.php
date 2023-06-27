<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visitors extends MY_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model([
            'Visitors_model',
        ]);
	}

    public function visitors_list()
    {
        $start_date = $this->input->post('start_date');
        $end_date   = $this->input->post('end_date');
        if(!empty($start_date && $end_date)){
            $query ="
                SELECT
                COUNT(distinct visitor_ip) 
                as web_visitor
                FROM visitors 
                WHERE created_date >= '$start_date' 
                AND created_date <= '$end_date 23:59'
                ORDER BY visitor_ip desc";
        }else {
            $query ="
                SELECT
                COUNT(distinct visitor_ip) 
                as web_visitor
                FROM visitors 
                ORDER BY visitor_ip desc
            ";            
        }
        
        $result = $this->Visitors_model->sql($query);
        
        echo json_encode($result);
    }

    public function visitors_per_hour()
    {
        $date = date('Y-m-d');
        $query ="
            SELECT date_format(created_date, '%H %p') AS hour,
            COUNT(distinct visitor_ip) 
                        as web_visitor
            FROM visitors
            WHERE created_date >= '$date' AND created_date <= '$date 23:59'
            GROUP BY date_format(created_date, '%H %p')
            "; 
        $result = $this->Visitors_model->sql($query);

        echo json_encode($result);
    }

    public function visitors_per_week()
    {
        $date = date('Y-m-d');
            $query ="SELECT count(distinct visitor_ip) as web_visitor , CONVERT(created_date, date)as weekdays
                FROM visitors
                WHERE created_date >= date_sub(now(), interval 10 day)
                GROUP BY weekdays
                ORDER BY weekdays ASC
            "; 
        $result = $this->Visitors_model->sql($query);

        echo json_encode($result);
    }

    public function visitors_per_monthly()
    {
        $date = date('Y-m-d');
        $query ="
            SELECT date_format(created_date, '%M %Y') AS month,
            COUNT(distinct visitor_ip) AS web_visitor
            FROM visitors
            GROUP BY date_format(created_date, '%M %Y')
            "; 
        $result = $this->Visitors_model->sql($query);

        echo json_encode($result);
    }
    
    public function visitors_by_country()
    {
        $query = "SELECT count(distinct visitor_ip) as visitor , country_code, country_name FROM visitors WHERE created_date >= date_sub(now(), interval 10 day) GROUP BY country_code ORDER BY country_code ASC";
        $result = $this->Visitors_model->sql($query);

        echo json_encode($result);
    }


}


