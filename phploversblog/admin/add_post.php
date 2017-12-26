<?php include '../config/config.php'; ?>
<?php include '../libraries/database.php'; ?>
<?php include '../helpers/format_helper.php'; ?>
<?php include 'includes/header.php' ;?>
<?php 


$db = new Database();

if(isset($_POST['submit'])){
    //assign vars
    $title=mysqli_real_escape_string($db->link,$_POST['title']);
    $body=mysqli_real_escape_string($db->link,$_POST['body']);
    $category=mysqli_real_escape_string($db->link,$_POST['category']);
    $author=mysqli_real_escape_string($db->link,$_POST['author']);
    $tags=mysqli_real_escape_string($db->link,$_POST['tags']);
    
    //simple validation
    if($title == ''||$body == ''||$category == ''||$author == ''){
        //set error
        $error='Please fill out the required fields';
    }else{
        $query = "INSERT INTO posts
                  (title,body,category,author,tags)
                  VALUES('$title','$body','$category','$author','$tags')";
        
        $insert_row=$db->insert($query);
    }
    }
    
    





//create query
$query="SELECT * FROM categories";

//run query
$categories=$db->select($query);
?>

<form role="form" method="post" action="add_post.php">
  <div class="form-group" >
    <label for="title">Post title</label>
    <input name="title" type="text" class="form-control"  placeholder="Enter title">
  </div>
  <div class="form-group">
    <label for="body">Post body</label>
    <input name="body" type="text" class="form-control"  placeholder="Enter body">
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
      <input name="author" type="text" class="form-control" placeholder="Enter author">
  </div>
    
    <div class="form-group">
    <label>
      Tags
    </label>
      <input name="tags" type="text" class="form-control" placeholder="Enter tags">
  </div>
    <input name="submit" type="submit" class="btn btn-default" value="Submit" />
    <a href="index.php" class="btn btn-default">Cancel</a>
</form>
<?php include 'includes/footer.php' ;?>