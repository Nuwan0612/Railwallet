<?php 

  class Chat {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getFaq(){
      $this->db->query("SELECT * FROM faq");
      $result = $this->db->resultSet();
      return $result;
    }

    public function insertfaq($data){
      $this->db->query("INSERT INTO faq (Question,Answer) VALUES (:question, :answer)" );
      $this->db->bind(':question',$data['question']);
      $this->db->bind(':answer',$data['answer']);
      if($this->db->execute()){
        return true;
      }else{
        return false;
      }
    }

    public function editfaq($data){
      $this->db->query('UPDATE faq SET Question = :question, Answer = :answer WHERE Q_ID= :id');
      $this->db->bind(':id',$data['id']);
      $this->db->bind(':question',$data['question']);
      $this->db->bind(':answer',$data['answer']);
      if($this->db->execute()){
        return true;
      }else{
        return false;
      }
    }

    public function takeFaq($id){
      $this->db->query('SELECT * FROM faq WHERE Q_ID=:id');
      $this->db->bind(':id',$id);
      $result = $this->db->single();
      return $result;
    
  }

  public function deletefaq($id){
    $this->db->query('DELETE FROM faq WHERE Q_ID = :id');
    $this->db->bind(':id', $id);
    
    if($this->db->execute()){
        return true;
    } else {
        return false;
    }
}

}

?>