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
      $this->db->bind(':fcount', $data['fcount']);
      $this->db->bind(':scount', $data['scount']);
      $this->db->bind(':tcount', $data['tcount']);

      $this->db->execute();
    }
  }