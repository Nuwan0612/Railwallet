<?php
  class Passengers extends Controller{

    public function __construct() {
      if(!isLoggedIn()){
        redirect('users/login');
      }
    }

    public function dashboard(){
      $this->view('user/userdb');
    }

    public function shedule(){
      $this->view('user/shedule');
    }
  }