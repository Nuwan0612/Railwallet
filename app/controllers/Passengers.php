<?php
  class Passengers extends Controller{

    public function __construct() {
      if(!isLoggedIn()){
        redirect('users/login');
      }

      $this->passengerModel = $this->model('Passenger');

      $this->sheduleModel=$this->model('Shedule');

      $this->adminModel = $this->model('Admin');
      $this->userModel = $this->model('User');

    }

    public function wallet(){
      $this->view('user/wallet');
    }

    public function transaction(){
      $this->view('user/transaction');
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

        $from = isset($_POST['fromStation']) ? trim($_POST['fromStation']) : '';
        $to = isset($_POST['toStation']) ? trim($_POST['toStation']) : '';
        $date = isset($_POST['date']) ? trim($_POST['date']) : '';

        $data = [
          'from' => $from,
          'to' => $to,
          'date' => $date,
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
          'tID'=>trim($_POST['tId']),
          'way'=>trim($_POST['way']),
          'dDate'=>trim($_POST['dDate'])
        ];
        $time=$this->passengerModel->viewDtimeAtimeByScheduleId(trim($_POST['schedule_id']));
        $trainDetails = $this->passengerModel->bookingDetailsByScheduleId($data);

        // print_r($trainDetails);

        $fFree= $trainDetails->firstCapacity-$trainDetails->firstClassBooked;
        $sFree= $trainDetails->secondCapacity-$trainDetails->secondClassBooked;
        $tFree= $trainDetails->thirdCapacity-$trainDetails->thirdClassBooked;

        // echo $trainDetails->id;
        
        $data=[
          'fFree'=>$fFree,
          'sFree'=>$sFree,
          'tFree'=>$tFree,
          'avlbleId'=>$trainDetails->id,
          'dDate'=>trim($_POST['dDate']),
          'tID'=>trim($_POST['tId']),
          'way'=>trim($_POST['way']),
          'dTime'=>$time->departureTime,
          'aTime'=>$time->arrivalTime,
          'trainName'=>trim($_POST['train_name']),
          'trainType'=>trim($_POST['train_type']),
          'departureStation'=>trim($_POST['departure_station']),
          'arrivalStation'=>trim($_POST['arrival_station']),
          'shId'=>trim($_POST['schedule_id']) 
        ];

        $this->view('user/booking',$data);
        // // die($data['arrivalStation']);
        
      };
      
    }
    public function bookingTickets(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $fcount=trim($_POST['fClassCount']);
        $scount=trim($_POST['sClassCount']);
        $tcount=trim($_POST['tClassCount']);
        $avlbleId=trim($_POST['avlbleId']);
        $way=trim($_POST['way']);
        $tID=trim($_POST['tID']);

        // echo  $avlbleId;

        $data=[
          // 'shid'=>trim($_POST['schedule_id']), 
          'avlbleId'=>$avlbleId, 
          'tID'=> $tID,
          'way'=> $way,
          '1count'=>$fcount,
          '2count'=>$scount,
          '3count'=>$tcount,
          'sheduleId'=>trim($_POST['sheduleId']),
          'dDate'=>trim($_POST['dDate']),
          'userId' => $_SESSION['user_id'],
          // 'paymentId' => 'P0001'
          
        ];

      //  print_r ($data);

        $trainDetails = $this->passengerModel->bookingDetailsByScheduleId($data);
        $fFree= $trainDetails->firstCapacity-$trainDetails->firstClassBooked;
        $sFree= $trainDetails->secondCapacity-$trainDetails->secondClassBooked;
        $tFree= $trainDetails->thirdCapacity-$trainDetails->thirdClassBooked;

        if ($fFree >= $fcount && $sFree >= $scount && $tFree >= $tcount) {
          $this->passengerModel->updateSeatsByScheduleId($data);
      } else {
          echo 'Not Booked'; // or any other status message you want
      } 
          $result=$this->passengerModel->viewTwoEndStationBySheduleId($data);
          $data0=['depStation'=>$result->departureStationID,
                  'arrStation'=>$result->arrivalStationID];

        // Loop to prepare booking details based on the counts
        for ($i = 1; $i <= 3; $i++) {  // Assuming classes are represented as 1, 2, and 3
            $countKey = "{$i}count";
            $class = $i;
            $count = $data[$countKey];

            for ($j = 0; $j < $count; $j++) {
   
                $data2=[
                    'scheduleId' => $data['sheduleId'],
                    'dStation'=>$data0['depStation'],
                    'aStation'=>$data0['arrStation'],
                    'class' => $class,
                    'user_id' => $data['userId'],
                    // 'paymentId' => $data['paymentId']
                ];

                $data3=$this->passengerModel->viewTicketId($data2);
                $amount=$data3->price;
                $data2=[
                  'scheduleId' => $data['sheduleId'],
                  'dStation'=>$data0['depStation'],
                  'aStation'=>$data0['arrStation'],
                  'class' => $class,
                  'user_id' => $data['userId'],
                  'amount'=> $amount
                  // 'paymentId' => $data['paymentId']
              ];
                $transaction=$this->passengerModel->addingTransaction($data2);
                $result=$this->passengerModel->addingTrId($data2);  

                $data4=[
                  'scheduleId' => $data['sheduleId'],
                  'user_id' => $data['userId'],
                  'paymentId' => $result->tr_id,
                  'ticketId'=>$data3->ticketPriceID,
                  'amount'=> $amount
              ];

              $this->passengerModel->addBookingId($data4);
                $result= $this->passengerModel->viewBookingId();
                $bId=$result->bookingId;
                $qrId=$this->genarateQR($bId);
                // echo $bId;
              $data5=['bId'=>$bId,
                      'qrId'=>$qrId];
              $this->passengerModel->insertQrForBookingId($data5); 

              }
          } 
        
      }
      redirect('passengers/viewTicketsByUserId');
      
    }

    public function getUserTicektsBySheduleID($data){
      $tickets=$this->passengerModel->getTicketsBySheduleId($data);
        
        $data=['tickets'=>$tickets
      ];
      $this->view('user/ticket',$data);
    }

    // ## View Tickets By Userid

    public function viewTicketsByUserId(){
      $userId =$_SESSION['user_id'];
      $result=$this->passengerModel->viewAllTicketsByUser($userId);
      $data=['tickets'=>$result];
      $this->view('user/travelHis',$data);
    }

     // ## View Tickets By BookingId
    
     public function viewTicketByBookingId($bookingId){
        $result=$this->passengerModel->viewTicketByBookingId($bookingId);
        $data=['ticket'=>$result];

        $this->view('user/ticket',$data);
     
     }

    public function ticket(){
      $this->view('user/ticket');
    }

    //veiw feedback
    public function Feedbacks(){
      $feedback = $this->passengerModel->getFeedbacks();
      $data = ['feedback' => $feedback];
      // echo '<pre>';
      // var_dump($data);
      // echo '</pre>';
      $this->view('user/feedback/feedback',$data);
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
          $this->view('user/feedback/addfeedback',$data);
        }

      } else {
        // Init data
        $data =[
         'feedback' => '',
         'rating' => '',
         'feedback_err' => '',
       ];
 
       // Load view
       $this->view('user/feedback/addfeedback', $data);
     }
    }

    //settings
    public function settings(){
      $user = $this->passengerModel->getUserDetails($_SESSION['user_id']);
      
      $data = [
        'id' => $user->id,
        'name' => $user->name,
        'nic' => $user->nic,
        'phone' => $user->phone,
        'email' => $user->email,
        'name_err' => '',
        'email_err' => '',
        'phone_err' => '',
        'oldPassword_err' => '',
        'newPassword_err' => '',
        'confirmPassword_err' => '',

      ];
      $this->view('user/setting',$data);
    }

    //edit user details
    public function editUser(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){

        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'id' => $_SESSION['user_id'],
          'nic' => $_SESSION['user_nic'],
          'name' => trim($_POST['name']),
          'email' => trim($_POST['email']),
          'phone' => trim($_POST['phone']),
          'oldPassword' => trim($_POST['oldPassword']),
          'newPassword' => trim($_POST['newPassword']),
          'confirmPassword' => trim($_POST['confirmPassword']),
          'id_err' => '',
          'name_err' => '',
          'email_err' => '',
          'phone_err' => '',
          'oldPassword_err' => '',
          'newPassword_err' => '',
          'confirmPassword_err' => '',
          'email_err_value' => '',
          'phone_err_value' => '',
          'oldPassword_err_value' => '',
          'newPassword_err_value' => '',
          'confirmPassword_err_value' => ''
        ];

        $user = $this->passengerModel->getUserDetails($_SESSION['user_id']);

        if(empty($data['name'])){
          $data['name'] = $user->name;
        } 

        if(empty($data['phone'])){
          $data['phone'] = $user->phone;
        } else {
          if(strlen($data['phone']) < 10){
            $data['phone_err'] = "Please enter valid phone number";
          }
        }
        
        if(empty($data['email'])){
          $data['email'] = $user->email;
        } else {
          if($this->adminModel->findUserByEmail($data['email'],$_SESSION['user_id'])){
            $data['email_err'] = "Email is already registered";
          }
        }
        

        if(!empty($data['oldPassword']) || !empty($data['newPassword']) || !empty($data['confirmPassword'])){

          if(!$this->userModel->checkPassword($_SESSION['user_id'],$data['oldPassword'])){
            $data['oldPassword_err'] = 'Old passowrd does not match';
          }

          if($data['newPassword'] != $data['confirmPassword']) {
            $data['confirmPassword_err'] = 'Password does not match';
          }

          if(empty($data['oldPassword'])) {
            $data['oldPassword_err'] = "Please enter old password"; 
          }

          if(empty($data['newPassword'])) {
            $data['newPassword_err'] = "Please enter new password"; 
          }

          if(empty($data['confirmPassword'])) {
            $data['confirmPassword_err'] = "Please confirm password"; 
          }   
        }

        // Make sure errors are empty
        if(empty($data['email_err']) && empty($data['name_err']) && empty($data['phone_err']) && empty($data['newPassword_err']) && empty($data['confirmPassword_err']) && empty($data['oldPassword_err'])){
            
          
          // Hash Password
          if(!empty($data['oldPassword']) && !empty($data['newPassword']) && !empty($data['confirmPassword'])){
            $data['newPassword'] = password_hash($data['newPassword'], PASSWORD_DEFAULT);
          } else {
            if(empty($data['newPassword'])){
              $user = $this->adminModel->User();
              $data['newPassword'] = $user->password;
            }
          }
          
          //Update Admin details
          if($this->passengerModel->editPassengerDetails($data)){
            
            
            redirect('passengers/settings');
          } else {
            die('something went wrong');
          }
        } else {

          $data['phone_err_value'] = $data['phone'];
          $data['email_err_value'] = $data['email'];
          $data['oldPassword_err_value'] = $data['oldPassword'];
          $data['newPassword_err_value'] = $data['newPassword'];
          $data['confirmPassword_err_value'] = $data['confirmPassword'];
          $data['name'] = $user->name;
          $data['email'] = $user->email;
          $data['phone'] = $user->phone;

          // Load view with errors
          $this->view('user/setting', $data);
        }

      } else {
        $user = $this->passengerModel->getUserDetails($userId);

        $data = [
          'id' => $user->id,
          'name' => $user->name,
          'nic' => $user->nic,
          'phone' => $user->phone,
          'email' => $user->email,
  
        ];
        $this->view('user/setting',$data);
      }
    }

    /*================================================================================================================================
                                                            QR SCAN PROCESS
    ================================================================================================================================*/

    //Scan qrcode
      public function qrScan() {
        $stations = $this->adminModel->getStation();
        $classes = $this->adminModel->getClasses();
        $data = [
          'stations' => $stations,
          'classes' => $classes
        ];
        $this->view('user/scanQR',$data);
      }

    //check ticket before Scan
      public function checkTicketBeforeScan() {
        
        $inputJSON = file_get_contents('php://input');
        $requestData = json_decode($inputJSON, true);

        $departureStation = $requestData['depID'] ?? null;
        $arrivalStation = $requestData['arrID'] ?? null;
        $trainClass = $requestData['class'] ?? null;

        $ticketAvailable = $this->passengerModel->checkTicketAvailability($departureStation, $arrivalStation, $trainClass);
        $walletBalance = $this->passengerModel->getWalletBlance($_SESSION['user_id']);

        $responseData = '';

        if(!$ticketAvailable){
          $responseData = array(
            'success' => false
          );

        } else if($ticketAvailable->price > $walletBalance->balance) {
            $responseData = array(
              'success' => $ticketAvailable->ticketPriceID,
              'wallet' => false
            );
        } else {
          $responseData = array(
            'success' => $ticketAvailable->ticketPriceID,
            'wallet' => true
          );
        }

        // Send JSON response
        header('Content-Type: application/json');
        echo json_encode($responseData);
      }

    //add Journey
    public function StartJourney(){
      $inputJSON = file_get_contents('php://input');
      $requestData = json_decode($inputJSON, true);

      $data = [
        "depStation" => $requestData["depID"],
        "arrStation" => $requestData["arrID"],
        "ticket_id" => $requestData["ticket"],
        "passenger_id" => $_SESSION["user_id"]
      ];

      $responseData = false;

      if($current = $this->passengerModel->getCurrentJourney($data['passenger_id'])) {
        $data = [
          'depStationName' => $this->adminModel->findStationByStationID($current->depStation)[0]->name,
          'arrStationName' => $this->adminModel->findStationByStationID($current->arrStation)[0]->name,
          'ticketClass' => $this->adminModel->getTicketClass($current->ticket_id)
        ];
        
        $responseData = array(
          'unfinished' => $data
        );
      } else {
        if($this->passengerModel->addJourney($data)){
          $current = $this->passengerModel->getCurrentJourney($data['passenger_id']);
          if($this->passengerModel->addJourneyQrCode($this->genarateQR($current->id),$current->id) && $this->passengerModel->updateWallet($current->ticket_id, $current->passenger_id)){
            $responseData = array(
              'success' => true
            );
          }
        }
      }

      header('Content-Type: application/json');
      echo json_encode($responseData);

    }

    //end Journey
    public function endJourney(){
      $inputJSON = file_get_contents('php://input');
      $requestData = json_decode($inputJSON, true);

      $responseData = false;

      $depID = $requestData["depID"];
      $arrID = $requestData["arrID"];
      $ticket = $requestData["ticket"];

      $current = $this->passengerModel->getCurrentJourney($_SESSION['user_id']);
        
      if($depID == $current->depStation && $arrID == $current->arrStation && $ticket == $current->ticket_id){
        if($this->passengerModel->endJourney($current->id)){
          $responseData = array(
            'success' => true,
          );
        } 
      } else {
        $data = [
          'depStationName' => $this->adminModel->findStationByStationID($current->depStation)[0]->name,
          'arrStationName' => $this->adminModel->findStationByStationID($current->arrStation)[0]->name,
          'ticketClass' => $this->adminModel->getTicketClass($current->ticket_id)
        ];
        $responseData = array(
          'unfinished' => $data
        );
      }

      header('Content-Type: application/json');
      echo json_encode($responseData);
    }
  }
