<?php
session_start();
include("config.php");
error_reporting(E_ALL ^ E_NOTICE);  
?>

<!DOCTYPE HTML>
<!--
	Strongly Typed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->

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
	<body>

		<div class="logo"><a  href="index.php"><img src="images/DEFINITIVO_LOGO.png" width="400" class="img-fluid"></a></div>
		

		<nav class="navbar navbar-expand-lg navbar-light">

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavDropdown">
				<ul class="navbar-nav" style="padding-top: 5px;">
					
					<li >
						<a class="nav-link" href="admin.php?id=ver_compras">Ver Compras</a>
					</li>
					
				</ul>
			</div>
		</nav>


	<div class="container">		

	<?php
	if(!isset($_SESSION['user']))
	{
	    ?>
	    	<div class="container">
            <div class="row" >
					<div class="card suscri" style="margin: 0 auto; margin-top: 50px;">
                  <div class="card-body">
                        
						<h2>Inicia sesion</h2>
						<form action="procesar_login.php" method="POST">
							<div class="form-group col-md-6">
					      	<label for="inputEmail4">Tu Email</label>
					      	<input type="email"  class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email">
					   	</div>
						   <div class="form-group col-md-6">
						      <label for="inputEmail4">Password</label>
						      <input type="password" name="pass"  class="form-control" id="nombre" id="exampleInputPassword1" placeholder="Password" >
						   </div>
						   <button type="submit" value="login" name="log" class="btn btn-primary" style="background-color:#FEA5AD; border:0px; width: 120px;">Iniciar sesión</button>
						</form>
						</div>
					</div>
				</div>
			</div>
						
				   	
	    <?php 
	}
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
	  	 ?>Bienvenido Administrador<br> elige una opción del menu

	  	 <?php
	    }

	}







	?>

	<br><br><br>
</div>
</body>
</html>