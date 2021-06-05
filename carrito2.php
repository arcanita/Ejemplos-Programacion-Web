<div class="container-fluid" >
    <div class="row">
        <div class="banner2" >
            <div class="container">
                <div class="row" >
                    
                    <h1 class="col-sm-12 " style="text-align: center; margin: 0 auto;">Carrito de compras</h1>
                    
                    <div class="card suscri" style="margin: 0 auto; margin-top: 50px;">
                      <div class="card-body">
                        
                        <center><h4 >Contenido de tu carrito:</h4></center><br>
                     <?php
                     if(count($_SESSION['productos']) > 0)
                      { ?>

                       <div class="texto" id="lista">
                     
                        <table class="table" id="elcarrito">
                        <?php 

                        $total = 0;
                        $index = 0;
                        $lista_prod = '';
                        $fecha = date('Y-m-d');
                        $i=0;
                          foreach($_SESSION['productos'] as $prod)
                          { 

                            $index = array_search($prod, $_SESSION['productos']);

                            $sql3 = mysqli_query($link, "select * from productos p where p.tope_compra = (select min(tope_compra) from productos p2 where tope_compra >= '".$fecha."' and orden<>0)");
                            $row3 = mysqli_fetch_array($sql3);

                            if($_SESSION['productos'][$index] == 13) //Agregó el pack inicial
                            {
                              
                              echo '<tr class="div_'.$i.'"><td>'.$_SESSION['nombres'][$index].' con '.utf8_encode($row3['nombre']).'</td><td>$'.number_format ($_SESSION['precios'][$index],0,",",".").'</td><td class="borrar" onclick="borrar_carrito('.$_SESSION['productos'][$index].', '.$i.','.$_SESSION['precios'][$index].')" ><span style="cursor:pointer;">x</span></td></tr>';
                               
                                $total = $total + 41900;
                            }
                            else if($_SESSION['productos'][$index] == 34 || $_SESSION['productos'][$index] == 35 || $_SESSION['productos'][$index] == 36) 
                            {
                                
                                if($_SESSION['productos'][$index] == 34){ $cantidad = 2; }
                                else if($_SESSION['productos'][$index] == 35){ $cantidad = 5; }
                                else if($_SESSION['productos'][$index] == 36){ $cantidad = 11; }
                                
                                echo '<tr class="div_'.$i.'"><td>'.$_SESSION['nombres'][$index].'</td><td>$'.number_format ($_SESSION['precios'][$index],0,",",".").'</td><td class="borrar" onclick="borrar_carrito('.$_SESSION['productos'][$index].', '.$i.','.$_SESSION['precios'][$index].')" ><span style="cursor:pointer;">x</span></td></tr>';

                                echo '<tr class="div_'.$i.'"><td>Pack inicial con '.utf8_encode($row3['nombre']).'</td><td><strike>$40.500</strike></td><td></td></tr>';

                                for($j=1; $j<=$cantidad; $j++)
                                {
                                  
                                  echo '<tr class="div_'.$i.'"><td>Bolsita Recarga</td><td><strike>$'.number_format ($row3['precio'],0,",",".").'</strike></td><td></td></tr>';

                                }
                                 $total = $total + $_SESSION['precios'][$index] ;                               
                            }
                            else if($_SESSION['productos'][$index] == 59)
                            {
                             
                              echo '<tr class="div_envio"><td>Envío a domicilio</td><td>$'.number_format ($_SESSION['precios'][$index],0,",",".").'</td><td></td></tr>';
                              $total = $total + $_SESSION['precios'][$index];
                            }
                            else
                            {
                             
                              echo '<tr class="div_'.$i.'"><td>'.$_SESSION['nombres'][$index].'</td><td>$'.number_format ($_SESSION['precios'][$index],0,",",".").'</td><td class="borrar" onclick="borrar_carrito('.$_SESSION['productos'][$index].', '.$i.','.$_SESSION['precios'][$index].')" ><span style="cursor:pointer;">x</span></td></tr>';
                              $total = $total + $_SESSION['precios'][$index];
                            }


                            $lista_prod = $lista_prod.','.$_SESSION['productos'][$index];
                            $i++;
                          }



                        ?>
                      </table>
                      <form method="post" action="index.php?id=procesar_pago">

                      <?php

                       echo '<strong><br>Total: $<input type ="hidden" id="total" value="'.$total.'" name="total"><span id="tot">'.number_format ($total,0,",",".").'</span></strong>';

                       ?>
                       <input type ="hidden" id="lista_productitos" value="<?=$lista_prod?>" name="lista_productitos">
                        </div>
<br><br>

                   

<div id="formulario">
  <center><h4>Ingresa tus datos para completar la venta</h4><br>Es importante que en el mensaje detalles si quieres envío, a que sucursal, etc.</center>
<br><br>
  
   <strong> Elige tu forma de entrega, tenemos Chileexpress, Starken y Correos de Chile</strong>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2" onchange="borrar_carrito(59,'envio', 0)">
        <label class="form-check-label" for="exampleRadios2">
          $0 -> Envío por pagar a sucursal (Dentro y fuera de Santiago) o Retiro en tienda Vitacura
        </label>
      </div>

      <div class="form-check">
        
        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" onchange="agregar_carrito(59)"  <?php if(in_array(59, $_SESSION['productos'])){ ?> checked <?php } ?>>
        <label class="form-check-label" for="exampleRadios1">
          $3.000 -> Envío a domicilio dentro de Santiago (Si elegiste suscripción el envío es gratis)
        </label>
      </div>
      
      
  <div class="form-row"  style="margin-top: 40px;">
    <input type="hidden" id="lista_productos" value="<?=$lista_prod?>">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nombre</label>
      <input type="text" class="form-control" id="nombre" name="name">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Teléfono</label>
      <input type="text" class="form-control" name="fono" id="fono" placeholder="Opcional">
    </div>
   
  </div>
  <div class="form-row" style="padding-left:5px;" >
     
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="email" name="mail" required>
    
  </div>
  <div class="form-row" style="padding-left:5px; padding-bottom: 15px;">
    <label for="exampleFormControlTextarea1">Dirección</label>
    <textarea id="comentarios" class="form-control" name="comentarios" rows="3" placeholder="Indica la sucursal a la que quieres que llegue tu pedido o tu dirección en caso de envío a domicilio (Envío a domicilio solo dentro de santiago)"></textarea>
  <br>Elige tu método de pago<br> (Próximamente tendremos mas opciones, en Khipu puedes pagar con tu banco y Webpay)
  </div>

  <input type="submit" style="width: 200px; height: 200px; cursor: pointer; background-image: url(images/logo_kipu.png);" value="" name="kipu" >
  
</div>
</form>
<div id="success"></div>


                        <?php
                        }
                        else
                        {
                          echo "No has elegido ningún producto";
                        }
                        ?>
                            
                        
                      </div>
                    </div>
                
                </div>
                <div class="row">
                    
                </div>

            </div>
            
        </div>

    </div>
</div>

