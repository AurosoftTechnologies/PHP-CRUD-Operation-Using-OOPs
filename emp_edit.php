<?php include "include/config.php"; ?>
<?php include "crud.php"; ?>
<?php 

$crud = new Crud();

if(isset($_POST['submit']))
{   
    $id = $crud->escape_string($_POST['id']);
    
    $name = $crud->escape_string($_POST['name']);
    $address = $crud->escape_string($_POST['address']);
    $city = $crud->escape_string($_POST['city']);
     $result = $crud->execute("UPDATE emp SET name='$name',address='$address',city='$city' WHERE id=$id");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location:emp_list.php");
    }
//getting id from url
$id = $crud->escape_string($_GET['id']);

//selecting data associated with this particular id
$result = $crud->getData("SELECT * FROM emp WHERE id=$id");

foreach ($result as $res) {
    $name = $res['name'];
    $address = $res['address'];
    $city = $res['city'];
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP CRUD - Book List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Book Shop</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>

              
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>

    
    <div class="container my-5">
        <h1>Edit Book</h1>
        <form method="post" action="emp_edit.php">
            <input type="hidden" name="id" value="<?php echo $id; ?>"/>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="<?php echo $name; ?>" placeholder="Enter Your Name">
          </div>
          <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" name="address" id="address"  value="<?php echo $address; ?>" placeholder="Enter Your Address">
          </div>
          <div class="mb-3">
            <label for="city" class="form-label">City</label>
            <input type="text" class="form-control" name="city" id="city"  value="<?php echo $city; ?>" placeholder="Enter Your City">
          </div>
         
          <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
        </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  
</body>
</html>