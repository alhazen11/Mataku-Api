<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Logbutawarna extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('LogbutawarnaM');
        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        //$this->methods['users_get']['limit'] = 50000; // 500 requests per hour per user/key
        //$this->methods['users_post']['limit'] = 50000; // 100 requests per hour per user/key
        //$this->methods['users_delete']['limit'] = 50000; // 50 requests per hour per user/key
    }

    public function index_get()
    {
    }

    public function getall_get()
    {
        $data = $this->LogbutawarnaM->getAllLogbutawarna($this->get('id'));
        if($data){
            $response['status']=200;
            $response['error']=false;
            $response['result']=$data;
        }else{
            $response['status']=502;
            $response['error']=true;
        }
        $this->response($response);
    }

    public function getone_get()
    {
        $data = $this->LogbutawarnaM->getOneLogbutawarna($this->get('id'));
        if($data){
            $response['status']=200;
            $response['error']=false;
            $response['result']=$data[0];
        }else{
            $response['status']=502;
            $response['error']=true;
        }
        $this->response($response);
    }

    public function update_put()
    {
        $date = time();
        $id=$this->put('id');
        $temp = $this->LogbutawarnaM->getOneLogbutawarna($id);
        $id_user=$this->put('id_user');
        $hasil=$this->put('hasil');
        $aktif=$this->put('aktif');
        if($temp){
            if($id_user==null){
                $id_user=$temp[0]->id_user;
            }
            if($hasil==null){
                $hasil=$temp[0]->hasil;
            }
        }
        $val = array(
            'id_user' => $id_user,
            'hasil' => $hasil,
            'date_created' => $date
            );
        $data = $this->LogbutawarnaM->updateLogbutawarna($val,$id);
        if($data){
            $response['status']=200;
            $response['error']=false;
            $response['result']='Berhasil';
        }else{
            $response['status']=502;
            $response['error']=true;
            $response['result']='Gagal';
        }
        $this->response($response);
    }
    public function add_post()
    {
        $date = time();
        $val = array(
        'id_user' => $this->post('id_user'),
        'hasil' => $this->post('hasil'),
        'date_created' => $date
        );
        $data = $this->LogbutawarnaM->insertLogbutawarna($val);
        if($data){
            $response['status']=200;
            $response['error']=false;
            $response['result']='Berhasil.';
        }else{
            $response['status']=502;
            $response['error']=true;
            $response['result']='Gagal';
        }
        $this->response($response);
    }

    public function delete_delete()
    {
        $data = $this->LogbutawarnaM->deleteLogbutawarna($this->delete('id'));
        if($temp){
            $response['status']=200;
            $response['error']=false;
            $response['result']='Berhasil.';
        }else{
            $response['status']=502;
            $response['error']=true;
            $response['result']='Gagal';
        }
        $this->response($response);
    }
}
