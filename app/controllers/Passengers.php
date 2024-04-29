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
      $this->stationModel = $this->model('Station');

    }

    public function viewJourney(){
      $result = $this->passengerModel->getJourney($_SESSION['user_id']);
      $data = ['journey' => $result];
      // print_r($data);
      $this->view('user/journey',$data);
    }

    // *Wallet dashboard*
    public function wallet(){

      // *Transaction History*
      $result = $this->passengerModel->viewTransactionHistory($_SESSION["user_id"]);
      $walletBalance = $this->passengerModel->getWalletBalnce($_SESSION["user_id"]);
      $result1 = $this->passengerModel->viewChart($_SESSION["user_id"]); 
      $spents = $this->passengerModel->getTotalSpends($_SESSION["user_id"]);

      // echo $_SESSION["user_id"];
      $data = [
        'transactions'=>$result,
        'balance' => $walletBalance,
        'chart'=>$result1,
        'spents' => $spents
      ];
      //print_r($data['chart']);

      $this->view('user/wallet',$data);
    }

    // *Transaction history dashboard*
    public function transactionHistory(){
      $result = $this->passengerModel->viewAllTransactionHistory($_SESSION["user_id"]);
      $data = ['transactions'=>$result];

      $this->view('user/transaction-history',$data);
    }


    // *Update wallet transactions*
    public function updateTransaction($details){
      $data = ["uid"=>$_SESSION["user_id"],
                "amount"=>$details];

      // chart
      // $result1 = $this->passengerModel->viewChart($_SESSION["user_id"]);
      // $data = ['chart'=>$result1];
      // print_r($result1);
    
      $result = $this->passengerModel->updateWalletBalance($data);
      $result1 = $this->passengerModel->updateTransaction($data);

      if($result){
        $resons = [
          'uid' => $_SESSION["user_id"],
          'reason' => 'Wallet successfully topped up by Rs. '.$details.' on '.date('Y-m-d').' at '.date('H:i:s')
        ];
        $this->passengerModel->updateNotification($resons);
      }

      $result2 = $this->passengerModel->viewTr($_SESSION["user_id"]);
      $result3= $this->passengerModel->viewWalletBalnce($_SESSION["user_id"]);
      $data=['trId'=>$result2->tr_id,
              'uId'=>$_SESSION["user_id"],
              'balance'=>$result3->balance];
      $this->passengerModel->insertBalanceTable($data);

      if ($result&&$result1){
        redirect("passengers/wallet");
      }
      
    }

    // *Transaction Dashboard*
    public function transaction(){
      $result = $this->passengerModel->walletRecharge($_SESSION["user_id"]);

        if(empty($result)){
          $result = 1;
        } else {
          $result = $result->transaction_id + 1;
        }
        $data = ["transactions"=>$result];
        $this->view('user/transaction',$data);
      
    }

    // *Fine Details*
    public function fineDetails(){
      $result = $this->passengerModel->viewFineDetails($_SESSION["user_id"]);
      $walletBalance = $this->passengerModel->getWalletBalnce($_SESSION["user_id"]);
      $totalFines = $this->passengerModel->getTotalFines($_SESSION["user_id"]);
      $recentFine = $this->passengerModel->getRecentFines($_SESSION["user_id"]);
      $data=[
        'fines'=>$result,
        'balance' => $walletBalance,
        'total-fines' => $totalFines,
        'recent' => $recentFine
      ];
      $this->view('user/fine-details',$data);
    }

    // *Ticket dashboard*
    public function ticket(){
      $data = ['qrImage' => ''];

      if($qr = $this->passengerModel->getQRImage()){
        $data['qrImage'] = $qr->qr_code;
      }
      $this->view('user/viewQR', $data);
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
          'stations'=>''
          
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
          'dDate'=>trim($_POST['dDate']),
          'shID'=>trim($_POST['schedule_id'])
        ];
        // echo $data['shID'];
        $time=$this->passengerModel->viewDtimeAtimeByScheduleId(trim($_POST['schedule_id']));

        $trainDetails = $this->passengerModel->bookingDetailsByScheduleId($data);

        // print_r($trainDetails);

        $fFree= $trainDetails ? $trainDetails->firstCapacity : 0;
        $sFree= $trainDetails ? $trainDetails->secondCapacity : 0;
        $tFree= $trainDetails ? $trainDetails->thirdCapacity : 0;

        // echo $trainDetails->id;
        
        $data=[
          'fFree'=>$fFree,
          'sFree'=>$sFree,
          'tFree'=>$tFree,
          'avlbleId'=>$trainDetails ? $trainDetails->id : '',
          'dDate'=>trim($_POST['dDate']),
          'tID'=>trim($_POST['tId']),
          'way'=>trim($_POST['way']),
          'dTime'=>$time->departureTime,
          'aTime'=>$time->arrivalTime,
          'trainName'=>trim($_POST['train_name']),
          'trainType'=>trim($_POST['train_type']),
          'departureStation'=>trim($_POST['departure_station']),
          'arrivalStation'=>trim($_POST['arrival_station']),
          'sheduleId'=>trim($_POST['schedule_id']),
          'error_details' => '' 
        ];

        $this->view('user/booking',$data);
        // // die($data['arrivalStation']);
        
      };
      
    }

    public function bookingTickets(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $fcount=trim($_POST['fClassCount']);
       // echo $fcount;
        $scount=trim($_POST['sClassCount']);
        $tcount=trim($_POST['tClassCount']);
        $avlbleId=trim($_POST['avlbleId']);
        $way=trim($_POST['way']);
        $tID=trim($_POST['tID']);
        $fFree=trim($_POST['fFree']);
        $sFree=trim($_POST['sFree']);
        $tFree=trim($_POST['tFree']);
        $dTime=trim($_POST['dTime']);
        $dDate=trim($_POST['dDate']);
        $aTime=trim($_POST['aTime']);
        $trainName=trim($_POST['trainName']);
        $trainType=trim($_POST['trainType']);
        $departureStation=trim($_POST['departureStation']);
        $arrivalStation=trim($_POST['arrivalStation']);

        // echo  $avlbleId;

        $data=[
          'fFree'=>$fFree, 
          'sFree'=>$sFree, 
          'tFree'=>$tFree, 
          'dTime'=>$dTime, 
          'dDate'=>$dDate, 
          'aTime'=>$aTime, 
          'trainName'=>$trainName,
          'trainType'=>$trainType, 
          'departureStation'=>$departureStation,  
          'arrivalStation'=>$arrivalStation,
          'avlbleId'=>$avlbleId, 
          'tID'=> $tID,
          'way'=> $way,
          '1count'=>$fcount,
          '2count'=>$scount,
          '3count'=>$tcount,
          'sheduleId'=>trim($_POST['sheduleId']),
          'dDate'=>trim($_POST['dDate']),
          'userId' => $_SESSION['user_id'],
          'message' => '',
          'error_details'=>''
          
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

      // echo $data['1count'];
      $first = $fPrice ? $fPrice->price : 0;
      $second = $sPrice ? $sPrice->price : 0;
      $third = $tPrice ? $tPrice->price : 0;

      $total=(float)(($first)*(int)($data['1count'])+($second)*(int)($data['2count'])+($third)*(int)($data['3count']));
      $walletBalance = $this->passengerModel->getWalletBalnce($_SESSION["user_id"]);
       
      $newBalance = ($walletBalance->balance - $total);
      // echo $newBalance;
      if(empty($fcount) && empty($scount) && empty($tcount) ){
        $message = 'Please enter valid seat numbers';
    } else {
      if($total<=$walletBalance->balance){

        $trainDetails = $this->passengerModel->bookingDetailsByScheduleId($data);
        $fFree= $trainDetails ? $trainDetails->firstCapacity : 0;
        $sFree= $trainDetails ? $trainDetails->secondCapacity : 0;
        $tFree= $trainDetails ? $trainDetails->thirdCapacity : 0;


        if ($fFree >= $fcount && $sFree >= $scount && $tFree >= $tcount && ($fcount!=0 || $scount!=0 ||$tcount!=0)) {
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
                $x=$this->passengerModel->getWalletBalnce($data2['user_id']);
                $cBalance=$x->balance-$amount; 
                $this->passengerModel->updateBalance($data2['user_id'],$cBalance);  
                $this->passengerModel->addBalanceTable($data2['user_id'],$result->tr_id,$cBalance,);
                
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
      } else {
        $data['error_details'] = 'Please enter valid seat numbers';
      }       
        }else{
          $data['error_details'] = 'User Wallet Balance is not sufficent.';
        }
      }

      if(empty($data['error_details'])){
        redirect('passengers/wallet');
      } else {
        
        $this->view('user/booking', $data);
      }

      }

        
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

    //veiw feedback
    public function Feedbacks(){
      $feedback = $this->passengerModel->getFeedbacks();
      $data = ['feedback' => $feedback];
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
        'fname' => $user->fname,
        'lname' => $user->lname,
        'nic' => $user->nic,
        'phone' => $user->phone,
        'email' => $user->email,
        'image' => $user->userImage,
        'fname_err' => '',
        'lname_err' => '',
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

        $user = $this->passengerModel->getUserDetails($_SESSION['user_id']);
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

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
          'img' => $user->userImage,
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
          $data['fname'] = $user->fname;
        } 
        if(empty($data['lname'])){
          $data['lname'] = $user->lname;
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

        if (!empty($_FILES['image']['name'])) {
          if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
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

        // Make sure errors are empty
        if(empty($data['email_err']) && empty($data['fname_err']) && empty($data['lname_err']) && empty($data['phone_err']) && empty($data['newPassword_err']) && empty($data['confirmPassword_err']) && empty($data['oldPassword_err'])){
            
          
          // Hash Password
          if(!empty($data['oldPassword']) && !empty($data['newPassword']) && !empty($data['confirmPassword'])){
            $data['newPassword'] = password_hash($data['newPassword'], PASSWORD_DEFAULT);
          } else {
            if(empty($data['newPassword'])){
              $user = $this->adminModel->User($_SESSION['user_id']);
              $data['newPassword'] = $user->password;
            }
          }

          $_SESSION['user_fname'] = $data['fname'];
          $_SESSION['user_lname'] = $data['lname'];
          
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
          $data['fname'] = $user->fname;
          $data['lname'] = $user->lname;
          $data['email'] = $user->email;
          $data['phone'] = $user->phone;
          $data['image'] = $user->userImage;

          // Load view with errors
          $this->view('user/setting', $data);
        }

      } else {
        $user = $this->passengerModel->getUserDetails($_SESSION['user_id']);

        $data = [
          'id' => $user->id,
          'fname' => $user->fname,
          'lname' => $user->lname,
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
        $notCompletedFine = $this->passengerModel->getNoCompletedFines($_SESSION['user_id']);
        $stations = $this->adminModel->getStation();
        $classes = $this->adminModel->getClasses();
        $data = [
          'stations' => $stations,
          'classes' => $classes,
          'fines'=> $notCompletedFine
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
                   
          if($current){
            $wallet = $this->passengerModel->updateWallet($current->ticket_id, $current->passenger_id);
            $transaction = $this->passengerModel->updateTrasaction($current->ticket_id, $current->passenger_id, 'Journey');
            $tr_id = $this->passengerModel->getTransactionId($current->passenger_id);

            $walletBalance = $this->passengerModel->getWalletBlance($current->passenger_id);
            $this->passengerModel->upateBalanceTable($current->passenger_id, $walletBalance->balance, $tr_id->tr_id);

            if($wallet && $transaction && $tr_id){

              if($this->passengerModel->addJourneyQrAndTransaction($this->genarateQR($current->id),$current->id, $tr_id->tr_id)){
                $data = [
                  'depStationName' => $this->adminModel->findStationByStationID($current->depStation)[0]->name,
                  'arrStationName' => $this->adminModel->findStationByStationID($current->arrStation)[0]->name,
                ];

                $price = $this->passengerModel->getTicketPrice($current->ticket_id);

                $reson = [
                  'uid' => $_SESSION['user_id'],
                  'reason' => 'Thank you for purchasing a train ticket with us! The journey is from '.$data['depStationName'].' to '.$data['arrStationName'].', with a ticket price of '.$price->price.' rupees. Travel date is '.date('Y-m-d').' at '.date('H:i:s').'.'
                ];

                $this->passengerModel->updateNotification($reson);
                $responseData = array(
                  'success' => true
                );
              }  
            } 
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

      if(!$current) {
        $responseData = array(
          'startJourney' => $current
        );
      } else if($depID == $current->depStation && $arrID == $current->arrStation && $ticket == $current->ticket_id){
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

    //Get lattitude and longitude
    public function getStationLatAndLng(){
      $inputJSON = file_get_contents('php://input');
      $requestData = json_decode($inputJSON, true);

      $details = $this->stationModel->getStationLatAndLng($requestData['depID'], $requestData['arrID']);
      $responseData = array(
        'station1'=>$details[0],
        'station2'=>$details[1]
      );

      header('Content-Type: application/json');
      echo json_encode($responseData);

    }

    public function updateTransactions($details){
      $data = ["uid"=>$_SESSION["user_id"],
                "amount"=>$details];
      $result = $this->passengerModel->updateAmount($data);
      if ($result){
        redirect("passengers/wallet");
      }
      
    }

    public function chat(){   
      $this->view('user/chat');
    }

    public function notifications(){
      $inputJSON = file_get_contents('php://input');

      $responseData = $this->passengerModel->getNotifications($_SESSION['user_id']);

      header('Content-Type: application/json');
      echo json_encode($responseData);
    }

    public function setToRead(){
      $inputJSON = file_get_contents('php://input');
      $requestData = json_decode($inputJSON, true);

      $responseData = false;

      
      if($this->passengerModel->setToread($_SESSION['user_id'])){
        $responseData = true;
      }
     

      header('Content-Type: application/json');
      echo json_encode($responseData);
    }


    public function payfine($id){
      $fineAmount = $this->passengerModel->getFineAmount($id);
      $walletBlance = $this->passengerModel->getWalletBalnce($_SESSION["user_id"]);

      if($fineAmount->fine_amount <= $walletBlance->balance){
        if($this->passengerModel->reduceMoney($fineAmount->fine_amount, $_SESSION["user_id"])){
          $resons = [
            'uid' => $_SESSION["user_id"],
            'reason' => 'Your fine has been settled. Thank you.'.' on '.date('Y-m-d').' at '.date('H:i:s')
          ];
          $this->passengerModel->updateNotification($resons);
          $this->passengerModel->updateFineTable($id);
          $this->passengerModel->updateTransactionFine( $_SESSION["user_id"], $fineAmount->fine_amount);
        } 
      } else {
        $resons = [
          'uid' => $_SESSION["user_id"],
          'reason' => 'You do not have enough balance to pay the fine.'
        ];
        $this->passengerModel->updateNotification($resons);
      }

      redirect('passengers/fineDetails');
    }
    
  }
