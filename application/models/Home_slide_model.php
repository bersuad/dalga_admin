<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_slide_model extends MY_model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'home_slider';
        $this->primary_key = 'home_id';
    }
}