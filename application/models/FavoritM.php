<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class FavoritM extends CI_Model {

  public function getCountFavorit($id)
  {
      $this->db->where('id_user', $id);
      return $this->db->count_all_results('favorit', FALSE);
  }

  public function getOneFavorit($id)
  {
      $this->db->where('id', $id);
      return $this->db->get('favorit')->result();
  }
  public function getFavorit($id,$page, $size)
  {
      $this->db->where('id_user', $id);
      return $this->db->get('favorit', $size, $page)->result();
  }
    public function getAllFavorit($id)
  {
      $this->db->where('id_user', $id);
      return $this->db->get('favorit')->result();
  }
    public function getFavoritDokter($id,$page, $size)
  {
      $this->db->where('id_user_dokter', $id);
      return $this->db->get('favorit', $size, $page)->result();
  }
    public function getAllFavoritDokter($id)
  {
      $this->db->where('id_user_dokter', $id);
      return $this->db->get('favorit')->result();
  }

  public function insertFavorit($data)
  {
      $val = array(
        'id_user' => $data['id_user'],
        'id_user_dokter' => $data['id_user_dokter'],
        'date_created' => $data['date_created'],
      );
      return $this->db->insert('favorit', $val);
  }

  public function updateFavorit($data, $id)
  {
      $val = array(
        'id_user' => $data['id_user'],
        'id_user_dokter' => $data['id_user_dokter'],
        'date_created' => $data['date_created'],
      );
    $this->db->where('id', $id);
    return $this->db->update('favorit', $val);
  }

  public function deleteFavorit($id)
  {
    $val = array(
      'id' => $id
    );
    return $this->db->delete('favorit', $val);
  }

}