<?php 
  class Supporter {

    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function editSupporter($data){
      $this->db->query('UPDATE users SET fname = :fname, lname = :lname, nic = :nic, phone = :phone, email = :email, password = :password WHERE id = :id');

      $this->db->bind(':fname', $data['fname']);
      $this->db->bind(':lname', $data['lname']);
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

    public function deactivateSupporter($id){
      $this->db->query("UPDATE users SET status = 0 WHERE id = :id");

      $this->db->bind(':id', $id);

      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function activateSupporter($id){
      $this->db->query("UPDATE users SET status = 1 WHERE id = :id");

      $this->db->bind(':id', $id);

      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function getAvailableShedules(){
      $this->db->query("SELECT 
                          sc.*, 
                          stdep.name AS depStation, 
                          starr.name AS arrStation 
                        FROM 
                          shedules sc 
                        JOIN 
                          stations stdep ON sc.departureStationID = stdep.stationID
                        JOIN
                          stations starr ON sc.arrivalStationID = starr.stationID
                        WHERE
                        sheduleValidity	= 1
                      ");

      $result = $this->db->resultSet();
      return $result;
    }

    public function deactivatedShedules(){
      $this->db->query("SELECT 
                          sc.*, 
                          stdep.name AS depStation, 
                          starr.name AS arrStation 
                        FROM 
                          shedules sc 
                        JOIN 
                          stations stdep ON sc.departureStationID = stdep.stationID
                        JOIN
                          stations starr ON sc.arrivalStationID = starr.stationID
                        WHERE
                        sheduleValidity	= 0
                      ");

      $result = $this->db->resultSet();
      return $result;
    }

    public function getSchedules($dep, $arr, $date){
      $this->db->query("SELECT 
                          sc.*, 
                          stdep.name AS depStation, 
                          starr.name AS arrStation 
                        FROM 
                          shedules sc 
                        JOIN 
                          stations stdep ON sc.departureStationID = stdep.stationID
                        JOIN
                          stations starr ON sc.arrivalStationID = starr.stationID
                        WHERE
                          sheduleValidity	= 1 AND sc.departureStationID = :dep AND sc.arrivalStationID = :arr AND sc.departureDate = :dapDate
                        ");
        $this->db->bind(':arr',$arr);
        $this->db->bind(':dep',$dep);
        $this->db->bind(':dapDate',$date);
        $result = $this->db->resultSet();
        return $result;
    }

    public function getUserData($id){
      $this->db->query("SELECT * FROM users WHERE id = :id");
      $this->db->bind(':id',$id);
      $result = $this->db->single();
      return $result;
    }

    public function getSupporter($id){
      $this->db->query("SELECT password FROM users WHERE id = :id");
      $this->db->bind(':id',$id);
      $result = $this->db->single();
      return $result;
    }


    // ## Get User Bookings

    public function getuserBookings($id){
      $this->db->query("SELECT * FROM `booking` WHERE userId=:uId ORDER BY `booking`.`bookingTime` DESC;");
      $this->db->bind(':uId',$id);
      
      $result=$this->db->resultSet();
      return $result;
    }

    public function getNotification($id){
      $this->db->query("SELECT passenger_id FROM supprot_agents WHERE supporter_id = :id");
      $this->db->bind(':id',$id);
      $result = $this->db->single();

      return $result;
    }

    public function getQuestions(){
      $this->db->query("SELECT * FROM questionregardingproblems");
      $result = $this->db->resultSet();
      return $result;
    }
  
  }