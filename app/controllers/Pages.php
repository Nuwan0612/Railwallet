<?php
  class Pages extends Controller {

    public function __construct(){
      $this->chatModel = $this->model('Chat');
    }
    
    public function index(){
      $messages = $this->chatModel->getFaq();
      $feedbacks = $this->chatModel->getFeedback();

      $data = [
        'messages' => $messages,
        'feedbacks' => $feedbacks
      ];
      $this->view('Home/index',$data);
    }

    public function getProblems(){
      $inputJSON = file_get_contents('php://input');
      $requestData = json_decode($inputJSON, true);

      $responseData = false;

      $data = [
        'name' => $requestData['name'],
        'email' => $requestData['email'],
        'message' => $requestData['message'],
      ];

      if($this->chatModel->addQuestion($data)){
        $responseData = true;
      }

      header('Content-Type: application/json');
      echo json_encode($responseData);
    }

    
  }