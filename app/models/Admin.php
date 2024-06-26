<?php 
  class Admin{
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

  /*----------------------------------------------------------Admin------------------------------------------------------*/
    public function getAdmin(){
      $this->db->query("SELECT * FROM users WHERE type = 'admin';
      ");
      $result = $this->db->single();
      return $result;
    }

    public function editAdminDetails($data){
      
      $this->db->query('UPDATE users SET fname = :fname, lname= :lname, email = :email, phone = :phone, password = :newPassword, userImage = :img  WHERE id = :id');
      $this->db->bind(':fname', $data['fname']);
      $this->db->bind(':lname', $data['lname']);
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':phone', $data['phone']);
      $this->db->bind(':newPassword', $data['newPassword']);
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':img', $data['img']);

      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

  /*----------------------------------------------------------User-------------------------------------------------------*/
    public function getUser(){
      $this->db->query("SELECT * FROM users WHERE type = 'user' and status = 1;
      ");
      $results = $this->db->resultSet();
      return $results;
    }

    public function getEarnings(){
      $this->db->query("SELECT SUM(amount) AS total, MONTH(date) AS month FROM `transactions` GROUP BY MONTH(date)");
      $result = $this->db->resultSet();
      return $result;
    }

    public function getYearsMonths(){
      $this->db->query("SELECT
                        MONTH(date) AS month_number,
                        YEAR(date) AS year,
                        SUM(CASE WHEN type = 'checker' THEN 1 ELSE 0 END) AS num_checkers,
                        SUM(CASE WHEN type = 'supporter' THEN 1 ELSE 0 END) AS num_supporters,
                        SUM(CASE WHEN type = 'user' THEN 1 ELSE 0 END) AS num_users
                      FROM
                          users
                      GROUP BY
                          YEAR(date),
                          MONTH(date);
                        ");
      $result = $this->db->resultSet();
      return $result;
    }

    public function getBlockedUser(){
      $this->db->query("SELECT * FROM users WHERE type = 'user' and status = 0;
      ");
      $results = $this->db->resultSet();
      return $results;
    }

    public function searchUser($nic){
      $this->db->query("SELECT * FROM users WHERE type = 'user' AND nic =:nic;
      ");
      $this->db->bind(':nic', $nic);
      $results = $this->db->resultSet();
      return $results;
    }

    public function User($id){
      $this->db->query("SELECT * FROM users WHERE id = :id;
      ");
      $this->db->bind(':id', $id);
      $result = $this->db->single();
      return $result;
    }

    public function getuserTravelDetails($id){
      $this->db->query("SELECT 
                          j.*, 
                          tp.price, 
                          tc.className, 
                          s1.name AS depStationName, 
                          s2.name AS arrStationName 
                        FROM 
                          journey j
                        JOIN 
                          ticketprices tp 
                        ON 
                          tp.ticketPriceID =  j.ticket_id
                        JOIN
                          trainclasses tc
                        ON
                          tc.classID = tp.classID
                        JOIN 
                          stations s1 
                        ON
                          s1.stationID = j.depStation
                        JOIN
                          stations s2
                        ON
                          s2.stationID = j.arrStation
                        WHERE 
                          passenger_id = :id");
      $this->db->bind(':id', $id);

      $results = $this->db->resultSet();
      return $results;
    }

    public function getuserBookingDetails($id){
      $this->db->query("SELECT * FROM booking WHERE userId = :userId ORDER BY bookingId DESC");
      $this->db->bind(':userId', $id);
      $results = $this->db->resultSet();
      return $results;
    }

    public function searchTravelDetails($date,$id){
      $this->db->query("SELECT 
                          j.*, 
                          tp.price, 
                          tc.className, 
                          s1.name AS depStationName, 
                          s2.name AS arrStationName 
                        FROM 
                          journey j
                        JOIN 
                          ticketprices tp 
                        ON 
                          tp.ticketPriceID =  j.ticket_id
                        JOIN
                          trainclasses tc
                        ON
                          tc.classID = tp.classID
                        JOIN 
                          stations s1 
                        ON
                          s1.stationID = j.depStation
                        JOIN
                          stations s2
                        ON
                          s2.stationID = j.arrStation
                        WHERE 
                          DATE(start_time) = :start_time AND passenger_id = :id");
      $this->db->bind(':start_time', $date);
      $this->db->bind(':id', $id);
      $reslts = $this->db->resultSet();
      return $reslts;
    }

    public function getuserFineDetails($id){
      $this->db->query("SELECT * FROM fines WHERE passenger_id = :id");
      $this->db->bind(':id', $id);
      $results = $this->db->resultSet();
      return $results;
    }

    
  /*----------------------------------------------------------Checker----------------------------------------------------*/ 
    public function getChecker(){
      $this->db->query("SELECT * FROM users WHERE type = 'checker' and status = 1;
      ");
      $results = $this->db->resultSet();
      return $results;
    }

    public function getResignedChecker(){
      $this->db->query("SELECT * FROM users WHERE type = 'checker' and status = 0;
      ");
      $results = $this->db->resultSet();
      return $results;
    }

    public function getCheckerById($nic){
      $this->db->query("SELECT * FROM users WHERE type = 'checker' AND nic =:nic;
      ");
      $this->db->bind(':nic', $nic);
      $results = $this->db->resultSet();
      return $results;
    }

  /*----------------------------------------------------------Supporter--------------------------------------------------*/ 
    public function getSupporter(){
      $this->db->query("SELECT * FROM users WHERE type = 'supporter' AND status = 1;");
      $results = $this->db->resultSet();
      return $results;
    }

    public function resignedSupporters(){
      $this->db->query("SELECT * FROM users WHERE type = 'supporter' AND status = 0;");
      $results = $this->db->resultSet();
      return $results;
    }

    public function getSupporterById($nic){
      $this->db->query("SELECT * FROM users WHERE type = 'supporter' AND nic =:nic;
      ");
      $this->db->bind(':nic', $nic);
      $results = $this->db->resultSet();
      return $results;
    }

    public function createAgentTableRow($id){
      $this->db->query("INSERT INTO supprot_agents (supporter_id) VALUES (:id)");
      $this->db->bind(':id', $id);
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

  /*----------------------------------------------------------Stations---------------------------------------------------*/ 
    public function getStation(){
      $this->db->query("SELECT * FROM stations WHERE status = 1;");
      $results = $this->db->resultSet();
      return $results;
    } 

    public function closedStations(){
      $this->db->query("SELECT * FROM stations WHERE status = 0;");
      $results = $this->db->resultSet();
      return $results;
    }

    public function findStationByName($name){
      $this->db->query("SELECT * FROM stations WHERE name =:name;");
      $this->db->bind(':name', $name);
      $results = $this->db->resultSet();
      return $results;
    }

    public function findStationByStationID($stationID){
      $this->db->query("SELECT * FROM stations WHERE stationID =:stationID;");
      $this->db->bind(':stationID', $stationID);
      $results = $this->db->resultSet();
      return $results;
    }

  /*----------------------------------------------------------Shedules---------------------------------------------------*/
    public function findShedulebySheduleId($id){
      $this->db->query('SELECT * FROM shedules WHERE sheduleID = :id');
      $this->db->bind(':id', $id);
      $results = $this->db->resultSet();
      return $results;
    }

    public function findSheduleByTrainId($id){
      $this->db->query('SELECT * FROM shedules WHERE trainID = :id');
      $this->db->bind(':id', $id);
      $results = $this->db->resultSet();
      return $results;
    }

    public function findShedulebyDate($departureStation, $arrivalStation, $depDate){
      $this->db->query('SELECT * FROM  shedules WHERE departureStationID =:departureStation AND arrivalStationID = :arrivalStation AND departureDate = :depDate');
      $this->db->bind(':departureStation', $departureStation);
      $this->db->bind(':arrivalStation', $arrivalStation);
      $this->db->bind(':depDate', $depDate);
      $results = $this->db->resultSet();
      return $results;
    }

  /*----------------------------------------------------------Routes-----------------------------------------------------*/
    public function getRoutes(){
      $this->db->query('SELECT * FROM trainroutes;');
      $results = $this->db->resultSet();
      return $results;
    }

  /*----------------------------------------------------------Feedback---------------------------------------------------*/
    public function getFeedback(){
      $this->db->query('SELECT * FROM feedbacks;');
      $results = $this->db->resultSet();
      return $results;
    }

    public function getuserfeedback($id){
      $this->db->query("SELECT 
                          us.fname,
                          us.lname,
                          us.userImage,
                          us.email,
                          us.id,
                          fb.*
                        FROM 
                          users us
                        JOIN 
                          feedbacks fb ON us.id = fb.userID
                        WHERE
                          us.type = 'user' AND us.id = $id");

      $results = $this->db->resultSet();
      return $results; 
    }
  /*----------------------------------------------------------Get Ticket-------------------------------------------------*/
    public function getTicketClass($id) {
      $this->db->query("SELECT className FROM trainclasses WHERE classID = (SELECT classID FROM ticketprices WHERE ticketPriceID = :id)");
      $this->db->bind(':id',$id);
      $result = $this->db->single();
      return $result;
    }

  // Find user by email
    public function findUserByEmail($email,$id){
      $this->db->query('SELECT * FROM users WHERE email = :email AND id != :id');
      $this->db->bind(':email', $email);
      $this->db->bind(':id', $id);
  
      $row = $this->db->single();
  
      // Check row
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }
    

  // Find user by NIC
    public function findUserByNic($nic,$id){
      $this->db->query('SELECT * FROM users WHERE nic = :nic AND id != :id');
      $this->db->bind(':nic', $nic);
      $this->db->bind(':id', $id);

      $row = $this->db->single();

      // Check row
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }

  // Find class by Id
    public function findClassByID($id){
      $this->db->query('SELECT * FROM trainclasses WHERE classID = :id');
      $this->db->bind(':id', $id);

      $result = $this->db->single();
      
      // Check row
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }

  //get class
    public function getClasses(){
      $this->db->query('SELECT * FROM trainclasses');
      $results = $this->db->resultSet();
      return $results;
    }

}