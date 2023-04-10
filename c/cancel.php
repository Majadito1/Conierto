<?php
session_start();
include('config.php');
$s=mysqli_query($con,"select * from shows where show_id='".$_SESSION['show']."'");
$shw=mysqli_fetch_array($s);
$ttm=mysqli_query($con,"select  * from show_fecha where fecha_id='".$shw['fecha_id']."'");
$ttme=mysqli_fetch_array($ttm);
$sn=mysqli_query($con,"select  * from arena where id='".$ttme['arena_id']."'");
$screen=mysqli_fetch_array($sn);
$charge=$_SESSION['amount'];
mysqli_query($con,"delete from bookings where book_id='".$_GET['id']."'");
mysqli_query($con,"update registro set totalPagar=totalPagar +'$charge' where user_id='".$_SESSION['user']."'");
mysqli_query($con,"update registro set ultimaActualizacion=CURRENT_TIMESTAMP() where user_id='".$_SESSION['user']."'");
$_SESSION['success']="Ha sido cancelado correctamente";
header('location:profile.php');
?>