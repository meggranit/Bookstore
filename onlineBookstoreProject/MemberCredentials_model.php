<?php


    class MemberCredentials{

        // Connection
        private $conn;
		
        // Table
        private $db_table = "MemberCredentials";

        // Columns
        public $email;
        public $password;

        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }
        
        // check for email registered before 
        
        
        public function duplicateEmail($email) {
        	$valid_email = true;
        
        	$sqlQuery = "SELECT COUNT(*) as email_count FROM " . $this->db_table . " WHERE email=:email";
            $stmt = $this->conn->prepare($sqlQuery);
            $this->email = htmlspecialchars(strip_tags($email));
            $stmt->bindParam(":email", $this->email);
            $stmt->execute();
            $result = $stmt->fetchAll();
            if ($result[0]["email_count"] > 0) {
            	$valid_email = false;
            }
            
            return $valid_email;
        }
        
        
        
        public function validateLogin($email, $password) {
        	$authorized_user = false;
        	$sqlQuery = "SELECT Members_memberID FROM " . $this->db_table . " WHERE email=:email AND password=PASSWORD(:password)";
            $stmt = $this->conn->prepare($sqlQuery);
            
            $this->email = htmlspecialchars(strip_tags($email));
            $this->password = htmlspecialchars(strip_tags($password));
            
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":password", $this->password);
            
            $stmt->execute();
            
            $authorized_user = 0;
            
            if ($stmt->rowCount() > 0) {
            	$result = $stmt->fetchAll();
            	// var_dump($result);
            	$authorized_user = $result[0]["Members_memberID"];
            	
            }
            
            return $authorized_user;
        }
        
        
 
 
        // Add new credentail 
        
        public function addMemberCredentials($Members_memberID, $email, $password) {
        	
        
        	$sqlQuery = "INSERT INTO " .
                        $this->db_table .
                        " SET " . " 
                        email = :email,
                        password = PASSWORD(:password),
                        Members_memberID = :Members_memberID ";
                        
            $stmt = $this->conn->prepare($sqlQuery);
                  
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":password", $password);
            $stmt->bindParam(":Members_memberID", $Members_memberID);
                
     
            if ($stmt->execute()) {
              return true;
            } else {
              return false;
            }
            
        }

       
        
      }  
      
?>
