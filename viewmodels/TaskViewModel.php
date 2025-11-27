<?php
require_once 'models/Task.php';
require_once 'models/User.php';
require_once 'models/Category.php';

class TaskViewModel
{
  private $task;
  private $user;
  private $category;

  public function __construct()
  {
    $this->task = new Task();
    $this->user = new User();
    $this->category = new Category();
  }
  public function getList()
  {
    return $this->task->getAll();
  }
  public function getById($id)
  {
    return $this->task->getById($id);
  }
  // Untuk Dropdown
  public function getUsers()
  {
    return $this->user->getAll();
  }
  public function getCategories()
  {
    return $this->category->getAll();
  }

  public function add($title, $description, $status, $user_id, $category_id)
  {
    return $this->task->create($title, $description, $status, $user_id, $category_id);
  }
  public function update($id, $title, $description, $status, $user_id, $category_id)
  {
    return $this->task->update($id, $title, $description, $status, $user_id, $category_id);
  }
  public function delete($id)
  {
    return $this->task->delete($id);
  }
}