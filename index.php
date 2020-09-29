

<?php 
  include("./config/dbconn.php");

  if(isset($_POST["btn-login"]))
  {
      $email=$_POST["email"];
      $pass=$_POST["password"];
      
      $sql=mysqli_query($dbconn,"select * from users where email='$email' and password='$pass'");
      if(mysqli_num_rows($sql))
      {
          while($row=mysqli_fetch_array($sql))
          {   
              $name=$row["firstname"];
              $id=$row["user_id"];
              session_start();
              $_SESSION["firstname"]=$name;
              $_SESSION["user_id"]=$id;
              $_SESSION["email"]=$email;
              
          }
        header("location:./users/user_index.php");
      }
      else{
         //$error="";
         echo "
         <div class='alert alert-warning'>
         <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
         <b>Invalid Login</b>
     </div>
         ";

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
    <link rel="stylesheet" href="./assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="./assets/css/font-awesome.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

    
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



    <!--Modals-->
    <div id="loginModal" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg" role="content">
          <!-- Modal content-->
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title">Login </h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <div class="modal-body">
                  <form method="POST" >
                      <div class="form-row">
                          <div class="form-group ">
                                  
                                  <input name="email" type="email" class="form-control " id="exampleInputEmail3" placeholder="Enter email">
                          </div><br>
                          </div>
                          <div class="form-row">
                          <div class="form-group">
                            
                              <input name="password" type="password" class="form-control " id="exampleInputPassword3" placeholder="Password"><br>
                              <button type="button" class="btn btn-secondary btn-sm " data-dismiss="modal">Cancel</button>
                          <button name="btn-login" type="submit" class="btn  btn-primary btn-sm ml-1">Sign in</button> 
</div>
                          
                          
                          
                      </div>
                     
                  </form>
              </div>
          </div>
      </div>
  </div>

 


      <!--ABOUT-->
      <section class="about">
          <div class="about-text-area">
            <div class="container ">
              <div class="row">
              <div class="col-md-6">
              <h1>Fund Rising for the People Affected by Covid 19</h1>
              <a href="registration.php" class="btn btn-success">Join Today</a>
            </div>
            <div class="col-md-6">
              <img src="./assets/images/kindpng_1272363.png" width="300px" height="300px">
            </div>
            </div>
          </div>
		</div>
    </section>
    


    <section class="feature-funds">
        <div class="container">
            <div class="feature-funds-title">
                <center>
                    <h2>Latest Fundings</h2>
                  
                </center>
            </div>
            <hr>
            <center>


            <div class="row mr-auto cardrow" aling="center">
            
          



            <div>
             
                <div class="row mr-auto cardrow" aling="center">
            
                <?php
            include('./config/dbconn.php');
$query = "SELECT * FROM posts ORDER BY post_id ASC";
$result = mysqli_query($dbconn,$query);
while($res = mysqli_fetch_array($result)) {  
    $post_id=$res['post_id'];
  
?>   

                  <div class="card postcard" style="width:320px">
                  <center>
                  <?php if($res['post_pic1'] != ""): ?>
            <img  src="./uploads/<?php echo $res['post_pic1']; ?>" width="250px" height="150px" aling="center"  alt="Card image">
           
            <?php else: ?>
            <img src="..uploads/default.jpg" width="300px" height="200px" aling="center">
            <?php endif; ?>
                    
                    <div class="card-body">
                      <h4 class="card-title"><?php echo $res['post_title'] ?></h4>
                     
                      <a href="registration.php" class="btn btn-success">View Details</a>
                    </div>
                  </div>
                  <?php } ?>
            




            </div>
            
        </div>
        </center>
        </div>
       

    </section>






    <?php include('./footer.php');  ?>


<!-- jQuery first, then Popper.js, then Bootstrap JS. -->
<script src="./assets/js/jquery.slim.min.js"></script>
<script src="./assets/js/popper.min.js"></script>
<script src="./assets/js/bootstrap.min.js"></script>
</body>
</html>