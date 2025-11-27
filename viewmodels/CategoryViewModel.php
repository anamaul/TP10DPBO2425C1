<?php
require_once 'models/Category.php';

class CategoryViewModel
{
  private $model;

  public function __construct()
  {
    $this->model = new Category();
  }
  public function getList()
  {
    return $this->model->getAll();
  }
  public function getById($id)
  {
    return $this->model->getById($id);
  }
  public function add($name, $color)
  {
    return $this->model->create($name, $color);
  }
  public function update($id, $name, $color)
  {
    return $this->model->update($id, $name, $color);
  }
  public function delete($id)
  {
    return $this->model->delete($id);
  }
}