<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LogminusM extends CI_Model {

  public function getCountLogminus($id)
  {
        $this->db->where('id_user', $id);
      return $this->db->count_all_results('log_minus', FALSE);
  }

  public function getLogminus($id,$page, $size)
  {
        $this->db->where('id_user', $id);
      return $this->db->get('log_minus', $size, $page)->result();
  }

  public function getAllLogminus($id)
  {
        $this->db->where('id_user', $id);
      return $this->db->get('log_minus')->result();
  }

  public function getOneLogminus($id)
  {
        $this->db->where('id', $id);
      return $this->db->get('log_minus')->result();
  }

  public function insertLogminus($data)
  {
      $val = array(
        'id_user' => $data['id_user'],
        'hasil' => $data['hasil'],
        'date_created' => $data['date_created']
      );
     return $this->db->insert('log_minus', $val);
  }

  public function updateLogminus($data, $id)
  {
      $val = array(
        'id_user' => $data['id_user'],
        'hasil' => $data['hasil'],
        'date_created' => $data['date_created']
      );
    $this->db->where('id', $id);
    return $this->db->update('log_minus', $val);
  }

  public function deleteLogminus($id)
  {
    $val = array(
      'id' => $id
    );
    return $this->db->delete('log_minus', $val);
  }

}