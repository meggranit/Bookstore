<?php
//include_once "MemberCredentials_model.php";

    class Books{

        // Connection
        private $conn;
		
        // Table
        private $db_table = "Books";

        // Columns
        private $bookID;
        public $bookTitle;
        public $authorFirstname;
        public $authorLastname;
        public $publishedYear;
        public $Members_memberID;
        public $bookBorrowed;
        public $bookCoverImage;

        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }
        
        
       
        public function getAllBooks() {
        	$sqlQuery = "SELECT bookID, bookTitle, authorFirstname, authorLastname, publishedYear, Members_memberID, bookBorrowed, bookCoverImage FROM " . $this->db_table;
        	
        	// echo $sqlQuery;
        	
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        }
        
        
        function addBook($bookID, $bookTitle, $authorFirstname, $authorLastname, $publishedYear, $Members_memberID, $bookBorrowed, $bookCoverImage) {
           $result = false;
           
           $sqlQuery = "INSERT INTO " . $this->db_table . " SET bookID=:bookID WHERE bookID=:id";
            $stmt = $this->conn->prepare($sqlQuery);
            $this->bookID = $bookID;
            $this->bookTitle = $bookTitle;
            $this->authorFirstname = $authorFirstname;
            $this->authorLastname = $authorLastname;
            $this->publishedYear = $publishedYear;
            $this->Members_memberID = $memberID;
            $this->bookBorrowed = $bookBorrowed;
            $this->bookCoverImage = $bookCoverImage;
            

            $stmt->bindParam(":bookID", $this->bookID);
            $stmt->bindParam(":bookTitle", $this->bookTitle);
            $stmt->bindParam(":authorFirstname", $this->authorFirstname);
            $stmt->bindParam(":authorLastname", $this->authorLastname);
            $stmt->bindParam(":Members_memberID", $this->Members_memberID);
            $stmt->bindParam(":bookBorrowed", $this->bookBorrowed);
            $stmt->bindParam(":bookCoverImage", $this->bookCoverImage);
            
            $stmt->execute();
            
            
            if ($stmt->rowCount() > 0) {
            	$result = true;
            	
            }
            
            
           return $result;
           
        }
      }  
?>
