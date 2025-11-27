<?php
require_once 'models/Comment.php';
require_once 'models/Task.php';

class CommentViewModel
{
  private $comment;
  private $task;

  public function __construct()
  {
    $this->comment = new Comment();
    $this->task = new Task();
  }
  public function getList()
  {
    return $this->comment->getAll();
  }
  public function getById($id)
  {
    return $this->comment->getById($id);
  }
  public function getTasks()
  {
    return $this->task->getAll();
  }

  public function add($content, $task_id)
  {
    return $this->comment->create($content, $task_id);
  }
  public function update($id, $content, $task_id)
  {
    return $this->comment->update($id, $content, $task_id);
  }
  public function delete($id)
  {
    return $this->comment->delete($id);
  }
}