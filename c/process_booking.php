<?php
 include('header.php');
if(!isset($_SESSION['user']))
{
	header('location:login.php');
}
?>
<link rel="stylesheet" href="validation/dist/css/bootstrapValidator.css"/>
<script type="text/javascript" src="validation/dist/js/bootstrapValidator.js"></script>
 
 <?php
    include('form.php');
    $frm=new formBuilder;      
  ?> 
</div>
<div class="content">
	<div class="wrap">
		<div class="content-top">
			<h3>Pago</h3>
			<form action="bank.php" method="post" id="form1">
			<div class="col-md-4 col-md-offset-4" style="margin-bottom:50px">
			<div class="form-group">
   <label class="control-label">Nombre en Tarjeta</label>
    <input type="text" class="form-control" name="name">
</div>
<div class="form-group">
   <label class="control-label">Numero de Tarjeta</label>
    <input type="text" class="form-control" name="number" required title="Ingrese los 16 digitos de su tarjeta">
  
</div>      
<div class="form-group">
   <label class="control-label">Fecha Expiracion</label>
    <input type="date" class="form-control" name="date">
</div>
<div class="form-group">
   <label class="control-label">CVV</label>
    <input type="text" class="form-control" name="cvv">
</div>
<div class="form-group">
    <button class="btn btn-success">Pagar</button>
    </form>
</div>
</div>
			</div>
		<div class="clear"></div>	
	</div>
<?php include('footer.php');?>
</div>
<?php
    extract($_POST);
    include('config.php');
    $_SESSION['screen']=$screen;
    $_SESSION['seats']=$seats;
    $_SESSION['amount']=$amount;
    $_SESSION['date']=$date;
?>
<script>
        $(document).ready(function() {
            $('#form1').bootstrapValidator({
            fields: { 
            name: {
            verbose: false,
                validators: {notEmpty: {
                        message: 'El nombre es necesario'
                    },regexp: {
                        regexp: /^[a-zA-Z ]+$/,
                        message: 'El nombre solo puede contener letras'
                    } } },
            number: {
            verbose: false,
                validators: {notEmpty: {
                        message: 'El numero de tarjeta no puede estar vacio'
                    },stringLength: {
                    min: 16,
                    max: 16,
                    message: 'El numro de tarjeta debe ser de 16 digitos'
                },regexp: {
                        regexp: /^[0-9 ]+$/,
                        message: 'Ingrese un numero de tarjeta valido'
                    } } },
            date: {
            verbose: false,
                validators: {notEmpty: {
                        message: 'La fecha de expiracion no puede estar vacia'
                    } } },
            cvv: {
            verbose: false,
                validators: {notEmpty: {
                        message: 'El CVV es obligatorio'
                    },stringLength: {
                    min: 3,
                    max: 3,
                    message: 'El CVV es de 3 digitos'
                },regexp: {
                        regexp: /^[0-9 ]+$/,
                        message: 'Ingrese un CVV valido'
                    } } }}
            });
            });
</script>