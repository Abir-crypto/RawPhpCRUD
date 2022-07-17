<?php
include 'connect.php';
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $mobile = $_POST['mobile'];

    $sql = "insert into `users` (name,email,mobile,password)
    values('$name', '$email', '$mobile', '$password')";

    $result = mysqli_query($con, $sql);
    if($result){
        // echo "Data inserted successfully";
        header('location:display.php');
    }
    else{
        die(mysqli_error($con));
    }
}
?>
<!-- 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Operation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5" style="display: flex;flex-direction: column;justify-content: center;">
        <form  method="post" style="width: 50%; margin:auto">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control mb-3" id="name" name='name' placeholder="John Doe" autocomplete="off" required>  
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control mb-3" id="email" name='email' placeholder="JohnDoe@gmail.com" autocomplete="off" required>  
            <label for="mobile" class="form-label">Mobile</label>
            <input type="text" class="form-control mb-3" id="mobile" name='mobile' placeholder="+8801558168727" autocomplete="off" required> 
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control mb-3" id="password" name='password' placeholder="Password" autocomplete="off" required> 

            <input type="submit" class="form-control btn-primary" name='submit'>
            <br>
            
        </form>
        <button class="btn btn-danger" style="margin:auto"> <a href="display.php" class='text-light text-decoration-none'>Go Back</a> </button>
        
    </div>
</body>
</html> -->