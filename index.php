<?php 

include('./connection.php');
include('./getFromDatabase.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online biblioteka</title>
</head>
<body class="bg-light">
    <h1 class="text-center m-2">Dostupne knjige</h1>
    <nav class="navbar navbar-light m-2">
            <form action="index.php" method="GET" class="form-inline">
            <div class="row">
                <div class="col-10">
                    <input name="term" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                </div>
                <div class="col-2">
                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                </div>
            </div>
            </form>
        </nav>
   <table class="table table-striped">
<thead>
    <th>Naziv knjige</th>
    <th>Ime autora</th>
    <th>Opis</th>
    <th>Dostupnost</th>
    <th>Uredi</th>
</thead>
<tbody>
<?php
                    $data = getFromDatabase($con);
                    $term = "term";
                    if (key_exists('term', $_GET)) {
                        $term = strtolower($_GET['term']);
                        $data = array_filter($data, function ($currentElement) use ($term) {
                                    $name = strtolower($currentElement['name']);
                                    $author = strtolower($currentElement['author']);
                                    
                                    return str_contains($name, $term) ||
                                        str_contains($author, $term);
                                        
                        });
                    }
                
                    if ($data === null)
                        echo "Nema podataka";
                    else {
                        foreach ($data as $currentElement) {
                            $id = $currentElement["id"];
                            $name = $currentElement["name"];
                            $author = $currentElement["author"];
                            $available = $currentElement["available"];
                            $description = $currentElement["description"];
                            echo "<tr>
                                    <td class=\"col-3\" id=\"name-$id\" value=\"$id\">$name</td>
                                    <td class=\"col-3\" id=\"author-$id\">$author</td>
                                    <td class=\"col-3\"id=\"description-$id\">$description</td>
                                    <td class=\"col-2\"id=\"available-$id\">$available</td>
                                    <td>
                                    <button type=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\" onclick=\"window.location.href= 'editBook.php?id=$id'\" data-target=\"#exampleModal\">
                                        Edit
                                    </button>
                                    </td>
                                    
                                  </tr>";
                        }
                    }
                ?>
</tbody>

   </table>
   <button class="offset-11 btn btn-primary mt-5" onclick="window.location.href= 'addBook.php'">Dodaj knjigu</button>

   

    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
</body>

</html>

</body>
</html>