<?php
  class Supporters extends Controller {

    public function __construct() {
      if(!isLoggedIn()){
        redirect('users/login');
      }

      $this->adminModel = $this->model('Admin');
      $this->sheduleModel = $this->model('Shedule');
      $this->supporterModel = $this->model('Supporter');
      $this->passengerModel = $this->model('Passenger');
      $this->userModel = $this->model('User');
      $this->chatModel = $this->model('Chat');
    }

    public function dashboard(){
      $this->view('c-support-db/c-support');
    }

    public function settings() {
      if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $supDetails = $this->supporterModel->getUserData($_SESSION['user_id']);

        $data = [
          'id' => $_SESSION['user_id'],
          'nic' => $_SESSION['user_nic'],
          'fname' => trim($_POST['fname']),
          'lname' => trim($_POST['lname']),
          'email' => trim($_POST['email']),
          'phone' => trim($_POST['phone']),
          'oldPassword' => trim($_POST['oldPassword']),
          'newPassword' => trim($_POST['newPassword']),
          'confirmPassword' => trim($_POST['confirmPassword']),
          'img' => $supDetails->userImage,
          'id_err' => '',
          'fname_err' => '',
          'lname_err' => '',
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

        if(empty($data['fname'])){
          $data['fname'] = $supDetails->fname;
        } 

        if(empty($data['lname'])){
          $data['lname'] = $supDetails->lname;
        } 

        if(empty($data['phone'])){
          $data['phone'] = $supDetails->phone;
        } else {
          if(strlen($data['phone']) < 10){
            $data['phone_err'] = "Please enter valid phone number";
          }
        }
        
        if(empty($data['email'])){
          $data['email'] = $supDetails->email;
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

        if(!empty($_FILES['image']['name'])){
          if($_FILES['image']['error'] === UPLOAD_ERR_OK){
            $uploadDir = PICTURE.'pics/userPics/';
            $userDir = $uploadDir . $_SESSION['user_id'] . '/';
            $tempName = $_FILES['image']['tmp_name'];
            $originalName = $_FILES['image']['name'];
            $imageFileType = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));

            if (!file_exists($userDir)) {
              mkdir($userDir, 0777, true); // Create directory recursively
            }

            // Generate unique filename
            $uniqueFileName = uniqid('', true) . '.' . $imageFileType;
            $uploadPath = $userDir . $uniqueFileName;

            // Move uploaded file to new location
            if (move_uploaded_file($tempName, $uploadPath)) {
              // File upload successful, update database with image path
              $data['img'] = $_SESSION['user_id'] . '/' . $uniqueFileName; 
              $_SESSION['user_image'] = $_SESSION['user_id'] . '/' . $uniqueFileName; 
            } else {
              $data['img_err'] = 'Failed to move uploaded file.';
            }
          } else {
            $data['img_err'] = 'File upload error: ' . $_FILES['image']['error'];
          }
        }

        if(empty($data['email_err']) && empty($data['fname_err']) && empty($data['lname_err']) && empty($data['phone_err']) && empty($data['newPassword_err']) && empty($data['confirmPassword_err']) && empty($data['oldPassword_err'])){
            
          
          // Hash Password
          if(!empty($data['oldPassword']) && !empty($data['newPassword']) && !empty($data['confirmPassword'])){
            $data['newPassword'] = password_hash($data['newPassword'], PASSWORD_DEFAULT);
          } else {
            if(empty($data['newPassword'])){
              $user = $this->supporterModel->getSupporter($_SESSION['user_id']);
              $data['newPassword'] = $user->password;
            }
          }

          $_SESSION['user_fname'] = $data['fname'];
          $_SESSION['user_lname'] = $data['lname'];
          
          //Update Admin details
          if($this->adminModel->editAdminDetails($data)){
            redirect('supporters/settings');
          } else {
            die('something went wrong');
          }
        } else {

          $data['phone_err_value'] = $data['phone'];
          $data['email_err_value'] = $data['email'];
          $data['oldPassword_err_value'] = $data['oldPassword'];
          $data['newPassword_err_value'] = $data['newPassword'];
          $data['confirmPassword_err_value'] = $data['confirmPassword'];
          $data['fname'] = $supDetails->fname;
          $data['lname'] = $supDetails->lname;
          $data['email'] = $supDetails->email;
          $data['phone'] = $supDetails->phone;
          $data['image'] = $supDetails->userImage;

          // Load view with errors
          $this->view('c-support-db/settings', $data);
        }



      } else {

        $supDetails = $this->supporterModel->getUserData($_SESSION['user_id']);

        $data = [
          'id' => $_SESSION['user_id'],
          'nic' => $_SESSION['user_nic'],
          'fname' => $supDetails->fname,
          'lname' => $supDetails->lname,
          'phone' => $supDetails->phone,
          'email' => $supDetails->email,
          'image' => $supDetails->userImage,
          'fname_err' => '',
          'lname_err' => '',
          'email_err' => '',
          'phone_err' => '',
          'oldPassword_err' => '',
          'newPassword_err' => '',
          'confirmPassword_err' => ''
        ];
        $this->view('c-support-db/settings',$data);
      }
      
    }

    public function support(){
      $this->view('c-support-db/liveChat');
    }

    public function users(){
      $users = $this->adminModel->getUser();
      $data = [
        'users' => $users
      ];
      $this->view('c-support-db/c-users',$data);
    }

    public function feedbacks(){
      $feedback = $this->passengerModel->getFeedbacks();
      $data = ['feedback' => $feedback];
      $this->view('c-support-db/feedback',$data);
    }

    public function shedules(){
      $shedules = $this->supporterModel->getAvailableShedules();
      $stations = $this->adminModel->getStation();
      $data = [
        'shedules' => $shedules,
        'stations' => $stations
      ];
      $this->view('c-support-db/shedules',$data);
    }

    public function getuserfeedback($id){
      $userFeedback = $this->adminModel->getuserfeedback($id);
      $data = ['feedback' => $userFeedback];
      $this->view('c-support-db/feedback',$data);
    }

    public function getuserFineDetails($id){
      $results = $this->adminModel->getuserFineDetails($id);
      $data = ['userFineDetails' => $results];
      $this->view('c-support-db/userFines',$data);     
    }

    public function getuserTravelDetails($id){
      $results = $this->adminModel->getuserTravelDetails($id);
      $data = ['userTravelDetails' => $results];
      $this->view('c-support-db/userTravelDetails',$data);
    }

    public function deactivateUsers(){
      $users = $this->adminModel->getBlockedUser();
      $data = [
        'users' => $users
      ];
      $this->view('c-support-db/hideUsers',$data);
    }

    public function searchUser($nic){
      $users = $this->adminModel->searchUser($nic);
      $data = [
        'users' => $users
      ];

      if($users[0]->status == 1){
        $this->view('c-support-db/c-users',$data);
      } else {
        $this->view('c-support-db/hideUsers',$data);
      }
    }

    public function deactivatedShedules(){
      $shedules = $this->supporterModel->deactivatedShedules();
      $stations = $this->adminModel->getStation();
      $data = [
        'shedules' => $shedules,
        'stations' => $stations
      ];
      $this->view('c-support-db//hideShedules',$data);
    }

    public function getScheduleByID($id){
      $result = $this->adminModel->findShedulebySheduleId($id);
      $data =[
        'shedules' => $result
      ];
      if(!$data['shedules']){
        $this->view('c-support-db/shedules',$data);
      }else if($result[0]->sheduleValidity == 1){
        $this->view('c-support-db/shedules',$data);
      } else if($result[0]->sheduleValidity == 0){
        $this->view('c-support-db/hideShedules',$data);
      }  
    }

    public function getSchedules(){
      $result = $this->supporterModel->getSchedules($_GET['dep'],$_GET['arr'],$_GET['date']);
      $data =[
        'shedules' => $result
      ];
      if(!$data['shedules']){
        $this->view('c-support-db/shedules',$data);
      }else if($result[0]->sheduleValidity == 1){
        $this->view('c-support-db/shedules',$data);
      } else if($result[0]->sheduleValidity == 0){
        $this->view('c-support-db/hideShedules',$data);
      }  
    }
// ## Add Booking

public function addBooking($id){
  $stations=$this->adminModel->getStation();
  // $schedules = $this->passengerModel->searchSchedule($data);
  
  $data=[
    'stations'=>$stations,
    'schedules' => [],
    'uId'=>$id
  ];

  $this->view('c-support-db/shedule',$data);
}

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
      'stations'=>''
      
    ];
    $stations=$this->adminModel->getStation();
    $schedules = $this->passengerModel->searchSchedule($data);
    $data = ['stations'=>$stations,
            'schedules' => $schedules,
            'uId'=>trim($_POST['uId'])];

    $this->view('c-support-db/shedule',$data);
    
  }
}

public function getTrainDetails(){
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
    $data=[
      'tID'=>trim($_POST['tId']),
      'way'=>trim($_POST['way']),
      'dDate'=>trim($_POST['dDate']),
      'shID'=>trim($_POST['schedule_id'])
    ];
    // echo $data['shID'];
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
      'shId'=>trim($_POST['schedule_id']) ,
      'uId'=>trim($_POST['uId'])
    ];

    $this->view('c-support-db/booking',$data);
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
      'userId' => trim($_POST['uId']),
      // 'paymentId' => 'P0001'
      
    ];

  //  print_r ($data);
  $result=$this->passengerModel->viewTwoEndStationBySheduleId($data);
  $class1=['dId'=>$result->departureStationID,
            'aId'=>$result->arrivalStationID,
            'cId'=>1];
  $class2=['dId'=>$result->departureStationID,
            'aId'=>$result->arrivalStationID,
            'cId'=>2];
  $class3=['dId'=>$result->departureStationID,
            'aId'=>$result->arrivalStationID,
            'cId'=>3];
  $fPrice=$this->passengerModel->ticketPricesByClass($class1);
  $sPrice=$this->passengerModel->ticketPricesByClass($class2);
  $tPrice=$this->passengerModel->ticketPricesByClass($class3);

  // echo $data['userId'];

  $total=($fPrice->price)*(int)($data['1count'])+($sPrice->price)*(int)($data['2count'])+($tPrice->price)*(int)($data['3count']);
  $walletBalance = $this->passengerModel->getWalletBalnce($data['userId']);
  $newBalance = ($walletBalance->balance - $total);
    
  if($total<=$walletBalance->balance){

    $trainDetails = $this->passengerModel->bookingDetailsByScheduleId($data);
    $fFree= $trainDetails->firstCapacity-$trainDetails->firstClassBooked;
    $sFree= $trainDetails->secondCapacity-$trainDetails->secondClassBooked;
    $tFree= $trainDetails->thirdCapacity-$trainDetails->thirdClassBooked;

    if ($fFree >= $fcount && $sFree >= $scount && $tFree >= $tcount) {
      $this->passengerModel->updateSeatsByScheduleId($data);

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

          // echo $data4['paymentId'];

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
        $data=['uId'=>$data4['user_id'],
        'newBalance'=>$newBalance];
 $this->passengerModel->updateBalance($data) ; 
    redirect('supporters/dashboard');
  } else {
      echo 'Enter Valid Number of Seats '; // or any other status message you want
  }       
}else{
  echo 'User wallet balance is not sufficient ';
}
}
}

// ## View Bookings by UserId

public function getuserBookings(){
    $results = $this->adminModel->getuserBookings($id);
    $data = ['userTravelDetails' => $results];
    $this->view('c-support-db/userTravelDetails',$data);
  }

  



    public function clearChat(){
      if($this->chatModel->clearChat($_SESSION['user_id'])){
        redirect('supporters/support');
      }   
    }

    public function getuserChatHistory($id){
      $chats = $this->chatModel->getChats($_SESSION['user_id'], $id);
      $data = ['messages' => $chats, 'passenger_id' => $id, 'sender_id'=>$_SESSION['user_id']];
      $this->view('c-support-db/chatHistory', $data);
    }


  }