<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LogpterigiumM extends CI_Model {

  public function getCountLogpterigium($id)
  {
        $this->db->where('id_user', $id);
      return $this->db->count_all_results('log_pterigium', FALSE);
  }

  public function getLogpterigium($id,$page, $size)
  {
        $this->db->where('id_user', $id);
      return $this->db->get('log_pterigium', $size, $page)->result();
  }

  public function getAllLogpterigium($id)
  {
        $this->db->where('id_user', $id);
      return $this->db->get('log_pterigium')->result();
  }

  public function getOneLogpterigium($id)
  {
        $this->db->where('id', $id);
      return $this->db->get('log_pterigium')->result();
  }

  public function insertLogpterigium($data)
  {
      $val = array(
        'id_user' => $data['id_user'],
        'hasil' => $data['hasil'],
        'date_created' => $data['date_created']
      );
     return $this->db->insert('log_pterigium', $val);
  }

  public function updateLogpterigium($data, $id)
  {
      $val = array(
        'id_user' => $data['id_user'],
        'hasil' => $data['hasil'],
        'date_created' => $data['date_created']
      );
    $this->db->where('id', $id);
    return $this->db->update('log_pterigium', $val);
  }

  public function deleteLogpterigium($id)
  {
    $val = array(
      'id' => $id
    );
    return $this->db->delete('log_pterigium', $val);
  }

}