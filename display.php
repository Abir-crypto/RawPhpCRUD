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
     <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/jquery.dataTables.min.css"
      integrity="sha512-1k7mWiTNoyx2XtmI96o+hdjP8nn0f3Z2N4oF/9ZZRgijyV4omsKOXEnqL1gKQNPy2MTSP9rIEWGcH/CInulptA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
</head>
<body>
    <div class="container my-5" style="width: 60%; margin:auto">
        <button class="btn btn-primary my-5 addUserBtn">Add User</button>


        <div class="container mb-5 addUser" style="display: flex;flex-direction: column;justify-content: center;">
            <form  method="post" action="user.php" style="width: 50%; margin:auto">
                <label for="name" class="form-label">Username</label>
                <input type="text" class="form-control mb-3" id="name" name='name' placeholder="John_Doe" autocomplete="off" required>  
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control mb-3" id="email" name='email' placeholder="JohnDoe@gmail.com" autocomplete="off" required>  
                <label for="mobile" class="form-label">Mobile</label>
                <input type="text" class="form-control mb-3" id="mobile" name='mobile' placeholder="+8801558168727" autocomplete="off" required> 
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control mb-3" id="password" name='password' placeholder="Password" autocomplete="off" required> 

                <input type="submit" class="form-control btn-primary" name='submit'>
                <br>
                
            </form>
            
        </div>


        <table class="table table-striped" id="example">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
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
                            <tr id=''>
                                <th>$id</th>
                                <td><input class='update".$id."' id='name$id' type='text' value=".$name." disabled ></td>
                                <td><input class='update".$id."' id='email$id' type='text' value=".$email." disabled ></td>
                                <td><input class='update".$id."' id='mobile$id' type='text' value=".$mobile." disabled ></td>
                                <td><input class='update".$id."' id='password$id' type='text' value=".$password." disabled ></td>
                                <td>
                                    <button class='btn btn-outline-success' id='".$id."'>Update</button>
                                    <a class='btn btn-outline-success submit' id='".$id."_submit'>Submit</a>
                                    
                                </td>
                                <td>
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

    <script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script>

    <!-- ✅ load DataTables ✅ -->
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"
      integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <script>
       
        $(document).ready(()=>{
            $('.addUser').hide();

            $('.submit').hide();

            $('.addUserBtn').click(()=>{
                $('.addUser').toggle();
            });
            
            $("button").click(function() {
                var id = '.update'+this.id;
                event.preventDefault();
                $(id).prop("disabled", false); // Element(s) are now enabled.
                $('#'+this.id).hide();
                $("#"+this.id+"_submit").show();
                
            });

            $(".submit").click(function(){
                var submitId = this.id;
                var idarr = submitId.split('_');
                var id = idarr[0];
                var name = $('#name'+id).val();
                var email = $('#email'+id).val();
                var mobile = $('#mobile'+id).val();
                var password = $('#password'+id).val();
                
                $.ajax({
                    url: "update.php",
                    type: "POST",
                    data: {
                        id: id,
                        name: name,
                        email: email,
                        mobile: mobile,
                        password: password
                    },
                    success: (data) => {
                        reload();
                    }
                })

                
            })
            function reload(){
                location.reload(true);
            }
        })
    </script>
</body>
</html>