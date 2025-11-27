<?php require_once 'views/template/header.php'; ?>
<h2><?= isset($comment) ? 'Edit Comment' : 'Add Comment' ?></h2>
<form action="index.php?entity=comment&action=<?= isset($comment) ? 'update&id=' . $comment['id'] : 'save' ?>"
  method="POST">
  <label>Task:</label>
  <select name="task_id" required>
    <option value="">Select Task</option>
    <?php foreach ($taskList as $t): ?>
      <option value="<?= $t['id'] ?>" <?= (isset($comment) && $comment['task_id'] == $t['id']) ? 'selected' : '' ?>>
        <?= $t['title'] ?>
      </option>
    <?php endforeach; ?>
  </select>

  <label>Content:</label>
  <textarea name="content" required><?= isset($comment) ? $comment['content'] : '' ?></textarea>

  <button type="submit">Save</button>
</form>
<?php require_once 'views/template/footer.php'; ?>