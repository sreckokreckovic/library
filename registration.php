<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registracija</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body class="bg-light">
<?php
    include('./connection.php');
    

    if (isset($_REQUEST['username'])) {
        
        
        $username = $_POST['username'];
        $email    = $_POST['email'];
        $password = $_POST['password'];
        $query    = "INSERT into `users` (username, password, email)
                     VALUES ('$username','$password', '$email')";
        $result   = mysqli_query($con, $query);
        if ($result) {
           header('location:index.php');
        } else {
            echo "<div class='form'>
                  <h3>Registracija nije uspjesna, pokusajte ponovo</h3><br/>
                  <p class='text-primary'><a href='registration.php'>Pokusajte ponovo</a></p>
                  </div>";
        }
    } else {
?>
    <div style="margin-top: 30vh;"class="d-flex justify-content-center align-content-center ">
            <form method="POST"class=" form col-3 ">
                            <label for="username" class="fw-bold">Username</label>
                            <input type="text" id="username" name="username" required class="form-control"><br>

                            <label for="password" class="fw-bold">Email</label>
                            <input class="form-control" type="email" id="email" name="email" required><br>
                    
                            <label for="password" class="fw-bold">Password</label>
                            <input class="form-control" type="password" id="password" name="password" required><br>
                        
                        
                    
                            <input class="form-control btn btn-primary" type="submit" value="Sign up">
                            <p> Imate profil? <a class="text-success"href="login.php">Ulogujte  se</a></p>
                          
                        </form>
                        
        
                    </div>
<?php
    }
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>