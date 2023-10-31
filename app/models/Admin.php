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
  }