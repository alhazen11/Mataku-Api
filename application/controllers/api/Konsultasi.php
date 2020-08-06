<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Konsultasi extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('KonsultasiM');
        $this->load->model('MemberM');
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

    public function getalldokter_get()
    {
        $data = $this->KonsultasiM->getAllKonsultasiDokter($this->get('id'));
        $data_new = array();
        foreach($data as $r){
            $new=$this->MemberM->getInfoMember($r->id_user);
            $r->user = $new[0];
            array_push($data_new, $r);
        }
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

    public function getall_get()
    {
        $data_new = array();
        $data = $this->KonsultasiM->getAllKonsultasi($this->get('id'));
        foreach($data as $r){
            $new=$this->MemberM->getInfoMember($r->id_user_dokter);
            $r->user = $new[0];
            array_push($data_new, $r);
        }
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
        $data_new = array();
        $data = $this->KonsultasiM->getOneKonsultasi($this->get('id'));
        foreach($data as $r){
            $new=$this->MemberM->getInfoMember($r->id_user_dokter);
            $r->user = $new[0];
            array_push($data_new, $r);
        }
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
        $temp = $this->KonsultasiM->getOneKonsultasi($id);
        $id_user=$this->put('id_user');
        $id_user_dokter=$this->put('id_user_dokter');
        $aktif=$this->put('aktif');
        if($temp){
            if($id_user==null){
                $id_user=$temp[0]->id_user;
            }
            if($id_user_dokter==null){
                $id_user_dokter=$temp[0]->id_user_dokter;
            }
            if($aktif==null){
                $aktif=$temp[0]->aktif;
            }
        }
        $val = array(
            'id_user' => $id_user,
            'id_user_dokter' => $id_user_dokter,
            'aktif' => $aktif,
            'date_created' => $date
            );
        $data = $this->KonsultasiM->updateKonsultasi($val,$id);
                 $val2 = array(
        'id_user' => $id_user,
        'keterangan' => "Konsultasi terhubung",
        'activity' => "Konsultasi",
        'date_created' => $date
        );
        $data2 = $this->NotifikasiM->insertNotifikasi($val2);
        $data3 = $this->MemberM->getOneMember($id_user);
        $data4 = $this->NotifikasiM->send_notification($data3[0]->key_firebase,"konsultasi terhubung");
        
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
        'id_user_dokter' => $this->post('id_user_dokter'),
        'aktif' => $this->post('aktif'),
        'date_created' => $date
        );
        $data = $this->KonsultasiM->insertKonsultasi($val);
         $val2 = array(
        'id_user' => $this->post('id_user_dokter'),
        'keterangan' => "Anda mendapatkan permintaan konsultasi",
        'activity' => "Konsultasi",
        'date_created' => $date
        );
        $data2 = $this->NotifikasiM->insertNotifikasi($val2);
        $data3 = $this->MemberM->getOneMember($this->post('id_user'));
        $data4 = $this->NotifikasiM->send_notification($data3[0]->key_firebase,"Anda mendapatkan permintaan konsultasi");
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
        $data = $this->KonsultasiM->deleteKonsultasi($this->delete('id'));
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
