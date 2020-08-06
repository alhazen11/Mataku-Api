<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MemberM extends CI_Model {


  public function getCountMember()
  {
      return $this->db->count_all_results('mahasiswa', FALSE);
  }

  public function getMember($page, $size)
  {
      $this->db->where('npm', $npm);
      return $this->db->get('member', $size, $page)->result();
  }

  public function getAllMember()
  {
      return $this->db->get('member')->result();
  }
  public function getMemberDokter()
  {
      $this->db->where('dokter', '1');
      return $this->db->get('member')->result();
  }

  public function getOneMember($id)
  {
      $this->db->where('id', $id);
      return $this->db->get('member')->result();
  }

  public function getInfoMember($id)
  {
      $this->db->select('nama,photo');
      $this->db->where('id', $id);
      return $this->db->get('member')->result();
  }

  public function getLogin($email,$password)
  {
      $this->db->where('email', $email);
      $this->db->where('password', $password);
      return $this->db->get('member')->result();
  }


  public function insertMember($data)
  {
      $val = array(
        'nama' => $data['nama'],
        'email' => $data['email'],
        'password' => $data['password'],
        'photo' => $data['photo'],
        'dokter' => $data['dokter'],
        'date_created' => $data['date_created']
      );
      return $this->db->insert('member', $val);
  }

  public function updateMember($data, $id)
  {
     $val = array(
        'nama' => $data['nama'],
        'email' => $data['email'],
        'password' => $data['password'],
        'photo' => $data['photo'],
        'dokter' => $data['dokter'],
        'key_firebase' => $data['key_firebase'],
        'date_created' => $data['date_created']
      );
    $this->db->where('id', $id);
    return $this->db->update('member', $val);
  }

  public function deleteMember($id)
  {
    $val = array(
      'id' => $id
    );
    return $this->db->delete('member', $val);
  }

}