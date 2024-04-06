<?php
  class Users extends Controller {
    public function __construct(){
      $this->userModel = $this->model('User');
    }

/*-----------------------------------------------------Register User-----------------------------------------------------------*/
    public function register(){
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
          'password' => trim($_POST['password']),
          'confirm_password' => trim($_POST['confirm_password']),
          'type' => 'user',
          'name_err' => '',
          'nic_err' => '',
          'phone_err' => '',
          'email_err' => '',
          'password_err' => '',
          'confirm_password_err' => ''
        ];

        //Validate Email
        if(empty($data['email'])){
          $data['email_err'] = 'Please enter email';
        } else {
          // Check email
          if($this->userModel->findUserByEmail($data['email'])){
            $data['email_err'] = 'Email is already taken';
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

        // Validate Password
        if(empty($data['password'])){
          $data['password_err'] = 'Please enter password';
        } elseif(strlen($data['password']) < 6){
          $data['password_err'] = 'Password must be at least 6 characters';
        }

        // Validate Confirm Password
        if(empty($data['confirm_password'])){
          $data['confirm_password_err'] = 'Please confirm password';
        } else {
          if($data['password'] != $data['confirm_password']){
            $data['confirm_password_err'] = 'Passwords do not match';
          }
        }

        // Make sure errors are empty
        if(empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) && empty($data['nic_err']) && empty($data['phone_err'])){
          // Validated
          
          // Hash Password
          $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

          //Register User
          if($this->userModel->register($data)){
            redirect('users/login');
          } else {
            die('something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('users/register', $data);
        }

      } else {
        // Init data
        $data =[
          'name' => '',
          'nic' => '',
          'phone' => '',
          'email' => '',
          'password' => '',
          'confirm_password' => '',
          'name_err' => '',
          'nic_err' => '',
          'phone_err' => '',
          'email_err' => '',
          'password_err' => '',
          'confirm_password_err' => ''
        ];

        // Load view
        $this->view('users/register', $data);
      }
    }


/*-----------------------------------------------------Login User-----------------------------------------------------------*/
    public function login(){
      // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        // Init data
        $data =[
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),
          'email_err' => '',
          'password_err' => '',
          'status' => '1',      
        ];

        // Validate Email
        if(empty($data['email'])){
          $data['email_err'] = 'Please enter email';
        }

        // Validate Password
        if(empty($data['password'])){
          $data['password_err'] = 'Please enter password';
        }

        //Check for user/email
        if($this->userModel->findUserByEmail($data['email'])){
          // User found
        } else {
          // User not found
          $data['email_err'] = 'No user found';
        }

        // Make sure errors are empty
        if(empty($data['email_err']) && empty($data['password_err'])){
          // Validated
          $loggedInUser = $this->userModel->login($data['email'],$data['password']);

          if($loggedInUser && $loggedInUser->status){
            // Create Session
            $this->createUserSession($loggedInUser);
          } else if($loggedInUser && !$loggedInUser->status){
            $data['status'] = '0';
            $this->view('users/login', $data);
          } else {
            $data['password_err'] = 'Password incorrect';
            $this->view('users/login', $data);
          }

        } else {
          // Load view with errors
          $this->view('users/login', $data);
        }


      } else {
        // Init data
        $data =[    
          'email' => '',
          'password' => '',
          'email_err' => '',
          'password_err' => '',        
        ];

        // Load view
        $this->view('users/login', $data);
      }
    }

/*-----------------------------------------------------Create User Session-----------------------------------------------------------*/
    public function createUserSession($user){
      $_SESSION['user_id'] = $user->id;
      $_SESSION['user_email'] = $user->email;
      $_SESSION['user_nic'] = $user->nic;
      $_SESSION['user_phone'] = $user->phone;
      $_SESSION['user_name'] = $user->name;

      if($user->type == 'admin'){
        redirect('admins/dashboard');
      } else if($user->type == 'user'){
        redirect('passengers/dashboard');
      } else if($user->type == 'checker'){
        redirect('checkers/dashboard');
      } else if($user->type == 'supporter'){
        redirect('supporters/dashboard');
      } else {
        redirect('users/login');
      }
      
    }

    public function logout(){
      unset($_SESSION['user_id']);
      unset($_SESSION['user_email']);
      unset($_SESSION['user_nic']);
      unset($_SESSION['user_phone']);
      unset($_SESSION['user_name']);
      session_destroy();
      redirect('pages/index');
    }

    //activate User
    public function activeUserStatus($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if($this->userModel->activeUser($id)){
          redirect('admins/deactivateUsers');
        } else {
          die('Something went wrong');
        }
      } else {
        redirect('admins/deactivateUsers');
      }
    }

    //Deactivate User
    public function deactiveUserStatus($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if($this->userModel->deactiveUser($id)){
          redirect('admins/users');
        } else {
          die('Something went wrong');
        }
      } else {
        redirect('admins/users');
      }
    }
    
  }