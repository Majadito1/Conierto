<?php include('header.php');
if(!isset($_SESSION['user']))
{
	header('location:login.php');
}
	$qry2=mysqli_query($con,"select * from concierto where concierto_id='".$_SESSION['concert']."'");
	$concert=mysqli_fetch_array($qry2);
	?>
<div class="content">
	<div class="wrap">
		<div class="content-top">
				<div class="section group">
					<div class="about span_1_of_2">	
						<h3><?php echo $concert['nombre_concierto']; ?></h3>	
							<div class="about-top">	
								<div class="grid images_3_of_2">
									<img src="<?php echo $concert['imagen']; ?>" alt=""/>
								</div>
								<div class="desc span_3_of_2">
									<p class="p-link" style="font-size:15px">Artista : <?php echo $concert['artista']; ?></p>
									<p class="p-link" style="font-size:15px">Ultimo CD : <?php echo date('d-M-Y',strtotime($concert['fecha_debut'])); ?></p>
									<p style="font-size:15px"><?php echo $concert['desc']; ?></p>
								</div>
								<div class="clear"></div>
							</div>
							<table class="table table-hover table-bordered text-center">
							<?php
								$s=mysqli_query($con,"select * from shows where show_id='".$_SESSION['show']."'");
								$shw=mysqli_fetch_array($s);
								
									$t=mysqli_query($con,"select * from estadio where id='".$shw['estadio_id']."'");
									$stadium=mysqli_fetch_array($t);
									?>
									<tr>
										<td class="col-md-6">
											Estadio
										</td>
										<td>
											<?php echo $stadium['nombre_estadio'].", ".$stadium['pais'];?>
										</td>
										</tr>
										<tr>
											<td>
												Tier
											</td>
										<td>
											<?php 
												$ttm=mysqli_query($con,"select  * from show_fecha where fecha_id='".$shw['fecha_id']."'");
												$ttme=mysqli_fetch_array($ttm);
												$sn=mysqli_query($con,"select  * from arena where id='".$ttme['arena_id']."'");
												$screen=mysqli_fetch_array($sn);
												echo $screen['nombre_arena'];
												?>
										</td>
									</tr>
									<tr>
										<td>
											Fecha
										</td>
										<td>				
							<div class="col-md-12 text-center" style="padding-bottom:20px">
							<?php 
									$date=$ttme['fecha_show'];
                              $_SESSION['dd']=$date;
							echo date('Y-m-d',strtotime($ttme['fecha_show']));
								$av=mysqli_query($con,"select sum(nro_asientos) from bookings where show_id='".$_SESSION['show']."' and fecha_ticket='$date'");
								$avl=mysqli_fetch_array($av);
								?>
							</div>
										</td>
									</tr>
									<tr>
										<td>
											Hora del Show
										</td>
										<td>
											<?php echo date('h:i A',strtotime($ttme['hora_comienzo']));?> 
										</td>
									</tr>
									<tr>
										<td>
											Numero de Asientos
										</td>
										<td>
											<form  action="process_booking.php" method="post">
											<input type="hidden" name="screen" value="<?php echo $screen['id'];?>"/>
											<input type="number" required tile="Number of Seats" max="<?php echo $screen['asientos']-$avl[0];?>" min="0" name="seats" class="form-control" value="1" style="text-align:center" id="seats"/>
											<input type="hidden" name="amount" id="hm" value="<?php echo $screen['precio'];?>"/>
											<input type="hidden" name="date" value="<?php echo $date;?>"/>
										</td>
									</tr>
									<tr>
										<td>
											Cantidad
										</td>
										<td id="amount" style="font-weight:bold;font-size:18px">
											$ <?php echo $screen['precio'];?>
										</td>
									</tr>
									<tr>
										<td colspan="2"><?php if($avl[0]==$screen['asientos']){?><button type="button" class="btn btn-danger" style="width:100%">Full House</button><?php } 
										else { ?>
										<button class="btn btn-info" style="width:100%">Compra Ahora!</button>
										<?php } ?>
										</form></td>
									</tr>
						<table>
							<tr>
								<td></td>
							</tr>
						</table>
					</div>		
				<?php include('concert_sidebar.php');?>
			</div>
				<div class="clear"></div>		
			</div>
	</div>
</div>
<?php include('footer.php');?>
<script type="text/javascript">
	$('#seats').change(function(){
		var charge=<?php echo $screen['precio'];?>;
		amount=charge*$(this).val();
		$('#amount').html("€ "+amount);
		$('#hm').val(amount);
	});
</script>