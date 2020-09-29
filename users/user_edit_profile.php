<?php
    session_start();

    if (!isset($_SESSION['user_id']) ||(trim ($_SESSION['user_id']) == '')) {
        header('location:../index.php');
        exit();
        $_SESSION['user_id']=$id;
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Covid Funding</title>

    
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>


<body>

    <!--Navbar-->
    <header class="header-menu">
          
      <nav class="navbar navbar-expand-lg navbar-light sticky">
      <img src="../assets/images/xxx.png">
          
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
            
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <div class="mr-auto"></div>
            <ul class="navbar-nav">
              <li class="nav-item active">
                
                <a class="nav-link" href="#home">Hello <?php
                include("../config/dbconn.php");
                $query=mysqli_query($dbconn,"select * from users where user_id='".$_SESSION['user_id']."'");
                $row=mysqli_fetch_array($query);
                $fname=$row['firstname']; 
                $lname=$row['lastname'];
                $password=$row['password'];
                $email=$row['email'];
                $address=$row['address'];
                $contact=$row['contact'];
                $photo=$row['photo'];
                $name=$fname.' '.$lname;
                echo ''.$row['firstname'].''; 
                ?> <span class="sr-only">(current)</span></a>
              </li>
              
              <li class="nav-item">
              <a  class="nav-link" href="user_profile.php">My Profile</a>

              </li>
             
              <li class="nav-item">
                  <a class="btn btn-danger button" href="logout.php">Logout</a>
                </li>
            </ul>
           
          </div>
        </nav>
    </header>


    





<section class="profile-area">
    <div class="container">
        <div class="row">
        
          <div class="col-md-6 img">

          <form action="profile_update.php" method="post" enctype="">

          <?php if($row['photo'] != ""): ?>
            <img name="photo" src="../uploads/<?php echo $photo; ?>" width="350px" height="350px" aling="center">
           
            <?php else: ?>
            <img src="../uploads/default.jpg" width="300px" height="200px" aling="center">
            <?php endif; ?>
          </div>
          <div class="col-md-6 details">
            <blockquote>

              <h5>First Name:</h5>
              <input type="text" name="firstname" class="form-control form-control-sm mr-1"  value="<?php echo $fname ?>"> <br>

              <h5>Last Name:</h5>
              <input type="text" name="lastname" class="form-control form-control-sm mr-1"  value="<?php echo $lname ?>"> <br>

              <h5>Email:</h5>
              <input type="text" name="email" class="form-control form-control-sm mr-1"  value="<?php echo $email ?>"><br>

              <h5>Phone:</h5>
              <input type="text" name="contact" class="form-control form-control-sm mr-1"  value="<?php echo $contact ?>"><br>

              <h5>Adress:</h5>
              <input type="text" name="address" class="form-control form-control-sm mr-1"  value="<?php echo $address ?>"><br>

              <h5>Password:</h5>
              <input type="text" name="password" class="form-control form-control-sm mr-1"  value="<?php echo $password ?>"><br>
              
            </blockquote>
           
            <button type="submit" name="submit" class="btn1 my-3 p-2">Update</button>
            </form>
          </div>
          
        </div>
      
      </div>

    </section>

<style>
    .container{
    padding:5%;
}
.container .img{
    text-align:center;
}
.container .details{
    border-left:3px solid #ded4da;
}
.container .details p{
    font-size:15px;
    font-weight:bold;
}
</style>






                     
            




            </div>

        </div>


    </div>


  













    <?php include('../footer.php');  ?>

<!-- jQuery first, then Popper.js, then Bootstrap JS. -->
<script src="../assets/js/jquery.slim.min.js"></script>
<script src="../assets/js/popper.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>