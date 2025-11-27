<?php
require_once "config/Database.php";

class User//User.php
{
  private $conn;
  private $table = "users";
//Constructor to initialize database connection
  public function __construct()
  {
    $database = new Database();
    $this->conn = $database->getConnection();
  }
//CRUD operations for User
  public function getAll()
  {
    $query = "SELECT * FROM " . $this->table;
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
//Retrieve a user by ID
  public function getById($id)
  {
    $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
//Create a new user
  public function create($name, $email, $role)
  {
    $query = "INSERT INTO " . $this->table . " (name, email, role) VALUES (:name, :email, :role)";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':role', $role);
    return $stmt->execute();
  }
//Update an existing user
  public function update($id, $name, $email, $role)
  {
    $query = "UPDATE " . $this->table . " SET name = :name, email = :email, role = :role WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':role', $role);
    return $stmt->execute();
  }
//Delete a user
  public function delete($id)
  {
    $query = "DELETE FROM " . $this->table . " WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
  }
}