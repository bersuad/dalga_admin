
<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class System_users_model extends MY_model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'system_users';
        $this->primary_key = 'system_users_id';
    }
}