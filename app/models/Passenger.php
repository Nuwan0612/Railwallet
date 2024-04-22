<?php 
  class Passenger {
    private $db;

    public function __construct() {
      $this->db = new Database;
    }
    
    //get Recent fine
    public function getRecentFines($id) {
      $this->db->query("SELECT fine_amount FROM fines WHERE passenger_id = :id ORDER BY fine_id DESC LIMIT 1");
      $this->db->bind(':id',$id);
      $result = $this->db->single();
      return $result;
    }

    //get total fines
    public function getTotalFines($id){
      $this->db->query("SELECT SUM(fine_amount) AS totalFine FROM fines WHERE passenger_id = :id");
      $this->db->bind(':id',$id);
      $result = $this->db->single();
      return $result;
    } 

    //get wallet balance
    public function getWalletBalnce($id){
      $this->db->query("SELECT * FROM wallet WHERE passenger_id = :id");
      $this->db->bind(':id',$id);
      
      $result = $this->db->single();
      return $result;
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
                          us.fname,
                          us.lname,
                          us.email,
                          us.userImage,
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
                            shedules.way,
                            shedules.departureDate,
                            shedules.trainID,
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
    // ## Get  dTime and Atime
    public Function viewDtimeAtimeByScheduleId($id){
      $this->db->query('SELECT departureTime,arrivalTime FROM `shedules` WHERE sheduleID=:shId');
      $this->db->bind(':shId',$id);
      $result=$this->db->Single(); 
      return $result;
    }

    // get available train seats in a train shedule
    public function bookingDetailsByScheduleId($data){
      $this->db->query('SELECT a.firstClassBooked, a.secondClassBooked, a.thirdClassBooked, a.date,a.id, t.firstCapacity, t.secondCapacity, t.thirdCapacity 
      FROM avlbleseats a 
      JOIN trains t ON t.trainID = a.trainID 
      WHERE a.trainID =:tId AND date=:date AND way=:way;
      ');
      $this->db->bind(':tId', $data['tID']);
      $this->db->bind(':date', $data['dDate']);
      $this->db->bind(':way', $data['way']);

      $result = $this->db->Single();
      return $result;
    }
    
    //update booked counts
    public function updateSeatsByScheduleId($data){
      $this->db->query('UPDATE avlbleseats 
      SET firstClassBooked=firstClassBooked+:fcount, 
          secondClassBooked=secondClassBooked+:scount, 
          thirdClassBooked=thirdClassBooked+:tcount 
          WHERE id=:avlbleId;
      ');

      $this->db->bind(':fcount', $data['1count']);
      $this->db->bind(':scount', $data['2count']);
      $this->db->bind(':tcount', $data['3count']);
      $this->db->bind(':avlbleId', $data['avlbleId']);

      $this->db->execute();
    }
    // ## View All Tickets of a User

    public function viewAllTicketsByUser($id){
      $this->db->query("SELECT u.fname,u.lname,b.bookingTime,t.name,s.departureDate,s.departureTime,b.bookingId,tp.classID ,
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
      $this->db->query("SELECT `ticketPriceID`,`price` FROM `ticketprices` WHERE `classID`=:class AND `departureStationID`=:depSta AND `arrivalStationID`=:arrSta;");
      $this->db->bind(':class', $data['class']);
      $this->db->bind(':depSta', $data['dStation']);
      $this->db->bind(':arrSta', $data['aStation']);

      $results=$this->db->single();
      return $results;

    }
    // ## Take ticket prices
    public function ticketPricesByShedule(){
      $this->db->query("SELECT `departureStationID`,`arrivalStationID` FROM `shedules` WHERE sheduleID=:shId ");
       $this->db->bind(':shId', $data['sheduleId']);
    }

    // ## Take Ticket Prices By class
    public function ticketPricesByClass($data){
      $this->db->query("SELECT price 
      FROM `ticketprices` 
      WHERE departureStationID=:dId
      AND arrivalStationID=:aId 
      AND classID=:cId;
      ");
       $this->db->bind(':dId', $data['dId']);
       $this->db->bind(':aId', $data['aId']);
       $this->db->bind(':cId', $data['cId']);

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
      $this->db->query('SELECT u.fname,u.lname,t.name,b.qrId,s.departureDate,s.departureTime,s.arrivalTime,tp.classID,tp.price,
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
// ## update transaction table
    public function addingTransaction($data){
      $this->db->query("INSERT INTO transactions( user_id, reason,amount) VALUES (:uid,'Booking',:amount);");
    
      $this->db->bind(':uid', $data['user_id']);
      $this->db->bind(':amount', $data['amount']);

      $this->db->execute();
     

    }

// ## take recent booking tr_id

public function addingTrId($data){
  $this->db->query("SELECT * FROM `transactions` WHERE user_id=:uid AND reason='Booking' ORDER BY `transactions`.`date` DESC LIMIT 1;
  ");
  $this->db->bind(':uid', $data['user_id']);

  $result= $this->db->Single();
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
      $this->db->query('UPDATE users SET fname = :fname, lname = :lname, email = :email, phone = :phone, password = :newPassword, userImage = :img WHERE id = :id');
      $this->db->bind(':fname', $data['fname']);
      $this->db->bind(':lname', $data['lname']);
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':phone', $data['phone']);
      $this->db->bind(':img', $data['img']);
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

    // *Recharge wallet*
    public function walletRecharge($id){
      $this->db->query("SELECT transaction_id 
      FROM topupdetails 
      WHERE user_id = :id
      ORDER BY transaction_id DESC 
      LIMIT 1;
      ");
      $this->db->bind(':id', $id);
      $result = $this->db->single();
      return $result;
    }

    // *Update wallet amount*
    public function updateAmount($data){
      $this->db->query("INSERT INTO `topupdetails`( `user_id`, `amount`) VALUES (:uid,:amount);");
      $this->db->query("INSERT INTO `transactions`( `user_id`, `reason`,`amount`) VALUES (:uid,'recharge',:amount);");
      $this->db->bind(':uid', $data["uid"]);
      $this->db->bind(':amount', $data["amount"]);
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }


    public function getNoCompletedFines($id){
      $this->db->query('SELECT * FROM fines WHERE passenger_id = :id AND payment_status = 0');
      $this->db->bind(':id', $id);
      $result = $this->db->single();
      return $result;
    }

    // *Fine Details*
    public function viewFineDetails($id){
      $this->db->query("SELECT *, DATE(fine_date) AS fineDate FROM `fines` WHERE passenger_id=:id;");
      $this->db->bind(':id', $id);
      $result=$this->db->resultSet();
      return $result;
    }

    // *Booking details*
    public function viewBookingDetail($id){
      $this->db->query("SELECT * FROM `booking` WHERE userId=:id;");
      $this->db->bind(':id', $id);
      $result=$this->db->resultSet();
      return $result;
    }

    // *Journey details*
    public function viewJourneyDetail($id){
      $this->db->query("SELECT * FROM `journey` WHERE passenger_id=:id;");
      $this->db->bind(':id', $id);
      $result=$this->db->resultSet();
      return $result;
    }

    // *Recharge details*
    public function viewRechargeDetails($id){
      $this->db->query("SELECT * FROM `topupdetails` WHERE user_id=:id;");
      $this->db->bind(':id', $id);
      $result=$this->db->resultSet();
      return $result;
    }

    // *View transaction history*
    public function viewTransactionHistory($id){
      $this->db->query("SELECT * FROM `transactions` WHERE user_id=:id ORDER BY `transactions`.`date` DESC LIMIT 5;");
      $this->db->bind(':id', $id);
      $result=$this->db->resultSet();
      return $result;
    }

    // *View all transaction history*
    public function viewAllTransactionHistory($id){
      $this->db->query("SELECT * FROM `transactions` WHERE user_id=:id ORDER BY `transactions`.`date` DESC;");
      $this->db->bind(':id', $id);
      $result=$this->db->resultSet();
      return $result;
    }


  }