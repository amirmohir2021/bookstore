<?php
session_start();

if(isset($_SESSION['user_id']) && 
isset($_SESSION['user_email'])){

      #Database Connection File
      include "db_conn.php";
    #Book helper function
  include "php/func-book.php";
  $books = get_all_books($con);
 #Author helper function
  include "php/func-author.php";
  $authors = get_all_author($con);

  #Category helper function
  include "php/func-category.php";
  $categories = get_all_category($con);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <title>ADMIN</title>
</head>
<body>
 

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Admin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" 
    id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php">Store</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="add-book.php">Add Book</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="add-category.php">Add Category</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="add-author.php">Add Author</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
     
  
    </div>
  </div>
</nav>
<div>
<br>
 <?php if($books == 0){?>
empty
 <?php }else{?>


  <!--List if All books-->
<h4 class="mt-5">All  Books</h4>

<table class="table table-bordered shadow">

<thead>
  <tr>
      <th>#</th>
      <th>Title</th>
      <th>Author</th>
      <th>Description</th>
      <th>Category</th>
      <th>Cover</th>
      <th>File</th>
      <th>Action</th>
  </tr>
 
</thead>
<tbody>
  <?php $i=0; foreach ($books as $book){
    $i++;
    ?>


<tr>
    <tr>
      <td><?php echo $i;?></td>
      <td>
        <?php echo $book['title']?> 
    </td>
      <td>
    <?php if($authors == 0){
      echo "Undefined";}else{
        foreach($authors as $author){
          if($author['id']==$book['author_id']){
                echo $author['name'];
          }
        }
      }
        ?></td>
      <td><?php echo $book['description']?></td>
      <td>
      
      <?php if($authors == 0){
      echo "Undefined";}else{
        foreach($categories as $category){
          if($category['id']==$book['category_id']){
                echo $category['name'];
          }
        }
      }
        ?>
    
    </td>
      <td>
        <!-- <img width="100" -->
       <!-- src="uploads/cover/"  > -->
       <img width="100" src="uploads/cover/<?php echo $book['cover']?>" alt="">
      </td>
      <td><?php echo $book['file']?></td>
       <td>
              <a href="" class="btn btn-warning">Edit</a>
              <a href="" class="btn btn-danger">Delete</a>
      </td>
</tr>
<?php }?>
</tbody>
</table>

      <?php }?>

      <?php if($categories == 0){?>
empty
 <?php }else{?>


      <!-- List off All categories -->
        <h4 class="mt-5"> All Categories</h4>
            <table class="table table-bordered shadow">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Categories</th>
                    <th>Action</th>
                  </tr>
                </thead>

                <tbody>
                  <?php  
                  $j=0;
                  foreach($categories as $category){
                      $j++;
                  ?>
                  <tr>
                        <td><?php echo $j; ?></td>
                        <td><?php echo $category['name'] ?></td>
                      <td>
                          <a href="" class="btn btn-warning">Edit</a>
                          <a href="" class="btn btn-danger">Delete</a>
                      </td>
                  </tr>  
                  <?php                   }?>
                </tbody>
          </table>
      <?php } ?>

      <?php if($authors == 0){?>
empty
 <?php }else{?>


      <!-- List off All Author -->
        <h4 class="mt-5"> All Author</h4>
            <table class="table table-bordered shadow">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Author Name</th>
                    <th>Action</th>
                  </tr>
                </thead>

                <tbody>
                  <?php  
                  $g=0;
                  foreach($authors as $author){
                      $g++;
                  ?>
                  <tr>
                        <td><?php echo $g; ?></td>
                        <td><?php echo $author['name'] ?></td>
                      <td>
                          <a href="" class="btn btn-warning">Edit</a>
                          <a href="" class="btn btn-danger">Delete</a>
                      </td>
                  </tr>  
                  <?php                   }?>
                </tbody>
          </table>
      <?php } ?>
</div>



</body>
</html>


<?php

}else{
     header("Location:login.php");
     exit;
}
?>