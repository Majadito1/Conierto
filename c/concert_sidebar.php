<!--
@author: Vasilis Tsakiris
-->
 			<div class="listview_1_of_3 images_1_of_3">
					<h3>Conciertos en tu Zona</h3>	
					<?php
          	 $today=date("Y-m-d");
          	$qry2=mysqli_query($con,"select * from  concierto where estado='0' order by rand() limit 3");

          	  while($m=mysqli_fetch_array($qry2))
                   {
                    ?>
            <div class="content-left">
					<div class="listimg listimg_1_of_2">
					<?php
						?>
						 <a href="about.php?id=<?php echo $m['concierto_id'];?>"><img src="<?php echo $m['imagen'];?>"></a>
					</div>
					<div class="text list_1_of_2">
						  <div class="extra-wrap1">
                                         <a href="booking.php?id=<?php echo $m['concierto_id'];?>" class="link4"><?php echo $m['nombre_concierto'];?></a><br>
                                        <span class="data">Ultimo CD:<?php echo $m['fecha_debut'];?></span><br>
                                        Artista:<Span class="data"><?php echo $m['artista'];?></span><br>
                                        Descripcion: <span" class="color2"><?php echo $m['desc'];?></span><br>
                                    </div>
					</div>		
					<div class="clear"></div>
				</div>
  	    <?php
  	    	}
  	    	?>
					
					
				
				
					
					
				
				
				
				
				</div>		
				<div class="clear"></div>		
			
