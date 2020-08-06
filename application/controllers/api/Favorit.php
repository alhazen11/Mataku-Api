<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Favorit extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('FavoritM');
        $this->load->model('MemberM');

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
        $data = $this->FavoritM->getAllFavoritDokter($this->get('id'));
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
            $response['result']='Gagal';
        }
        $this->response($response);
    }

    public function getall_get()
    {
        $data = $this->FavoritM->getAllFavorit($this->get('id'));
        $data_new = array();
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
            $response['result']='Gagal';
        }
        $this->response($response);
    }

    public function getone_get()
    {
        $data = $this->FavoritM->getOneFavorit($this->get('id'));
        $data_new = array();
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
            $response['result']='Gagal';
        }
        $this->response($response);
    }

    public function update_put()
    {
        $date = time();
        $id=$this->put('id');
        $temp = $this->FavoritM->getOneFavorit($id);
        $id_user=$this->put('id_user');
        $id_user_dokter=$this->put('id_user_dokter');
        if($id_user==null){
            $id_user=$temp[0]->id_user;
        }
        if($id_user_dokter==null){
            $id_user_dokter=$temp[0]->id_user_dokter;
        }

        $val = array(
            'id_user' => $id_user,
            'id_user_dokter' => $id_user_dokter,
            'date_created' => $date
            );
        $data = $this->FavoritM->update($val,$id);
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
        'date_created' => $date
        );
        $data = $this->FavoritM->insertFavorit($val);
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
        $data = $this->FavoritM->deleteFavorit($this->delete('id'));
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
