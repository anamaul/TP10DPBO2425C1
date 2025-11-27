<?php
require_once "config/Database.php";

class Category//Category.php
{
  private $conn;
  private $table = "categories";//Table name

  public function __construct()//Constructor to initialize database connection
  {
    $database = new Database();
    $this->conn = $database->getConnection();
  }
//CRUD operations for Category
  public function getAll()
  {//Retrieve all categories
    $query = "SELECT * FROM " . $this->table;
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getById($id)
  {//Retrieve a category by ID
    $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function create($name, $color)
  {//Create a new category
    $query = "INSERT INTO " . $this->table . " (name, color) VALUES (:name, :color)";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':color', $color);
    return $stmt->execute();
  }

  public function update($id, $name, $color)
  {//Update an existing category
    $query = "UPDATE " . $this->table . " SET name = :name, color = :color WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':color', $color);
    return $stmt->execute();
  }

  public function delete($id)
  {//Delete a category
    $query = "DELETE FROM " . $this->table . " WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
  }
}