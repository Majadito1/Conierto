<?php include('header.php');?>
<div class="content">
	<div class="wrap">
		<div class="content-top">
			<h3>Conciertos</h3>		
			<?php
          	 $today=date("Y-m-d");
          	 $qry2=mysqli_query($con,"select * from  concierto ");
          	  while($m=mysqli_fetch_array($qry2))
                   {
                    ?>           
                    <div class="col_1_of_4 span_1_of_4">
					<div class="imageRow">
						  	<div class="single">
						  		<a href="about.php?id=<?php echo $m['concierto_id'];?>"><img src="<?php echo $m['imagen'];?>" alt="" /></a>
						  	</div>
						  	<div class="movie-text">
						  		<h4 class="h-text"><a href="about.php?id=<?php echo $m['concierto_id'];?>"><?php echo $m['nombre_concierto'];?></a></h4>
						  		Artista:<Span class="color2"><?php echo $m['artista'];?></span><br>	  		
						  	</div>
		  				</div>
		  		</div>	
  	    <?php
  	    	}
  	    	?>
			</div>
				<div class="clear"></div>		
			</div>
			<?php include('footer.php');?>