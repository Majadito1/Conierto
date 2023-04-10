<?php
    session_start();
    include('config.php');
    extract($_POST);
    mysqli_query($con,"insert into  registro values(NULL,'$name','$email','$phone','$age','$gender','500','CURRENT_TIMESTAMP()')");
    $id=mysqli_insert_id($con);
    mysqli_query($con,"insert into  login values(NULL,'$id','$email','$password','0')");
    $_SESSION['user']=$id;
    header('location:index.php');
?>