<?php
require_once "config/Database.php";

class Task
{
  private $conn;
  private $table = "tasks";

  public function __construct()
  {
    $database = new Database();
    $this->conn = $database->getConnection();
  }

  public function getAll()
  {
    // Relasi ke User dan Category
    $query = "SELECT t.*, u.name as user_name, c.name as category_name 
                  FROM " . $this->table . " t
                  LEFT JOIN users u ON t.user_id = u.id
                  LEFT JOIN categories c ON t.category_id = c.id";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getById($id)
  {
    $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function create($title, $description, $status, $user_id, $category_id)
  {
    $query = "INSERT INTO " . $this->table . " (title, description, status, user_id, category_id) 
                  VALUES (:title, :description, :status, :user_id, :category_id)";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':category_id', $category_id);
    return $stmt->execute();
  }

  public function update($id, $title, $description, $status, $user_id, $category_id)
  {
    $query = "UPDATE " . $this->table . " 
                  SET title=:title, description=:description, status=:status, user_id=:user_id, category_id=:category_id 
                  WHERE id=:id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':category_id', $category_id);
    return $stmt->execute();
  }

  public function delete($id)
  {
    $query = "DELETE FROM " . $this->table . " WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
  }
}