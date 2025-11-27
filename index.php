<?php
include_once 'config/Database.php';
include_once 'viewmodels/TaskViewModel.php';
// Include ViewModel lain (UserViewModel, CategoryViewModel, CommentViewModel) disini...

// Koneksi DB
$database = new Database();
$db = $database->getConnection();

// Routing Sederhana
$page = isset($_GET['page']) ? $_GET['page'] : 'tasks';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$id = isset($_GET['id']) ? $_GET['id'] : null;

switch ($page) {
  case 'tasks':
    $viewModel = new TaskViewModel($db);
    break;
  // Tambahkan case untuk 'users', 'categories', 'comments'
  // case 'users': $viewModel = new UserViewModel($db); break;
  default:
    $viewModel = new TaskViewModel($db);
    break;
}

// Eksekusi Action pada ViewModel
if ($action == 'index') {
  $viewModel->index();
} elseif ($action == 'create') {
  $viewModel->create();
} elseif ($action == 'save') {
  $viewModel->save(); // Menangani Data Binding dari POST
} elseif ($action == 'edit') {
  $viewModel->edit($id);
} elseif ($action == 'delete') {
  $viewModel->delete($id);
}
?>