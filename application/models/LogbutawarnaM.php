<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LogbutawarnaM extends CI_Model {

  public function getCountLogbutawarna($id)
  {
        $this->db->where('id_user', $id);
      return $this->db->count_all_results('log_buta_warna', FALSE);
  }

  public function getLogbutawarna($id,$page, $size)
  {
        $this->db->where('id_user', $id);
      return $this->db->get('log_buta_warna', $size, $page)->result();
  }

  public function getAllLogbutawarna($id)
  {
        $this->db->where('id_user', $id);
      return $this->db->get('log_buta_warna')->result();
  }

  public function getOneLogbutawarna($id)
  {
        $this->db->where('id', $id);
      return $this->db->get('log_buta_warna')->result();
  }

  public function insertLogbutawarna($data)
  {
      $val = array(
        'id_user' => $data['id_user'],
        'hasil' => $data['hasil'],
        'date_created' => $data['date_created']
      );
      return $this->db->insert('log_buta_warna', $val);
  }

  public function updateLogbutawarna($data, $id)
  {
      $val = array(
        'id_user' => $data['id_user'],
        'hasil' => $data['hasil'],
        'date_created' => $data['date_created']
      );
    $this->db->where('id', $id);
    return $this->db->update('log_buta_warna', $val);
  }

  public function deleteLogbutawarna($id)
  {
    $val = array(
      'id' => $id
    );
    return $this->db->delete('log_buta_warna', $val);
  }

}