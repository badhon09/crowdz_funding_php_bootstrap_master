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
 <?php

include '../config/dbconn.php';



$result = mysqli_query($dbconn, "DELETE FROM posts WHERE post_id=$post_id");

header("Location:user_profile.php");
?>
    