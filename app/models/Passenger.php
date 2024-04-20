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

    //search Schedule
    public function searchSchedule($data){
      $this->db->query('SELECT 
                            stations_departure.name AS departure_station_name,
                            stations_arrival.name AS arrival_station_name,
                            shedules.sheduleID,
                            shedules.departureDate,
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
                              shedules.departureStationID = :departureStationID
                              AND shedules.arrivalStationID = :arrivalStationID
                              AND shedules.departureDate = :departureDate
                          GROUP BY
                              stations_departure.name,
                              stations_arrival.name,
                              shedules.departureDate,
                              shedules.arrivalTime,
                              shedules.departureTime,
                              trains.name,
                              trains.type;');

      $this->db->bind(':departureStationID',$data['from']);
      $this->db->bind(':arrivalStationID',$data['to']);
      $this->db->bind(':departureDate',$data['date']);
      
      $results = $this->db->resultSet();
      return $results;
    }


    // get available train seats in a train shedule

    public function bookingDetailsByScheduleId($data){
      $this->db->query('SELECT 
        firstClassBooked,
        secondClassBooked,
        thirdClassBooked,
        departureDate,
        departureTime,
        arrivalTime,
        firstCapacity,
        secondCapacity,
        thirdCapacity
      FROM 
          shedules
      JOIN
          trains ON trains.trainID = shedules.trainID
      WHERE 
        sheduleID = :scheduleID
      
      ');
      $this->db->bind(':scheduleID', $data['shID']);

      $result = $this->db->Single();
      return $result;
    }
    
    //update booked counts

    public function updateSeatsByScheduleId($data){
      $this->db->query('UPDATE shedules SET 
      firstClassBooked=firstClassBooked+:fcount,
      secondClassBooked=secondClassBooked+:scount,
      thirdClassBooked=thirdClassBooked+:tcount
  WHERE 
      sheduleID =:scheduleID ');

      $this->db->bind(':scheduleID', $data['sheduleId']);
      $this->db->bind(':fcount', $data['1count']);
      $this->db->bind(':scount', $data['2count']);
      $this->db->bind(':tcount', $data['3count']);

      $this->db->execute();
    }
    // ## View All Tickets of a User

    public function viewAllTicketsByUser($id){
      $this->db->query("SELECT u.name AS userName,b.bookingTime,t.name,s.departureDate,s.departureTime,b.bookingId,tp.classID ,
      st1.name AS depStation,
      st2.name AS arrStation 
      FROM `booking` AS b 
      JOIN `shedules` AS s ON s.sheduleID = b.sheduleId 
      JOIN `stations` AS st1 ON st1.stationID = s.departureStationID 
      JOIN `stations` AS st2 ON st2.stationID = s.arrivalStationID 
      JOIN `trains` AS t ON t.trainID=s.trainID 
      JOIN `users` AS u ON u.id=b.userId 
      JOIN `ticketprices` AS tp ON tp.ticketPriceID=b.ticketPriceID 
      WHERE b.userId =:userID
      ORDER BY `b`.`bookingId` DESC");

      $this->db->bind(':userID', $id);
      $results=$this->db->resultSet();
      return $results;

    }
    // ##Take lastly insert bookingId

    public function viewBookingId(){
      $this->db->query("SELECT bookingId FROM `booking` 
      ORDER BY `bookingId` DESC 
      LIMIT 1
      ");

      $result=$this->db->single();
      return $result;
    }

    //## Insert QR for bookingid(update)

    public function insertQrForBookingId($data){
      $this->db->query("UPDATE `booking` SET `qrId`=:qrid WHERE `bookingId`=:bid ");

      $this->db->bind(':bid', $data['bId']);
      $this->db->bind(':qrid', $data['qrId']);

      $this->db->execute();
    }

    // ## Viw ticketId according to sheduleId and Class

    public function viewTicketId($data){
      $this->db->query("SELECT `ticketPriceID` FROM `ticketprices` WHERE `classID`=:class AND `departureStationID`=:depSta AND `arrivalStationID`=:arrSta;");
      $this->db->bind(':class', $data['class']);
      $this->db->bind(':depSta', $data['dStation']);
      $this->db->bind(':arrSta', $data['aStation']);

      $results=$this->db->single();
      return $results;

    }


    // ## View Two End station according to stationId
    public function viewTwoEndStationBySheduleId($data){
      $this->db->query("SELECT `departureStationID`,`arrivalStationID` FROM `shedules` WHERE sheduleID=:shId ");
       $this->db->bind(':shId', $data['sheduleId']);

      $results=$this->db->single();
      return $results;
    }

    // ## Adding BookingId

    public function addBookingId($data2){
      $this->db->query("INSERT INTO `booking`(`sheduleId`, `ticketPriceID`, `userId`, `paymentId`) 
      VALUES 
      (:sheduleId,
       :tId,
       :userid,
       :paymentId)
      
      ");
       $this->db->bind(':sheduleId', $data2['scheduleId']);
       $this->db->bind(':tId', $data2['ticketId']);
       $this->db->bind(':userid', $data2['user_id']);
       $this->db->bind(':paymentId', $data2['paymentId']);

       $this->db->execute();
    }

    // ## get booking tickets by userId

    public function getTicketsBySheduleId($data){
      $this->db->query("SELECT u.name AS userName,t.name,s.departureDate,s.departureTime,s.arrivalTime,b.class,st1.name AS depStation,st2.name AS arrStation
      FROM `booking` AS b 
      JOIN `shedules` AS s ON s.sheduleID = b.sheduleId 
      JOIN `stations` AS st1 ON st1.stationID = s.departureStationID 
      JOIN `stations` AS st2 ON st2.stationID = s.arrivalStationID
      JOIN `trains` AS t ON t.trainID=s.trainID 
      JOIN `users` AS u ON u.id=b.userId
      WHERE b.userId = :userID AND s.sheduleID=:shId ");
      // -- WHERE b.userId = :userId ");

      $this->db->bind(':userID', $data['userId']);
      $this->db->bind(':shId', $data['sheduleId']);

       $results=$this->db->resultSet();
       return $results;
  
    }
    // //## get station name using staion id
    // public function getStationName($id){
    //   $this->db->query('SELECT name FROM `stations` WHERE stationID=:id');
    //   $this->db->bind(':id', $id);
    // }

    // ## view ticket by using id

    public function viewTicketByBookingId($id){
      $this->db->query('SELECT u.name AS userName,t.name,b.qrId,s.departureDate,s.departureTime,s.arrivalTime,tp.classID,tp.price,
       CASE 
           WHEN tp.classID = 1 THEN "1st Class"
           WHEN tp.classID = 2 THEN "2nd Class"
           WHEN tp.classID = 3 THEN "3rd Class"
       END AS className,
      st1.name AS depStation,
      st2.name AS arrStation
      FROM `booking` AS b 
      JOIN `shedules` AS s ON s.sheduleID = b.sheduleId 
      JOIN `stations` AS st1 ON st1.stationID = s.departureStationID 
      JOIN `stations` AS st2 ON st2.stationID = s.arrivalStationID
      JOIN `trains` AS t ON t.trainID=s.trainID 
      JOIN `users` AS u ON u.id=b.userId
      JOIN `ticketprices` AS tp ON tp.ticketPriceID=b.ticketPriceID 
      WHERE b.bookingId= :bId');

      $this->db->bind(':bId', $id);
      // $this->db->bind(':userID', $_SESSION['user_id']);

      $result = $this->db->single();
      return $result;
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