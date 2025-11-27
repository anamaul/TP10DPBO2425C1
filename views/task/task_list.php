<div class="container mt-4">
  <h2>Daftar Tugas</h2>
  <a href="index.php?page=tasks&action=create" class="btn btn-primary mb-3">Tambah Tugas</a>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Judul</th>
        <th>Kategori</th>
        <th>Assigned To</th>
        <th>Status</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($tasks as $row): ?>
        <tr>
          <td><?= htmlspecialchars($row['title']) ?></td>
          <td>
            <span class="badge" style="background-color: transparent; color: black; border: 1px solid black;">
              <?= htmlspecialchars($row['category_name']) ?>
            </span>
          </td>
          <td><?= htmlspecialchars($row['user_name']) ?></td>
          <td><?= htmlspecialchars($row['status']) ?></td>
          <td>
            <a href="index.php?page=tasks&action=edit&id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="index.php?page=tasks&action=delete&id=<?= $row['id'] ?>" class="btn btn-danger btn-sm"
              onclick="return confirm('Hapus?')">Hapus</a>
            <a href="index.php?page=comments&task_id=<?= $row['id'] ?>" class="btn btn-info btn-sm">Lihat Komentar</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>