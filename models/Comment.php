<?php
require_once "config/Database.php";

class Comment
{
  private $conn;
  private $table = "comments";

  public function __construct()
  {
    $database = new Database();
    $this->conn = $database->getConnection();
  }

  public function getAll()
  {
    $query = "SELECT c.*, t.title as task_title 
                  FROM " . $this->table . " c
                  LEFT JOIN tasks t ON c.task_id = t.id";
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

  public function create($content, $task_id)
  {
    $query = "INSERT INTO " . $this->table . " (content, task_id) VALUES (:content, :task_id)";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':task_id', $task_id);
    return $stmt->execute();
  }

  public function update($id, $content, $task_id)
  {
    $query = "UPDATE " . $this->table . " SET content=:content, task_id=:task_id WHERE id=:id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':task_id', $task_id);
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