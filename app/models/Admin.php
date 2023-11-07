<?php 
  class Admin{
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

/*----------------------------------------------------------User----------------------------------------------------------*/
    public function getUser(){
      $this->db->query("SELECT * FROM users WHERE type = 'user';
      ");
      $results = $this->db->resultSet();
      return $results;
    }

    public function searchUser($nic){
      $this->db->query("SELECT * FROM users WHERE type = 'user' AND nic =:nic;
      ");
      $this->db->bind(':nic', $nic);
      $results = $this->db->resultSet();
      return $results;
    }

  
/*----------------------------------------------------------Checker----------------------------------------------------------*/ 
    public function getChecker(){
      $this->db->query("SELECT * FROM users WHERE type = 'checker';
      ");
      $results = $this->db->resultSet();
      return $results;
    }

    public function getCheckerById($nic){
      $this->db->query("SELECT * FROM users WHERE type = 'checker' AND nic =:nic;
      ");
      $this->db->bind(':nic', $nic);
      $results = $this->db->resultSet();
      return $results;
    }

/*----------------------------------------------------------Supporter----------------------------------------------------------*/ 
    public function getSupporter(){
      $this->db->query("SELECT * FROM users WHERE type = 'supporter';
      ");
      $results = $this->db->resultSet();
      return $results;
    }

    public function getSupporterById($nic){
      $this->db->query("SELECT * FROM users WHERE type = 'supporter' AND nic =:nic;
      ");
      $this->db->bind(':nic', $nic);
      $results = $this->db->resultSet();
      return $results;
    }

// Find user by email
    public function findUserByEmail($email,$id){
      $this->db->query('SELECT * FROM users WHERE email = :email AND id != :id');
      $this->db->bind(':email', $email);
      $this->db->bind(':id', $id);
  
      $row = $this->db->single();
  
      // Check row
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }
  

// Find user by NIC
    public function findUserByNic($nic,$id){
      $this->db->query('SELECT * FROM users WHERE nic = :nic AND id != :id');
      $this->db->bind(':nic', $nic);
      $this->db->bind(':id', $id);

      $row = $this->db->single();

      // Check row
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }
}