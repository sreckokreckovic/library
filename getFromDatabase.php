<?php
include('./connection.php');
function getFromDatabase($con){

    $query= "SELECT * FROM `books`";
    $result= mysqli_query($con,$query);

    if($result){
        $assoc=mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $assoc;
    }

}


?>