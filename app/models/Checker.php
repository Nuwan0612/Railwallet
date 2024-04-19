<?php 
  class Checker {

    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function editChecker($data){
      $this->db->query('UPDATE users SET name = :name, nic = :nic, phone = :phone, email = :email, password = :password WHERE id = :id');

      $this->db->bind(':name', $data['name']);
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':nic', $data['nic']);
      $this->db->bind(':phone', $data['phone']);
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':password', $data['password']);

      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function resignChecker($id) {
      $this->db->query('UPDATE users SET status = 0 WHERE id = :id');

      $this->db->bind(":id", $id);

      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function activateChecker($id) {
      $this->db->query('UPDATE users SET status = 1 WHERE id = :id');

      $this->db->bind(":id", $id);

      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function checkavailabiltyOfJourney($id){
      $this->db->query('SELECT * FROM journey WHERE id = :id');
      $this->db->bind(":id", $id);
      $result = $this->db->single();
      return $result;
    }

    public function cancelTicket($id){
      $this->db->query("UPDATE journey SET canceled = 1 WHERE id = :id");
      $this->db->bind(":id", $id);
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function getPassengerIdFromJourney($id){
      $this->db->query("SELECT passenger_id FROM journey WHERE id = :id");
      $this->db->bind(":id", $id);
      $result = $this->db->single();
      return $result;
    }

    public function addFine($data){
      $this->db->query("INSERT INTO fines (passenger_id, checker_id, journey_id, fine_amount, fine_reason, payment_date) VALUES (:passenger_id, :checker_id,:journey_id, :fineAmount, :fineReason, NULL)");
      $this->db->bind(":passenger_id", $data['passenger_id']);
      $this->db->bind(":checker_id", $data['checker_id']);
      $this->db->bind(":fineAmount", $data['amount']);
      $this->db->bind(":fineReason", $data['reason']);
      $this->db->bind("journey_id", $data['journey_id']);

      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function getWalletBalnce($id){
      $this->db->query("SELECT * FROM wallet WHERE passenger_id = :id");
      $this->db->bind(':id', $id);
      $result = $this->db->single();
      return $result;
    }

    public function reduceAmountfromWallet($id,$amount){
      $this->db->query("UPDATE wallet SET balance = (balance - :amount) WHERE id = :id");
      $this->db->bind(':amount', $amount);
      $this->db->bind(":id", $id);

      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
    
    public function updatefinePayment($id){
      $this->db->query("UPDATE fines SET payment_status = 1, payment_date = NOW() WHERE journey_id = :id");
      $this->db->bind(':id', $id);
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    // Search fines by passenger id
    public function viewFinesById($id){
      $this->db->query("SELECT * FROM `fines` WHERE passenger_id=:id;");
      $this->db->bind(':id', $id);
      $result = $this->db->resultSet();
      return $result;
    }

    // View fine details
    public function viewFineDetailsByCheckerId($id){
      $this->db->query("SELECT * FROM `fines` WHERE checker_id=:cid;");

      $this->db->bind(':cid', $id);
      $result = $this->db->resultSet();
      return $result;
    }

    // View schedule details
    public function viewSchedule(){
      // $this->db->query("SELECT * FROM `shedules`;");
      $this->db->query("SELECT s.sheduleID, s.trainID, s.departureStationID, dep.name AS dName, s.departureDate, s.departureTime, s.arrivalStationID, arr.name AS aName, s.arrivalDate, s.arrivalTime FROM shedules s INNER JOIN stations dep ON s.departureStationID = dep.stationID INNER JOIN stations arr ON s.arrivalStationID = arr.stationID;");

      $result = $this->db->resultSet();
      return $result;
    }

    // Search schedules by schedule id
    public function viewSchedulesByScheduleId($id){
      $this->db->query("SELECT * FROM `shedules` WHERE sheduleID=:id;");
      $this->db->bind(':id', $id);
      $result = $this->db->resultSet();
      return $result;
    }

    // Search schedules by departure station
    public function viewSchedulesByDepartureStation($id){
      $this->db->query("SELECT * FROM `shedules` WHERE departureStationID=:id;");
      $this->db->bind(':id', $id);
      $result = $this->db->resultSet();
      return $result;
    }

    // Search schedules by arrival station
    public function viewSchedulesByArrivalStation($id){
      $this->db->query("SELECT * FROM `shedules` WHERE arrivalStationID=:id;");
      $this->db->bind(':id', $id);
      $result = $this->db->resultSet();
      return $result;
    }

    // Search schedules by date
    public function viewSchedulesByDate($id){
      $this->db->query("SELECT * FROM `shedules` WHERE departureDate=:id;");
      $this->db->bind(':id', $id);
      $result = $this->db->resultSet();
      return $result;
    }
  }