<?php
  class Pages extends Controller {

    public function __construct(){
      $this->chatModel = $this->model('Chat');
    }
    
    public function index(){
      $messages = $this->chatModel->getFaq();

      $data = [
        'messages' => $messages
      ];
      $this->view('Home/index',$data);
    }

    
  }