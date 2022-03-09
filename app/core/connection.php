<?php
class Connection {
    private $servername ;
    private $username;
    private $password;
    private $dbname;
     public function connect(){
         $this->servername="localhost";
         $this->username="root";
         $this->password="";
         $this->dbname="api";
         $conn = new mysqli("localhost","root","","api"); 
         return $conn; 
     }
    
 }
