<div class="container mt-4">
  <h2><?= isset($task) ? 'Edit' : 'Tambah' ?> Tugas</h2>
  <form action="index.php?page=tasks&action=save" method="POST">
    <?php if (isset($task)): ?>
      <input type="hidden" name="id" value="<?= $task->id ?>">
    <?php endif; ?>

    <div class="mb-3">
      <label>Judul</label>
      <input type="text" name="title" class="form-control" value="<?= isset($task) ? $task->title : '' ?>" required>
    </div>

    <div class="mb-3">
      <label>Deskripsi</label>
      <textarea name="description" class="form-control"><?= isset($task) ? $task->description : '' ?></textarea>
    </div>

    <div class="mb-3">
      <label>User (Relasi)</label>
      <select name="user_id" class="form-control">
        <?php foreach ($users as $u): ?>
          <option value="<?= $u['id'] ?>" <?= (isset($task) && $task->user_id == $u['id']) ? 'selected' : '' ?>>
            <?= $u['name'] ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="mb-3">
      <label>Kategori (Relasi)</label>
      <select name="category_id" class="form-control">
        <?php foreach ($categories as $c): ?>
          <option value="<?= $c['id'] ?>" <?= (isset($task) && $task->category_id == $c['id']) ? 'selected' : '' ?>>
            <?= $c['name'] ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="mb-3">
      <label>Status</label>
      <select name="status" class="form-control">
        <option value="Pending" <?= (isset($task) && $task->status == 'Pending') ? 'selected' : '' ?>>Pending</option>
        <option value="In Progress" <?= (isset($task) && $task->status == 'In Progress') ? 'selected' : '' ?>>In Progress
        </option>
        <option value="Completed" <?= (isset($task) && $task->status == 'Completed') ? 'selected' : '' ?>>Completed
        </option>
      </select>
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="index.php?page=tasks" class="btn btn-secondary">Batal</a>
  </form>
</div>