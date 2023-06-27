<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery_model extends MY_model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'gallery';
        $this->primary_key = 'gallery_image_id';
    }
}