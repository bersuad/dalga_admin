<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Item_image_model extends MY_model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'item_image';
        $this->primary_key = 'item_image_id';
    }
}