<?php include '../config/config.php'; ?>
<?php include '../libraries/database.php'; ?>
<?php include '../helpers/format_helper.php'; ?>
<?php include 'includes/header.php' ;?>
<?php 
$id=$_GET['id'];

$db = new Database();

//create query
$query="SELECT * FROM categories WHERE id=".$id;

//run query
$category=$db->select($query)->fetch_assoc();


?>
<form method="post" action="edit_category.php">
  <div class="form-group" >
    <label for="name">Category Name</label>
    <input name="name" type="text" class="form-control"  placeholder="<?php echo $category['name'];?>" >
  </div>

  <input name="submit" type="submit" class="btn btn-default" value="Submit" />
    <a href="index.php" class="btn btn-default">Cancel</a>
      <input name="delete" type="submit" class="btn btn-danger" value="Delete" />
</form>
<?php include 'includes/footer.php' ;?>