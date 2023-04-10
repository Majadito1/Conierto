<?php include('header.php');
	$qry2=mysqli_query($con,"select * from concierto where concierto_id='".$_GET['id']."'");
	$concert=mysqli_fetch_array($qry2);
	?>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
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
							<?php $s=mysqli_query($con,"select DISTINCT estadio_id from shows where condierto_id='".$concert['concierto_id']."'");
							if(mysqli_num_rows($s))
							{?>
							<table class="table table-hover table-bordered text-center">
							<?php
								while($shw=mysqli_fetch_array($s))
								{
									$t=mysqli_query($con,"select * from estadio where id='".$shw['estadio_id']."'");
									$theatre=mysqli_fetch_array($t);
									?>
									<tr>
										<td>
											<?php echo $theatre['nombre_estadio'].", ".$theatre['pais'];?>
										</td>
										<td>
											<?php $tr=mysqli_query($con,"select * from shows where condierto_id='".$concert['concierto_id']."' and estadio_id='".$shw['estadio_id']."'");
											while($shh=mysqli_fetch_array($tr))
											{
												$ttm=mysqli_query($con,"select  * from show_fecha where fecha_id='".$shh['fecha_id']."'");
												$ttme=mysqli_fetch_array($ttm);
												
												?>
												<a href="check_login.php?show=<?php echo $shh['show_id'];?>
												&concert=<?php echo $shh['condierto_id'];?>
												&stadium=<?php echo $shw['estadio_id'];?>">
												<button class="btn btn-default">
													<?php echo date('h:i A',strtotime($ttme['hora_comienzo']));?></button>
												</a>
												<?php
											}
											?>
										</td>
									</tr>
									<?php
								}
							?>
						</table>
							<?php
							}						
							else
							{
								?>
								<h3>No hay shows disponible </h3>
								<?php
							}
							?>
			    </div>	
             <?php include('concert_sidebar.php');?>
		  </div>			
	    </div>		
             </div>
				<div class="clear"></div>		
			</div>
 </div>
</div>
<?php include('footer.php');?>