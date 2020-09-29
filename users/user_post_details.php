<?php
    session_start();

    if (!isset($_SESSION['user_id']) ||(trim ($_SESSION['user_id']) == '')) {
        header('location:../index.php');
        exit();
       
    }
?>

<?php

$post_id=$_GET['post_id'];

?>
 






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Covid Funding</title>

    
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
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
                
                <a class="nav-link navname" href="#home">Hello <?php
                include("../config/dbconn.php");
                $query=mysqli_query($dbconn,"select * from users where user_id='".$_SESSION['user_id']."'");
                $row=mysqli_fetch_array($query);
                $fname=$row['firstname']; 
                $lname=$row['lastname'];
                $name=$fname.' '.$lname;
                echo ''.$row['firstname'].''; 
                ?> <span class="sr-only">(current)</span></a>
              </li>
              
             
             
              <li class="nav-item">
                  <a class="btn btn-danger button" href="logout.php">Logout</a>
                </li>
            </ul>
           
          </div>
        </nav>
    </header>


    <section class="post-details">
        <div class="container">
            <div class="row">
            <div class="col-md-8">
            <?php
    $query = "SELECT * FROM posts where post_id='$post_id' ";
    $result = mysqli_query($dbconn,$query);
    while($res = mysqli_fetch_array($result)) {  
        $post_id=$res['post_id'];
        $post_title=$res['post_title'];
        $post_details=$res['post_details'];
       // $name = $res['user_name'];
        $date=$res['post_date'];
        $tamount=$res['post_amount'];
        $amountget= $res['getamount'];
       // session_start();
        $_SESSION['post_id']=$post_id;

     
      
?>   

<h1></h1>



<div class="card" style="width:auto ; margin-top:3em;">
        <h4 class="card-title pt-3 px-3"><?php echo $post_title; ?></h4><hr>
       
            <div class="row justify-content-center">
            
                  <?php if($res['post_pic1'] != ""): ?>
            <img src="../uploads/<?php echo $res['post_pic1']; ?>" width="250px" height="300px" aling="center">
           
            <?php else: ?>
            <img src="../uploads/default.jpg" width="300px" height="200px" aling="center">
            <?php endif; ?>

          
                  <?php if($res['post_pic1'] != ""): ?>
            <img src="../uploads/<?php echo $res['post_pic2']; ?>" width="250px" height="300px" aling="center">
           
            <?php else: ?>
            
            <?php endif; ?>

             </div>
           
                    <div class="card-body">
                     
                      <p class="card-text" style="color:blue;">post time: <?php echo $date ?></p>
                      <p class="card-text" style="color:blue;">post by: <?php echo $name ?></p><hr>
                      <p  ><?php echo $post_details ?></p>
                    </div>
                  </div>


            </div>
    <?php } ?>
            <div class="col-md-4 donation" style="margin-top:3em;">
                  
                        <div class="container" style="margin-top:20px;">
                          <center>  <h5>Donation Progress</h5> </center>
<?php 
        $pvalue = ($amountget/$tamount)*100;

?>


            <div class="progress md-progress" style="height: 60px; margin-top:15px;">
  <div class="progress-bar" role="progressbar" style="width: <?php echo $pvalue?>%; height: 60px" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>


</div>
<div class="row" style=" margin-top:15px;">
    <p>Fund Got : <?php echo $amountget ?></p>
    <p class="ml-auto">Fund Need :<?php echo $tamount ?></p>
</div>



<div class="row justify-content-center">
    <form action="user_donate_payment.php" method="post">

<div class="input-group mb-3" width="100px">
  <div class="input-group-prepend">
    <span class="input-group-text">$</span>
  </div>
  <input type="text" name="donation" class="form-control" aria-label="Amount (to the nearest dollar)" >
  <div class="input-group-append">
    <span class="input-group-text">.00</span>
  </div>
</div>
<center>
<button type="submit" name="submit" href="user_donate_payment.php?donation=<?php echo $donation ?>" class="btn btn-primary">Donate</button>
<!--<button type="submit" name="submit" class="btn btn-primary">Donate</button>-->

</center>
</div>
    </div>

</form>
  </div>

  


  </div>
</div>
</div>
</section>


<style>
    

    </style>



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