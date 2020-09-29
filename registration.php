


<?php
include('./config/dbconn.php');

if(isset($_POST['signup'])){
   $firstname=$_POST['firstname'];
   $lastname=$_POST['lastname'];
   $email=$_POST['email'];
   $address=$_POST['address'];
   $contact=$_POST['contact'];
   $password=$_POST['password'];
  

   move_uploaded_file($_FILES["photo"]["tmp_name"],"./uploads/" . $_FILES["photo"]["name"]);         
   $photo=$_FILES["photo"]["name"];
  
    $name="/^[a-zA-Z]+$/";
    if(!preg_match($name,$firstname)){
        echo "
        <div class='alert alert-warning'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <b>this $firstname is not valid..!</b>
    </div>"
        ;}

        $sql="select * from users where email='$email'";
        $check_sql= mysqli_query($dbconn,$sql);
        $count_email=mysqli_num_rows($check_sql);
        if($count_email>0){
            echo "
            <div class='alert alert-warning'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <b>Email Exsists..!</b>
        </div>
            ";
    }

    
    else{

    

           $query = "INSERT INTO users (firstname, lastname, email, address, contact , password, photo) 
           VALUES ('$firstname','$lastname','$email','$address','$contact','$password','$photo')";

    $result=mysqli_query($dbconn,$query);

    if($result){
        echo '<script>alert("successfullly register") </script>';
        
        header('Location:index.php');
    }
   }
   

}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Covid Funding</title>

    
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">

</head>


<body>

    <!--Navbar-->
    <header class="header-menu">
          
        <nav class="navbar navbar-expand-lg navbar-light sticky">
        <img src="./assets/images/xxx.png">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
              
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="mr-auto"></div>
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-success" data-toggle="modal" data-target="#loginModal">Login</a>
                  </li>
               
              
              </ul>
             
            </div>
          </nav>
      </header>
  

    <center>
      <section class="form my-2 mx-5 ">
        <div class="container loginarea">
            <div class="card reg" width="500px">

           
           
                <div class=" col-log-7 px-5 pt-3  ">
                    <form method="post" enctype="multipart/form-data">
                        <h2><b>Sign upto Your Account</b></h2>
                        
                        <div class="form-row">
                            <div class="form-group col-sm-6">
                                <input type="text" name="firstname" placeholder="First Name" class="form-control  p-2" required>
                            </div><br>
                            <div class="form-group col-sm-6">
                                <input type="text" name="lastname" placeholder="Last Name" class="form-control  p-2" required>
                            </div>
                            <div class="form-group col-sm-12">
                            <input type="text" name="username" placeholder="User-name" class="form-control  p-2"  required>
                        </div>
                    
                    <div class="form-group col-sm-12">
                        <input type="email" name="email" placeholder="Email-Address" class="form-control  p-2"  required>
                </div>
                <div class="form-group col-sm-12">
                    <input type="file" name="photo"  class="form-control  p-2" required>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <input type="text" name="address" placeholder="Address" class="form-control  p-2" required>
                </div><br>
                <div class="form-group col-sm-6">
                    <input type="text" name="contact" placeholder="Contact" class="form-control p-2" required>
                </div>
                <div class="form-group col-sm-12">
                    <input type="password" name="password" placeholder="**************" class="form-control  p-2"  required>
            </div>








                       <div class="foprm-row">
                           <div class="col-log-12">
                               <button type="submit" name="signup" class=" btn btn-success btn1  p-2">Sign up</button>
                           </div>
                       </div>
                      
                      


                    </form>
                   
                </div>
            </div>
        </div>
        <p>already have an account? <a href="index.php">Sign Up here</a> </p>
        </div>
    </section>
</center>



    <?php include('./footer.php');  ?>
<!-- jQuery first, then Popper.js, then Bootstrap JS. -->
<script src="../assets/js/jquery.slim.min.js"></script>
<script src="../assets/js/popper.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>