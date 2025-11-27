<?php
require_once 'viewmodels/UserViewModel.php';//UserViewModel.php
require_once 'viewmodels/CategoryViewModel.php';//CategoryViewModel.php
require_once 'viewmodels/TaskViewModel.php';//TaskViewModel.php
require_once 'viewmodels/CommentViewModel.php';//CommentViewModel.php

$entity = isset($_GET['entity']) ? $_GET['entity'] : 'task';//Default to 'task' entity
$action = isset($_GET['action']) ? $_GET['action'] : 'list';//Default to 'list' action

// --- ENTITY: USER ---
if ($entity === 'user') {//User entity operations
  $vm = new UserViewModel();
  switch ($action) {//Action handling
    case 'list': //List all users
      $userList = $vm->getList();
      require_once 'views/user_list.php';//user_list.php
      break;
    case 'add': //Show form to add a new user
      require_once 'views/user_form.php';//user_form.php
      break;
    case 'edit': //Show form to edit an existing user
      $user = $vm->getById($_GET['id']);
      require_once 'views/user_form.php';//user_form.php
      break;
    case 'save': //Create a new user
      $vm->add($_POST['name'], $_POST['email'], $_POST['role']);//Create a new user
      header('Location: index.php?entity=user&action=list');//Redirect to user list
      break;
    case 'update': //Update an existing user
      $vm->update($_GET['id'], $_POST['name'], $_POST['email'], $_POST['role']);//Update user details
      header('Location: index.php?entity=user&action=list');//Redirect to user list
      break;
    case 'delete': //Delete a user
      $vm->delete($_GET['id']);//Delete user by ID
      header('Location: index.php?entity=user&action=list');//Redirect to user list
      break;
  }
}
// --- ENTITY: CATEGORY ---
elseif ($entity === 'category') {//Category entity operations
  $vm = new CategoryViewModel();
  switch ($action) {//Action handling
    case 'list': //List all categories
      $categoryList = $vm->getList();//Get all categories
      require_once 'views/category_list.php';//category_list.php
      break;
    case 'add': //Show form to add a new category
      require_once 'views/category_form.php';//category_form.php
      break;
    case 'edit': //Show form to edit an existing category
      $category = $vm->getById($_GET['id']);//Get category by ID
      require_once 'views/category_form.php';//category_form.php
      break;
    case 'save': //Create a new category
      $vm->add($_POST['name'], $_POST['color']);//Create a new category
      header('Location: index.php?entity=category&action=list');//Redirect to category list
      break;
    case 'update': //Update an existing category
      $vm->update($_GET['id'], $_POST['name'], $_POST['color']);//Update category details
      header('Location: index.php?entity=category&action=list');//Redirect to category list
      break;
    case 'delete': //Delete a category
      $vm->delete($_GET['id']);//Delete category by ID
      header('Location: index.php?entity=category&action=list');//Redirect to category list
      break;
  }
}
// --- ENTITY: TASK ---
elseif ($entity === 'task') {//Task entity operations
  $vm = new TaskViewModel();//TaskViewModel.php
  switch ($action) {//Action handling
    case 'list': //List all tasks
      $taskList = $vm->getList();//Get all tasks
      require_once 'views/task_list.php';//task_list.php
      break;
    case 'add': //Show form to add a new task
      $userList = $vm->getUsers();
      $categoryList = $vm->getCategories();//Get users and categories for dropdowns
      require_once 'views/task_form.php';//task_form.php
      break;
    case 'edit': //Show form to edit an existing task
      $task = $vm->getById($_GET['id']);//Get task by ID
      $userList = $vm->getUsers();
      $categoryList = $vm->getCategories();//Get users and categories for dropdowns
      require_once 'views/task_form.php';//task_form.php
      break;
    case 'save': //Create a new task
      $vm->add($_POST['title'], $_POST['description'], $_POST['status'], $_POST['user_id'], $_POST['category_id']);//Create a new task
      header('Location: index.php?entity=task&action=list');//Redirect to task list
      break;
    case 'update': //Update an existing task
      $vm->update($_GET['id'], $_POST['title'], $_POST['description'], $_POST['status'], $_POST['user_id'], $_POST['category_id']);//Update task details
      header('Location: index.php?entity=task&action=list');//Redirect to task list
      break;
    case 'delete': //Delete a task
      $vm->delete($_GET['id']);//Delete task by ID
      header('Location: index.php?entity=task&action=list');//Redirect to task list
      break;
  }
}
// --- ENTITY: COMMENT ---
elseif ($entity === 'comment') {//Comment entity operations
  $vm = new CommentViewModel();//CommentViewModel.php
  switch ($action) {//Action handling
    case 'list': //List all comments
      $commentList = $vm->getList(); //Get all comments
      require_once 'views/comment_list.php';//comment_list.php
      break;
    case 'add': //Show form to add a new comment
      $taskList = $vm->getTasks();//Get all tasks for dropdown
      require_once 'views/comment_form.php';//comment_form.php
      break;
    case 'edit': //Show form to edit an existing comment
      $comment = $vm->getById($_GET['id']);//Get comment by ID
      $taskList = $vm->getTasks();//Get all tasks for dropdown
      require_once 'views/comment_form.php';//comment_form.php
      break;
    case 'save': //Create a new comment
      $vm->add($_POST['content'], $_POST['task_id']);//Create a new comment
      header('Location: index.php?entity=comment&action=list');//Redirect to comment list
      break;
    case 'update': //Update an existing comment
      $vm->update($_GET['id'], $_POST['content'], $_POST['task_id']);//Update comment details
      header('Location: index.php?entity=comment&action=list');//Redirect to comment list
      break;
    case 'delete': //Delete a comment
      $vm->delete($_GET['id']);//Delete comment by ID
      header('Location: index.php?entity=comment&action=list');//Redirect to comment list
      break;
  }
} else {//Invalid entity handling
  echo "Entity not found. <a href='index.php'>Go Home</a>";
}
?>