
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Login</title>
</head>
<body class="bg-light">
    <?php 
    include('./connection.php');
    if(isset($_REQUEST['username'])){

        $username = $_POST['username'];
        $password = $_POST['password'];
        $query    = "SELECT * FROM `users` WHERE   username = '$username' AND password ='$password'";
        $result   = mysqli_query($con, $query);
        if (mysqli_num_rows($result) > 0) {
            
            header('location: index.php');
            exit;
          
       
        } else {
            echo "<div class='form'>
            <div class=\"col-4 offset-4 alert alert-danger\" role=\"alert\">
            Unijeli ste pogresan username ili password!
          </div>
                  </div>";
        }
    }
    
    
    
    ?>
    
<div style="margin-top: 30vh;"class="d-flex justify-content-center align-content-center ">
            <form method="POST"class=" form col-3 ">
                            <label for="username" class="fw-bold">Username</label>
                            <input type="text" id="username" name="username" required class="form-control"><br>
                    
                            <label for="password" class="fw-bold">Password</label>
                            <input class="form-control" type="password" id="password" name="password" required><br>
                        
                        
                    
                            <input class="form-control btn btn-primary" type="submit" value="Login">
                            <p> Nemate profil? <a class="text-primary"href="registration.php">Registrujte se</a></p>
                          
                        </form>
        
                    </div> 
                    
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
                
</body>

</html>
