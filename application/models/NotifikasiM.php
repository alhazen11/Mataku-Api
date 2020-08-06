<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class NotifikasiM extends CI_Model {

  public function getCountNotifikasi($id)
  {
      $this->db->where('id_user', $id);
      return $this->db->count_all_results('notifikasi', FALSE);
  }
  public function send_notification($tokens, $message)
    {
    	$url = 'https://fcm.googleapis.com/fcm/send';
    
    	$msg = array
    	(
    		'body' 	=> "$message",
    		'title'		=> "PUSH NOTIFICATION",
    		'sound'		=> 'default'
    
    		);
    	$fields = array
    	(
    		'registration_ids' 	=> $tokens,
    		'notification'			=> $msg
    		);
    
    
    	$headers = array(
    		'Authorization:key = AIzaSyAxJpgs4QiNN06G1xy_gWVE_w0aQMR8kVk',
    		'Content-Type: application/json'
    		);
    
    	$ch = curl_init();
    	curl_setopt($ch, CURLOPT_URL, $url);
    	curl_setopt($ch, CURLOPT_POST, true);
    	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    	curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);  
    	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    	$result = curl_exec($ch);           
    	if ($result === FALSE) {
    		die('Curl failed: ' . curl_error($ch));
    	}
    	curl_close($ch);
    	return $result;
    }

  public function getNotifikasi($id,$page, $size)
  {
      $this->db->where('id_user', $id);
      return $this->db->get('notifikasi', $size, $page)->result();
  }
  public function getAllNotifikasi($id)
  {
      $this->db->where('id_user', $id);
      return $this->db->get('notifikasi')->result();
  } 
   public function getOneNotifikasi($id)
  {
        $this->db->where('id', $id);
      return $this->db->get('notifikasi')->result();
  }
  public function getOneLogpterigium($id)
  {
        $this->db->where('id', $id);
      return $this->db->get('log_pterigium')->result();
  }
  public function insertNotifikasi($data)
  {
      $val = array(
        'id_user' => $data['id_user'],
        'keterangan' => $data['keterangan'],
        'activity' => $data['activity'],
        'date_created' => $data['date_created']
      );
      return $this->db->insert('notifikasi', $val);
  }

  public function updateNotifikasi($data, $id)
  {
      $val = array(
        'id_user' => $data['id_user'],
        'keterangan' => $data['keterangan'],
        'activity' => $data['activity'],
        'date_created' => $data['date_created']
      );
    $this->db->where('id', $id);
    return $this->db->update('notifikasi', $val);
  }

  public function deleteNotifikasi($id)
  {
    $val = array(
      'id' => $id
    );
    return $this->db->delete('notifikasi', $val);
  }

}