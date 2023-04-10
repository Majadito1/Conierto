<?php
include('config.php');
session_start();
$email = $_POST["Email"];
$pass = $_POST["Password"];
$attempt=2;
$qry=mysqli_query($con,"select * from login where usuario='$email' and contrasenha='$pass' and tipo_usuario<3 ");
$qry2=mysqli_query($con,"select * from login where usuario='$email' and tipo_usuario < 3 ");

if(mysqli_num_rows($qry))
{
	$usr=mysqli_fetch_array($qry);

		$_SESSION['user']=$usr['user_id'];
		if(isset($_SESSION['show']))
		{
			header('location:booking.php');
		}
		else
		{
			header('location:index.php');
		}
	}

else if(mysqli_num_rows($qry2)){

   
        $qryupdt=mysqli_query($con,"update login set tipo_usuario=tipo_usuario + 1 where username='$email' ");
        $_SESSION['error']="Error!";
             $attempt--;
		header("location:login.php");
        


}
else if(!mysqli_num_rows($qry2))
{

         $_SESSION['error']="Error! Muchos intentos. Tu cuenta ha sido bloqueada";
		header("location:login.php");

}


else
{

	$_SESSION['error']="Error!";
	header("location:login.php");
}
?>