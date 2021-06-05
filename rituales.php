<nav aria-label="breadcrumb" style="background-color: white;">
  <ol class="breadcrumb"  style="background-color: white;">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item"><a href="index.php?id=rituales">Rituales</a></li>
  
  </ol>
</nav>

<!--
    <h3 style="margin: 0 auto; text-align: center;">Rituales</h3>
<div class="container" >
	<div class="row">
	    <img src="images/logo_peque.png" class="img-fluid" style="width: 100px; margin: 0 auto;"><br>
	    
	</div>
</div>-->

<!--<center><p><i>¨Deja ir lo que crees que deberías ser. Abraza lo que eres.¨ - Brene Brown</i></p></center><br><br>-->

<div class="container-fluid" >
 	<div class="row">
 		<div class="banner3" style="height: 200px; padding-top:75px; background-image: url(images/IMG_0583.JPG); background-position: 0px -130px; text-align: center; vertical-align: middle;">
	   		
	   			
	   			<h1 class="col-sm-12">Rituales</h1>
	   		
	   		
		</div>
	</div>
</div>




<div class="container" style="background-color: white;">

    <div class="row" style="margin-top: 50px;">
    	<?php
    	$sql = mysqli_query($link, "select * from productos where id_categoria = 8");
    	
     
      if(mysqli_num_rows($sql) == 0)
      {
        echo "<div style='width:100%; text-align:center;'><h3>Próximamente</h3></div>";
      }
      else 
      {
        while($row = mysqli_fetch_array($sql)){  ?>      

         <div class="col-md-3 col-sm-6">
            <div class="product-grid6">
                <div class="product-image6">
                    <a href="index.php?id=ritual&id_r=<?=$row['id_producto']?>">
                        <div class="box">
                        	<img class="pic-1" src="rituales/<?=$row['imagen']?>">
                        </div>
                    </a>
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="#"><?=$row['nombre']?></a></h3>
                    <div class="price">$<?=number_format ( $row['precio'],0,",",".")?></div>
                </div>
                <ul class="social">
                    <li><a href="index.php?id=ritual&id_r=<?=$row['id_producto']?>" ><i class="fa fa-search"></i></a></li>
                   
                </ul>


                 
            </div>
        </div>
        




 	<?php } } ?>
    </div>
</div>
<hr>
<br><bR><bR><br>

<style>
#images img{
    display: block;
}

.box{
  width: auto;
  height: 250px;
  background: #CCC;
  overflow: hidden;
}
.box img{
  width: 100%;
  height: auto;
}
@supports(object-fit: cover){
    .box img{
      height: 100%;
      object-fit: cover;
      object-position: center center;
    }
}
	</style>