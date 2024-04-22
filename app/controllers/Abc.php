<?php

class Abc extends Controller{

    public function __construct() {
    }

    public function index() {
        $this->view('abc/index');
    }

}

?>