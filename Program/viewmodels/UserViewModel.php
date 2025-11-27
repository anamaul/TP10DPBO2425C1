<?php
require_once 'models/User.php';

class UserViewModel//UserViewModel.php
{
  private $model;
//Constructor to initialize User model
  public function __construct()
  {
    $this->model = new User();
  }
  //Methods to interact with User model
  public function getList()
  {//Retrieve all users
    return $this->model->getAll();
  }
  public function getById($id)
  {//Retrieve a user by ID
    return $this->model->getById($id);
  }
  public function add($name, $email, $role)
  {//Create a new user
    return $this->model->create($name, $email, $role);
  }
  public function update($id, $name, $email, $role)
  {//Update an existing user
    return $this->model->update($id, $name, $email, $role);
  }
  public function delete($id)
  {//Delete a user
    return $this->model->delete($id);
  }
}