<?php
require_once 'models/Comment.php';
require_once 'models/Task.php';

class CommentViewModel//CommentViewModel.php
{
  private $comment;
  private $task;
//Constructor to initialize Comment and Task models
  public function __construct()
  {
    $this->comment = new Comment();
    $this->task = new Task();
  }
  public function getList()
  {//Retrieve all comments
    return $this->comment->getAll();
  }
  public function getById($id)
  {//Retrieve a comment by ID
    return $this->comment->getById($id);
  }
  public function getTasks()
  {//Retrieve all tasks
    return $this->task->getAll();
  }

  public function add($content, $task_id)
  {//Create a new comment
    return $this->comment->create($content, $task_id);
  }
  public function update($id, $content, $task_id)
  {//Update an existing comment
    return $this->comment->update($id, $content, $task_id);
  }
  public function delete($id)
  {//Delete a comment
    return $this->comment->delete($id);
  }
}