<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Item_model extends MY_model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'items';
        $this->primary_key = 'item_id';
    }
}