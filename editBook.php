<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Edit</title>
</head>
<body class="bg-light">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
<?php
include "./connection.php";
?>
<h1 class="text-center m-5">Unesite nove podatke za edit</h1>
<form method="POST"class="">
    <div class="row mt-5 ms-3 ">
                         <div class="col-3">

                         <label for="name" class="fw-bold">Naziv</label>
                        <input type="text" id="name" name="name" required class="form-control"><br>
                        </div>
                            
                        <div class="col-3">
                            <label for="author" class="fw-bold">Autor</label>
                            <input class="form-control" type="author" id="author" name="author" required>
                        </div>
                        
                        <div class="col-3">
                            <label for="description" class="fw-bold">Opis</label>
                            <input class="form-control" type="description" id="description" name="description" required>
                        </div>
                    
                        <div class="col-3">
                            <label for="available" class="fw-bold mb-2">Dostupnost</label><br>
                            <input class="form-check-input" type="radio" id="available" name="available" value="Dostupna"required>
                            <label class="form-check-label" for="inlineCheckbox2">Dostupna</label>

                            <input class="form-check-input" type="radio" id="available" name="available" value="Posudjena" required>
                            <label class="form-check-label" for="inlineCheckbox2">Posudjena</label>
                        </div>
                            
                            </div>
                        
                    
                            <div class="col-2 offset-10 "><input class="form-control btn btn-primary" type="submit" value="Dodaj">
                            </div>
                            
                        </form>
                        <?php
if (isset($_REQUEST['name'])) {
$id = $_GET["id"];
    $name = $_POST["name"]; 
    $author = $_POST["author"];
    $description = $_POST["description"];
    $available = $_POST["available"];

    
    $query    = "update `books` set name='$name', author='$author', description='$description', available='$available' where id='$id'";
    $result   = mysqli_query($con, $query);

    if($result){
        echo  "
        <div class='alert alert-success  text-center col-4 offset-4'>
        <h3>Uspjesno ste uredili knjigu, posjetite <a href=\"index.php\">glavnu stranicu</a></h3><br/>
        
        </div>";
    }}
?>