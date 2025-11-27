<?php require_once 'views/template/header.php'; ?>
<h2><?= isset($user) ? 'Edit User' : 'Add User' ?></h2>
<form action="index.php?entity=user&action=<?= isset($user) ? 'update&id=' . $user['id'] : 'save' ?>" method="POST">
  <label>Name:</label>
  <input type="text" name="name" value="<?= isset($user) ? $user['name'] : '' ?>" required>

  <label>Email:</label>
  <input type="email" name="email" value="<?= isset($user) ? $user['email'] : '' ?>" required>

  <label>Role:</label>
  <select name="role">
    <option value="Staff" <?= (isset($user) && $user['role'] == 'Staff') ? 'selected' : '' ?>>Staff</option>
    <option value="Manager" <?= (isset($user) && $user['role'] == 'Manager') ? 'selected' : '' ?>>Manager</option>
    <option value="Admin" <?= (isset($user) && $user['role'] == 'Admin') ? 'selected' : '' ?>>Admin</option>
  </select>

  <button type="submit">Save</button>
</form>
<?php require_once 'views/template/footer.php'; ?>