<?php
  class Checkers extends Controller {
    
    public function __construct() {
      if(!isLoggedIn()){
        redirect('users/login');
      }
    }

    public function dashboard(){
      $this->view('checker/checker');
    }

    public function users(){
      $this->view('checker/c-user-details');
    }

    public function shedules(){
      $this->view('checker/c-shedule');
    }
  }