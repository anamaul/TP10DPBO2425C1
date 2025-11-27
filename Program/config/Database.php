<?php
class Database//Database.php
{//Database connection parameters
  private $host = "localhost";
  private $database = "db_taskmanager"; 
  private $username = "root";
  private $password = "";
  private $conn;
//Get the database connection
  public function getConnection()
  {
    $this->conn = null;
    try {//Establish a new database connection using PDO
      $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database, $this->username, $this->password);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Set error mode to exception
    } catch (PDOException $exception) {//Handle connection errors
      echo "Connection error: " . $exception->getMessage();
    }
    return $this->conn;//Return the connection object
  }
}