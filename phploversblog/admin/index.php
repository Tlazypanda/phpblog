<?php include '../config/config.php'; ?>
<?php include '../libraries/database.php'; ?>
<?php include '../helpers/format_helper.php'; ?>
<?php include 'includes/header.php' ;?>

<?php 

$db = new Database;

//create query
$query="SELECT posts.*,categories.name FROM  posts INNER JOIN categories ON posts.category=categories.id";

//run query
$posts=$db->select($query);


//create query
$query="SELECT * FROM categories";

//run query
$categories=$db->select($query);
?>


<table class="table table-striped">
    
<tr>
    <th>Post id</th>
     <th>Post title</th>
     <th>Category</th>
     <th>Author</th>
    <th>Date</th>
    </tr>
    <?php while($row = $posts->fetch_assoc()) : ?>
    <tr>
    <td><?php echo $row['id'];?></td>
        <td><a href="edit_post.php?id=<?php echo $row['id']; ?>"><?php  echo $row['title'];?></a></td>
    <td><?php echo $row['name'];?></td>
    <td><?php echo $row['author'];?></td>
    <td><?php echo formatDate($row['date']);?></td>
    </tr>
    <?php endwhile ;?>
</table>

<table class="table table-striped">
<tr>
    <th>Category id#</th>
     <th>Category Name</th>
     
    </tr>
     <?php while($row = $categories->fetch_assoc()) : ?>
    <tr>
    <td><?php echo $row['id'];?></td>
        <td><a href="edit_category.php?id=<?php echo $row['id']; ?>"><?php echo $row['name'];?></a></td>
   
    </tr>
    <?php endwhile ;?>
</table>
<?php include 'includes/footer.php' ;?>