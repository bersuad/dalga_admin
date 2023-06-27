<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends MY_model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'orders';
        $this->primary_key = 'order_id';
    }
}