<?php
class Category
{
  private $conn;
  private $table_name = "categories";

  public $id;
  public $name;
  public $color;

  public function __construct($db)
  {
    $this->conn = $db;
  }

  public function read()
  {
    $query = "SELECT * FROM " . $this->table_name . " ORDER BY id DESC";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt;
  }

  public function create()
  {
    $query = "INSERT INTO " . $this->table_name . " SET name=:name, color=:color";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":name", $this->name);
    $stmt->bindParam(":color", $this->color);
    return $stmt->execute();
  }

  public function update()
  {
    $query = "UPDATE " . $this->table_name . " SET name=:name, color=:color WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":name", $this->name);
    $stmt->bindParam(":color", $this->color);
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