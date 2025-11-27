<?php require_once 'views/template/header.php'; ?>
<h2>Daftar Komentar</h2>
<a href="index.php?entity=comment&action=add">Add Comment</a>
<table>
  <tr>
    <th>Task Title</th>
    <th>Content</th>
    <th>Date</th>
    <th>Actions</th>
  </tr>
  <?php foreach ($commentList as $cm): ?>
    <tr>
      <td><?= htmlspecialchars($cm['task_title']) ?></td>
      <td><?= htmlspecialchars($cm['content']) ?></td>
      <td><?= htmlspecialchars($cm['date']) ?></td>
      <td>
        <a href="index.php?entity=comment&action=edit&id=<?= $cm['id'] ?>">Edit</a> |
        <a href="index.php?entity=comment&action=delete&id=<?= $cm['id'] ?>" onclick="return confirm('Hapus?')">Delete</a>
      </td>
    </tr>
  <?php endforeach; ?>
</table>
<?php require_once 'views/template/footer.php'; ?>