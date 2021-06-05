<?php


$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "From: hola@lunakali.cl\r\n";
$headers .= "Reply-To: hola@lunakali.cl\r\n";
$headers .= "Return-path: hola@lunakali.cl\r\n"; 

$mensajenuevo='Nueva compra de '.$mail.'<br>Total: '.$total.'<br>Telefono: '.$fono.'<br>Mensaje: '.$comen.'<br>Productos: <br>';
foreach($_SESSION['nombres'] as $key => $prod)
{
	$mensajenuevo .= $prod.'<br>';
}
$mensaje_cliente = 'Su compra ha sido notificada correctamente, te enviaremos un mail con un link de pago';
//mail("hola@lunakali.cl","Nueva notificación de compra", $mensajenuevo,$headers);
mail("v.espinozaw@gmail.com","Nueva notificación de compra", $mensajenuevo,$headers);
mail($mail,"Notificación de compra enviada con éxito", $mensaje_cliente,$headers);

print_r($response);

?>

<div class="container-fluid" >
   <div class="row">
      <div class="banner2" >
         <div class="container">
            <div class="row" >
               <h1 class="col-sm-12 " style="text-align: center; margin: 0 auto;">Carrito de compras</h1>
                 
               <div class="card suscri" style="margin: 0 auto; margin-top: 50px;">
                 	<div class="card-body">
                    	<center><h4 >Pago realizado con éxito</h4></center><br>
                    	Gracias por tu confianza! Pronto recibirás un email con los detalles de tu entrega.
                 	</div>
               </div>
					</div>
            <div class="row">
                 
            </div>
         </div>
      </div>
  	</div>
</div>

