<?php
class User
{
  private $conn;
  private $table_name = "users";

  public $id;
  public $name;
  public $email;
  public $role;

  public function __construct($db)
  {
    $this->conn = $db;
  }

  public function read()
  {
    $query = "SELECT * FROM " . $this->table_name;
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt;
  }
  // ... Implement create, update, delete methods
  public function create()
  {
    $query = "INSERT INTO " . $this->table_name . " SET name=:name, email=:email, role=:role";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":name", $this->name);
    $stmt->bindParam(":email", $this->email);
    $stmt->bindParam(":role", $this->role);
    return $stmt->execute();
  }
  public function update()
  {
    $query = "UPDATE " . $this->table_name . " SET name=:name, email=:email, role=:role WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":name", $this->name);
    $stmt->bindParam(":email", $this->email);
    $stmt->bindParam(":role", $this->role);
    $stmt->bindParam(":id", $this->id);
    return $stmt->execute();
  }
  public function delete()
  {
    $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":id", $this->id);
    return $stmt->execute();
  }

}
?>