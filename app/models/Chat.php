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
      } else {
        return false;
      }
    }
    
    public function getAvailableAgents(){
      $this->db->query("SELECT * FROM supprot_agents WHERE active = 1 AND busy = 0 ORDER BY number_of_chats ASC LIMIT 1");
      $result = $this->db->single();
      return $result;
    }

    public function checkUserInChat($sender){
      $this->db->query("SELECT * FROM supprot_agents WHERE passenger_id = :sender");
      $this->db->bind(':sender', $sender);
      $result = $this->db->single();
      return $result;
    }

    public function makeAgentBusy($supID, $pasID){
      $this->db->query("UPDATE supprot_agents SET busy = 1, number_of_chats = (number_of_chats + 1), passenger_id = :pass_id WHERE supporter_id = :id");
      $this->db->bind(':id', $supID);
      $this->db->bind(':pass_id', $pasID);
      if($this->db->execute()){
        return true;
      } else {
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
    
    public function addMessage($data){
      $this->db->query("INSERT INTO messages (sender_id, receiver_id, msg) VALUES (:sender, :receiver, :msg)");
      $this->db->bind(':sender', $data['sender']);
      $this->db->bind(':receiver', $data['agent']);
      $this->db->bind(':msg', $data['msg']);

      if($this->db->execute()){
        return true;
      } else {

        return false;
      }
    }


    public function takeFaq($id){
      $this->db->query('SELECT * FROM faq WHERE Q_ID=:id');
      $this->db->bind(':id',$id);
      $result = $this->db->single();
      return $result;
    }

    public function getChats($sender, $receiver){
      $this->db->query("SELECT * FROM messages WHERE (sender_id = :sender AND receiver_id = :receiver) OR (sender_id = :receiver AND receiver_id = :sender)");
      $this->db->bind(':sender', $sender);
      $this->db->bind(':receiver', $receiver);
      $results = $this->db->resultSet();
      return $results;
    }

    public function getMessages($id){
      $this->db->query("SELECT * FROM supprot_agents WHERE supporter_id = :id OR passenger_id = :id");
      $this->db->bind(':id', $id);
      $result = $this->db->single();
      return $result;
    }

    public function getPassenger($id){
      $this->db->query("SELECT passenger_id FROM supprot_agents WHERE supporter_id = :id");
      $this->db->bind(':id', $id);
      $result = $this->db->single();
      return $result;
    }

    public function addToWaitingQueue($id){
      $this->db->query("INSERT INTO waiting_que (passenger_id) VALUES (:id)");
      $this->db->bind(':id', $id);
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function clearChat($id){
      $this->db->query("UPDATE supprot_agents SET busy = 0, passenger_id = NULL WHERE supporter_id = :id");
      $this->db->bind(':id', $id);
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function clearChatWhenUserLogout($id){
      $this->db->query("UPDATE supprot_agents SET busy = 0, passenger_id = NULL WHERE passenger_id = :id");
      $this->db->bind(':id', $id);
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
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

    public function getFeedback(){
      $this->db->query("SELECT 
                          f.*,
                          u.fname,
                          u.lname,
                          u.userImage 
                        FROM 
                          feedbacks f
                        JOIN 
                          users u ON u.id = f.userID
                        ORDER BY 
                          f.rating DESC LIMIT 3");

      $result = $this->db->resultSet();
      return $result;
    }

    public function addQuestion($data){
      $this->db->query("INSERT INTO questionregardingproblems (name, email, message) VALUES (:name, :email, :message)");
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':message', $data['message']);

      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
    
  }

?>