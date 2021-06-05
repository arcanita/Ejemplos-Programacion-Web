<?php
$id = $_GET['id_r'];
$sql = mysqli_query($link, "select * from productos where id_producto = ".$id."");
$row = mysqli_fetch_array($sql);
?>


<nav aria-label="breadcrumb" style="background-color: white;">
  <ol class="breadcrumb"  style="background-color: white;">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item"><a href="index.php?id=rituales">Rituales</a></li>
    <li class="breadcrumb-item"><a href="#"><?=$row['nombre']?></a></li>
  
  </ol>
</nav>
<div class="container-fluid" >
<div class="container" >
        <div class="card" style=" font-size: 15px; border: 0px !important;">
            <div class="container-fliud">
                <div class="wrapper row">
                    <div class="preview col-md-6">
                        
                        <div class="preview-pic tab-content">
                            
                            
                            <!--imagen grande-->
                            
                            <?php
                            $i=0;
                            $sql3 = mysqli_query($link, "select * from rituales_fotos where id_ritual = ".$id." order by id_foto asc");
                            while($row3 = mysqli_fetch_array($sql3)){ 
                                if($i==0){?>
                                    <div class="tab-pane active" id="pic-<?=$i?>"><img src="rituales/<?=$row3['imagen']?>" /></div>
                                <?php } else { ?>
                                    <div class="tab-pane" id="pic-<?=$i?>"><img src="rituales/<?=$row3['imagen']?>" /></div>
                               <?php }
                               $i = $i+1;
                            }?>       





                            <!-- thumbnails-->
                            <?php
                            $i=0;
                            $sql2 = mysqli_query($link, "select * from rituales_fotos where id_ritual = ".$id." order by id_foto asc");
                            while($row2 = mysqli_fetch_array($sql2)){ 
                                if($i==0 || $i==5 || $i==10){ ?>
                                    <ul class="preview-thumbnail nav nav-tabs">
                                    <?php } ?>
                                    <li>
                                        <a data-target="#pic-<?=$i?>" data-toggle="tab">
                                            <img src="rituales/<?=$row2['imagen']?>" class="img-fluid" style="max-width: 67px;" />
                                        </a>
                                    </li>
                                <?php if($i==4 || $i==9 || $i==14){ ?>
                                    </ul>
                                <?php } 
                                $i = $i+1;
                            }?>                          

                        </div>
                        
                        

                    </div>




                    <div class="details col-md-6">
                        <h3 class="product-title"><?=$row['nombre']?></h3>
                        
                        <p class="product-description"><?=utf8_encode($row['descripcion'])?></p>
                        <h4 class="price">Precio: <span>$<?=number_format ( $row['precio'],0,",",".")?></span></h4>
                        
                        <div class="action">
                            <button class="add-to-cart btn btn-default" data-toggle="modal" data-target="#exampleModalCenter"  style="background-color: #916DD5;" type="button"  onclick="agregar_carrito(<?=$row['id_producto']?>)" >Agregar al carrito</button>
                           
                        </div>

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
                                    Ritual agregado al carrito
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" style="background-color: #FEA5AD; border: 0px;" data-dismiss="modal">Seguir comprando</button>
                                    <button type="button" class="btn btn-primary" onclick="location.href='index.php?id=carrito'" style="background-color: #916dd5;  border: 0px;">Ir al carrito</button>
                                  </div>
                                </div>
                              </div>
                            </div>