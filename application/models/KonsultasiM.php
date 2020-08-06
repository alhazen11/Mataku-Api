<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class KonsultasiM extends CI_Model {

  public function getCountKonsultasi($id)
  {
      $this->db->where('id_user', $id);
      $this->db->where('aktif', $aktif);
      return $this->db->count_all_results('konsultasi', FALSE);
  }
 
  public function getAllKonsultasi($id)
  {
      $this->db->where('id_user', $id);
      return $this->db->get('konsultasi')->result();
  }

  public function getKonsultasi($id,$aktif,$page, $size)
  {
      $this->db->where('id_user', $id);
      $this->db->where('aktif', $aktif);
      return $this->db->get('konsultasi', $size, $page)->result();
  }

  public function getAllKonsultasiDokter($id)
  {
      $this->db->where('id_user_dokter', $id);
      return $this->db->get('konsultasi')->result();
  }

  public function getKonsultasiDokter($id,$aktif,$page, $size)
  {
      $this->db->where('id_user_dokter', $id);
      $this->db->where('aktif', $aktif);
      return $this->db->get('konsultasi', $size, $page)->result();
  }

  public function getOneKonsultasi($id)
  {
      $this->db->where('id', $id);
      return $this->db->get('konsultasi')->result();
  }

  public function insertKonsultasi($data)
  {
      $val = array(
        'id_user' => $data['id_user'],
        'id_user_dokter' => $data['id_user_dokter'],
        'aktif' => $data['aktif'],
        'date_created' => $data['date_created']
      );
      return $this->db->insert('konsultasi', $val);
  }

  public function updateKonsultasi($data, $id)
  {
      $val = array(
        'id_user' => $data['id_user'],
        'id_user_dokter' => $data['id_user_dokter'],
        'aktif' => $data['aktif'],
        'date_created' => $data['date_created']
      );
    $this->db->where('id', $id);
    return $this->db->update('konsultasi', $val);
  }

  public function deleteKonsultasi($id)
  {
    $val = array(
      'id' => $id
    );
    return $this->db->delete('konsultasi', $val);
  }

}