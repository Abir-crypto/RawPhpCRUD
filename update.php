<?php

include 'connect.php';

if(isset($_GET['updateID'])){
    $id = $_GET['updateID'];

    $sql = "select * from `users` where id=$id";

    $result = mysqli_query($con, $sql);
    


    if($result){
        $row = mysqli_fetch_assoc($result);
    }
    else{
        echo "ehhheeee";
    }
}

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $mobile = $_POST['mobile'];

    $sql = "update `users` 
            set name='$name', email='$email', mobile='$mobile', password='$password'
            where id=$id";

    $result = mysqli_query($con, $sql);
    if($result){
        echo $id . $name . $email;
        header('location:display.php');
    }
    else{
        die(mysqli_error($con));
    }
}

?>
