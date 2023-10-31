<?php 
  class Admin{
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getUser(){
      $this->db->query("SELECT * FROM users WHERE type = 'user';
      ");
      $results = $this->db->resultSet();
      return $results;
    }

    public function getChecker(){
      $this->db->query("SELECT * FROM users WHERE type = 'checker';
      ");
      $results = $this->db->resultSet();
      return $results;
    }
  }