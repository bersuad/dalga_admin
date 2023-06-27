<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Item_visitors_model extends MY_model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'item_visitors';
        $this->primary_key = 'item_visitors_id';
    }
}