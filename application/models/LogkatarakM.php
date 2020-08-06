<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LogkatarakM extends CI_Model {

  public function getCountLogkatarak($id)
  {
        $this->db->where('id_user', $id);
      return $this->db->count_all_results('log_katarak', FALSE);
  }

  public function getLogkatarak($id,$page, $size)
  {
        $this->db->where('id_user', $id);
      return $this->db->get('log_katarak', $size, $page)->result();
  }

  public function getAllLogkatarak($id)
  {
        $this->db->where('id_user', $id);
      return $this->db->get('log_katarak')->result();
  }

  public function getOneLogkatarak($id)
  {
        $this->db->where('id', $id);
      return $this->db->get('log_katarak')->result();
  }

  public function insertLogkatarak($data)
  {
      $val = array(
        'id_user' => $data['id_user'],
        'hasil' => $data['hasil'],
        'date_created' => $data['date_created']
      );
      return $this->db->insert('log_katarak', $val);
  }

  public function updateLogkatarak($data, $id)
  {
      $val = array(
        'id_user' => $data['id_user'],
        'hasil' => $data['hasil'],
        'date_created' => $data['date_created']
      );
    $this->db->where('id', $id);
    return $this->db->update('log_katarak', $val);
  }

  public function deleteLogkatarak($id)
  {
    $val = array(
      'id' => $id
    );
    return $this->db->delete('log_katarak', $val);
  }

}