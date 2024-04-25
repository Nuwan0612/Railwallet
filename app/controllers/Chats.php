<?php 

  class Chats extends Controller {

    public function __construct(){
      if(!isLoggedIn()){
        redirect('users/login');
      }

      $this->chatModel = $this->model('Chat');
    }


    public function ContactWithAgent(){
      $inputJSON = file_get_contents('php://input');
      $requestData = json_decode($inputJSON, true);

      $responseData = '';

      $isalreadyInChat = $this->chatModel->checkUserInChat($requestData['sender']);

      if($isalreadyInChat){
        $data = [
          'sender' => $requestData['sender'],
          'agent' => $isalreadyInChat->supporter_id,
          'msg' => $requestData['msg']
        ];
        $addMessgae = $this->chatModel->addMessage($data);
        $responseData = true;

      } else {
        $availableAgents = $this->chatModel->getAvailableAgents();
        if(!$availableAgents){
          if($this->chatModel->addToWaitingQueue($requestData['sender'])){
            $responseData = false;
          }  
        } else {
          $assignAgent = $this->chatModel->makeAgentBusy($availableAgents->supporter_id, $requestData['sender']);

          $data = [
            'sender' => $requestData['sender'],
            'agent' => $availableAgents->supporter_id,
            'msg' => $requestData['msg']
          ];

          $addMessgae = $this->chatModel->addMessage($data);
          $responseData = true;
        }
      }

      header('Content-Type: application/json');
      echo json_encode($responseData);
    }

    public function getMessages($id){
      $details = $this->chatModel->getMessages($id);

      $message = $this->chatModel->getChats($details->supporter_id, $details->passenger_id);


      header('Content-Type: application/json');
      echo json_encode($message);
    }

    public function ReplyToCustomer(){
      $inputJSON = file_get_contents('php://input');
      $requestData = json_decode($inputJSON, true);

      $passenger = $this->chatModel->getPassenger($requestData['sender']);
      $responseData = false;

      $data= [
        'sender' => $requestData['sender'],
        'agent' => $passenger->passenger_id,
        'msg' => $requestData['msg']
      ];

      if($this->chatModel->addMessage($data)){
        $responseData = true;
      }

      header('Content-Type: application/json');
      echo json_encode($responseData);
    }
  }

?>