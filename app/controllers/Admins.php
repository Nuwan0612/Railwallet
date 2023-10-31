<?php 
  class Admins extends Controller{

    public function __construct() {
      if(!isLoggedIn()){
        redirect('users/login');
      }

      $this->adminModel = $this->model('Admin');
      $this->trainModel = $this->model('Train');
      $this->userModel = $this->model('User');
    }

/*=====================================================================================================================================
                                            GET DETAILS TO DASHBOARD
=======================================================================================================================================*/ 

    public function dashboard(){ 
      $users = count($this->adminModel->getUser());
      $trains = count($this->trainModel->getTrains());
      $data = [
        'users' => $users,
        'trains' => $trains,
      ];
      $this->view('admin/dashboard',$data);   
    }

    //Get all trains
    public function trains(){
      $trains = $this->trainModel->getTrains();
      $data = [
        'trains' => $trains
      ];
      $this->view('admin/trains/trains',$data);
      
    }


    //Get all users
    public function users(){
      $users = $this->adminModel->getUser();
      $data = [
        'users' => $users
      ];
      $this->view('admin/users/users',$data);
      
    }

    //Get all checkers
    public function checkers(){
      $checkers = $this->adminModel->getChecker();
      $data = [
        'checkers' => $checkers
      ];
      $this->view('admin/chekers/checker',$data);
      
    }

/*=====================================================================================================================================
                                            TRAIN CRUD FUNCTIONALITIES IN ADMIN
=======================================================================================================================================*/ 

    public function addTrain(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
  
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Init data
        $data =[
          'name' => trim($_POST['name']),
          'type' => trim($_POST['type']),
          'firstCapacity' => trim($_POST['firstCapacity']),
          'secondCapacity' => trim($_POST['secondCapacity']),
          'thirdCapacity' => trim($_POST['thirdCapacity']),
          'name_err' => '',
          'type_err' => '',
          'firstCapacity_err' => '',
          'secondCapacity_err' => '',
          'thirdCapacity_err' => '',
        ];

        //Validate Train Name
        if(empty($data['name'])){
          $data['name_err'] = 'Pleae enter train name';
        } else {
          // Check Train
          if($this->trainModel->findTrain($data['name'])){
            $data['name_err'] = 'Train is alredy registered';
          }
        }

        // Validate type
        if(empty($data['type'])){
          $data['type_err'] = 'Pleae enter Train type';
        }

        // Validate Password
        if(empty($data['thirdCapacity'])){
          $data['thirdCapacity_err'] = 'Pleae enter third class capacity';
        } 

        // Make sure errors are empty
        if(empty($data['name_err']) && empty($data['type_err']) && empty($data['thirdCapacity_err'])){

          //Register User
          if($this->trainModel->addTrain($data)){
            redirect('admins/trains');
          } else {
            die('something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('admin/trains/addTrain', $data);
        }

      } else {
        // Init data
        $data =[
          'name' => '',
          'type' => '',
          'firstCapacity' => '',
          'secondCapacity' => '',
          'thirdCapacity' => '',
          'name_err' => '',
          'type_err' => '',
          'firstCapacity_err' => '',
          'secondCapacity_err' => '',
          'thirdCapacity_err' => '',
        ];

        // Load view
        $this->view('admin/trains/addTrain', $data);
      }
    }


    public function editTrain($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
  
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Init data
        $data =[
          'id' => $id,
          'name' => trim($_POST['name']),
          'type' => trim($_POST['type']),
          'firstCapacity' => trim($_POST['firstCapacity']),
          'secondCapacity' => trim($_POST['secondCapacity']),
          'thirdCapacity' => trim($_POST['thirdCapacity']),
          'name_err' => '',
          'type_err' => '',
          'firstCapacity_err' => '',
          'secondCapacity_err' => '',
          'thirdCapacity_err' => '',
        ];

        //Validate Train Name
        if(empty($data['name'])){
          $data['name_err'] = 'Pleae enter train name';
        }

        // Validate type
        if(empty($data['type'])){
          $data['type_err'] = 'Pleae enter Train type';
        }

        // Validate Password
        if(empty($data['thirdCapacity'])){
          $data['thirdCapacity_err'] = 'Pleae enter third class capacity';
        } 

        // Make sure errors are empty
        if(empty($data['name_err']) && empty($data['type_err']) && empty($data['thirdCapacity_err'])){

          //Register User
          if($this->trainModel->editTrain($data)){
            redirect('admins/trains');
          } else {
            die('something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('admin/trains/editTrain', $data);
        }

      } else {

        $train = $this->trainModel->getTrain($id);
        // Init data
        $data =[
          'id' => $id,
          'name' => $train->name,
          'type' => $train->type,
          'firstCapacity' => $train->firstCapacity,
          'secondCapacity' => $train->secondCapacity,
          'thirdCapacity' => $train->thirdCapacity,
          'name_err' => '',
          'type_err' => '',
          'thirdCapacity_err' => '',
        ];

        // Load view
        $this->view('admin/trains/editTrain', $data);
      }
    }

    public function deleteTrain($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if($this->trainModel->deleteTrain($id)){
          redirect('admins/trains');
        } else {
          die('Something went wrong');
        }
      } else {
        redirect('admins/trains');
      }
    }


/*=====================================================================================================================================
                                            CHECKER CRUD FUNCTIONALITIES IN ADMIN
=======================================================================================================================================*/ 


    public function registerChecker(){
      // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form

        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Init data
        $data =[
          'name' => trim($_POST['name']),
          'nic' => trim($_POST['nic']),
          'phone' => trim($_POST['phone']),
          'email' => trim($_POST['email']),
          'password' => trim($_POST['nic']),
          'type' => 'checker',
          'name_err' => '',
          'nic_err' => '',
          'phone_err' => '',
          'email_err' => '',
        ];

        //Validate Email
        if(empty($data['email'])){
          $data['email_err'] = 'Pleae enter email';
        } else {
          // Check email
          if($this->userModel->findUserByEmail($data['email'])){
            $data['email_err'] = 'Employee is already registered in the system';
          }
        }

        // Validate NIC
        if(empty($data['nic'])){
          $data['nic_err'] = 'Pleae enter NIC';
        } else {
          // Check NIC
          if($this->userModel->findUserByEmail($data['nic'])){
            $data['nic_err'] = 'Employee is already registered in the system';
          }
        }


        // Validate Name
        if(empty($data['name'])){
          $data['name_err'] = 'Pleae enter name';
        }

        // Validate Phone
        if(empty($data['phone'])){
          $data['phone_err'] = 'Pleae enter phone number';
        }

        // Make sure errors are empty
        if(empty($data['email_err']) && empty($data['name_err']) && empty($data['nic_err']) && empty($data['phone_err'])){
          // Validated
          
          // Hash Password
          $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

          //Register User
          if($this->userModel->register($data)){
            redirect('admins/checkers');
          } else {
            die('something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('admin/chekers/addChecker', $data);
        }

      } else {
        // Init data
        $data =[
          'name' => '',
          'nic' => '',
          'phone' => '',
          'email' => '',
          'name_err' => '',
          'nic_err' => '',
          'phone_err' => '',
          'email_err' => '',
        ];

        // Load view
        $this->view('admin/chekers/addChecker', $data);
      }
    }

    // public function editTrain($id){
    //   if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //     // Process form
  
    //     // Sanitize POST data
    //     $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    //     // Init data
    //     $data =[
    //       'id' => $id,
    //       'name' => trim($_POST['name']),
    //       'type' => trim($_POST['type']),
    //       'firstCapacity' => trim($_POST['firstCapacity']),
    //       'secondCapacity' => trim($_POST['secondCapacity']),
    //       'thirdCapacity' => trim($_POST['thirdCapacity']),
    //       'name_err' => '',
    //       'type_err' => '',
    //       'firstCapacity_err' => '',
    //       'secondCapacity_err' => '',
    //       'thirdCapacity_err' => '',
    //     ];

    //     //Validate Train Name
    //     if(empty($data['name'])){
    //       $data['name_err'] = 'Pleae enter train name';
    //     }

    //     // Validate type
    //     if(empty($data['type'])){
    //       $data['type_err'] = 'Pleae enter Train type';
    //     }

    //     // Validate Password
    //     if(empty($data['thirdCapacity'])){
    //       $data['thirdCapacity_err'] = 'Pleae enter third class capacity';
    //     } 

    //     // Make sure errors are empty
    //     if(empty($data['name_err']) && empty($data['type_err']) && empty($data['thirdCapacity_err'])){

    //       //Register User
    //       if($this->trainModel->editTrain($data)){
    //         redirect('admins/trains');
    //       } else {
    //         die('something went wrong');
    //       }
    //     } else {
    //       // Load view with errors
    //       $this->view('admin/trains/editTrain', $data);
    //     }

    //   } else {

    //     $train = $this->trainModel->getTrain($id);
    //     // Init data
    //     $data =[
    //       'id' => $id,
    //       'name' => $train->name,
    //       'type' => $train->type,
    //       'firstCapacity' => $train->firstCapacity,
    //       'secondCapacity' => $train->secondCapacity,
    //       'thirdCapacity' => $train->thirdCapacity,
    //       'name_err' => '',
    //       'type_err' => '',
    //       'thirdCapacity_err' => '',
    //     ];

    //     // Load view
    //     $this->view('admin/trains/editTrain', $data);
    //   }
    // }

}