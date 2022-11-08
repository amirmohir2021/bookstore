<?php
session_start();

if(isset($_SESSION['user_id']) && 
isset($_SESSION['user_email'])){



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <title>Add Author</title>
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

     <form action="php/add-author.php" class="shadow p-4 rounded mt-5"
     method="post" 
     style="width: 90%; max-width:50rem;">
        <h1 class="text-center pb-5 display-4 fs-3">
            Add New Author </h1>

            <div class="mb-3">
        <label class="form-label">Author Name</label>
        <input type="text" class="form-control"
        name="author_name">
    </div>
    <button type="submit" class="btn btn-primary">Add Author</button>
   </form>


</body>
</html>


<?php

}else{
     header("Location:login.php");
     exit;
}
?>