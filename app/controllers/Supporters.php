<?php
  class Supporters extends Controller {

    public function __construct() {
      if(!isLoggedIn()){
        redirect('users/login');
      }
    }

    public function dashboard(){
      $this->view('c-support-db/c-support');
    }

    public function users(){
      $this->view('c-support-db/c-users');
    }

    public function feedbacks(){
      $this->view('c-support-db/c-users');
    }

    public function shedules(){
      $this->view('c-support-db/c-shedule');
    }

  }