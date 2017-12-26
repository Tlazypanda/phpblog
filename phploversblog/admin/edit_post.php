<?php include '../config/config.php'; ?>
<?php include '../libraries/database.php'; ?>
<?php include '../helpers/format_helper.php'; ?>
<?php include 'includes/header.php' ;?>
<?php 
$id=$_GET['id'];

$db = new Database();


//create query
$query="SELECT * FROM posts WHERE id=".$id;

//run query
$post=$db->select($query)->fetch_assoc();



//create query
$query="SELECT * FROM categories";

//run query
$categories=$db->select($query);


?>

<?php

if(isset($_POST['submit'])){
    //assign vars
    
   $title=mysqli_real_escape_string($db->link,$_POST['title']);
    $body=mysqli_real_escape_string($db->link,$_POST['body']);
    $category=mysqli_real_escape_string($db->link,$_POST['category']);
    $author=mysqli_real_escape_string($db->link,$_POST['author']);
    $tags=mysqli_real_escape_string($db->link,$_POST['tags']);
    echo $tags;
    //simple validation
    if($title == ''||$body == ''||$category == ''||$author == ''){
        //set error
        $error='Please fill out the required fields';
    }else{
        $query = "UPDATE posts SET
                      title='$title',
                      body='$body',
                      category='$category',
                      author='$author',
                      tags='$tags'
                      WHERE id=".$id;
        
        $update_row=$db->update($query);
    }
    }
?>

<form method="post" action="edit_post.php?id=<?php echo $id;?>">
  <div class="form-group" >
    <label>Post title</label>
    <input name="title" type="text" class="form-control"  placeholder="<?php echo $post['title'];?>">
  </div>
  <div class="form-group">
    <label>Post body</label>
      <textarea name="body" type="text" class="form-control"  placeholder="<?php echo $post['body'];?>"></textarea>
  </div>
  <div class="form-group">
    <label for="category">Category</label>
      
    <select name="category" class="form-control">
        <?php while($row=$categories->fetch_assoc()):?>
        <?php if($row['id']==$post['category']) {
               $selected='selected';
}else{
    $selected='';
}?>
      <option <?php echo $selected; ?>><?php echo $row['name'];?></option>
    <?php endwhile;?>
      </select>

  </div>
  <div class="form-group">
    <label>
      Author
    </label>
      <input name="author" type="text" class="form-control" placeholder="<?php echo $post['author'];?>">
  </div>
    
    <div class="form-group">
    <label>
      Tags
    </label>
      <input name="tags" type="text" class="form-control" placeholder="<?php echo $post['tags'];?>">
  </div>
    <input name="submit" type="submit" class="btn btn-default" value="Submit" />
    <a href="index.php" class="btn btn-default">Cancel</a>
        <input name="delete" type="submit" class="btn btn-danger" value="Delete" />
</form>
<?php include 'includes/footer.php' ;?>