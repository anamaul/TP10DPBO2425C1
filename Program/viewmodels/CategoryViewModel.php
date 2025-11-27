<?php
require_once 'models/Category.php';

class CategoryViewModel//CategoryViewModel.php
{
  private $model;

  public function __construct()
  {
    $this->model = new Category();
  }
  //Methods to interact with Category model
  public function getList()
  {
    return $this->model->getAll();
  }
  public function getById($id)
  {
    return $this->model->getById($id);
  }
  public function add($name, $color)
  {//Create a new category
    return $this->model->create($name, $color);
  }
  public function update($id, $name, $color)
  {//Update an existing category
    return $this->model->update($id, $name, $color);
  }
  public function delete($id)
  {//Delete a category
    return $this->model->delete($id);
  }
}