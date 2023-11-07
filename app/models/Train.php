<?php 
  class Train{
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getTrains(){
      $this->db->query('SELECT * FROM trains');
      $results = $this->db->resultSet();
      return $results;
    }

    //add Train
    public function addTrain($data){
      $this->db->query('INSERT INTO trains (trainID, name, type, firstCapacity, secondCapacity, thirdCapacity) VALUES(:trainID, :name, :type, :firstCapacity, :secondCapacity, :thirdCapacity)');

      $this->db->bind(':trainID', $data['trainID']);
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':type', $data['type']);
      $this->db->bind(':firstCapacity', $data['firstCapacity']);
      $this->db->bind(':secondCapacity', $data['secondCapacity']);
      $this->db->bind(':thirdCapacity', $data['thirdCapacity']);

      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function editTrain($data){
      $this->db->query('UPDATE trains SET trainID = :trainID, name = :name, type = :type, firstCapacity = :firstCapacity, secondCapacity = :secondCapacity, thirdCapacity = :thirdCapacity WHERE id = :id');

      $this->db->bind(':trainID', $data['trainID']);
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':type', $data['type']);
      $this->db->bind(':firstCapacity', $data['firstCapacity']);
      $this->db->bind(':secondCapacity', $data['secondCapacity']);
      $this->db->bind(':thirdCapacity', $data['thirdCapacity']);

      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function findTrain($name){
      $this->db->query('SELECT * FROM trains WHERE name = :name');
      $this->db->bind(':name', $name);

      $row = $this->db->single();

      // Check row
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }

//find train by id when register
    public function findTrainByID($trainID){
      $this->db->query('SELECT * FROM trains WHERE trainID = :trainID');
      $this->db->bind(':trainID', $trainID);

      $row = $this->db->single();

      // Check row
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }

    public function searchTrainById($trainID){
      $this->db->query('SELECT * FROM trains WHERE trainID = :trainID');
      $this->db->bind(':trainID', $trainID);

      $results = $this->db->resultSet();
      return $results;
    }


    public function getTrain($id){
      $this->db->query('SELECT * FROM trains WHERE id = :id');
      $this->db->bind(':id', $id);

      $row = $this->db->single();

      return $row;
    }

//delete train
    public function deleteTrain($id){
      $this->db->query('DELETE FROM trains WHERE id = :id');

      $this->db->bind(':id', $id);
      
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }


// Find Train by Id when edit 
    public function findTrainID($trainID,$id){
      $this->db->query('SELECT * FROM trains WHERE trainID = :trainID AND id != :id');
      $this->db->bind(':trainID', $trainID);
      $this->db->bind(':id', $id);
  
      $row = $this->db->single();
  
      // Check row
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }

// Find Train by name when edit 
  public function findTrainName($name,$id){
    $this->db->query('SELECT * FROM trains WHERE name = :name AND id != :id');
    $this->db->bind(':name', $name);
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