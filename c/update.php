<?php
session_start();
include('config.php');
$newAmount=$_POST['newAmountCard'];
if(mysqli_query($con,"update registro set totalPagar=totalPagar+'$newAmount' where user_id='".$_SESSION['user']."'") &&
	mysqli_query($con,"update registro set ultimaActualizacion=CURRENT_TIMESTAMP() where user_id='".$_SESSION['user']."'")){


$_SESSION['success']="Actualizacion Exitosa";
}
else 
	    $_SESSION['error']="Error al actualizar";

header('location:profile.php');
?>