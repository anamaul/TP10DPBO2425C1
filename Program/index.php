<?php
require_once 'viewmodels/UserViewModel.php';
require_once 'viewmodels/CategoryViewModel.php';
require_once 'viewmodels/TaskViewModel.php';
require_once 'viewmodels/CommentViewModel.php';

$entity = isset($_GET['entity']) ? $_GET['entity'] : 'task';
$action = isset($_GET['action']) ? $_GET['action'] : 'list';

// --- ENTITY: USER ---
if ($entity === 'user') {
  $vm = new UserViewModel();
  switch ($action) {
    case 'list':
      $userList = $vm->getList();
      require_once 'views/user_list.php';
      break;
    case 'add':
      require_once 'views/user_form.php';
      break;
    case 'edit':
      $user = $vm->getById($_GET['id']);
      require_once 'views/user_form.php';
      break;
    case 'save':
      $vm->add($_POST['name'], $_POST['email'], $_POST['role']);
      header('Location: index.php?entity=user&action=list');
      break;
    case 'update':
      $vm->update($_GET['id'], $_POST['name'], $_POST['email'], $_POST['role']);
      header('Location: index.php?entity=user&action=list');
      break;
    case 'delete':
      $vm->delete($_GET['id']);
      header('Location: index.php?entity=user&action=list');
      break;
  }
}
// --- ENTITY: CATEGORY ---
elseif ($entity === 'category') {
  $vm = new CategoryViewModel();
  switch ($action) {
    case 'list':
      $categoryList = $vm->getList();
      require_once 'views/category_list.php';
      break;
    case 'add':
      require_once 'views/category_form.php';
      break;
    case 'edit':
      $category = $vm->getById($_GET['id']);
      require_once 'views/category_form.php';
      break;
    case 'save':
      $vm->add($_POST['name'], $_POST['color']);
      header('Location: index.php?entity=category&action=list');
      break;
    case 'update':
      $vm->update($_GET['id'], $_POST['name'], $_POST['color']);
      header('Location: index.php?entity=category&action=list');
      break;
    case 'delete':
      $vm->delete($_GET['id']);
      header('Location: index.php?entity=category&action=list');
      break;
  }
}
// --- ENTITY: TASK ---
elseif ($entity === 'task') {
  $vm = new TaskViewModel();
  switch ($action) {
    case 'list':
      $taskList = $vm->getList();
      require_once 'views/task_list.php';
      break;
    case 'add':
      $userList = $vm->getUsers();
      $categoryList = $vm->getCategories();
      require_once 'views/task_form.php';
      break;
    case 'edit':
      $task = $vm->getById($_GET['id']);
      $userList = $vm->getUsers();
      $categoryList = $vm->getCategories();
      require_once 'views/task_form.php';
      break;
    case 'save':
      $vm->add($_POST['title'], $_POST['description'], $_POST['status'], $_POST['user_id'], $_POST['category_id']);
      header('Location: index.php?entity=task&action=list');
      break;
    case 'update':
      $vm->update($_GET['id'], $_POST['title'], $_POST['description'], $_POST['status'], $_POST['user_id'], $_POST['category_id']);
      header('Location: index.php?entity=task&action=list');
      break;
    case 'delete':
      $vm->delete($_GET['id']);
      header('Location: index.php?entity=task&action=list');
      break;
  }
}
// --- ENTITY: COMMENT ---
elseif ($entity === 'comment') {
  $vm = new CommentViewModel();
  switch ($action) {
    case 'list':
      $commentList = $vm->getList();
      require_once 'views/comment_list.php';
      break;
    case 'add':
      $taskList = $vm->getTasks();
      require_once 'views/comment_form.php';
      break;
    case 'edit':
      $comment = $vm->getById($_GET['id']);
      $taskList = $vm->getTasks();
      require_once 'views/comment_form.php';
      break;
    case 'save':
      $vm->add($_POST['content'], $_POST['task_id']);
      header('Location: index.php?entity=comment&action=list');
      break;
    case 'update':
      $vm->update($_GET['id'], $_POST['content'], $_POST['task_id']);
      header('Location: index.php?entity=comment&action=list');
      break;
    case 'delete':
      $vm->delete($_GET['id']);
      header('Location: index.php?entity=comment&action=list');
      break;
  }
} else {
  echo "Entity not found. <a href='index.php'>Go Home</a>";
}
?>