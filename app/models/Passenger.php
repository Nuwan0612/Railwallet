<?php 
  class Passenger {
    private $db;

    public function __construct() {
      $this->db = new Database;
    }

    //Add feedback
    public function addFeedback($data) {
      $this->db->query('INSERT INTO feedbacks (userID, feedback, rating) VALUES (:user_id, :feedback, :rating)');
      $this->db->bind(":user_id", $data['user_id']);
      $this->db->bind(":feedback", $data['feedback']);
      $this->db->bind(":rating", $data['rating']);

      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    //Get feedbacks
    public function getFeedbacks(){
      $this->db->query("SELECT 
                          us.name,
                          us.email,
                          us.id,
                          fb.*
                        FROM 
                          users us
                        JOIN 
                          feedbacks fb ON us.id = fb.userID
                        WHERE
                          us.type = 'user'  ");

      $results = $this->db->resultSet();
      return $results; 
    }

    //get user details
    public function getUserDetails($id){
      $this->db->query('SELECT * FROM users WHERE id = :id');
      $this->db->bind(':id', $id);

      $results = $this->db->single();
      return $results;
    }

    //edit user details
    public function editPassengerDetails($data){
      $this->db->query('UPDATE users SET name = :name, email = :email, phone = :phone, password = :newPassword WHERE id = :id');
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':phone', $data['phone']);
      $this->db->bind(':newPassword', $data['newPassword']);
      $this->db->bind(':id', $data['id']);

      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    //check ticket before scan
    public function checkTicketAvailability($depID, $arrID, $classID){
      $this->db->query('SELECT * FROM ticketprices WHERE ((Station_1_ID = :depID AND Station_2_ID = :arrID) OR (Station_2_ID = :depID AND Station_1_ID = :arrID)) AND classID = :class');
      $this->db->bind(':depID', $depID);
      $this->db->bind(':arrID', $arrID);
      $this->db->bind(':class', $classID);

      $results = $this->db->single();
      return $results;
    }

    //get Passenger Wallet balance
    public function getWalletBlance($id){
      $this->db->query('SELECT * FROM wallet WHERE passenger_id =:id');
      $this->db->bind(':id', $id);

      $result = $this->db->single();
      return $result;
    }

    //add journey
    public function addJourney($data){
      $this->db->query("INSERT INTO journey (passenger_id, ticket_id,	depStation, arrStation, end_time) VALUES (:passenger_id, :ticket_id, :depStation, :arrStation, NULL)");
      $this->db->bind(":passenger_id", $data["passenger_id"]);
      $this->db->bind(":ticket_id", $data["ticket_id"]);
      $this->db->bind(":arrStation", $data["arrStation"]);
      $this->db->bind(":depStation", $data["depStation"]);

      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    //get current journey
    public function getCurrentJourney($passenger_id){
      $this->db->query("SELECT * FROM journey WHERE completed = 0 AND canceled = 0 AND passenger_id = :passenger_id");
      $this->db->bind(":passenger_id", $passenger_id);
      $result = $this->db->single();
      return $result;
    }

    //end journey
    public function endJourney($id){
      $this->db->query("UPDATE journey SET completed = 1, end_time = NOW() WHERE id = :id");
      $this->db->bind(':id', $id);

      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    //update wallet balance
    public function updateWallet($ticket_id, $passenger_id){
      $this->db->query("UPDATE wallet SET balance = balance - (SELECT price FROM ticketprices WHERE ticketPriceID = :ticket_id) WHERE passenger_id = :passenger_id");
      $this->db->bind(':ticket_id', $ticket_id);
      $this->db->bind(':passenger_id', $passenger_id);

      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    //Add QR code to journey
    public function addJourneyQrCode($qr,$id){
      $this->db->query("UPDATE journey SET qr_code = :qr WHERE id = :id");
      $this->db->bind(':qr', $qr);
      $this->db->bind(':id', $id);

      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

  }