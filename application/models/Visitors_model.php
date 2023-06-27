<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Visitors_model extends MY_model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'visitors';
        $this->primary_key = 'visitor_id';
    }
}

// Visitors_model