<?php
class Task
{
  private $conn;
  private $table_name = "tasks";

  // Properti Data
  public $id;
  public $title;
  public $description;
  public $status;
  public $user_id;
  public $category_id;

  public function __construct($db)
  {
    $this->conn = $db;
  }

  // Read dengan Relasi (JOIN)
  public function read()
  {
    $query = "SELECT t.*, u.name as user_name, c.name as category_name 
                  FROM " . $this->table_name . " t
                  LEFT JOIN users u ON t.user_id = u.id
                  LEFT JOIN categories c ON t.category_id = c.id
                  ORDER BY t.id DESC";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt;
  }

  public function readOne()
  {
    $query = "SELECT * FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // Data Binding Manual ke Object
    $this->title = $row['title'];
    $this->description = $row['description'];
    $this->status = $row['status'];
    $this->user_id = $row['user_id'];
    $this->category_id = $row['category_id'];
  }

  public function create()
  {
    $query = "INSERT INTO " . $this->table_name . " 
                  SET title=:title, description=:description, status=:status, user_id=:user_id, category_id=:category_id";
    $stmt = $this->conn->prepare($query);

    // Sanitasi dan Bind
    $stmt->bindParam(":title", $this->title);
    $stmt->bindParam(":description", $this->description);
    $stmt->bindParam(":status", $this->status);
    $stmt->bindParam(":user_id", $this->user_id);
    $stmt->bindParam(":category_id", $this->category_id);

    return $stmt->execute();
  }

  public function update()
  {
    $query = "UPDATE " . $this->table_name . " 
                  SET title=:title, description=:description, status=:status, user_id=:user_id, category_id=:category_id
                  WHERE id=:id";
    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(":title", $this->title);
    $stmt->bindParam(":description", $this->description);
    $stmt->bindParam(":status", $this->status);
    $stmt->bindParam(":user_id", $this->user_id);
    $stmt->bindParam(":category_id", $this->category_id);
    $stmt->bindParam(":id", $this->id);

    return $stmt->execute();
  }

  public function delete()
  {
    $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->id);
    return $stmt->execute();
  }
}
?>