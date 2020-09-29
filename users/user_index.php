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


   
  
<?php
// including the database connection file
include("../config/dbconn.php");
if(isset($_POST['submit']))
{   
    $title=$_POST['title'];
    $amount=$_POST['amount'];
    $description=$_POST['description'];
    date_default_timezone_set('Asia/Manila');
    $date = date("Y-m-d H:i:s");            
    $getamount= 0;
   

    move_uploaded_file($_FILES["proof_pic1"]["tmp_name"],"../uploads/" . $_FILES["proof_pic1"]["name"]);         
    $proof_pic1=$_FILES["proof_pic1"]["name"];
    move_uploaded_file($_FILES["proof_pic2"]["tmp_name"],"../uploads/" . $_FILES["proof_pic2"]["name"]);         
    $proof_pic2=$_FILES["proof_pic2"]["name"];
  

    // checking empty fields
   
        if(empty($amount)) {
            echo "<font color='red'>Firstname field is empty!</font><br/>";
        }
        
 else {    
        //updating the table
        $query = "INSERT INTO posts (post_title, post_amount, post_details, post_pic1, post_pic2, user_id, user_name,post_date,getamount) 
                VALUES ('$title','$amount','$description','$proof_pic1','$proof_pic2','".$_SESSION['user_id']."','$name','$date','$getamount')";

        $result = mysqli_query($dbconn,$query);
        
        if($result){
            header('Location:user_index.php');
        }
        
    }
}
?>



    <!--Modals-->
    <div id="postModal" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg" role="content">
          <!-- Modal content-->
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title">Apply for Fund </h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                  <form method="post" enctype="multipart/form-data"> 
                      <div class="form-row">
                          <div class="form-group col-sm-6">
                                  <label class="sr-only" >Reason Title</label>
                                  <input type="text" class="form-control form-control-sm mr-1"  placeholder="Reason Title" name="title" required>
                          </div>
                          <div class="form-group col-sm-6">
                              <label class="sr-only" >Amount</label>
                              <input type="text" class="form-control form-control-sm mr-1"  placeholder="amount" name="amount" required>
                          </div>
                         
                      </div>

                      <div class="form-row">
                        <div class="form-group col-sm-12">
                                <label class="sr-only" >Description</label>
                                <input type="text" class="form-control"  placeholder="Description Here" name="description"  required>
                        </div>
                       
                       
                    </div>
                    <div class="form-row">
                       
                        <div class="form-group col-sm-6">
                            <label for="proof_pic1">upload photo proof</label>
                            <input type="file" class="form-control" id="proof_pic1" name="proof_pic1">  
                        </div>
                     
                        <div class="form-group col-sm-6">
                            <label for="proof_pic2">upload photo proof 2nd</label>
                            <input type="file" class="form-control" id="proof_pic2" name="proof_pic2">  
                        </div>
                    </div>
                    <div class="form-row">
                          <button type="button" class="btn btn-secondary btn-sm ml-auto" data-dismiss="modal">Cancel</button>
                          <button type="submit" name="submit" class="btn btn-primary btn-sm ml-1">Post</button>        
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>





  <div id="regModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg" role="content">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Registration </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row">
                        <div class="form-group col-sm-4">
                                <label class="sr-only" for="exampleInputEmail3">Email address</label>
                                <input type="email" class="form-control form-control-sm mr-1" id="exampleInputEmail3" placeholder="Enter email">
                        </div>

                        



                        <div class="form-group col-sm-4">
                            <label class="sr-only" for="exampleInputPassword3">Password</label>
                            <input type="password" class="form-control form-control-sm mr-1" id="exampleInputPassword3" placeholder="Password">
                        </div>
                    </div>


                    <div class="form-row">
                      <div class="form-group col-sm-4">
                              <label class="sr-only" for="exampleInputEmail3">Email address</label>
                              <input type="email" class="form-control form-control-sm mr-1" id="exampleInputEmail3" placeholder="Enter email">
                      </div>
                      <div class="form-group col-sm-4">
                          <label class="sr-only" for="exampleInputPassword3">Password</label>
                          <input type="password" class="form-control form-control-sm mr-1" id="exampleInputPassword3" placeholder="Password">
                      </div>
                  </div>





                    <div class="form-row">
                        <button type="button" class="btn btn-secondary btn-sm ml-auto" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary btn-sm ml-1">Sign in</button>        
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
              <a data-toggle="modal" data-target="#postModal" class="btn btn-success">apply for fund</a>
            </div>
            <div class="col-md-6">
              <img src="../assets/images/kindpng_1272363.png" width="300px" height="300px">
            </div>
            </div>
          </div>
		</div>
    </section>


    <section class="recent-donation">




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
            <div>
             
                <div class="row mr-auto cardrow" aling="center">
            
                <?php
 if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
$no_of_records_per_page = 9;
$offset = ($pageno-1) * $no_of_records_per_page;


$total_pages_sql = "SELECT COUNT(*) FROM posts";
$result = mysqli_query($dbconn,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);






    $query = "SELECT * FROM posts ORDER BY post_id ASC LIMIT $offset, $no_of_records_per_page";
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
     

                  <div class="card postcard" style="width:320px">
                  <center>
                  <?php if($res['post_pic1'] != ""): ?>
            <img class="pt-2"src="../uploads/<?php echo $res['post_pic1']; ?>" width="250px" height="150px" aling="center">
           
            <?php else: ?>
            <img src="../uploads/default.jpg" width="270px" height="350px" aling="center">
            <?php endif; ?></center>
                    <div class="card-body">
                      <h5 class="card-title" style="color:green;"><?php echo $res['post_title'];?></h5><hr>
                      <p class="card-text " style="font-size:15px">Fund Raise By : <?php echo $name ?> </p>
                      <p class="card-text" style="font-size:12px; color:blue;">post time : <?php echo $date ?> </p>
                      
                      <br>
                      <div class="row justify-content-center">
                      <p style="font-size:12px; color:green;">balance get:<?php echo $amountget ?></p>
                      <p class="ml-auto" style="font-size:12px; color:red; ">balance need:<?php echo $tamount ?></p>
            </div>
                      <a href="user_post_details.php?post_id=<?php echo $res['post_id'];?>" class="btn btn-success">View Details</a>
                    </div>
                  </div>
    <?php } ?>

                 


               

                 

                



            </div>
            
        </div>
        </center>
        </div>

       

        </div>
        <ul class="pagination justify-content-center pt-4 mb-4">
        <li class="page-item"><a href="?pageno=1"  class="page-link">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?> page-item">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>" class="page-link">Prev</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?> page-item">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?> " class="page-link">Next</a>
        </li>
        <li class="page-item"><a href="?pageno=<?php echo $total_pages; ?>" class="page-link">Last</a></li>
    </ul>

    </section>

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