<?php 
  class Supporter {

    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function editSupporter($data){
      $this->db->query('UPDATE users SET fname = :fname, lname = :lname, nic = :nic, phone = :phone, email = :email, password = :password WHERE id = :id');

      $this->db->bind(':fname', $data['fname']);
      $this->db->bind(':lname', $data['lname']);
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':nic', $data['nic']);
      $this->db->bind(':phone', $data['phone']);
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':password', $data['password']);

      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function deactivateSupporter($id){
      $this->db->query("UPDATE users SET status = 0 WHERE id = :id");

      $this->db->bind(':id', $id);

      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function activateSupporter($id){
      $this->db->query("UPDATE users SET status = 1 WHERE id = :id");

      $this->db->bind(':id', $id);

      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
    
  }