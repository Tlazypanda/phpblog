<?php include '../config/config.php'; ?>
<?php include '../libraries/database.php'; ?>
<?php include '../helpers/format_helper.php'; ?>
<?php include 'includes/header.php' ;?>

<form method="post" action="add_category.php">
  <div class="form-group" >
    <label for="name">Category Name</label>
    <input name="name" type="text" class="form-control"  placeholder="Enter category">
  </div>

    <input name="submit" type="submit" class="btn btn-default" value="Submit" />
    <a href="index.php" class="btn btn-default">Cancel</a>
</form>
<?php include 'includes/footer.php' ;?>