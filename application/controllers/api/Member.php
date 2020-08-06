<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Member extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
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

    public function getall_get()
    {
        $data = $this->MemberM->getAllMember();
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

        public function dokter_get()
    {
        $data = $this->MemberM->getMemberDokter();
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
        $data = $this->MemberM->getOneMember($this->get('id'));
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
    public function login_get()
    {
        $password = sha1(md5($this->get('password')));
        $data = $this->MemberM->getLogin($this->get('email'),$password);
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
        $this->load->helper('path');
        $date = time();
        $id=$this->put('id');
        $temp = $this->MemberM->getOneMember($id);
        $nama=$this->put('nama');
        $password = $this->get('password');
        $photo=$this->put('photo');
        $dokter=$this->put('dokter');
        $key_firebase=$this->put('key_firebase');
        $email=$temp[0]->email;
        if($temp){
            if($nama==null){
                $nama=$temp[0]->nama;
            }
            if($password==null){
               $password=$temp[0]->password;
            }else{
               $password = sha1(md5($this->get('password')));
            }
            if($photo==null){
               $photo=$temp[0]->photo;
            }else{
                $image = base64_decode($photo);
                $image_name = "image-".md5($email);
                $filename = $image_name . '.' . 'png';
                $path = set_realpath('image/');
                file_put_contents($path . $filename, $image);
                $photo="image/".$filename;
            }
            if($dokter==null){
               $dokter=$temp[0]->dokter;
            }
            if($key_firebase==null){
               $key_firebase=$temp[0]->key_firebase;
            }
        }
        $val = array(
            'nama' => $nama,
            'email' => $email,
            'password' => $password,
            'photo' => $photo,
            'dokter' => $dokter,
            'key_firebase' => $key_firebase,
            'date_created' => $date
            );
        $data = $this->MemberM->updateMember($val,$id);
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
        $password = sha1(md5($this->post('password')));
        $date = time();
        $val = array(
        'nama' => $this->post('nama'),
        'email' => $this->post('email'),
        'password' => $password,
        'photo' => 'image/foto.jpg',
        'dokter' => '0',
        'date_created' => $date
        );
        $data = $this->MemberM->insertMember($val);
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
        $data = $this->MemberM->deleteMember($this->delete('id'));
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
