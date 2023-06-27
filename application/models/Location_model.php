<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Location_model extends MY_model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'location';
        $this->primary_key = 'location_id';
    }
}