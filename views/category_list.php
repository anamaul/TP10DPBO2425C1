<?php require_once 'views/template/header.php'; ?>
<h2>Daftar Kategori</h2>
<a href="index.php?entity=category&action=add">Add Category</a>
<table>
  <tr>
    <th>Name</th>
    <th>Color</th>
    <th>Actions</th>
  </tr>
  <?php foreach ($categoryList as $c): ?>
    <tr>
      <td><?= htmlspecialchars($c['name']) ?></td>
      <td style="background-color:<?= $c['color'] ?>; color:white;"><?= htmlspecialchars($c['color']) ?></td>
      <td>
        <a href="index.php?entity=category&action=edit&id=<?= $c['id'] ?>">Edit</a> |
        <a href="index.php?entity=category&action=delete&id=<?= $c['id'] ?>" onclick="return confirm('Hapus?')">Delete</a>
      </td>
    </tr>
  <?php endforeach; ?>
</table>
<?php require_once 'views/template/footer.php'; ?>