<?php 
  class Checker {

    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function editChecker($data){
      $this->db->query('UPDATE users SET name = :name, nic = :nic, phone = :phone, email = :email, password = :password WHERE id = :id');

      $this->db->bind(':name', $data['name']);
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
    
  }