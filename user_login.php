<?php
    session_start();
    include('./config/dbconn.php');
    if($_SERVER["REQUEST_METHOD"] == "POST"){
            
        $user_unsafe=$_POST['email'];
        $pass_unsafe=$_POST['password'];

        $user = mysqli_real_escape_string($dbconn,$user_unsafe);
        $pass = mysqli_real_escape_string($dbconn,$pass_unsafe);


        $query=mysqli_query($dbconn,"SELECT * FROM `users` WHERE username='$user' AND password='$pass'");
        $res=mysqli_fetch_array($query);
        $id=$res['user_id'];

        if (mysqli_num_rows($query)<1){
            $_SESSION['msg']="Login Failed, User not found!";
            header('Location:index.php');
            echo "login failed";
        }

        else{
            $res=mysqli_fetch_array($query);
            $_SESSION['uid']=$res['user_id'];
            header('Location:users/user_index.php');
            echo "login failed";
            
           
            }
        }
?>
