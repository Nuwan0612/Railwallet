<?php 
  class Admins extends Controller{

    public function __construct() {
      if(!isLoggedIn()){
        redirect('users/login');
      }

      $this->adminModel = $this->model('Admin');
      $this->supporterModel = $this->model('Supporter');
      $this->checkerModel = $this->model('Checker');
      $this->trainModel = $this->model('Train');
      $this->userModel = $this->model('User');
    }

/*=====================================================================================================================================
                                            GET DETAILS TO DASHBOARD
=======================================================================================================================================*/ 

    public function dashboard(){ 
      $users = count($this->adminModel->getUser());
      $trains = count($this->trainModel->getTrains());
      $checkers = count($this->adminModel->getChecker());
      $supporters = count($this->adminModel->getSupporter());
      $data = [
        'users' => $users,
        'trains' => $trains,
        'checkers' => $checkers,
        'supporters' => $supporters,
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

    //Get all checkers
    public function supporters(){
      $supporters = $this->adminModel->getSupporter();
      $data = [
        'supporters' => $supporters
      ];
      $this->view('admin/supporter/supporter',$data);
      
    }


/*=====================================================================================================================================
                                            TRAIN CRUD FUNCTIONALITIES IN ADMIN
=======================================================================================================================================*/ 


/*-----------------------------------------------------Add Train---------------------------------------------*/
    public function addTrain(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
  
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Init data
        $data =[
          'trainID' => trim($_POST['trainID']),
          'name' => trim($_POST['name']),
          'type' => trim($_POST['type']),
          'firstCapacity' => trim($_POST['firstCapacity']),
          'secondCapacity' => trim($_POST['secondCapacity']),
          'thirdCapacity' => trim($_POST['thirdCapacity']),
          'trainID_err' => '',
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

        //Validate Train ID
        if(empty($data['trainID'])){
          $data['trainID_err'] = 'Pleae enter train ID';
        } else {
          // Check Train
          if($this->trainModel->findTrainByID($data['trainID'])){
            $data['trainID_err'] = 'Train is alredy registered';
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
        if(empty($data['name_err']) && empty($data['type_err']) && empty($data['thirdCapacity_err']) && empty($data['trainID_err'])){

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
          'trainID' => '',
          'name' => '',
          'type' => '',
          'firstCapacity' => '',
          'secondCapacity' => '',
          'thirdCapacity' => '',
          'trainID_err' => '',
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

/*-----------------------------------------------------Edit Train---------------------------------------------*/
    public function editTrain($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
  
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Init data
        $data =[
          'id' => $id,
          'trainID' => trim($_POST['trainID']),
          'name' => trim($_POST['name']),
          'type' => trim($_POST['type']),
          'firstCapacity' => trim($_POST['firstCapacity']),
          'secondCapacity' => trim($_POST['secondCapacity']),
          'thirdCapacity' => trim($_POST['thirdCapacity']),
          'trainID_err' => '',
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
          if($this->trainModel->findTrainName($data['name'], $id)){
            $data['name_err'] = 'Train is alredy registered';
          }
        }

        //Validate Train ID
        if(empty($data['trainID'])){
          $data['trainID_err'] = 'Pleae enter train ID';
        } else {
          // Check Train
          if($this->trainModel->findTrainID($data['trainID'], $id)){
            $data['trainID_err'] = 'Train is alredy registered';
          }
        }

        // Validate type
        if(empty($data['type'])){
          $data['type_err'] = 'Pleae enter Train type';
        }

        // Validate third Capacity
        if(empty($data['thirdCapacity'])){
          $data['thirdCapacity_err'] = 'Pleae enter third class capacity';
        } 

        // Make sure errors are empty
        if(empty($data['name_err']) && empty($data['type_err']) && empty($data['thirdCapacity_err']) && empty($data['trainID_err'])){

          //Update train
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
          'trainID' => $train->trainID,
          'name' => $train->name,
          'type' => $train->type,
          'firstCapacity' => $train->firstCapacity,
          'secondCapacity' => $train->secondCapacity,
          'thirdCapacity' => $train->thirdCapacity,
          'trainID_err' => '',
          'name_err' => '',
          'type_err' => '',
          'thirdCapacity_err' => '',
        ];

        // Load view
        $this->view('admin/trains/editTrain', $data);
      }
    }


/*-----------------------------------------------------Delete Train---------------------------------------------*/
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

/*----------------------------------------------------Search Train--------------------------------------------*/
  public function searchTrain($trainID){
    $trains = $this->trainModel->searchTrainById($trainID);
    $data = [
      'trains' => $trains
    ];
    $this->view('admin/trains/searchTrain',$data);
  }


/*=====================================================================================================================================
                                            CHECKER CRUD FUNCTIONALITIES IN ADMIN
=======================================================================================================================================*/ 


/*-----------------------------------------------------Register Checker---------------------------------------------*/
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


/*-----------------------------------------------------Delete Checker---------------------------------------------*/
    public function deleteChecker($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if($this->userModel->deleteUser($id)){
          redirect('admins/checkers');
        } else {
          die('Something went wrong');
        }
      } else {
        redirect('admins/checkers');
      }
    }


/*----------------------------------------------------Search Checker--------------------------------------------*/
    public function searchChecker($nic){
      $checkers = $this->adminModel->getCheckerById($nic);
      $data = [
        'checkers' => $checkers
      ];
      $this->view('admin/chekers/search',$data);
    }

/*-----------------------------------------------------Edit Checker---------------------------------------------*/
    public function editChecker($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
  
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Init data
        $data =[
          'id' => $id,
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
          if($this->adminModel->findUserByEmail($data['email'],$id)){
            $data['email_err'] = 'Employee is already registered in the system';
          }
        }

        // Validate NIC
        if(empty($data['nic'])){
          $data['nic_err'] = 'Pleae enter NIC';
        } else {
          // Check NIC
          if($this->adminModel->findUserByNic($data['nic'],$id)){
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

          //Update train
          if($this->checkerModel->editChecker($data)){
            redirect('admins/checkers');
          } else {
            die('something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('admin/chekers/editChecker', $data);
        }

      } else {

        $checker = $this->userModel->getUser($id);
        // Init data
        $data =[
          'id' => $id,
          'name' => $checker->name,
          'nic' => $checker->nic,
          'phone' => $checker->phone,
          'email' => $checker->email,
          'name_err' => '',
          'nic_err' => '',
          'phone_err' => '',
          'email_err' => '',
        ];

        // Load view
        $this->view('admin/chekers/editChecker', $data);
      }
    }


/*=====================================================================================================================================
                                            SUPPORTER CRUD FUNCTIONALITIES IN ADMIN
=======================================================================================================================================*/ 

/*-------------------------------------------------------Register Supporter--------------------------------------------------*/
  public function registerSupporter(){
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
        'type' => 'supporter',
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
        if($this->userModel->findUserByNic($data['nic'])){
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
          redirect('admins/supporters');
        } else {
          die('something went wrong');
        }
      } else {
        // Load view with errors
        $this->view('admin/supporter/addSupporter', $data);
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
      $this->view('admin/supporter/addSupporter', $data);
    }
  }


/*-------------------------------------------------------Delete Supporter--------------------------------------------------*/
  public function deleteSupporter($id){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      if($this->userModel->deleteUser($id)){
        redirect('admins/supporters');
      } else {
        die('Something went wrong');
      }
    } else {
      redirect('admins/supporters');
    }
  }

/*----------------------------------------------------Search Checker--------------------------------------------*/
  public function searchSupporter($nic){
    $supporters = $this->adminModel->getSupporterById($nic);
    $data = [
      'supporters' => $supporters
    ];
    $this->view('admin/supporter/search',$data);
  }

/*-----------------------------------------------------Edit Supporter---------------------------------------------*/
  public function editSupporter($id){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      // Process form

      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Init data
      $data =[
        'id' => $id,
        'name' => trim($_POST['name']),
        'nic' => trim($_POST['nic']),
        'phone' => trim($_POST['phone']),
        'email' => trim($_POST['email']),
        'password' => trim($_POST['nic']),
        'type' => 'supporter',
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
        if($this->adminModel->findUserByEmail($data['email'],$id)){
          $data['email_err'] = 'Employee is already registered in the system';
        }
      }

      // Validate NIC
      if(empty($data['nic'])){
        $data['nic_err'] = 'Pleae enter NIC';
      } else {
        // Check NIC
        if($this->adminModel->findUserByNic($data['nic'],$id)){
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

        //Update train
        if($this->supporterModel->editSupporter($data)){
          redirect('admins/supporters');
        } else {
          die('something went wrong');
        }
      } else {
        // Load view with errors
        $this->view('admin/supporter/editSupporter', $data);
      }

    } else {

      $supporter = $this->userModel->getUser($id);
      // Init data
      $data =[
        'id' => $id,
        'name' => $supporter->name,
        'nic' => $supporter->nic,
        'phone' => $supporter->phone,
        'email' => $supporter->email,
        'name_err' => '',
        'nic_err' => '',
        'phone_err' => '',
        'email_err' => '',
      ];

      // Load view
      $this->view('admin/supporter/editSupporter', $data);
    }
  }

}