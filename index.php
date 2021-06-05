<?php session_start();
?>
<!DOCTYPE HTML>
<?php include("config.php"); 
if(!isset($_SESSION['productos'])){ 
  $_SESSION['productos'] = array(); 
  $_SESSION['nombres'] = array(); 
  $_SESSION['precios'] = array(); 

  
}
?>

<html>
	<head>
		<title>Luna Kali</title>
		<meta charset="utf-8" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<link rel="icon" href="images/icono.png" type="image/gif" sizes="16x16">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link href="https://fonts.googleapis.com/css?family=Oxygen|Roboto|Lato&display=swap" rel="stylesheet">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.0.4/popper.js"></script>
		<link rel="stylesheet" href="style.css" />
		<link rel="stylesheet" href="css/bootstrap.css" />
		<link rel="stylesheet" href="css/productos.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		
		
		<script src="js/bootstrap.js"></script>
		<script>
		    function myFunction() {

		  var x = document.getElementById("myTopnav");
		  if (x.className === "topnav") {
		    x.className += " responsive";
		  } else {
		    x.className = "topnav";
		  }
		}

		</script>
	</head>
	<body class="d-flex flex-column" onload="revisar_carrito();" >

		<div class="logo"><a  href="index.php"><img src="images/DEFINITIVO_LOGO.png" width="400" class="img-fluid"></a></div>
		

		<nav class="navbar navbar-expand-lg navbar-light">

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavDropdown">
				<ul class="navbar-nav" style="padding-top: 5px;">
					
					<li <?php if(isset($_GET['id']) && $_GET['id'] == "rituales"){ ?> class ="nav-item active margintop" <?php } else { ?>class ="nav-item margintop" <?php } ?>>
						<a class="nav-link" href="index.php?id=rituales">Rituales</a>
					</li>
					<li <?php if(isset($_GET['id']) && $_GET['id'] == "suscripcion"){ ?> class ="nav-item active margintop" <?php } else { ?>class ="nav-item margintop" <?php } ?>>
						<a class="nav-link" href="index.php?id=suscribete">Suscripción</a>
					</li>
					<li class="nav-item dropdown margintop">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Productos
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							
							<?php $sql = mysqli_query($link, "select * from categorias where (id_categoria <>8 and id_categoria <> 9 and id_categoria <> 11) order by nombre asc");
								while($row = mysqli_fetch_array($sql)){ ?>
								<a class="dropdown-item" href="index.php?id=productos&cat=<?=$row['id_categoria']?>"><?=utf8_encode($row['nombre'])?></a>
							<?php } ?>
						</div>
					</li>
					<li <?php if(isset($_GET['id']) && $_GET['id'] == "ritualesamedida"){ ?> class ="nav-item active margintop" <?php } else { ?>class ="nav-item margintop" <?php } ?>>
						<a class="nav-link" href="index.php?id=ritualesamedida">Rituales a medida</a>
					</li>
					<li <?php if(isset($_GET['id']) && $_GET['id'] == "contacto"){ ?> class ="nav-item active margintop" <?php } else { ?>class ="nav-item margintop" <?php } ?>>
						<a class="nav-link" href="index.php?id=contacto">Contacto</a>
					</li>
					<li <?php if(isset($_GET['id']) && $_GET['id'] == "carrito"){ ?> class ="nav-item active" <?php } else { ?>class ="nav-item" <?php } ?> >
						<a class="nav-link" href="index.php?id=carrito"> <div class="bolsita"><span id="cont"><?php if(!isset($_SESSION['productos']))  { echo 0; } else { echo sizeof($_SESSION['productos']); } ?></span> </div> </a>
					</li>
				</ul>
			</div>
		</nav>



				<!--<div class="topnav" id="myTopnav" >
				  <a href="index.php" <?php if(!isset($_GET['id'])){ ?> class ='active' <?php } ?>>Home</a>
				  <a href="index.php?id=rituales" <?php if(isset($_GET['id']) && $_GET['id'] == "arriendos") { ?> class ='active'  <?php } ?> > Rituales </a>
				  <a href="index.php?id=suscripcion" <?php if(isset($_GET['id']) && $_GET['id'] == "produccion") { ?>class ='active'  <?php } ?>>Suscripción luna nueva</a>
				  <div class="dropdown" style="display: inline;">
					  <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					    Productos
					  </a>

					  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
					    <a class="dropdown-item" href="#">Action</a>
					    <a class="dropdown-item" href="#">Another action</a>
					    <a class="dropdown-item" href="#">Something else here</a>
					  </div>
					</div>

				  <a href="index.php?id=ritualesamedida" <?php if(isset($_GET['id']) && $_GET['id'] == "promociones") { ?>class ='active'  <?php } ?>>Rituales a medida</a>
				  <a href="index.php?id=contato">Contacto</a>
				  <a href="index.php?id=bolsita" > <div class="bolsita"><span id="cont"><?php if(!isset($_SESSION['productos']))  { echo 0; } else { echo sizeof($_SESSION['productos']); } ?></span> </div> </a>
				  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
				  <i class="fa fa-bars" style="font-size:24px"></i>
				  </a>
				</div>-->





<?php

if(!isset($_GET['id'])) 

{ ?>
	

<div class="container-fluid" style="margin-top: 50px;">
 	<div class="row">
 		
			<div class="banner1" >
		   		<div class="container">
		   			<div class="row" >
		   				
		   				<span class="col-sm-12">Rituales que <br> buscan traerte<br>  de regreso a<br>  ti mismo</span>
		   				
		   			</div>
		   			<div class="row">
		   			</div>
		   		</div>
		   		
			</div>

	</div>
</div>

<div class="container-fluid" style="padding-top: 100px; background-color:#faeddb; padding-bottom: 100px;">
	 <div class="row well">
	 	<div class="col-sm-1"></div>
	    <div class="col-sm-4">
	     
			<img class="img-fluid rounded-circle" src="images/IMG_0582.JPG" >
			
	    </div>
	    <div class="col-sm-5">
	      	<h2 class="align-middle" >Qué es Luna Kali</h2>
	      	<span  class="align-middle" style="text-align: justify;"> 
Todos buscamos esa necesidad de calma, de bajar las revoluciones, de crear más espacio en nuestras vidas, pero no sabemos cómo hacerlo, entre tanta rutina y responsabilidades.
<br>
Ahí es donde entran los rituales, y cuando hablo de rituales, me refiero a una simple práctica con intención y propósito que te traerá de regreso a ti mismo.
<br>
Volver al silencio, bajar el ritmo y escuchar. Es ahí donde encuentras las respuestas. Y los rituales te ayudan a encontrar ese silencio.
<br>
 

Con Luna Kali quiero mostrate lo sencillo, lindo y luminoso que es hacer rituales. Quiero que pruebes, que experimentes,  que decidas por ti mismo que cosas te hacen sentido y cuales no tanto. Quiero que vibres con lo que estás haciendo. Y a la vez, quiero que tengas tu altar, ese lugar sagrado, tu refugio, el recordatorio de tu conexión con tu interior, para agradecer, para pedir o para simplemente encontrar calma. Sin olvidar el amor y la belleza por los detalles.
<br>
 

Te propongo que hagas una pausa. Te propongo que te regales un momento único e intimo para que conectes contigo, con tu naturaleza, con tu intuición y con tu más auténtico ser.</span ><br>
<button type="button" class="btn" onclick="location.href='index.php?id=quienessomos'" style="margin-top:20px;  background-color:#FF971D; color:white;">Conocer más</button>
	    </div>
	   <div class="col-sm-2"></div>
	  </div>

</div>

<div class="container-fluid" style="padding-top: 10px; background-color:#faeddb; padding-bottom: 100px;">
	<div class="row">
		<div class="col-sm"><img  class="img-fluid" src="images/mesitapeque.png"></div>
		<div class="col-sm"><img  class="img-fluid" src="images/fotopeque.png"></div>
		<div class="col-sm"><img  class="img-fluid" src="images/IMG_0689peque.JPG"></div>
	</div>

</div>


<div class="container-fluid" >
 	<div class="row">
 		<div class="banner2" >
	   		<div class="container">
	   			<div class="row" >
	   				
	   				
					<div class="card suscri" style="padding-top:10px;" >
					  <div class="card-body">
					    
					    
						<h2 style="color: black;">Suscríbete a ritual Luna Nueva</h2>
	   				
					    	<p class="card-text"><strong style="color: #916dd5;">Una suscripción mensual de autocuidado guiada por la luna nueva.</strong><br><br>
Cada mes con tu Luna Kali & Plan Alma – suscripción de Luna Nueva,  encontrarás una variedad de hermosos tesoros nuevos para ti y tu espacio sagrado, además de un ritual guiado para la luna nueva con herramientas que te ayudarán a establecer intenciones y manifestar todo lo que estas buscando en tu vida.<br><br>
<strong style="color: #916dd5;">¿Por qué la Luna Nueva?</strong><br><br>
Una luna nueva es el evento que se da cuando el Sol y la Luna se encuentran en el mismo grado matemático, y representa el inicio de un ciclo emocional y de manifestación, así como la apertura energética para alinear emoción e identidad sentir y pensamiento, para sembrar las intenciones en la cuales queremos trabajar en un área específica de nuestra vida. Cada luna nueva inicia un período de manifestación de seis meses que cierra con la luna llena del mismo signo.</p>
					
					 <a href="index.php?id=suscribete" class="btn btn-primary" style="background-color:#916dd5; text-decoration-style: none; border:0px;">Conoce más</a>

						
					    	
					    
					  </div>
					</div>
				
	   			</div>
	   			<div class="row">
	   				
	   			</div>

	   		</div>
	   		
		</div>

	</div>
</div>

<div class="container-fluid" >
 	<div class="row">
 		<div class="banner4" style="min-height: 400px; height: auto; color: black;">
	   		<div class="container" >
	   			<div class="col-sm-6"  style="background-color:rgba(250,250,250,.8); padding: 20px;">
	   			<div class="row"  style="padding-left: 20px; padding-right: 20px;">
		   			<h1 >Rituales a medida</h1>
	   			</div>
	   			<div class="row" style=" padding-left: 20px; padding-right: 20px;">
	   				<span >Estamos aquí para ayudarte a conectar a través de rituales/regalos pensados especialmente para tu evento, ya sea, talleres, retiros, despedida de soltera, bodas o regalos corporativos. Podemos trabajar con tu presupuesto. <br><br>

					Te acompañamos cuando se trata del arte del autocuidado.<br><br>

 					Ponte en contacto hoy. Envía un correo electrónico a <a style="color: #916dd5;">contacto@lunakali.cl</a> para todas tus necesidades de regalos personalizados.
 						</span>
	   			</div>
	   			
	   		</div>
	   	</div>
	   		
		</div>

	</div>
</div>


<!--<div class="container-fluid" >
 	<div class="row">
 		<div class="col-xl-12" style="text-align: center; margin-top: 50px; padding-bottom: 100px;">
 			<h1>Instagram</h1>
 			<div id="instagram">

 			</div>
 			<div id="loading">
 				<img src="images/loading.gif" width="150">
 			</div>
 		</div>
	</div>
</div>-->

<?php } 
else 
{
  if(file_exists($_GET['id'].".php")) 
  {
    //$id= htmlspecialchars(trim($_GET["id"]));
    //$id= eregi_replace("<[^>]*>","",$id) ;
    //$id= eregi_replace(".*//","",$id) ;
    include($_GET['id'].".php");
  } 
  else 
  {
    //include("index.php");
    
  }
} ?>


<footer class="footer mt-auto py-3" style="margin-top:50px; background-color: #FBF5ED;">
	<div class="container">
		<div class="row">
    		<div class="col-sm" style="text-align: left;">
    			<ul style=" padding-left: 0px;">
    				<li class="list-group"><strong>Servicios</strong></li>
    				<li class="list-group" style="cursor:pointer;" onclick="location.href='index.php?id=preguntas'">Preguntas frecuentes</li>
    				<li class="list-group" style="cursor:pointer;" onclick="location.href='index.php?id=comocomprar'">Cómo comprar</li>
    				<li class="list-group" style="cursor:pointer;" onclick="location.href='index.php?id=envios'">Envíos y despachos</li>
    			</ul>
    		</div>
    	<div class="col-sm" style=" text-align: center;">
    		<img src="images/logobn.png" width="150" class="img-fluid">
    	</div>
	  		<div class="col-sm" style=" text-align: right;">
	  			<ul>
	    				<li class="list-group" ><strong>Luna Kali</strong></li>
	    				<li class="list-group"  style="cursor:pointer;" onclick="location.href='index.php'">Home</li>
	    				<li class="list-group" style="cursor:pointer;"  onclick="location.href='index.php?id=rituales'">Rituales</li>
	    				<li class="list-group"  style="cursor:pointer;" onclick="location.href='index.php?id=suscribete'">Suscripción</li>
	    				<li class="list-group"  style="cursor:pointer;" onclick="location.href='index.php?id=productos'">Productos</li>
	    				<li class="list-group"  style="cursor:pointer;" onclick="location.href='index.php?id=ritualesamedida'">Rituales a medida</li>

	    			</ul>
	  		</div>
	  	</div>
	  	<div class="row">
    		<div class="col-md-12" style="text-align: center;">
    			Año 2020 <br> Página creada por arcanita@arcanita.cl
    		</div>
  	</div>
</footer>




</body>
</html>
<script>

var flagenvio = 0;
var flagsuscripcion = 0;

function agregar_carrito(id){
        
         $.post(
          "procesar_carrito.php",
          {
            action:"agregar_carrito",
            ide:id,
            
            
          },
          function(data, status)
          {
                    if(status=='success')
                    {
                      var serverresponse = JSON.parse(data);
                      
                      if(serverresponse.data=='ok')
                      {
                          
                          $("#cont").empty();
                          $("#cont").append(serverresponse.count);
                          
                          var total_actual = $("#total").val();
							     var nuevo_total = parseInt(total_actual) + parseInt(serverresponse.precios);
								  $("#tot").text(nuevo_total);
								  $("#total").val(nuevo_total);
								  if(id == 59)
								  {
								  		flagenvio = 1;
								  		
								  		$("#elcarrito").append('<tr class="div_envio"><td>Envío a domicilio</td><td>$'+serverresponse.precios+'</td><td></td></tr>');
								  		var lista = $("#lista_productitos").val();
								  		var nueva_lista = lista+',59';
								  		$("#lista_productitos").val(nueva_lista);
                      		}
                      		if(id == 13 || id == 34 || id == 35 || id == 36)
                      		{
                      			flagsuscripcion = 1;
                      		}
                      }
                      else
                      {
                        if(id=='')
                           alert(serverresponse.data);   
                     }
                   }
                   else
                   {
                    $('#mensaje').slideDown();
                    $("#mensaje").text("Tenemos un problema temporal, inténtalo más tarde...");
                  }
                }
                );
      }

function borrar_carrito(id, pos, precio){
          
           $.post(
            "procesar_carrito.php",
            {
              action:"borrar_carrito",
              ide:id,
              
              
            },
            function(data, status)
            {
                      if(status=='success')
                      {
                        var serverresponse = JSON.parse(data);
                       
                        if(serverresponse.data=='ok')
                        {
                           var nuevo_total = 0;
                            
                           
                            
                            var totalisimo = $("#total").val();
                            $("#tot").empty();
                            
                          
                           
                            if(id == 59)
                            {
                            	$(".div_envio").empty();
                            		//si no hay suscripcion
                            		if(serverresponse.flag == 0)
                            		{
                            			
                            			nuevo_total = parseInt(totalisimo) - parseInt(3000);
                            		}
                            		else
                            		{
                            			
                            			nuevo_total = parseInt(totalisimo);
                            		}                              
                            }
                             

                            
                              
                          else
                          {

                           location.reload();
                          		if(serverresponse.flag == 0)
                          		{
                          			
                                		if(serverresponse.flagenvio == 0)
                                		{
                                			
                                			nuevo_total = parseInt(totalisimo) - parseInt(precio);
                                			
                                		}
                                		else
                                		{
                                			
                                			$(".div_envio").empty();
	                               	   $(".div_envio").append('<td>Envío a domicilio</td><td>$3.000</td><td></td>');
	                               	   nuevo_total = parseInt(totalisimo) - parseInt(precio);
	                               	  
                                		}
                               	   
                               }
                               else
                               {
                               	
                               	if(serverresponse.flagenvio == 0)
                                		{
                                			
                                			nuevo_total = parseInt(totalisimo) - parseInt(precio);
                                			 
                                		}
                                		else
                                		{
                                			
                                			$(".div_envio").empty();
	                               	   $(".div_envio").append('<td>Envío a domicilio</td><td>$0</td><td></td>');
	                               	   nuevo_total = parseInt(totalisimo) - parseInt(precio);
	                               	    
                                		}
                               	
                               }
                           
                          		  $(".div_"+pos).hide();
                          }
                           
                            $("#tot").text(nuevo_total);
                            $("#total").val(nuevo_total);
                            if(nuevo_total == 0)
                            {
                              $("#formulario").hide();
                            }
                          
                                
                        }
                        else
                        {
                          if(id=='')
                             console.log("hola");   
                       }
                     }
                     else
                     {
                      $('#mensaje').slideDown();
                      $("#mensaje").text("Tenemos un problema temporal, inténtalo más tarde...");
                    }
                  }
                  );
        }
  
function obtener_token(){
	
	 $.post(
                "procesar.php",
                {
                     action:"entregar_token",
                    
                },
                function(data, status)
                {
                     if(status=='success')
                     {
                        var serverresponse = JSON.parse(data);
                        //console.log(serverresponse);
                        if(serverresponse.data=='ok')
                        {

                           $.ajax({
				  url: "https://graph.instagram.com/refresh_access_token",
				  type: "get",
				  data: { 
				    grant_type: 'ig_refresh_token', 
				    access_token: serverresponse.token, 
				  },
				  success: function(response) {
				    //console.log(response.access_token);
				    guardar_token(response.access_token);
				    $.ajax({
						  url: "https://graph.instagram.com/me/media",
						  type: "get",
						  data: { 
						    fields: 'media_url,media_type', 
						    access_token: response.access_token, 
						  },
						  success: function(response) {
						  	$("#loading").hide();
						    	var arreglo = Object.values(response);
						 		
						 	var i = 0;
						 	
						 	
						 	var relleno = '<div class="container"><div class="row row-cols-1 row-cols-sm-2 row-cols-md-4" style="margin-bottom:20px;">';
						 	
						 	for(i=0; i<8; i++)
						 	{
						 		
						 		relleno = relleno + '<div class="col" style="margin-top: 20px;margin-bottom: 20px;">';
							 	relleno = relleno + '<a href="https://www.instagram.com/luna_kali" target="_blank">';
						 		if(arreglo[0][i].media_type == 'VIDEO')
						 		{ 
						 			relleno = relleno + '<video class="img-fluid" width="240" autoplay><source src="'+arreglo[0][i].media_url+'" type="video/mp4"></video>';
							 	}
						 		else
						 		{
						 			relleno = relleno + '<img class="img-fluid" width="240" src="'+arreglo[0][i].media_url+'">';
							 	}
						 		relleno = relleno + '</a></div>';

						 	}
						 	relleno = relleno + '</div></div>';
						 	//console.log(relleno);
						 	$("#instagram").html(relleno);
						 	
						  },
						  error: function(xhr) {
						    alert("Tenemos un problema temporal, inténtalo más tarde...");
						  }
						});
				  },
				  error: function(xhr) {
				    alert("Tenemos un problema temporal, inténtalo más tarde...");
				  }
				});
				
                        }
                        else
                        {
                           alert("Tenemos un problema temporal, inténtalo más tarde...");
                        }
                    }
                    else
                    {
                        alert("Tenemos un problema temporal, inténtalo más tarde...");
                    }
                }
            );
}
function guardar_token(token)
{
	$.post(
                "procesar.php",
                {
                     action:"guardar_token",
                     tok: token,
                    
                },
                function(data, status)
                {
                    if(status=='success')
                    {
                        var serverresponse = JSON.parse(data);
                        //console.log(serverresponse);
                        
                    }
                    else
                    {
                        alert("Tenemos un problema temporal, inténtalo más tarde...");
                    }
                }
            );
}






  function revisar_carrito(){
        console.log("revisar");
          $.post(
            "procesar_carrito.php",
            {
              action:"revisar_carrito",              
            },
            function(data, status)
            {
                      if(status=='success')
                      {
                       
                        var serverresponse = JSON.parse(data);
                        
                        if(serverresponse.data == "si")
                        {
                            $("#cont").empty();
                            
                            var largo = serverresponse.productos.length;
                          
                            $("#cont").append(largo);
                           
                        }
                        else
                        {
                          
                             console.log("hola");   
                       }
                     }
                     else
                     {
                      $('#mensaje').slideDown();
                      $("#mensaje").text("Tenemos un problema temporal, inténtalo más tarde...");
                    }
                  }
                  );
      }

</script>