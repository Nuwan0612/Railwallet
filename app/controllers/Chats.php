<?php 

  class Chats extends Controller {

    public function __construct(){
      if(!isLoggedIn()){
        redirect('users/login');
      }

      $this->chatModel = $this->model('Chat');
    }

  }

?>