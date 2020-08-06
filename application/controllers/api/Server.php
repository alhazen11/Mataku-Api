<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Server extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        //$this->methods['users_get']['limit'] = 50000; // 500 requests per hour per user/key
        //$this->methods['users_post']['limit'] = 50000; // 100 requests per hour per user/key
        //$this->methods['users_delete']['limit'] = 50000; // 50 requests per hour per user/key
    }

    public function favorit_get()
    {
        
    }
    public function favorit_put()
    {       
        $data = array('returned: '. $this->put('id'));
        $this->response($data);
    }
    public function favorit_post()
    {
       
    }

    public function favorit_delete()
    {
       
    }
    public function member_get()
    {
        
    }
    public function member_put()
    {       
        $data = array('returned: '. $this->put('id'));
        $this->response($data);
    }
    public function member_post()
    {
       
    }

    public function member_delete()
    {
       
    }
    public function konsultasi_get()
    {
        
    }
    public function konsultasi_put()
    {       
        $data = array('returned: '. $this->put('id'));
        $this->response($data);
    }
    public function konsultasi_post()
    {
       
    }

    public function konsultasi_delete()
    {
       
    }
    public function logbutawarna_get()
    {
        
    }
    public function logbutawarna_put()
    {       
        $data = array('returned: '. $this->put('id'));
        $this->response($data);
    }
    public function logbutawarna_post()
    {
       
    }

    public function logbutawarna_delete()
    {
       
    }
    public function logkatarak_get()
    {
        
    }
    public function logkatarak_put()
    {       
        $data = array('returned: '. $this->put('id'));
        $this->response($data);
    }
    public function logkatarak_post()
    {
       
    }

    public function logkatarak_delete()
    {
       
    }

    public function logminus_get()
    {
        
    }
    public function logminus_put()
    {       
        $data = array('returned: '. $this->put('id'));
        $this->response($data);
    }
    public function logminus_post()
    {
       
    }

    public function logminus_delete()
    {
       
    }
    public function logpterigium_get()
    {
        
    }
    public function logpterigium_put()
    {       
        $data = array('returned: '. $this->put('id'));
        $this->response($data);
    }
    public function logpterigium_post()
    {
       
    }

    public function logpterigium_delete()
    {
       
    }
    public function notifikasi_get()
    {
        
    }
    public function notifikasi_put()
    {       
        $data = array('returned: '. $this->put('id'));
        $this->response($data);
    }
    public function notifikasi_post()
    {
       
    }

    public function notifikasi_delete()
    {
       
    }
    public function review_get()
    {
        
    }
    public function review_put()
    {       
        $data = array('returned: '. $this->put('id'));
        $this->response($data);
    }
    public function review_post()
    {
       
    }

    public function review_delete()
    {
       
    }
}
