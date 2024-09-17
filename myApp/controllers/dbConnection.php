<?php 
namespace MYAPP\Controllers;
    
    class dbConnection{
        protected $conn;
        public function __construct() {

            $servername="localhost";
            $username="phpmyadmin";
            $password="12345678";
            $dbname="task1_db";
        
            $conn=new \mysqli($servername, $username, $password, $dbname); 
        
            if($conn->connect_error){
                die("Connection failed: ".$conn->connect_error);  
            }                                              
        
            ini_set('display_errors',1);
            error_reporting(E_ALL);
            
            $this->conn = $conn;

        }
    }

?>