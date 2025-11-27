<?php require_once 'views/template/header.php'; ?>
<h2>Daftar User</h2>
<a href="index.php?entity=user&action=add">Add User</a>
<table>
  <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Role</th>
    <th>Actions</th>
  </tr>
  <?php foreach ($userList as $u): ?>
    <tr>
      <td><?= htmlspecialchars($u['name']) ?></td>
      <td><?= htmlspecialchars($u['email']) ?></td>
      <td><?= htmlspecialchars($u['role']) ?></td>
      <td>
        <a href="index.php?entity=user&action=edit&id=<?= $u['id'] ?>">Edit</a> |
        <a href="index.php?entity=user&action=delete&id=<?= $u['id'] ?>" onclick="return confirm('Hapus?')">Delete</a>
      </td>
    </tr>
  <?php endforeach; ?>
</table>
<?php require_once 'views/template/footer.php'; ?>