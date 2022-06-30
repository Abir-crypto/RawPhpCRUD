<?php

include 'connect.php';

if(isset($_GET['deleteID'])){
    $id = $_GET['deleteID'];

    $sql = "delete from `users` where id=$id";

    $result = mysqli_query($con, $sql);

    if($result){
        header('location:display.php');
    }
    else{
        echo "ehhheeee";
    }
}