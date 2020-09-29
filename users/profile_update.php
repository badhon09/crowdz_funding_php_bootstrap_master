<?php
    session_start();

    if (!isset($_SESSION['user_id']) ||(trim ($_SESSION['user_id']) == '')) {
        header('location:../index.php');
        exit();
        $_SESSION['user_id']=$id;
    }
?>
  <?php
// including the database connection file
include("../config/dbconn.php");
if(isset($_POST['submit']))
{   
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $contact=$_POST['contact'];
    $password=$_POST['password'];
  

          
    
   
  
        //updating the table
        $query = "UPDATE users SET firstname='$firstname', lastname='$lastname', email='$email', address='$address', contact='$contact' , password='$password'
        
        WHERE user_id='".$_SESSION['user_id']."'"; 
                

        $result = mysqli_query($dbconn,$query);
        
        if($result){
          
            header('Location:./user_profile.php');
        }
        
    }

?>