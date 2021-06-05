<?php

 $cat = $_GET['cat'];
 if($cat == 0){ $nombrecat = "Todos"; }
 else{ $sql2 = "select * from categorias where id_categoria = '".$cat."'"; 
 $query = mysqli_query($link, $sql2);
 $row2 = mysqli_fetch_array($query);
 $nombrecat = $row2['nombre'];
}
 ?>

 
<nav aria-label="breadcrumb" style="background-color: white;">
  <ol class="breadcrumb"  style="background-color: white;">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item"><a href="index.php?id=productos&cat=0">Productos</a></li>
    <li class="breadcrumb-item"><a href=""></a><?=utf8_encode($nombrecat)?></li>
  </ol>
</nav>

<div class="container-fluid" >
 	<div class="row">
 		<div class="banner3" style="height: 400px; padding-top:175px; background-image: url(images/foto_portada_productos.jpg); background-position: 0px 0px; text-align: center; vertical-align: middle;">
	   		
	   			
	   			<h1 class="col-sm-12">Productos</h1>
	   		      <h3 class="col-sm-12"><?=utf8_encode($nombrecat)?></h3>
	   		
		</div>
	</div>
</div>




<div class="container" style="background-color: white;">

    <div class="row" style="margin-top: 50px;">
    	<?php
       
        if($cat == 0){ $sql = "select * from productos where (id_categoria <>8 and id_categoria <> 9 and id_categoria <> 11) order by id_categoria asc"; }
        else { $sql = "select * from productos where id_categoria = '".$cat."'"; }
    	
        $sql1 = mysqli_query($link, $sql);
    	while($row = mysqli_fetch_array($sql1)){ ?>
            <div class="col-md-3 col-sm-6" style="margin-bottom: 10px;">
                <div class="product-grid6">
                    <div class="product-image6">
                        <a href="index.php?id=productosdetalle&id_p=<?=$row['id_producto']?>">
                            <div class="box">
                                <img class="pic-1" src="productos/thumbnails/<?=$row['imagen']?>">
                            </div>
                        </a>
                    </div>
                    <div class="product-content">
                        <h3 class="title"><a href="#"><?=utf8_encode($row['nombre'])?></a></h3>
                        <div class="price">$<?=number_format ( $row['precio'],0,",",".")?></div>
                    </div>
                    <ul class="social">
                        <li><a href="index.php?id=productosdetalle&id_p=<?=$row['id_producto']?>" data-tip="Ver más"><i class="fa fa-search"></i></a></li>
                        <li><a data-tip="Agregar al carrito" onclick="agregar_carrito(<?=$row['id_producto']?>)" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-shopping-cart"></i></a></li>
                    </ul>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          
                          <div class="modal-body">
                            Producto agregado al carrito
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" style="background-color: #FEA5AD; border: 0px;" data-dismiss="modal">Seguir comprando</button>
                            <button type="button" class="btn btn-primary" onclick="location.href='index.php?id=carrito'" style="background-color: #916dd5;  border: 0px;">Ir al carrito</button>
                          </div>
                        </div>
                      </div>
                    </div>


                </div>
            </div>
        <?php } ?>
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
  