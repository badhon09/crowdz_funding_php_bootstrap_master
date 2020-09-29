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
              <li class="nav-item">
                
                <a class="nav-link" href="#home">Hello <?php
                include("../config/dbconn.php");
                $query=mysqli_query($dbconn,"select * from users where user_id='".$_SESSION['user_id']."'");
                $row=mysqli_fetch_array($query);
                $fname=$row['firstname']; 
                $lname=$row['lastname'];
                $email=$row['email'];
                $address=$row['address'];
                $contact=$row['contact'];
                $name=$fname.' '.$lname;
                echo ''.$row['firstname'].''; 
                ?> </a>
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
          <?php if($row['photo'] != ""): ?>
            <img src="../uploads/<?php echo $row['photo']; ?>" width="150px" height="150px" aling="center">
           
            <?php else: ?>
            <img src="../uploads/default.jpg" width="300px" height="200px" aling="center">
            <?php endif; ?>
          </div>
          <div class="col-md-6 details">
            <blockquote>
              <h5><?php echo $name ?></h5>
              <small><cite title="Source Title">Address: <?php echo $address ?> <i class="icon-map-marker"></i></cite></small>
            </blockquote>
            <p>
              Email : <?php echo $email ?><br>
             Phone : <?php echo $contact ?> <br>
           
            </p>
            <a class="btn btn-danger button" href="user_edit_profile.php">edit profile</a>
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



        <center>      
            <h3>My Posts</h3><hr>

            <div class="row justify-content-center">

            <div>
             
             <div class="row mr-auto cardrow" aling="center">
         
             <?php
 $query = "SELECT * FROM posts Where user_id='".$_SESSION['user_id']."' ORDER BY post_id ASC";
 $result = mysqli_query($dbconn,$query);
 while($res = mysqli_fetch_array($result)) {  
     $post_id=$res['post_id'];
     $post_details=$res['post_details'];
     $name = $res['user_name'];
     $date=$res['post_date'];
     $tamount=$res['post_amount'];
     $amountget= $res['getamount'];
   ///  session_start();
     $_SESSION['post_id']=$post_id;

  
   
?>   
  

               <div class="card" style="width:350px">
               <center>
               <?php if($res['post_pic1'] != ""): ?>
         <img src="../uploads/<?php echo $res['post_pic1']; ?>" width="150px" height="150px" aling="center">
        
         <?php else: ?>
         <img src="../uploads/default.jpg" width="300px" height="200px" aling="center">
         <?php endif; ?></center>
                 <div class="card-body">
                   <h5 class="card-title"><?php echo $res['post_title'];?></h5>
                   <p class="card-text " style="font-size:15px">Fund Raise By : <?php echo $name ?> </p>
                   <p class="card-text" style="font-size:12px; color:blue;">post time : <?php echo $date ?> </p>
                   
                   <br>
                   <div class="row justify-content-center">
                   <p style="font-size:12px; color:green;">balance get:<?php echo $amountget ?></p>
                   <p class="ml-auto" style="font-size:12px; color:red; ">balance need:<?php echo $tamount ?></p>
         </div>
                   <a href="user_post_details.php?post_id=<?php echo $res['post_id'];?>" class="btn btn-success">View Details</a>
                   <a href="post_delete.php?post_id=<?php echo $res['post_id'];?>" class="btn btn-danger">Delete</a>
                 </div>
               </div>
 <?php } ?>


































                     
            



                    </div>

                </center> 

            </div>

        </div>


    </div>


  






    <footer class="foot">
  <hr>  
      <div class="container">
          <div class="row">             
              <div class="col-4 col-sm-4">
                  <h5>Links</h5>
                  <ul>
                      <li><a href="#">Home</a></li>
                      <li><a href="#">About</a></li>
                      <li><a href="#">Menu</a></li>
                      <li><a href="#">Contact</a></li>
                  </ul>
              </div>
              <div class="col-8 col-sm-4">
                  <h5>Our Address</h5>
                  <address class="address-text">
               1212,Gulshan<br>
                Dhaka<br>
                BANGLADESH<br>
                Tel.: +852 1234 5678<br>
                Fax: +852 8765 4321<br>
                Email: <a href="mailto:badhon@mail.com">covidhelp@mail.com</a>
             </address>
              </div>
              <div class=" col-sm-4 my-auto">
                 
                  <div >

                 <img href="" src="../assets/images/fb.png" width="35px">
                 <img href="" src="../assets/images/twi.png" width="35px">
                 <img href="" src="../assets/images/insta.png" width="35px">
                     
                  </div>
              </div>
         </div>
         <div class="row justify-content-center">             
              <div class="col-auto">
                  <h5>© Copyright Covid Founding</h5>
              </div>
         </div>
      </div>
  </footer>



<!-- jQuery first, then Popper.js, then Bootstrap JS. -->
<script src="../assets/js/jquery.slim.min.js"></script>
<script src="../assets/js/popper.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>