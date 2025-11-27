<?php require_once 'views/template/header.php'; ?>
<h2><?= isset($task) ? 'Edit Task' : 'Add Task' ?></h2>
<form action="index.php?entity=task&action=<?= isset($task) ? 'update&id=' . $task['id'] : 'save' ?>" method="POST">
  <label>Title:</label>
  <input type="text" name="title" value="<?= isset($task) ? $task['title'] : '' ?>" required>

  <label>Description:</label>
  <textarea name="description"><?= isset($task) ? $task['description'] : '' ?></textarea>

  <label>Status:</label>
  <select name="status">
    <option value="Pending" <?= (isset($task) && $task['status'] == 'Pending') ? 'selected' : '' ?>>Pending</option>
    <option value="In Progress" <?= (isset($task) && $task['status'] == 'In Progress') ? 'selected' : '' ?>>In Progress
    </option>
    <option value="Completed" <?= (isset($task) && $task['status'] == 'Completed') ? 'selected' : '' ?>>Completed</option>
  </select>

  <label>Assigned User:</label>
  <select name="user_id">
    <option value="">Select User</option>
    <?php foreach ($userList as $u): ?>
      <option value="<?= $u['id'] ?>" <?= (isset($task) && $task['user_id'] == $u['id']) ? 'selected' : '' ?>>
        <?= $u['name'] ?>
      </option>
    <?php endforeach; ?>
  </select>

  <label>Category:</label>
  <select name="category_id">
    <option value="">Select Category</option>
    <?php foreach ($categoryList as $c): ?>
      <option value="<?= $c['id'] ?>" <?= (isset($task) && $task['category_id'] == $c['id']) ? 'selected' : '' ?>>
        <?= $c['name'] ?>
      </option>
    <?php endforeach; ?>
  </select>

  <button type="submit">Save</button>
</form>
<?php require_once 'views/template/footer.php'; ?>