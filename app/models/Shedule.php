<?php

  class Shedule{
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    //Add shedules
    public function addShedule($data){
      $this->db->query('INSERT INTO shedules (sheduleID, trainID, departureStationID, departureDate, departureTime, arrivalStationID, arrivalDate, arrivalTime)VALUES (:sheduleID, :trainID, :departureStationID, :departureDate, :departureTime, :arrivalStationID, :arrivalDate, :arrivalTime);');
      $this->db->bind(':sheduleID', $data['sheduleID']);
      $this->db->bind(':trainID', $data['trainID']);
      $this->db->bind(':departureStationID', $data['departureStationID']);
      $this->db->bind(':departureDate', $data['departureDate']);
      $this->db->bind(':departureTime', $data['departureTime']);
      $this->db->bind(':arrivalStationID', $data['arrivalStationID']);
      $this->db->bind(':arrivalDate', $data['arrivalDate']);
      $this->db->bind(':arrivalTime', $data['arrivalTime']);

      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    //edit schedule
    public function editShedule($data){
      $this->db->query('UPDATE shedules SET trainID = :trainID, departureStationID = :departureStationID, departureDate = :departureDate, departureTime = :departureTime, arrivalStationID = :arrivalStationID, arrivalDate = :arrivalDate, arrivalTime = :arrivalTime WHERE sheduleID = :sheduleID');
      $this->db->bind(':sheduleID', $data['sheduleID']);
      $this->db->bind(':trainID', $data['trainID']);
      $this->db->bind(':departureStationID', $data['departureStationID']);
      $this->db->bind(':departureDate', $data['departureDate']);
      $this->db->bind(':departureTime', $data['departureTime']);
      $this->db->bind(':arrivalStationID', $data['arrivalStationID']);
      $this->db->bind(':arrivalDate', $data['arrivalDate']);
      $this->db->bind(':arrivalTime', $data['arrivalTime']);

      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    //get available shedules
    public function getAvailableShedules(){
      $this->db->query('SELECT * FROM shedules WHERE sheduleValidity = 1');

      $results = $this->db->resultSet();
      return $results;
    }

    //get deactivated shedules
    public function deactivatedShedules(){
      $this->db->query('SELECT * FROM shedules WHERE sheduleValidity = 0');
      $results = $this->db->resultSet();
      return $results;
    }

    //Find shedule by id
    public function findSheduleById($id){
      $this->db->query('SELECT * FROM shedules WHERE sheduleID = :id');
      $this->db->bind(':id',$id);

      $row = $this->db->single();

      // Check row
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }

    //Deactivate Shedule
    public function deactivateShedule($id){
      $this->db->query('UPDATE shedules SET sheduleValidity = 0 WHERE sheduleID = :id');
      $this->db->bind(':id',$id);

      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    //Activate Shedule
    public function activateShedule($id){
      $this->db->query('UPDATE shedules SET sheduleValidity = 1 WHERE sheduleID = :id');
      $this->db->bind(':id',$id);

      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    //deactivate Schedule when the station closed
    public function disScheduleWhenStationClosed($stationID){
      $this->db->query('UPDATE shedules SET sheduleValidity = 0 WHERE departureStationID = :stationID OR arrivalStationID = :stationID');
      $this->db->bind(':stationID',$stationID);

      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    //deactivate Schedule when the train is not running
    public function deactivateWhenTrainNotRunning($trainID){
      $this->db->query('UPDATE shedules SET sheduleValidity = 0 WHERE trainID = :trainID');
      $this->db->bind(':trainID',$trainID);

      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
    
    //search shedule - PASSENGER
    public function searchTrainShedule($data){
      // Selecting fields from 'shedules' table and 'trains' table
      $this->db->query('SELECT 
      stations_departure.name AS departure_station_name,
      stations_arrival.name AS arrival_station_name,
      shedules.departureDate,
      shedules.arrivalDate,
      shedules.arrivalTime,
      shedules.departureTime,
      trains.name AS train_name,
      trains.type AS train_type,
      MAX(CASE WHEN ticketprices.classID = 1 THEN ticketprices.price ELSE NULL END) AS first_class_price,
      MAX(CASE WHEN ticketprices.classID = 2 THEN ticketprices.price ELSE NULL END) AS second_class_price,
      MAX(CASE WHEN ticketprices.classID = 3 THEN ticketprices.price ELSE NULL END) AS third_class_price
      FROM 
        shedules
      JOIN 
        stations AS stations_departure ON shedules.departureStationID = stations_departure.stationID
      JOIN 
        stations AS stations_arrival ON shedules.arrivalStationID = stations_arrival.stationID
      JOIN 
        trains ON shedules.trainID = trains.trainID
      JOIN
        ticketprices ON ticketprices.departureStationID = shedules.departureStationID AND ticketprices.arrivalStationID = shedules.arrivalStationID
      WHERE 
        shedules.departureStationID = :departureStationID;
        AND shedules.arrivalStationID = :arrivalStationID;
        AND shedules.departureDate = :date;
      GROUP BY
        stations_departure.name,
        stations_arrival.name,
        shedules.departureDate,
        shedules.arrivalTime,
        shedules.departureTime,
        trains.name,
        trains.type;');

      // Binding parameters
      $this->db->bind(':date', $data['date']);
      $this->db->bind(':departureStationID', $data['from']);
      $this->db->bind(':arrivalStationID', $data['to']);

      return $mergedResults;
    }


  }