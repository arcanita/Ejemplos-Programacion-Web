<?php
$id = $_GET['id_p'];
$sql = mysqli_query($link, "select * from productos where id_producto = ".$id."");
$row = mysqli_fetch_array($sql);
$sql2 = "select * from categorias where id_categoria = '".$row['id_categoria']."'"; 
$query = mysqli_query($link, $sql2);
$row2 = mysqli_fetch_array($query);
$nombrecat = $row2['nombre'];
?>


<nav aria-label="breadcrumb" style="background-color: white;">
  <ol class="breadcrumb"  style="background-color: white;">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item"><a href="index.php?id=productos&cat=0">Productos</a></li>
    <li class="breadcrumb-item"><a href="index.php?id=productos&cat=<?=$row['id_categoria']?>"><?=utf8_encode($nombrecat)?></a></li>
    <li class="breadcrumb-item"><a href=""><?=utf8_encode($row['nombre'])?></a></li>
  
  </ol>
</nav>
<div class="container">
        <div class="card" style=" font-size: 15px; border: 0px !important;">
            <div class="container-fliud">
                <div class="wrapper row">
                    <div class="preview col-md-6">
                        
                        <div class="preview-pic tab-content">
                            <a href="productos/<?=$row['imagen']?>" target="_blank" >
                            <div class="tab-pane active" id="pic-<?=$i?>"><img src="productos/<?=$row['imagen']?>" /></div>
                          </a>
                        </div>

                    </div>


                    <div class="details col-md-6">
                        <h4 class="product-title"><?=utf8_encode($row['nombre'])?></h4>
                        
                        <p class="product-description"><?=utf8_encode($row['descripcion'])?></p>
                        <h4 class="price" style="margin-top: 30px;">Precio: <span>$<?=number_format ( $row['precio'],0,",",".")?></span></h4>
                       
                       
                        <div class="action">
                            <button class="add-to-cart btn btn-default" style="background-color: #916DD5; " data-toggle="modal" data-target="#exampleModalCenter" onclick="agregar_carrito(<?=$row['id_producto']?>)" type="button">Agregar al carrito</button>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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