<?php
require_once 'models/Task.php';
require_once 'models/User.php';
require_once 'models/Category.php';

class TaskViewModel//TaskViewModel.php
{
  private $task;
  private $user;
  private $category;
//Constructor to initialize Task, User, and Category models
  public function __construct()
  {
    $this->task = new Task();
    $this->user = new User();
    $this->category = new Category();
  }
  //Methods to interact with Task model
  public function getList()
  {//Retrieve all tasks
    return $this->task->getAll();
  }
  public function getById($id)
  {//Retrieve a task by ID
    return $this->task->getById($id);
  }
  // Untuk Dropdown
  public function getUsers()
  {//Retrieve all users
    return $this->user->getAll();
  }
  public function getCategories()
  {//Retrieve all categories
    return $this->category->getAll();
  }

  public function add($title, $description, $status, $user_id, $category_id)
  {//Create a new task
    return $this->task->create($title, $description, $status, $user_id, $category_id);
  }
  public function update($id, $title, $description, $status, $user_id, $category_id)
  {//Update an existing task
    return $this->task->update($id, $title, $description, $status, $user_id, $category_id);
  }
  public function delete($id)
  {//Delete a task
    return $this->task->delete($id);
  }
}