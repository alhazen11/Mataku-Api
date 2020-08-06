<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Notifikasi extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('NotifikasiM');
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
        $data = $this->NotifikasiM->getAllNotifikasi($this->get('id'));
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
        $data = $this->NotifikasiM->getOneNotifikasi($this->get('id'));
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
        $temp = $this->NotifikasiM->getOneNotifikasi($id);
        $id_user=$this->put('id_user');
        $keterangan=$this->put('keterangan');
        $activity=$this->put('activity');
        if($temp){
            if($id_user==null){
                $id_user=$temp[0]['id_user'];
            }
            if($keterangan==null){
                $keterangan=$temp[0]['keterangan'];
            }
            if($activity==null){
                $activity=$temp[0]['activity'];
            }
        }
        $val = array(
            'id_user' => $id_user,
            'keterangan' => $keterangan,
            'activity' => $activity,
            'date_created' => $date
            );
        $data = $this->NotifikasiM->updateNotifikasi($val,$id);
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
        'keterangan' => $this->post('keterangan'),
        'activity' => $this->post('activity'),
        'date_created' => $date
        );
        $data = $this->NotifikasiM->insertNotifikasi($val);
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
        $data = $this->NotifikasiM->deleteNotifikasi($this->delete('id'));
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
