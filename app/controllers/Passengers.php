<?php
  class Passengers extends Controller{

    public function __construct() {
      if(!isLoggedIn()){
        redirect('users/login');
      }

      $this->passengerModel = $this->model('Passenger');
      $this->adminModel=$this->model('Admin');
      $this->sheduleModel=$this->model('Shedule');
    }

    public function dashboard(){
      $this->view('user/userdb');
    }

    public function shedule_list(){
     
      $this->view('user/shedule_list');
    }

    // ## Select Shedule ## 
    public function shedule(){
      $stations=$this->adminModel->getStation();
      // $schedules = $this->passengerModel->searchSchedule($data);
      
      $data=[
        'stations'=>$stations,
        'schedules' => []
      ];

      $this->view('user/shedule',$data);
    }

    //search Schedule
    public function searchSchedule(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'from' => trim($_POST['fromStation']),
          'to' => trim($_POST['toStation']),
          'date' => trim($_POST['date']),
          'stations'=>'',
        ];
        $stations=$this->adminModel->getStation();
        $schedules = $this->passengerModel->searchSchedule($data);
        $data = ['stations'=>$stations,
                'schedules' => $schedules];

        $this->view('user/shedule',$data);
        
      }
    }

    // ## Booking Seats ## 

    public function getTrainDetails(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        $data=[
          'shID'=>trim($_POST['schedule_id']) 
        ];
        
        $trainDetails = $this->passengerModel->bookingDetailsByScheduleId($data);
        
        $data=[
          'firstBooked'=>$trainDetails->firstClassBooked,
          'secondBooked'=>$trainDetails->secondClassBooked,
          'thirdBooked'=>$trainDetails->thirdClassBooked,
          'dDate'=>$trainDetails->departureDate,
          'dTime'=>$trainDetails->departureTime,
          'aTime'=>$trainDetails->arrivalTime,
          'trainName'=>trim($_POST['train_name']),
          'trainType'=>trim($_POST['train_type']),
          'departureStation'=>trim($_POST['departure_station']),
          'arrivalStation'=>trim($_POST['arrival_station'])
        ];

        $this->view('user/booking',$data);
        // die($data['arrivalStation']);
        
      };
      
    }

    //view feedback
    public function Feedbacks(){     
      $feedback = $this->passengerModel->getFeedbacks();
      $data = ['feedback' => $feedback];
      $this->view('user/feedback',$data);
    }

    //add feedback
    public function addFeedback(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'user_id' => $_SESSION['user_id'],
          'feedback' => trim($_POST['feedback']),
          'rating' => trim($_POST['rating']),
          'feedback_err' => '',
        ];

        if(empty($data['feedback'])){
          $data['feedback_err'] = "You can't submit the feddback form with empty";
        }

        if(empty($data['feedback_err'])) {

          if($this->passengerModel->addFeedback($data)){
            redirect('passengers/Feedbacks');
          } else {
            die('Something went wrong');
          }

        } else {
          // echo '<pre>';
          // var_dump($data);
          // echo '</pre>';
          $this->view('user/addfeedback',$data);
        }

      } else {
        // Init data
        $data =[
         'feedback' => '',
         'rating' => '',
         'feedback_err' => '',
       ];
 
       // Load view
       $this->view('user/addfeedback', $data);
     }
    }
  }