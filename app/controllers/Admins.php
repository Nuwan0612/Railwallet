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
      $this->stationModel = $this->model('Station');
      $this->routeModel = $this->model('Route');
      $this->ticketModel = $this->model('Ticket');
      $this->sheduleModel = $this->model('Shedule');
      $this->passengerModel = $this->model('Passenger');
    }

/*=====================================================================================================================================
                                                      GET DETAILS TO DASHBOARD
=======================================================================================================================================*/ 

  public function dashboard(){ 
    $users = count($this->adminModel->getUser());
    $trains = count($this->trainModel->getTrains());
    $checkers = count($this->adminModel->getChecker());
    $supporters = count($this->adminModel->getSupporter());
    $stations = count($this->adminModel->getStation());
    $feedbacks = count($this->adminModel->getFeedback());
    $data = [
      'users' => $users,
      'trains' => $trains,
      'checkers' => $checkers,
      'supporters' => $supporters,
      'stations' => $stations,
      'feedbacks' => $feedbacks,
    ];
    $this->view('admin/dashboard',$data);   
  }

/*=====================================================================================================================================
                                                       LOAD PAGES
=======================================================================================================================================*/
  //Get all service trains
      public function trains(){
        $trains = $this->trainModel->getTrains();
        $data = [
          'trains' => $trains
        ];
        $this->view('admin/trains/trains',$data);
        
      }
  //Get all unavailble trains
    public function unavailbleTrains(){
      $trains = $this->trainModel->getUnavilableTrains();
      $data = [
        'trains' => $trains
      ];
      $this->view('admin/trains/hideTrains',$data);
      
    }

  //Get all active users
    public function users(){
      $users = $this->adminModel->getUser();
      $data = [
        'users' => $users
      ];
      $this->view('admin/users/users',$data);
      
    }
  //Get decativate users
    public function deactivateUsers(){
      $users = $this->adminModel->getBlockedUser();
      $data = [
        'users' => $users
      ];
      $this->view('admin/users/hideUsers',$data);
      
    }

  //Search User
    public function searchUser($nic){
      $users = $this->adminModel->searchUser($nic);
      $data = [
        'users' => $users
      ];
      if($users[0]->status == 1){
        $this->view('admin/users/users',$data);
      } else {
        $this->view('admin/users/hideUsers',$data);
      }
      
    }


  //Get all checkers
      public function checkers(){
        $checkers = $this->adminModel->getChecker();
        $data = [
          'checkers' => $checkers
        ];
        $this->view('admin/chekers/checker',$data);   
      }

  //Get all resigned checkers
    public function resignCheckers(){
      $checkers = $this->adminModel->getResignedChecker();
      $data = [
        'checkers' => $checkers
      ];
      $this->view('admin/chekers/resignCheckers',$data);   
    }

  //Get all supporters
    public function supporters(){
      $supporters = $this->adminModel->getSupporter();
      $data = [
        'supporters' => $supporters
      ];
      $this->view('admin/supporter/supporter',$data);     
    }
    
  //Get all resigned supporters
    public function resignedSupporters(){
      $supporters = $this->adminModel->resignedSupporters();
      $data = [
        'supporters' => $supporters
      ];
      $this->view('admin/supporter/resignSupporter',$data);    
    }

  // Get all stations
    public function stations(){
      $stations = $this->adminModel->getStation();
      $data = [
        'stations' => $stations
      ];

      // echo '<pre>';
      // var_dump($data); 
      // echo '</pre>';

      $this->view('admin/stations/stations',$data);
    }

  // Get all closed stations
    public function closedStations(){
      $stations = $this->adminModel->closedStations();
      $data = [
        'stations' => $stations
      ];

      $this->view('admin/stations/hideStation',$data);
    }

  //Get available shedules
    public function shedules(){
      $shedules = $this->sheduleModel->getAvailableShedules();
      $data = [
        'shedules' => $shedules
      ];
      $this->view('admin/shedules/shedules',$data);
    }
  
  //Deactivated Shedules
    public function deactivatedShedules(){
      $shedules = $this->sheduleModel->deactivatedShedules();
      $data = [
        'shedules' => $shedules
      ];
      $this->view('admin/shedules/hideShedules',$data);
    }

  //Get all routes
    public function routes(){
      $routes = $this->adminModel->getRoutes();
      $data = [
        'routes' => $routes
      ];
      $this->view('admin/routes/routes',$data);
    }

  //Get all availabletickets
    public function tickets(){
      $tickets = $this->ticketModel->getTickets();
      $data = [
        'tickets' => $tickets
      ];
      // echo '<pre>';
      // var_dump($tickets);
      // echo '</pre>';
      $this->view('admin/tickets/tickets', $data);
    }

  //Get all unavilable tickets
    public function unavailbleTickets(){
      $tickets = $this->ticketModel->getuUnavilableTickets();
      $data = [
        'tickets' => $tickets
      ];
      $this->view('admin/tickets/notAvailableTickets', $data);
    }

/*----------------------------------------------Manage Account Settings---------------------------------------------*/

  //display account details
    public function profile(){
      $admin = $this->adminModel->getAdmin($_SESSION['user_id']);
      $data = [
        'id' => $admin->id,
        'fname' => $admin->fname,
        'lname' => $admin->lname,
        'nic' => $admin->nic,
        'phone' => $admin->phone,
        'email' => $admin->email,
        'image' => $admin->userImage,
        'fname_err' => '',
        'lname_err' => '',
        'email_err' => '',
        'phone_err' => '',
        'oldPassword_err' => '',
        'newPassword_err' => '',
        'confirmPassword_err' => '',
      ];
      
      $this->view('admin/setting/manageAccount',$data);
    }

  //update account details
    public function setting(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){

        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $admin = $this->adminModel->getAdmin($_SESSION['user_id']);

        $data = [
          'id' => $_SESSION['user_id'],
          'nic' => $_SESSION['user_nic'],
          'fname' => trim($_POST['fname']),
          'lname' => trim($_POST['lname']),
          'email' => trim($_POST['email']),
          'phone' => trim($_POST['phone']),
          'oldPassword' => trim($_POST['oldPassword']),
          'newPassword' => trim($_POST['newPassword']),
          'confirmPassword' => trim($_POST['confirmPassword']),
          'img' => $admin->userImage,
          'id_err' => '',
          'fname_err' => '',
          'lname_err' => '',
          'email_err' => '',
          'phone_err' => '',
          'oldPassword_err' => '',
          'newPassword_err' => '',
          'confirmPassword_err' => '',
          'email_err_value' => '',
          'phone_err_value' => '',
          'oldPassword_err_value' => '',
          'newPassword_err_value' => '',
          'confirmPassword_err_value' => ''
        ];

        if(empty($data['fname'])){
          $data['fname'] = $admin->fname;
        } 

        if(empty($data['lname'])){
          $data['lname'] = $admin->lname;
        } 

        if(empty($data['phone'])){
          $data['phone'] = $admin->phone;
        } else {
          if(strlen($data['phone']) < 10){
            $data['phone_err'] = "Please enter valid phone number";
          }
        }
        
        if(empty($data['email'])){
          $data['email'] = $admin->email;
        } else {
          if($this->adminModel->findUserByEmail($data['email'],$_SESSION['user_id'])){
            $data['email_err'] = "Email is already registered";
          }
        }
        
        if(!empty($data['oldPassword']) || !empty($data['newPassword']) || !empty($data['confirmPassword'])){

          if(!$this->userModel->checkPassword($_SESSION['user_id'],$data['oldPassword'])){
            $data['oldPassword_err'] = 'Old passowrd does not match';
          }

          if($data['newPassword'] != $data['confirmPassword']) {
            $data['confirmPassword_err'] = 'Password does not match';
          }

          if(empty($data['oldPassword'])) {
            $data['oldPassword_err'] = "Please enter old password"; 
          }

          if(empty($data['newPassword'])) {
            $data['newPassword_err'] = "Please enter new password"; 
          }

          if(empty($data['confirmPassword'])) {
            $data['confirmPassword_err'] = "Please confirm password"; 
          }   
        }

        if (!empty($_FILES['image']['name'])) {
          if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
              $uploadDir = PICTURE.'pics/userPics/';
              $userDir = $uploadDir . $_SESSION['user_id'] . '/';
              $tempName = $_FILES['image']['tmp_name'];
              $originalName = $_FILES['image']['name'];
              $imageFileType = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));

              if (!file_exists($userDir)) {
                mkdir($userDir, 0777, true); // Create directory recursively
              }
              
              // Generate unique filename
              $uniqueFileName = uniqid('', true) . '.' . $imageFileType;
              $uploadPath = $userDir . $uniqueFileName;

              // Move uploaded file to new location
              if (move_uploaded_file($tempName, $uploadPath)) {
                  // File upload successful, update database with image path
                  $data['img'] = $_SESSION['user_id'] . '/' . $uniqueFileName; 
                  $_SESSION['user_image'] = $_SESSION['user_id'] . '/' . $uniqueFileName; 
              } else {
                  $data['img_err'] = 'Failed to move uploaded file.';
              }
          } else {
              $data['img_err'] = 'File upload error: ' . $_FILES['image']['error'];
          }
        }

        // Make sure errors are empty
        if(empty($data['email_err']) && empty($data['fname_err']) && empty($data['lname_err']) && empty($data['phone_err']) && empty($data['newPassword_err']) && empty($data['confirmPassword_err']) && empty($data['oldPassword_err'])){
            
          
          // Hash Password
          if(!empty($data['oldPassword']) && !empty($data['newPassword']) && !empty($data['confirmPassword'])){
            $data['newPassword'] = password_hash($data['newPassword'], PASSWORD_DEFAULT);
          } else {
            if(empty($data['newPassword'])){
              $user = $this->adminModel->getAdmin();
              $data['newPassword'] = $user->password;
            }
          }

          $_SESSION['user_fname'] = $data['fname'];
          $_SESSION['user_lname'] = $data['lname'];
          
          //Update Admin details
          if($this->adminModel->editAdminDetails($data)){
            redirect('admins/profile');
          } else {
            die('something went wrong');
          }
        } else {

          $data['phone_err_value'] = $data['phone'];
          $data['email_err_value'] = $data['email'];
          $data['oldPassword_err_value'] = $data['oldPassword'];
          $data['newPassword_err_value'] = $data['newPassword'];
          $data['confirmPassword_err_value'] = $data['confirmPassword'];
          $data['fname'] = $admin->fname;
          $data['lname'] = $admin->lname;
          $data['email'] = $admin->email;
          $data['phone'] = $admin->phone;

          // echo '<pre>';
          // var_dump($data);
          // echo '</pre>';

          // Load view with errors
          $this->view('admin/setting/manageAccount', $data);
        }

      } else {
        $user = $this->adminModel->getAdmin($_SESSION['user_id']);

        $data = [
          'id' => $user->id,
          'fname' => $user->fname,
          'lname' => $user->lname,
          'nic' => $user->nic,
          'phone' => $user->phone,
          'email' => $user->email,
          'name_err' => '',
          'email_err' => '',
          'phone_err' => '',
          'oldPassword_err' => '',
          'newPassword_err' => '',
          'confirmPassword_err' => '',
  
        ];
        $this->view('admin/setting/manageAccount',$data);
      }
    }


/*=====================================================================================================================================
                                                TRAIN CRUD FUNCTIONALITIES IN ADMIN
=======================================================================================================================================*/ 

/*-----------------------------------------------------Add Train----------------------------------------------------*/
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

/*-----------------------------------------------------Edit Train---------------------------------------------------*/
    public function editTrain($trainID){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
  
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Init data
        $data =[
          'trainID' => $trainID,
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
          if($this->trainModel->findTrainName($data['name'], $trainID)){
            $data['name_err'] = 'Train is alredy registered';
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
        if(empty($data['name_err']) && empty($data['type_err']) && empty($data['thirdCapacity_err'])){

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

        $train = $this->trainModel->getTrain($trainID);
        // Init data
        $data =[
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


/*-----------------------------------------------------Update Train Service status----------------------------------*/
    public function setNotRunning($trainID){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $schedule = $this->sheduleModel->deactivateWhenTrainNotRunning($trainID);

        if($this->trainModel->notRunningTrain($trainID) && $schedule){
          redirect('admins/trains');
        } else {
          die('Something went wrong');
        }
      } else {
        redirect('admins/trains');
      }
    }

    public function setRunning($trainID){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if($this->trainModel->RunningTrain($trainID)){
          redirect('admins/unavailbleTrains');
        } else {
          die('Something went wrong');
        }
      } else {
        redirect('admins/unavailbleTrains');
      }
    }

/*-----------------------------------------------------Search Train-------------------------------------------------*/
  public function searchTrain($trainID){
    $trains = $this->trainModel->searchTrainById($trainID);
    $data = [
      'trains' => $trains
    ];
    
    if(!$trains){
      $this->view('admin/trains/trains',$data);
    } else if($trains[0]->service == 1){
      $this->view('admin/trains/trains',$data);
    } else if($trains[0]->service == 0){
      $this->view('admin/trains/hideTrains',$data);
    }
      
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
          $data['email_err'] = 'Please enter email';
        } else {
          // Check email
          if($this->userModel->findUserByEmail($data['email'])){
            $data['email_err'] = 'Employee is already registered in the system';
          }
        }

        // Validate NIC
        if((strlen($data['nic']) < 10) || (strlen($data['nic']) > 10 && strlen($data['nic']) < 12) || (strlen($data['nic']) > 12)) {
          $data['nic_err'] = 'Please enter valid NIC number';
        }

        if(strlen($data['nic']) == 12 && preg_match('/[^0-9]/', $data['nic'])){
          $data['nic_err'] = 'Please enter valid NIC number';
        }  
        
        if(strlen($data['nic']) == 10 && substr($data['nic'],-1) != 'X' ){
          if(substr($data['nic'],-1) != 'V'){
            $data['nic_err'] = 'Please enter valid NIC number';
          }  
        } 
        
        if(empty($data['nic'])){
          $data['nic_err'] = 'Please enter NIC number';  
        } else {
          // Check NIC
          if($this->userModel->findUserByNic($data['nic'])){
            $data['nic_err'] = 'NIC is already taken';
          }
        }


        // Validate Name
        if(empty($data['name'])){
          $data['name_err'] = 'Please enter name';
        }

        // Validate Phone
        if(empty($data['phone'])){
          $data['phone_err'] = 'Please enter phone number';
        } else {
          if(strlen($data['phone']) != 10){
            $data['phone_err'] = 'Please enter valid phone number';
          }
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


/*-----------------------------------------------------Update Checker working status--------------------------------*/
    public function deactiveCheckerStatus($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if($this->checkerModel->resignChecker($id)){
          redirect('admins/checkers');
        } else {
          die('Something went wrong');
        }
      } else {
        redirect('admins/checkers');
      }
    }

    public function activeCheckerStatus($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if($this->checkerModel->activateChecker($id)){
          redirect('admins/resignCheckers');
        } else {
          die('Something went wrong');
        }
      } else {
        redirect('admins/resignCheckers');
      }
    }


/*-----------------------------------------------------Search Checker-----------------------------------------------*/
    public function searchChecker($nic){
      $checkers = $this->adminModel->getCheckerById($nic);
      $data = [
        'checkers' => $checkers
      ];

      if(!$checkers){
        $this->view('admin/chekers/checker',$data);
      } else if($checkers[0]->status == 1){
        $this->view('admin/chekers/checker',$data);
      } else if($checkers[0]->status == 0){
        $this->view('admin/chekers/resignCheckers',$data);
      }
        
    }

/*-----------------------------------------------------Edit Checker-------------------------------------------------*/
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

/*-----------------------------------------------------Register Supporter---------------------------------------------*/
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
       if((strlen($data['nic']) < 10) || (strlen($data['nic']) > 10 && strlen($data['nic']) < 12) || (strlen($data['nic']) > 12)) {
        $data['nic_err'] = 'Please enter valid NIC number';
      }

      if(strlen($data['nic']) == 12 && preg_match('/[^0-9]/', $data['nic'])){
        $data['nic_err'] = 'Please enter valid NIC number';
      }  
      
      if(strlen($data['nic']) == 10 && substr($data['nic'],-1) != 'X' ){
        if(substr($data['nic'],-1) != 'V'){
          $data['nic_err'] = 'Please enter valid NIC number';
        }  
      } 
      
      if(empty($data['nic'])){
        $data['nic_err'] = 'Please enter NIC number';  
      } else {
        // Check NIC
        if($this->userModel->findUserByNic($data['nic'])){
          $data['nic_err'] = 'NIC is already taken';
        }
      }


      // Validate Name
      if(empty($data['name'])){
        $data['name_err'] = 'Please enter name';
      }

      // Validate Phone
      if(empty($data['phone'])){
        $data['phone_err'] = 'Please enter phone number';
      } else {
        if(strlen($data['phone']) != 10){
          $data['phone_err'] = 'Please enter valid phone number';
        }
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


/*-----------------------------------------------------Upadate Supporter working status-------------------------------*/
  public function deactivateSupporter($id){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      if($this->supporterModel->deactivateSupporter($id)){
        redirect('admins/supporters');
      } else {
        die('Something went wrong');
      }
    } else {
      redirect('admins/supporters');
    }
  }

  public function activateSupporter($id){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      if($this->supporterModel->activateSupporter($id)){
        redirect('admins/resignedSupporters');
      } else {
        die('Something went wrong');
      }
    } else {
      redirect('admins/resignedSupporters');
    }
  }

/*-----------------------------------------------------Search Supporter-----------------------------------------------*/
  public function searchSupporter($nic){
    $supporters = $this->adminModel->getSupporterById($nic);
    $data = [
      'supporters' => $supporters
    ];

    if(!$supporters){
      $this->view('admin/supporter/supporter',$data);
    } else if($supporters[0]->status == 1){
      $this->view('admin/supporter/supporter',$data);
    } else if($supporters[0]->status == 0){
      $this->view('admin/supporter/resignSupporter',$data);
    }
       
  }

/*-----------------------------------------------------Edit Supporter-------------------------------------------------*/
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


/*=====================================================================================================================================
                                                STATIONS CRUD FUNCTIONALITIES IN ADMIN
=======================================================================================================================================*/ 

/*-----------------------------------------------------Add Station---------------------------------------------------------*/
  public function addStation(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      // Process form

      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Init data
      $data =[
        'stationID' => trim($_POST['stationID']),
        'name' => trim($_POST['name']),
        'latitude' => trim($_POST['latitude']),
        'longitude' => trim($_POST['longitude']),
        'latitude_err' => '',
        'longitude_err' => '',
        'qrCodePath' => '',
        'stationID_err' => '',
        'name_err' => '',
      ];

      //Validate Station Name
      if(empty($data['name'])){
        $data['name_err'] = 'Please enter station name';
      } else {
        // Check Station
        if($this->stationModel->findStationByName($data['name'])){
          $data['name_err'] = 'Station is aleady added to the system';
        }
      }

      //Validate Latitude
      if(empty($data['latitude'])){
        $data['latitude_err'] = 'Please enter station latitude';
      }

      //validate Longitude
      if(empty($data['longitude'])){
        $data['longitude_err'] = 'Please enter station longitude';
      }

      //Validate Station ID
      if(empty($data['stationID'])){
        $data['stationID_err'] = 'Please enter station ID';
      } else {
        // Check Station
        if($this->stationModel->findStationByID($data['stationID'])){
          $data['stationID_err'] = 'Station is aleady added to the system';
        }
      }
    
      // Make sure errors are empty
      if(empty($data['name_err']) && empty($data['stationID_err']) && empty($data['longitude_err']) && empty($data['latitude_err'])){
       
        //Generate QR
        
        if($qr = $this->genarateQR($data['stationID'])){
          $data['qrCodePath'] = $qr;
        }

        // Add Station
        if($this->stationModel->addStation($data)){
          redirect('admins/stations');
        } else {
          die('something went wrong');
        }
      } else {
        // Load view with errors
        $this->view('admin/stations/addStation', $data);
      }

    } else {
       // Init data
       $data =[
        'stationID' => '',
        'latitude' => '',
        'longitude' => '',
        'name' => '',
        'qrCodePath' => '',
        'latitude_err' => '',
        'longitude_err' => '',
        'stationID_err' => '',
        'name_err' => '',
      ];

      // Load view
      $this->view('admin/stations/addStation', $data);
    }
  }
    
/*-----------------------------------------------------Edit Station--------------------------------------------------------*/

  public function editStation($stationID){
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Init data
      $data =[
        'stationID' => $stationID,
        'name' => trim($_POST['name']),
        'qrCodePath' => '',
        'stationID_err' => '',
        'name_err' => '',
      ];

      //Validate Station Name
      if(empty($data['name'])){
        $data['name_err'] = 'Please enter station name';
      } else {
        // Check Station
        if($this->stationModel->findStationName($data)){
          $data['name_err'] = 'Station is aleady added to the system';
        }
      }
    
      // Make sure errors are empty
      if(empty($data['name_err'])){

        //Register User
        if($this->stationModel->editStation($data)){
          redirect('admins/stations');
        } else {
          die('something went wrong');
        }
      } else {
        // Load view with errors
        $this->view('admin/stations/editStation', $data);
      }

    } else {
      
      $station = $this->stationModel->findStationByStationID($stationID);
      // Init data
      $data =[
        'stationID' => $stationID,
        'name' => $station->name,
        'qrCodePath' => '',
        'stationID_err' => '',
        'name_err' => '',
      ];

      // Load view
      $this->view('admin/stations/editStation', $data);
    }
  }

/*-----------------------------------------------------Update Station availability-----------------------------------------*/

  public function deactiveStation($id){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

      $ticket = $this->ticketModel->disTicketWhenStationClosed($id);
      $station = $this->stationModel->deactivateStation($id);
      $schedule = $this->sheduleModel->disScheduleWhenStationClosed($id);

      if($ticket && $station && $schedule){
        redirect('admins/stations');
      } else {
        die('Something went wrong');
      }
    } else {
      redirect('admins/stations');
    }
  }

  public function activeStation($id){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      if($this->stationModel->activateStation($id)){
        redirect('admins/closedStations');
      } else {
        die('Something went wrong');
      }
    } else {
      redirect('admins/closedStations');
    }
  }

/*-----------------------------------------------------Search Station------------------------------------------------------*/
  public function searchStation($nameOrId){
    
    $data = [
      'stations' => []
    ];

    if($stations = $this->adminModel->findStationByName($nameOrId)){
      $data =[
        'stations' => $stations,
      ];
    } else if($stations = $this->adminModel->findStationByStationID($nameOrId)){
      $data =[
        'stations' => $stations,
      ];
    }  

    if(!$stations){
      $this->view('admin/stations/stations',$data);
    } else if($data['stations'][0]->status == 1){
      $this->view('admin/stations/stations',$data);
    } else if($data['stations'][0]->status == 0){
      $this->view('admin/stations/hideStation',$data);
    }
       
  }

/*-----------------------------------------------------view Station Location-----------------------------------------------*/
  public function viewStationLocation($id){
    $details = $this->adminModel->findStationByStationID($id);
    $data = ['details' => $details[0]];
    $this->view('admin/stations/viewLocation',$data);
  }

/*=====================================================================================================================================
                                                SHEDULES CRUD FUNCTIONALITIES IN ADMIN
=======================================================================================================================================*/ 

/*-----------------------------------------------------Add Shedules---------------------------------------------------------*/
  public function addTrainShedule(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        'sheduleID' => trim($_POST['sheduleID']),
        'trainID'=> trim($_POST['trainID']),
        'departureStationID' => trim($_POST['departureStationID']),
        'departureDate' => (trim($_POST['departureDate'])),
        'departureTime' => trim($_POST['departureTime']),
        'arrivalStationID' => trim($_POST['arrivalStationID']),
        'arrivalDate' => trim($_POST['arrivalDate']),
        'arrivalTime' => trim($_POST['arrivalTime']),
        'sheduleID_err' => '',
        'trainID_err' => '',
        'departureStationID_err' => '',
        'departureDate_err' => '',
        'departureTime_err' => '',
        'arrivalStationID_err' => '',
        'arrivalDate_err' => '',
        'arrivalTime_err' => '',
      ];

      // echo '<pre>';
      // var_dump($data); 
      // echo '</pre>';

      //Chechk shedule ID
      if(empty($data['sheduleID'])){
        $data['sheduleID_err'] = 'Please enter shedule ID';
      } else {
        if($this->sheduleModel->findSheduleById($data['sheduleID'])){
          $data['sheduleID_err'] = 'Shedule is already exists';
        }
      }

      //Check if the train is registered
      if(empty($data['trainID'])){
        $data['trainID_err'] = 'Please enter train ID';
      } else {
        if(!$this->trainModel->searchTrainById($data['trainID'])){
          $data['trainID_err'] = 'Train is not registered';
        }
      }

      //Check the Station ID are the same
      if($data['departureStationID'] == $data['arrivalStationID']){
        $data['departureStationID_err'] = 'Arrival station and Departure station can not be the same';
        $data['arrivalStationID_err'] = 'Arrival station and Departure station can not be the same';
      }

      //Check the station is regeitered
      if(empty($data['departureStationID'])){
        $data['departureStationID_err'] = 'Please enter departure station ID';
      } else {
        if(!$this->adminModel->findStationByStationID($data['departureStationID'])){
          $data['departureStationID_err'] = 'Station is not registered';
        }
      }

      if(empty($data['arrivalStationID'])){
        $data['arrivalStationID_err'] = 'Please enter arrival station ID';
      } else {
        if(!$this->adminModel->findStationByStationID($data['arrivalStationID'])){
          $data['arrivalStationID_err'] = 'Station is not registered';
        }
      }

      //check date and time
      if(empty($data['departureDate'])){
        $data['departureDate_err'] = 'Please enter departure date';
      } 

      if(empty($data['departureTime'])){
        $data['departureTime_err'] = 'Please enter departure time';
      }

      if(empty($data['arrivalDate'])){
        $data['arrivalDate_err'] = 'Please enter arrival date';
      }

      if(empty($data['arrivalTime'])){
        $data['arrivalTime_err'] = 'Please enter arrival time';
      }

      if(($data['arrivalDate'] < $data['departureDate']) && (!empty($data['arrivalDate']) && !empty($data['departureDate']))){
        $data['departureDate_err'] = 'Departure date cannot be grater than the Arrival date';
        $data['arrivalDate_err'] = 'Arrival date cannot be smaller than the Departure date';
      }

      if(($data['arrivalDate'] == $data['departureDate']) && ($data['arrivalTime'] < $data['departureTime']) &&(!empty($data['arrivalDate']) && !empty($data['departureDate']))){
        $data['departureTime_err'] = 'Departure time cannot be grater than the Arrival time';
        $data['arrivalTime_err'] = 'Arrival time cannot be smaller than the Departure time';
      }
      
      //Make sure errors are empty
      if(empty($data['sheduleID_err']) && empty($data['tarinID_err']) && empty($data['departureStationID_err']) && empty($data['departureDate_err']) && empty($data['departureTime_err']) && empty($data['arrivalStationID_err']) && empty($data['arrivalDate_err']) && empty($data['arrivalTime_err'])){

        // $data['departureDate'] = date('y-m-d',strtotime(trim($_POST['departureDate'])));
        // $data['arrivalDate'] = date('y-m-d',strtotime(trim($_POST['arrivalDate'])));

        if($this->sheduleModel->addShedule($data)){
          redirect('admins/shedules');
        } else {
          die('Something went wrong');
        }

      } else {
        // Load view with errors
        $this->view('admin/shedules/addShedule', $data);
      }

    } else {
      $data = [
        'sheduleID' => '',
        'trainID'=>'',
        'departureStationID' =>'',
        'departureDate' =>'',
        'departureTime' =>'',
        'arrivalStationID' =>'',
        'arrivalDate' =>'',
        'arrivalTime' =>'',
        'sheduleID_err' => '',
        'trainID_err' => '',
        'departureStationID_err' => '',
        'departureDate_err' => '',
        'departureTime_err' => '',
        'arrivalStationID_err' => '',
        'arrivalDate_err' => '',
        'arrivalTime_err' => '',
      ];

      $this->view('admin/shedules/addShedule', $data);
    }
  }

/*-----------------------------------------------------Edit Train Shedule---------------------------------------------------*/
  public function editTrainShedule($sheduleID){
      
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Init data
      $data = [
        'sheduleID' => $sheduleID,
        'trainID'=> trim($_POST['trainID']),
        'departureStationID' => trim($_POST['departureStationID']),
        'departureDate' => (trim($_POST['departureDate'])),
        'departureTime' => trim($_POST['departureTime']),
        'arrivalStationID' => trim($_POST['arrivalStationID']),
        'arrivalDate' => trim($_POST['arrivalDate']),
        'arrivalTime' => trim($_POST['arrivalTime']),
        'sheduleID_err' => '',
        'trainID_err' => '',
        'departureStationID_err' => '',
        'departureDate_err' => '',
        'departureTime_err' => '',
        'arrivalStationID_err' => '',
        'arrivalDate_err' => '',
        'arrivalTime_err' => '',
      ];

      //Check if the train is registered
      if(empty($data['trainID'])){
        $data['trainID_err'] = 'Please enter train ID';
      } else {
        if(!$this->trainModel->searchTrainById($data['trainID'])){
          $data['trainID_err'] = 'Train is not registered';
        }
      }

      //Check the Station ID are the same
      if($data['departureStationID'] == $data['arrivalStationID']){
        $data['departureStationID_err'] = 'Arrival station and Departure station can not be the same';
        $data['arrivalStationID_err'] = 'Arrival station and Departure station can not be the same';
      }

      //Check the station is regeitered
      if(empty($data['departureStationID'])){
        $data['departureStationID_err'] = 'Please enter departure station ID';
      } else {
        if(!$this->adminModel->findStationByStationID($data['departureStationID'])){
          $data['departureStationID_err'] = 'Station is not registered';
        }
      }

      if(empty($data['arrivalStationID'])){
        $data['arrivalStationID_err'] = 'Please enter arrival station ID';
      } else {
        if(!$this->adminModel->findStationByStationID($data['arrivalStationID'])){
          $data['arrivalStationID_err'] = 'Station is not registered';
        }
      }

      //check date and time
      if(empty($data['departureDate'])){
        $data['departureDate_err'] = 'Please enter departure date';
      } 

      if(empty($data['departureTime'])){
        $data['departureTime_err'] = 'Please enter departure time';
      }

      if(empty($data['arrivalDate'])){
        $data['arrivalDate_err'] = 'Please enter arrival date';
      }

      if(empty($data['arrivalTime'])){
        $data['arrivalTime_err'] = 'Please enter arrival time';
      }

      if(($data['arrivalDate'] < $data['departureDate']) && (!empty($data['arrivalDate']) && !empty($data['departureDate']))){
        $data['departureDate_err'] = 'Departure date cannot be grater than the Arrival date';
        $data['arrivalDate_err'] = 'Arrival date cannot be smaller than the Departure date';
      }

      if(($data['arrivalDate'] == $data['departureDate']) && ($data['arrivalTime'] < $data['departureTime']) &&(!empty($data['arrivalDate']) && !empty($data['departureDate']))){
        $data['departureTime_err'] = 'Departure time cannot be grater than the Arrival time';
        $data['arrivalTime_err'] = 'Arrival time cannot be smaller than the Departure time';
      }
    
      //Make sure errors are empty
      if(empty($data['sheduleID_err']) && empty($data['trainID_err']) && empty($data['departureStationID_err']) && empty($data['departureDate_err']) && empty($data['departureTime_err']) && empty($data['arrivalStationID_err']) && empty($data['arrivalDate_err']) && empty($data['arrivalTime_err'])){

        // $data['departureDate'] = date('y-m-d',strtotime(trim($_POST['departureDate'])));
        // $data['arrivalDate'] = date('y-m-d',strtotime(trim($_POST['arrivalDate'])));

        if($this->sheduleModel->editShedule($data)){
          redirect('admins/shedules');
        } else {
          die('Something went wrong');
        }

      } else {
        // Load view with errors
        $this->view('admin/shedules/editShedule', $data);
      }

    } else {
      
      $shedule = $this->adminModel->findShedulebySheduleId($sheduleID);
      // Init data
      $data = [
        'sheduleID' => $sheduleID,
        'trainID'=>$shedule[0]->trainID,
        'departureStationID' =>$shedule[0]->departureStationID,
        'departureDate' =>$shedule[0]->departureDate,
        'departureTime' =>$shedule[0]->departureTime,
        'arrivalStationID' =>$shedule[0]->arrivalStationID,
        'arrivalDate' =>$shedule[0]->arrivalDate,
        'arrivalTime' =>$shedule[0]->arrivalTime,
        'sheduleID_err' => '',
        'trainID_err' => '',
        'departureStationID_err' => '',
        'departureDate_err' => '',
        'departureTime_err' => '',
        'arrivalStationID_err' => '',
        'arrivalDate_err' => '',
        'arrivalTime_err' => '',
      ];
        // echo '<pre>';
        // var_dump($shedule[0]->sheduleID);
        // echo '<pre>';
      $this->view('admin/shedules/editShedule', $data);
    }
  }

/*-----------------------------------------------------Update Activity------------------------------------------------------*/
  public function activateShedule($id){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      if($this->sheduleModel->activateShedule($id)){
        redirect('admins/deactivatedShedules');
      } else {
        die('Somthing went wrong');
      }
    } else {
      redirect('admins/deactivatedShedules');
    }
  }

  public function deactivateShedule($id){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      if($this->sheduleModel->deactivateShedule($id)){
        redirect('admins/shedules');
      } else {
        die('Somthing went wrong');
      }
    } else {
      redirect('admins/shedules');
    }
  }

/*-----------------------------------------------------Search Shedule-------------------------------------------------------*/
  public function searchSheduleByID(){

    $data = [
      'shedules' => [],
    ];

    if($result = $this->adminModel->findShedulebySheduleId($_GET['id'])){
      $data =[
        'shedules' => $result,
      ];
    } else if($result = $this->adminModel->findSheduleByTrainId($_GET['id'])){
      $data = [
        'shedules' => $result,
      ];
    }
    

    if(!$data['shedules']){
      $this->view('admin/shedules/shedules',$data);
    }else if($result[0]->sheduleValidity == 1){
      $this->view('admin/shedules/shedules',$data);
    } else if($result[0]->sheduleValidity == 0){
      $this->view('admin/shedules/hideShedules',$data);
    }   
       
  }

  public function searchSheduleByStation(){
    $result = $this->adminModel->findShedulebyDate($_GET['departuerStation'],$_GET['arrivalStation'],$_GET['date']);
    $data = [
      'shedules' => $result,
    ];

    $this->view('admin/shedules/shedules',$data);
  } 

/*=====================================================================================================================================
                                                ROUTES CRUD FUNCTIONALITIES IN ADMIN
=======================================================================================================================================*/ 

/*---------------------------------------------------------Add Rotes--------------------------------------------------------------*/
  public function addRoutes(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      // Process form

      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Init data
      $data =[
        'trainID' => trim($_POST['trainID']),
        'stationID' => trim($_POST['stationID']),
        'stopOrder' => trim($_POST['stopOrder']),
        'trainID_err' => '',
        'stationID_err' => '',
        'stopOrder_err' => '',
      ];

      //Validate train ID
      if(empty($data['trainID'])){
        $data['trainID_err'] = 'Please enter train ID';
      } else {
        // Check Station
        if(!$this->trainModel->searchTrainById($data['trainID'])){
          $data['trainID_err'] = 'Train is not registered in the system';
        }
      }

      //Validate Station ID
      if(empty($data['stationID'])){
        $data['stationID_err'] = 'Please enter station ID';
      } else {
        // Check Station
        if(!$this->adminModel->findStationByStationID($data['stationID'])){
          $data['stationID_err'] = 'Station is not registered in the system';
        }
      }

      //Validate Stop Order
      if(empty($data['stopOrder'])){
        $data['stopOrder_err'] = 'Please enter Stop Order';
      }
    
      // Make sure errors are empty
      if(empty($data['trainID_err']) && empty($data['stationID_err']) && empty($data['stopOrder_err'])){

        //Add Routes
        if($this->routeModel->addRoute($data)){
          redirect('admins/routes');
        } else {
          die('something went wrong');
        }
      } else {
        // Load view with errors
        $this->view('admin/routes/addRoute', $data);
      }

    } else {

      // Init data
      $data =[
        'trainID' => '',
        'stationID' => '',
        'stopOrder' => '',
        'trainID_err' => '',
        'stationID_err' => '',
        'stopOrder_err' => '',
      ];

      // Load view
      $this->view('admin/routes/addRoute', $data);
    }
  }

/*=====================================================================================================================================
                                                TICEKTS CRUD FUNCTIONALITIES IN ADMIN
=======================================================================================================================================*/ 

/*---------------------------------------------------------Add Ticket---------------------------------------------------------*/
  public function addTickets(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      // Process form

      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Init data
      $data =[
        'ticketID' => trim($_POST['ticketID']),
        'Station_1_ID' => trim($_POST['Station_1_ID']),
        'Station_2_ID' => trim($_POST['Station_2_ID']),
        'ClassID' => trim($_POST['ClassID']),
        'price' => trim($_POST['price']),
        'qrCode' => '',
        'ticketID_err' => '',
        'Station_1_ID_err' => '',
        'Station_2_ID_err' => '',
        'ClassID_err' => '',
        'price_err' => ''
      ];

      //Validate Ticket 
      if(empty($data['ticketID'])){
        $data['ticketID_err'] = 'Please enter Ticket ID';
      } else {
        if($this->stationModel->findTicketById($data['ticketID'])){
          $data['ticketID_err'] = 'Ticket is already added to the system';
        }
      }

      //Check the Station ID are the same
      if($data['Station_1_ID'] == $data['Station_2_ID']){
        $data['Station_1_ID_err'] = 'Station_1 and station_2 can not be the same';
        $data['Station_2_ID_err'] = 'Station_1 and station_2 can not be the same';
      }

      //Validate Departure Station ID 
      if(empty($data['Station_1_ID'])){
        $data['Station_1_ID_err'] = 'Please enter Station_1 ID';
      } else {
        // Check Station
        if(!$this->adminModel->findStationByStationID($data['Station_1_ID'])){
          $data['Station_1_ID_err'] = 'Station is not registered in the system';
        }
      }

      //Validate Arival Station ID
      if(empty($data['Station_2_ID'])){
        $data['Station_2_ID_err'] = 'Please enter Station_2 ID';
      } else {
        // Check Station
        if(!$this->adminModel->findStationByStationID($data['Station_2_ID'])){
          $data['Station_2_ID_err'] = 'Station is not registered in the system';
        }
      }

      //Validate Class
      if(empty($data['ClassID'])){
        $data['ClassID_err'] = 'Please enter class ID';
      } else {
        if(!$this->adminModel->findClassById($data['ClassID'])){
          $data['ClassID_err'] = 'Please enter valid class ID';
        }
      }

      //Validate ticket price
      if(empty($data['price'])){
        $data['price_err'] = 'Ticket price can not be empty';
      } else if($data['price'] <= 0){
        $data['price_err'] = 'Ticket price can not be negative or zero';
      }

      

    
      //Make sure errors are empty
      if(empty($data['ticketID_err']) && empty($data['price_err']) && empty($data['ClassID_err']) && empty($data['Station_2_ID_err']) && empty($data['Station_1_ID_err'])){

        //Generate QR
        if($qr = $this->genarateQR($data['ticketID'])){
          $data['qrCode'] = $qr;
        }

        //Add Tickets
        if($this->ticketModel->addTicket($data)){
          redirect('admins/tickets');
        } else {
          die('something went wrong');
        }
      } else {
        // Load view with errors
        $this->view('admin/tickets/addTicket', $data);
      }

    } else {

      // Init data
      $data =[
        'ticketID' => '',
        'Station_1_ID' => '',
        'Station_2_ID' => '',
        'ClassID' => '',
        'price' => '',
        'qrCode' => '',
        'ticketID_err' => '',
        'Station_1_ID_err' => '',
        'Station_2_ID_err' => '',
        'ClassID_err' => '',
        'price_err' => ''
      ];

      // Load view
      $this->view('admin/tickets/addTicket', $data);
    }
  }

/*---------------------------------------------------------Edit Ticket--------------------------------------------------------*/ 
  public function editTicket($ticketTD){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $ticket = $this->ticketModel->getTicketByID($ticketTD);

      // Init data
      $data =[
        'ticketID' => $ticketTD,
        'Station_1_name' => $ticket->station_1_name,
        'Station_2_name' => $ticket->station_2_name,
        'ClassID' => trim($_POST['ClassID']),
        'price' => trim($_POST['price']),
        'qrCode' => '',
        'ticketID_err' => '',
        'ClassID_err' => '',
        'price_err' => ''
      ];


      //Validate Class
      if(empty($data['ClassID'])){
        $data['ClassID_err'] = 'Please enter class ID';
      } else {
        if(!$this->adminModel->findClassById($data['ClassID'])){
          $data['ClassID_err'] = 'Please enter valid class ID';
        }
      }

      //Validate ticket price
      if(empty($data['price'])){
        $data['price_err'] = 'Ticket price can not be empty or zero';
      } else if($data['price'] < 0){
        $data['price_err'] = 'Ticket price can not be negative';
      }
    
      // Make sure errors are empty
      if(empty($data['price_err']) && empty($data['ClassID_err'])){

        //Add Tickets
        if($this->ticketModel->updateTicket($data)){
          redirect('admins/tickets');
        } else {
          die('something went wrong');
        }
      } else {
        // Load view with errors
        $this->view('admin/tickets/editTickets', $data);
      }
    } else {
      
      $ticket = $this->ticketModel->getTicketByID($ticketTD);

      $data =[
        'ticketID' => $ticketTD,
        'Station_1_name' => $ticket->station_1_name,
        'Station_2_name' => $ticket->station_2_name,
        'ClassID' => $ticket->classID,
        'price' => $ticket->price,
        'qrCode' => '',
        'ClassID_err' => '',
        'ticketID_err' => '',
        'price_err' => ''
      ];

      // Load view
      $this->view('admin/tickets/editTickets', $data);
    }
  }

/*---------------------------------------------------------Update Availability----------------------------------------------- */
  public function disableTicektAvalability($id){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      if($this->ticketModel->disableTicket($id)){
        redirect('admins/tickets');
      } else {
        die('something went wrong');
      } 
    } else {
      redirect('admins/tickets');
    }
  }

  public function enableTicektAvalability($id){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      if($this->ticketModel->enableTicket($id)){
        redirect('admins/unavailbleTickets');
      } else {
        die('something went wrong');
      } 
    } else {
      redirect('admins/unavailbleTickets');
    }
  }

/*---------------------------------------------------------Search Ticket Prices ----------------------------------------------*/
  public function searchTicketPrice($id){
    $tickets = $this->ticketModel->getTicketPriceById($id);
    
    $data = [
      'tickets' => $tickets
    ];

    if(!$tickets){
      $this->view('admin/tickets/tickets',$data);
    } else if($tickets[0]->valid == 1){
      $this->view('admin/tickets/tickets',$data);
    } else if($tickets[0]->valid == 0){
      $this->view('admin/tickets/notAvailableTickets',$data);
    }  
    
  }

/*=================================================================================================================================
                                              USER CRUD FUNCTIONALITY IN ADMIN
===================================================================================================================================*/

/*-----------------------------------------------------View Feedbacks-------------------------------------------------------*/
  public function feedback(){
    $feedback = $this->passengerModel->getFeedbacks();
    $data = ['feedback' => $feedback];
    $this->view('admin/feedback/feedback',$data);
  }

  public function getuserfeedback($id){
    $userFeedback = $this->adminModel->getuserfeedback($id);
    $data = ['feedback' => $userFeedback];
    $this->view('admin/users/userFeedback',$data);
     
  }

/*-----------------------------------------------------Travel Details-------------------------------------------------------*/

  public function getuserTravelDetails($id){
    $results = $this->adminModel->getuserTravelDetails($id);
    $data = ['userTravelDetails' => $results];
    $this->view('admin/users/userTravelDetails',$data);
    
  }

/*-----------------------------------------------------Search Travel Details------------------------------------------------*/
  public function searchTravelDetails(){
    $result = $this->adminModel->searchTravelDetails($_GET['date'],$_GET['id']);
    $data = ['userTravelDetails' => $result];
    $this->view('admin/users/userTravelDetails',$data);
  }

/*-----------------------------------------------------User Fine Details--------------------------------------------------*/
  public function getuserFineDetails($id){
    $results = $this->adminModel->getuserFineDetails($id);
    $data = ['userFineDetails' => $results];
    $this->view('admin/users/userFines',$data);
  }

}