<?php
require_once("_inc/classes/connection.php");

class ContactForm extends Database {
    private $db;

        public function __construct()
        {
            $this->db = $this->connect();
        }

        function insert(){
          
                 if(isset($_POST['contact_submitted'])){
                    $data = array('contact_name'=>$_POST['name'],
                    'contact_phone'=>$_POST['phone'],
                    'contact_email'=>$_POST['email'],
                    //'contact_message'=>$_POST['message'],
                    'contact_message'=>filter_var($_POST['message'],FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                    );
                    
                    try{
                      $query = "INSERT INTO contact (name,phone, email, message) VALUES 
                      (:contact_name,:contact_phone, :contact_email, :contact_message)";
                      $query_run = $this->db->prepare($query);
                      $query_run->execute($data);  

                    }catch(PDOException $e){
                      $e->getMessage();
                    }              
                }
            }
}
?>
