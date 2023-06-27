<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Messages_model extends MY_model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'contact_messages';
        $this->primary_key = 'message_id';
    }
}