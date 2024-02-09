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
    
    $this->db->query('UPDATE users SET name = :name, nic = :nic, phone = :phone, email = :email, password = :newPassword, type = :type WHERE id = :id');
    $this->db->bind(':id', $data['id']);
    $this->db->bind(':name', $data['name']);
    $this->db->bind(':nic', $data['nic']);
    $this->db->bind(':phone', $data['phone']);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':newPassword', $data['newPassword']);
    $this->db->bind(':type', $data['type']);
      

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

}