<?php
include_once "MemberCredentials_model.php";

    class Members{

        // Connection
        private $conn;
		
        // Table
        private $db_table = "Members";

        // Columns
        private $memberID;
        public $firstname;
        public $lastname;
        

        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }
        
        public function getAllMembers() {
        	$sqlQuery = "SELECT memberID, firstname, lastname FROM " . $this->db_table;
        	
        	// echo $sqlQuery;
        	
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        }

        public function registerMember($firstname, $lastname, $email, $password){

            $sqlQuery = "INSERT INTO " .
                        $this->db_table .
                        " SET " . "
                        firstname = :firstname, 
                        lastname = :lastname, 
                        email = :email, 
                        password = :password";
             $stmt = $this->conn->prepare($sqlQuery);
                       
           
            
            $stmt->bindParam(":firstname", $firstname);
            $stmt->bindParam(":lastname", $lastname);
             $stmt->bindParam(":email", $email);
             $stmt->bindParam(":password", $password);
     
             if($stmt->execute()){
               return true;
            }
            return false;

        }
       
                
     }      	
        
         
?>
