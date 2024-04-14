<?php
  /*
   * Base Controller
   * Loads the models and views
   */
  class Controller {

    // Load model
    public function model($model){
      // Require model file
      require_once '../app/models/' . $model . '.php';

      // Instatiate model
      return new $model();
    }

    //Load view
    public function view($view, $data = []){
      //Check for view file
      if(file_exists('../app/views/'.$view.".php")){
        require_once '../app/views/'.$view.'.php';
      } else {
        //Views does not exit
        // die('Views does not exits');
      }
    }

    //Generate QR code
    public function genarateQR($id){

      // URL for the Google Charts API
      $googleApiUrl = "https://quickchart.io/qr?size=200&text=" . urlencode($id);
      
      //Read the content of the QR code
      $qrCodeImage = file_get_contents($googleApiUrl);

      //save path
      $savePath = "C:/xampp/htdocs/railwallet/public/qrCodes/".uniqid().".png";
      
      //save qr
      file_put_contents($savePath, $qrCodeImage);

      $filename = pathinfo($savePath, PATHINFO_FILENAME).".png";

      return $filename;
    }

  } 