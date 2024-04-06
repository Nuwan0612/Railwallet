<?php
  class Passengers extends Controller{

    public function __construct() {
      if(!isLoggedIn()){
        redirect('users/login');
      }

      $this->passengerModel = $this->model('Passenger');
      $this->adminModel = $this->model('Admin');
      $this->userModel = $this->model('User');
    }

    public function dashboard(){
      $this->view('user/userdb');
    }

    public function shedule(){
      $this->view('user/shedule');
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

      } else if($ticketAvailable->price > $walletBalance->balance) {

      } else {

      }

      // Prepare response data
      $responseData = array(
          'success' => $ticketAvailable // true or false based on query result
      );

      // Send JSON response
      header('Content-Type: application/json');
      echo json_encode($responseData);
    }
  }
