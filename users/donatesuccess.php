
<?php
session_start();
//$donation=$_POST["donation"];
  
//$_SESSION["donation"]=$donation;
?>
<?php
 include("../config/dbconn.php");
    

    if (!isset($_SESSION['user_id']) ||(trim ($_SESSION['user_id']) == '')) {
        header('location:../index.php');
        exit();
       // session_start();
        $_SESSION['user_id']=$id;
        $_SESSION['post_id']=$post_id;
       // $_SESSION["donation"]=$donation;
      // $donation=$_POST['holdname'];
echo "Study " . $_GET['donation'] . " at " . $_GET['donation'];
      $donation=$_GET['donation'];
      echo $_GET['donation'];

      $_GET['donation']=$a;
       
        

       
        
    }
?>
<?php
 include("../config/dbconn.php");
 //$donation=$_SESSION["donation"];
  $query = "SELECT * FROM posts where post_id=".$_SESSION['post_id']." ";
  $result = mysqli_query($dbconn,$query);
  $res = mysqli_fetch_array($result); 
      $post_id=$res['post_id'];
      $post_user_id=$res['user_id'];
      $post_username=$res['username'];
     // $name = $res['user_name'];
      $date=$res['post_date'];
      $tamount=$res['post_amount'];
      $amountget= $res['getamount'];
      $updateamount = $amountget + $_GET['donation'];
     // session_start();
     // $_SESSION['post_id']=$post_id;

     $query5 = "SELECT * FROM users where user_id=".$_SESSION['user_id']." ";
  $result = mysqli_query($dbconn,$query5);
  $res = mysqli_fetch_array($result); 
      $d_user_id=$res['user_id'];
      $firstname=$res['firstname'];
      $lastname=$res['lastname'];
      $d_user_name=$firstname.' '.$lastname;
    


     $query2 = "UPDATE posts
     SET getamount = '$updateamount'
     WHERE post_id=".$_SESSION['post_id']."";
     $result = mysqli_query($dbconn,$query2);





     date_default_timezone_set('Asia/Manila');
     $date = date("Y-m-d H:i:s");


     $query3 = "INSERT INTO donationlist( d_user_id, d_user_name, d_amount, p_user_id, p_user_name, date, post_id)
      VALUES ('$d_user_id','$d_user_name',".$_GET['donation'].",'$post_user_id','$post_username','$date','$post_id')";
     $result = mysqli_query($dbconn,$query3);

     header('Location:success.php');
  
?>

<!--
   
   include("../config/dbconn.php");
if(isset($_POST['submit']))
{   
   $donation=$_POST['donation'];
  


   date_default_timezone_set('Asia/Manila');
   $date = date("Y-m-d H:i:s");            
   $getamount= 0;
  
  
       if(empty($donation)) {
           echo "<font color='red'>enter the amount</font><br/>";
       }
       
else {    
       //updating the table
       $query = "UPDATE posts
       SET getamount = '$updateamount'
       WHERE post_id=".$_SESSION['post_id']."";
       $result = mysqli_query($dbconn,$query);
       
       if($result){
           header('Location:user_post_details.php');
       }
       
   }
}
-->



<h1>Success</h1>
<h1><?php echo $_GET['donation']; ?></h1>
<h1><?php echo $updateamount; ?></h1>