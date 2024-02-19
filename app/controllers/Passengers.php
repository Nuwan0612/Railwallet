<?php
  class Passengers extends Controller{

    public function __construct() {
      if(!isLoggedIn()){
        redirect('users/login');
      }

      $this->passengerModel = $this->model('Passenger');
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