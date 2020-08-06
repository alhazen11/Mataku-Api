<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ReviewM extends CI_Model {

  public function getCountReview($id)
  {
      $this->db->where('id_user', $id);
      return $this->db->count_all_results('review', FALSE);
  }

  public function getCountReviewDokter($id)
  {
      $this->db->where('id_user_dokter', $id);
      return $this->db->count_all_results('review', FALSE);
  }

  public function getReviewDokter($id,$page, $size)
  {
      $this->db->where('id_user_dokter', $id);
      return $this->db->get('review', $size, $page)->result();
  }

  public function getReview($id,$page, $size)
  {
      $this->db->where('id_user', $id);
      return $this->db->get('review', $size, $page);
  }
  public function getAllReviewDokter($id)
  {
      $this->db->where('id_user_dokter', $id);
      return $this->db->get('review')->result();
  }

  public function getAllReview($id)
  {
      $this->db->where('id_user', $id);
      return $this->db->get('review')->result();
  }

  public function getOneReview($id)
  {
      $this->db->where('id', $id);
      return $this->db->get('review')->result();
  }

  public function insertReview($data)
  {
      $val = array(
        'id_user' => $data['id_user'],
        'id_user_dokter' => $data['id_user_dokter'],
        'rate' => $data['rate'],
        'keterangan' => $data['keterangan'],
        'date_created' => $data['date_created']
      );
      return $this->db->insert('review', $val);
  }

  public function updateReview($data, $id)
  {
      $val = array(
        'id_user' => $data['id_user'],
        'id_user_dokter' => $data['id_user_dokter'],
        'rate' => $data['rate'],
        'keterangan' => $data['keterangan'],
        'date_created' => $data['date_created']
      );
    $this->db->where('id', $id);
    return $this->db->update('review', $val);
  }

  public function deleteReview($id)
  {
    $val = array(
      'id' => $id
    );
    return $this->db->delete('review', $val);
  }

}