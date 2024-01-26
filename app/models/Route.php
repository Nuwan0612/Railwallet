<?php
  class Route {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function addRoute($data){
      $this->db->query('INSERT INTO trainroutes (trainID, stationID, stopOrder) VALUES (:trainID, :stationID, :stopOrder)');

      $this->db->bind(':trainID', $data['trainID']);
      $this->db->bind(':stationID', $data['stationID']);
      $this->db->bind(':stopOrder', $data['stopOrder']);

      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

  }