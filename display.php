<?php
    include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Operations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5" style="width: 60%; margin:auto">
        <button class="btn btn-primary my-5"><a href="user.php" class="text-light" style="text-decoration: none;">Add User</a></button>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Password</th>
                    <th scope="col">Operations</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "select * from `users`";
                    $results = mysqli_query($con, $sql);
                    
                    if($results){
                        while($row = mysqli_fetch_assoc($results)){
                            $id = $row['id'];
                            $name = $row['name'];
                            $email = $row['email'];
                            $password = $row['password'];
                            $mobile = $row['mobile'];

                            echo "
                            <tr>
                                <th>$id</th>
                                <td>$name</td>
                                <td>$email</td>
                                <td>$mobile</td>
                                <td>$password</td>
                                <td>
                                    <a href='update.php?updateID=$id' class='btn btn-outline-success'>Update</a>
                                    <a href='delete.php?deleteID=$id' class='btn btn-outline-danger'>Delete</a>
                                </td>
                            </tr>
                            ";
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>