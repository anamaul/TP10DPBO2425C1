<?php require_once 'views/template/header.php'; ?>
<h2>Daftar Task</h2>
<a href="index.php?entity=task&action=add">Add Task</a>
<table>
  <tr>
    <th>Title</th>
    <th>User</th>
    <th>Category</th>
    <th>Status</th>
    <th>Actions</th>
  </tr>
  <?php foreach ($taskList as $t): ?>
    <tr>
      <td><?= htmlspecialchars($t['title']) ?></td>
      <td><?= htmlspecialchars($t['user_name']) ?></td>
      <td><?= htmlspecialchars($t['category_name']) ?></td>
      <td><?= htmlspecialchars($t['status']) ?></td>
      <td>
        <a href="index.php?entity=task&action=edit&id=<?= $t['id'] ?>">Edit</a> |
        <a href="index.php?entity=task&action=delete&id=<?= $t['id'] ?>" onclick="return confirm('Hapus?')">Delete</a>
      </td>
    </tr>
  <?php endforeach; ?>
</table>
<?php require_once 'views/template/footer.php'; ?>