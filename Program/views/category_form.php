<?php require_once 'views/template/header.php'; ?>
<h2><?= isset($category) ? 'Edit Category' : 'Add Category' ?></h2>
<form action="index.php?entity=category&action=<?= isset($category) ? 'update&id=' . $category['id'] : 'save' ?>"
  method="POST">
  <label>Name:</label>
  <input type="text" name="name" value="<?= isset($category) ? $category['name'] : '' ?>" required>

  <label>Color (Hex):</label>
  <input type="color" name="color" value="<?= isset($category) ? $category['color'] : '#000000' ?>" required>

  <button type="submit">Save</button>
</form>
<?php require_once 'views/template/footer.php'; ?>