<?php
include('header.php');
?>
<div class="content">
	<div class="wrap">
		<div class="content-top">
				<div class="listview_1_of_3 images_1_of_3">
					<h3>Proximos Conciertos</h3>
					<?php 
					$qry3=mysqli_query($con,"select * from noticias");				
					while($n=mysqli_fetch_array($qry3))
					{
					?>
				<div class="content-left">
					<div class="listimg listimg_1_of_2">
						 <img src="<?php echo $n['imagen'];?>">
					</div>
					<div class="text list_1_of_2">
						  <div class="extra-wrap">
						  	<span style="text-color:#000" class="data"><strong><?php echo $n['noombre'];?></strong><br>
						  	<span style="text-color:#000" class="data"><strong>Artista:<?php echo $n['artista'];?></strong><br>
                                <div class="data">Fecha :<?php echo $n['fecha_noticias'];?></div>          
                                <span class="text-top"><?php echo $n['descripcion'];?></span>
                          </div>
					</div>
					<div class="clear"></div>
				</div>
				<?php
				}
				?>
		</div>				
		<div class="listview_1_of_3 images_1_of_3">
					<h3>Hits</h3>
						<div class="middle-list">
					<?php 
					$qry4=mysqli_query($con,"select * from concierto order by rand()");
					while($nm=mysqli_fetch_array($qry4))
					{
					?>
						<div class="listimg1">
							 <a target="_blank" ><img src="<?php echo $nm['imagen'];?>" alt=""/></a>
							 <a target="_blank" class="link"><?php echo $nm['nombre_concierto'];?></a>
						</div>
						<?php
					}
					?>
					</div>		
		</div>			
		<?php include('concert_sidebar.php');?>
	</div>
</div>
<?php include('footer.php');?>
</div>
