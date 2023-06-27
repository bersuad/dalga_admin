<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Partners_model extends MY_model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'partners';
        $this->primary_key = 'partners_id';
    }
}