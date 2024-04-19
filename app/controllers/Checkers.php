<?php
  class Checkers extends Controller {
    
    public function __construct() {
      if(!isLoggedIn()){
        redirect('users/login');
      }

      $this->checkerModel = $this->model('Checker');
    }

    public function dashboard(){
      $this->view('checker/checker');
    }

    // View fine details
    public function fine(){
      $result = $this->checkerModel->viewFineDetailsByCheckerId($_SESSION["user_id"]);
      $data = ["fines"=>$result];
      $this->view('checker/fine',$data);
    }

    // Search fines by user id
    public function searchFinesByUserId($id){
      $result = $this->checkerModel->viewFinesById($id);
      $data = ["fines"=>$result];
      $this->view('checker/fine',$data);
    }

    // View schedule details
    public function schedules(){
      $result = $this->checkerModel->viewSchedule();
      $data = ["schedules"=>$result];

      $this->view('checker/schedule',$data);
    }

    // Search schedules by schedule id
    public function searchSchedulesByScheduleId($id){
      $result = $this->checkerModel->viewSchedulesByScheduleId($id);
      // print_r( $result);
      $data = ['schedules'=>$result];
      $this->view('checker/schedule',$data);
    }

    // Search schedules by departure station
    public function searchSchedulesByDepartureStation($id){
      $result = $this->checkerModel->viewSchedulesByDepartureStation($id);

      $data = ['schedules'=>$result];
      $this->view('checker/schedule',$data);
    }

    // Search schedules by arrival station
    public function searchSchedulesByArrivalStation($id){
      $result = $this->checkerModel->viewSchedulesByArrivalStation($id);

      $data = ['schedules'=>$result];
      $this->view('checker/schedule',$data);
    }

    // Search schedules by date
    public function searchSchedulesByDate($id){
      $result = $this->checkerModel->viewSchedulesByDate($id);

      $data = ['schedules'=>$result];
      $this->view('checker/schedule',$data);
    }

    public function qrScan(){
      $this->view('checker/scanQR');
    }

    public function cancelTicket($id){
      if($this->checkerModel->cancelTicket($id)){
        $this->qrScan();
      }  
    }

    public function issueFine(){
      $passenger_id = $this->checkerModel->getPassengerIdFromJourney($_GET['id']);
      $data = [
        "passenger_id" => $passenger_id->passenger_id,
        "reason" => $_GET['reason'],
        "amount" => $_GET['fineAmount'],
        "checker_id" => $_SESSION['user_id'],
        "journey_id" => $_GET['id']
      ];

      $addFine = $this->checkerModel->addFine($data);
      $wallet = $this->checkerModel->getWalletBalnce($data['passenger_id']);

      if( ($wallet->balance - $data['amount']) >= 0 ){
        $this->checkerModel->reduceAmountfromWallet($wallet->id, $data['amount']);
        $this->checkerModel->updatefinePayment($data['journey_id']);
      }
;
      if($addFine && $this->checkerModel->cancelTicket($_GET['id'])){
        $this->qrScan();
      }
    }

    public function validateTicket($Id){   
      $this->view('checker/validateTicket');
    }

    public function checkavailabiltyOfJourney(){

      $inputJSON = file_get_contents('php://input');
      $requestData = json_decode($inputJSON, true);

      $responseData = false;

      if($this->checkerModel->checkavailabiltyOfJourney($requestData["journey"])){
        $responseData = true;
      }

      header('Content-Type: application/json');
      echo json_encode($responseData);
    }
  }