<?php
require_once 'models/Task.php';
require_once 'models/User.php';
require_once 'models/Category.php';

class TaskViewModel
{
  private $db;
  private $taskModel;

  public function __construct($db)
  {
    $this->db = $db;
    $this->taskModel = new Task($db);
  }

  // Logic untuk menampilkan halaman utama
  public function index()
  {
    $stmt = $this->taskModel->read();
    $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Load view
    include 'views/template/header.php';
    include 'views/task/task_list.php';
    include 'views/template/footer.php';
  }

  // Logic untuk menampilkan form tambah
  public function create()
  {
    // Ambil data user dan category untuk dropdown (Relasi)
    $userModel = new User($this->db);
    $categoryModel = new Category($this->db);

    $users = $userModel->read()->fetchAll(PDO::FETCH_ASSOC);
    $categories = $categoryModel->read()->fetchAll(PDO::FETCH_ASSOC);

    include 'views/template/header.php';
    include 'views/task/task_form.php';
    include 'views/template/footer.php';
  }

  // Logic untuk menampilkan form edit
  public function edit($id)
  {
    $this->taskModel->id = $id;
    $this->taskModel->readOne();
    $task = $this->taskModel; // Data ter-bind ke object ini

    // Dropdown data
    $userModel = new User($this->db);
    $categoryModel = new Category($this->db);
    $users = $userModel->read()->fetchAll(PDO::FETCH_ASSOC);
    $categories = $categoryModel->read()->fetchAll(PDO::FETCH_ASSOC);

    include 'views/template/header.php';
    include 'views/task/task_form.php';
    include 'views/template/footer.php';
  }

  // Logic Simpan Data (Create/Update) dengan Data Binding
  public function save()
  {
    // Simple Data Binding dari $_POST ke Model Properties
    $this->taskModel->title = $_POST['title'];
    $this->taskModel->description = $_POST['description'];
    $this->taskModel->status = $_POST['status'];
    $this->taskModel->user_id = $_POST['user_id'];
    $this->taskModel->category_id = $_POST['category_id'];

    if (isset($_POST['id']) && !empty($_POST['id'])) {
      // Update
      $this->taskModel->id = $_POST['id'];
      if ($this->taskModel->update()) {
        header("Location: index.php?page=tasks");
      }
    } else {
      // Create
      if ($this->taskModel->create()) {
        header("Location: index.php?page=tasks");
      }
    }
  }

  public function delete($id)
  {
    $this->taskModel->id = $id;
    if ($this->taskModel->delete()) {
      header("Location: index.php?page=tasks");
    }
  }
}
?>