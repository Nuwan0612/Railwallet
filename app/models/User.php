<?php
  class User {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    //Register user
    public function register($data){
      $this->db->query('INSERT INTO users (name, nic, phone, email, password) VALUES(:name, :nic, :phone, :email, :password)');

      //Bind values
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':nic', $data['nic']);
      $this->db->bind(':phone', $data['phone']);
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':password', $data['password']);

      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    // Login User
    public function login($email, $password){
      $this->db->query('SELECT * FROM users WHERE email = :email');
      $this->db->bind(':email', $email);

      $row = $this->db->single();

      $hased_password = $row->password;
      if(password_verify($password, $hased_password)){
        return $row;
      } else {
        return false;
      }
    }

    // Find user by email
    public function findUserByEmail($email){
      $this->db->query('SELECT * FROM users WHERE email = :email');
      $this->db->bind(':email', $email);

      $row = $this->db->single();

      // Check row
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }

    //Active user state
    public function activeUser($id){
      $this->db->query('UPDATE users SET status = 1 WHERE id = :id');
      $this->db->bind(':id', $id);

      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    //Deactive user state
    public function deactiveUser($id){
      $this->db->query('UPDATE users SET status = 0 WHERE id = :id');
      $this->db->bind(':id', $id);

      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

  }