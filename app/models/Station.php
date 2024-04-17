<?php
  class Station {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function addStation($data){
      $this->db->query('INSERT INTO stations (stationID, name, qr, latitude, longitude) VALUES(:stationID, :name, :qrCodePath, :latitude, :longitude)
      ');

      $this->db->bind(':latitude',$data['latitude']);
      $this->db->bind(':longitude',$data['longitude']);
      $this->db->bind(':stationID', $data['stationID']);
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':qrCodePath', $data['qrCodePath']);


      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function editStation($data){
      $this->db->query('UPDATE stations SET name = :name WHERE stationID = :stationID');

      $this->db->bind(':stationID', $data['stationID']);
      $this->db->bind(':name', $data['name']);

      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }


    public function findStationByName($name){
      $this->db->query('SELECT * FROM stations WHERE name = :name');
      $this->db->bind(':name', $name);

      $row = $this->db->single();
  
      // Check row
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }


    public function findStationByID($stationID){
      $this->db->query('SELECT * FROM stations WHERE stationID = :stationID');
      $this->db->bind(':stationID', $stationID);

      $row = $this->db->single();
  
      // Check row
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }

// Find Station by Id when edit 
  public function findStationByStationID($stationID){
    $this->db->query('SELECT * FROM stations WHERE stationID = :stationID');
    $this->db->bind(':stationID', $stationID);
    $row = $this->db->single();
    return $row;
  }

// Find Station by Name when edit 
  public function findStationName($data){
    $this->db->query('SELECT * FROM stations WHERE LOWER(name) LIKE LOWER(:name) AND stationID != :stationID');
    $this->db->bind(':name', $data['name']);
    $this->db->bind(':stationID', $data['stationID']);

    $row = $this->db->single();

    // Check row
    if($this->db->rowCount() > 0){
      return true;
    } else {
      return false;
    }
  }

//Find Ticket ID
  public function findTicketById($id){
    $this->db->query('SELECT * FROM ticketprices WHERE ticketPriceID = :id');
    $this->db->bind(':id', $id);

    $row = $this->db->single();
    
    if($this->db->rowCount() > 0){
      return true;
    } else {
      return false;
    }
  }

//Deactivate Station
  public function deactivateStation($id){
    $this->db->query('UPDATE stations SET status = 0 WHERE stationID = :id');

    $this->db->bind(':id', $id);

    if($this->db->execute()){
      return true;
    } else {
      return false;
    }
  }

//Activate Station
  public function activateStation($id){
    $this->db->query('UPDATE stations SET status = 1 WHERE stationID = :id');

    $this->db->bind(':id', $id);

    if($this->db->execute()){
      return true;
    } else {
      return false;
    }
  }

}