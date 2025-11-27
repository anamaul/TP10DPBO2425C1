<?php
require_once 'models/User.php';

class UserViewModel
{
  private $model;

  public function __construct()
  {
    $this->model = new User();
  }
  public function getList()
  {
    return $this->model->getAll();
  }
  public function getById($id)
  {
    return $this->model->getById($id);
  }
  public function add($name, $email, $role)
  {
    return $this->model->create($name, $email, $role);
  }
  public function update($id, $name, $email, $role)
  {
    return $this->model->update($id, $name, $email, $role);
  }
  public function delete($id)
  {
    return $this->model->delete($id);
  }
}