<?php 
  class Ticket{
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function addTicket($data){
      $this->db->query('INSERT INTO ticketprices(ticketPriceID, Station_1_ID, Station_2_ID, classID, price, qrCode) VALUES (:ticketID, :Station_1_ID, :Station_2_ID, :classID, :price, :qrCode)');

      $this->db->bind(':ticketID',$data['ticketID']);    
      $this->db->bind(':Station_1_ID',$data['Station_1_ID']);
      $this->db->bind(':Station_2_ID',$data['Station_2_ID']);
      $this->db->bind(':classID',$data['ClassID']);
      $this->db->bind(':price',$data['price']);
      $this->db->bind(':qrCode',$data['qrCode']);

      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    // Get avilable tickets
    public function getTickets() {
      $this->db->query('SELECT
                            tp.ticketPriceID,
                            tp.Station_1_ID,
                            depStation.name AS station_1_name,
                            tp.Station_2_ID,
                            arrStation.name AS station_2_name,
                            tp.classID,
                            tc.className,
                            tp.price,
                            tp.qrCode
                        FROM
                            ticketprices tp
                        JOIN
                            stations depStation ON tp.Station_1_ID = depStation.stationID
                        JOIN
                            stations arrStation ON tp.Station_2_ID = arrStation.stationID
                        JOIN
                            trainclasses tc ON tp.classID = tc.classID
                        WHERE
                            tp.valid = 1;
  
                        ');
      $results = $this->db->resultSet();
      return $results;
    }

    //Get anavailble tickets
    public function getuUnavilableTickets(){
      $this->db->query('SELECT
                            tp.ticketPriceID,
                            tp.Station_1_ID,
                            depStation.name AS station_1_name,
                            tp.Station_2_ID,
                            arrStation.name AS station_2_name,
                            tp.classID,
                            tc.className,
                            tp.price,
                            tp.qrCode
                        FROM
                            ticketprices tp
                        JOIN
                            stations depStation ON tp.Station_1_ID = depStation.stationID
                        JOIN
                            stations arrStation ON tp.Station_2_ID = arrStation.stationID
                        JOIN
                            trainclasses tc ON tp.classID = tc.classID
                        WHERE
                            tp.valid = 0;
                        ');
        $results = $this->db->resultSet();
        return $results;
    }

    //Find ticket by ID
    public function getTicketByID($ticketID) {
      $this->db->query("SELECT 
                          tp.ticketPriceID,
                          tp.classID,
                          tp.price,
                          station_1.name AS station_1_name,
                          station_2.name AS station_2_name
                          FROM 
                            ticketprices tp
                          JOIN
                            stations station_1 ON tp.Station_1_ID = station_1.stationID
                          JOIN
                            stations station_2 ON tp.Station_2_ID = station_2.stationID 
                          WHERE 
                            ticketPriceID = :ticketID");
      $this->db->bind(':ticketID', $ticketID);
      $result = $this->db->single();
      return $result;
    }

    //Udatate ticket
    public function updateTicket($data){
      $this->db->query("UPDATE ticketprices SET classID = :classID, price = :price WHERE ticketPriceID = :ticketPriceID");

      $this->db->bind(':ticketPriceID',$data['ticketID']);    
      $this->db->bind(':classID',$data['ClassID']);
      $this->db->bind(':price',$data['price']);
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    //enable tickets
    public function enableTicket($id){
      $this->db->query('UPDATE ticketprices SET valid = 1 WHERE ticketPriceID = :id');
      $this->db->bind(':id',$id);

      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    //disable tickets
    public function disableTicket($id){
      $this->db->query('UPDATE ticketprices SET valid = 0 WHERE ticketPriceID = :id');
      $this->db->bind(':id', $id);

      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    //get ticket when search
    public function getTicketPriceById($id){
      $this->db->query('SELECT
                              tp.ticketPriceID,
                              tp.departureStationID,
                              depStation.name AS departureStationName,
                              tp.arrivalStationID,
                              arrStation.name AS arrivalStationName,
                              tp.classID,
                              tc.className,
                              tp.price,
                              tp.valid
                          FROM
                              ticketprices tp
                          JOIN
                              stations depStation ON tp.departureStationID = depStation.stationID
                          JOIN
                              stations arrStation ON tp.arrivalStationID = arrStation.stationID
                          JOIN
                              trainclasses tc ON tp.classID = tc.classID
                          WHERE
                              tp.ticketPriceID = :id;
    
                          ');
        $this->db->bind(':id',$id);
        $results = $this->db->resultSet();
        return $results;
    }

    //disable ticket when station is closed
    public function disTicketWhenStationClosed($stationID) {
      $this->db->query("UPDATE ticketprices SET valid = 0 WHERE Station_1_ID = :stationID OR Station_2_ID = :stationID");
      $this->db->bind(':stationID',$stationID);

      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    

  }