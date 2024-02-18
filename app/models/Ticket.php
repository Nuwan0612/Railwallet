<?php 
  class Ticket{
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function addTicket($data){
      $this->db->query('INSERT INTO ticketprices(ticketPriceID, departureStationID, arrivalStationID, classID, price, qrCode) VALUES (:ticketID, :DepartureStationID, :arrivalStationID, :classID, :price, :qrCode)');

      $this->db->bind(':ticketID',$data['ticketID']);    
      $this->db->bind(':DepartureStationID',$data['DepartureStationID']);
      $this->db->bind(':arrivalStationID',$data['ArrivalStationID']);
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
                            tp.departureStationID,
                            depStation.name AS departureStationName,
                            tp.arrivalStationID,
                            arrStation.name AS arrivalStationName,
                            tp.classID,
                            tc.className,
                            tp.price,
                            tp.qrCode
                        FROM
                            ticketprices tp
                        JOIN
                            stations depStation ON tp.departureStationID = depStation.stationID
                        JOIN
                            stations arrStation ON tp.arrivalStationID = arrStation.stationID
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
                            tp.departureStationID,
                            depStation.name AS departureStationName,
                            tp.arrivalStationID,
                            arrStation.name AS arrivalStationName,
                            tp.classID,
                            tc.className,
                            tp.price,
                            tp.qrCode
                        FROM
                            ticketprices tp
                        JOIN
                            stations depStation ON tp.departureStationID = depStation.stationID
                        JOIN
                            stations arrStation ON tp.arrivalStationID = arrStation.stationID
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
      $this->db->query("SELECT * FROM ticketprices WHERE ticketPriceID = :ticketID");
      $this->db->bind(':ticketID', $ticketID);
      $result = $this->db->single();
      return $result;
    }

    //Udatate ticket
    public function updateTicket($data){
      $this->db->query("UPDATE ticketprices SET departureStationID = :departureStationID, arrivalStationID = :arrivalStationID, classID = :classID, price = :price WHERE ticketPriceID = :ticketPriceID");

      $this->db->bind(':ticketPriceID',$data['ticketID']);    
      $this->db->bind(':departureStationID',$data['DepartureStationID']);
      $this->db->bind(':arrivalStationID',$data['ArrivalStationID']);
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
      $this->db->query("UPDATE ticketprices SET valid = 0 WHERE departureStationID = :stationID OR arrivalStationID = :stationID");
      $this->db->bind(':stationID',$stationID);

      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

  }